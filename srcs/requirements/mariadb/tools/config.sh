#!/bin/bash

if [ ! -d "/run/mysqld" ]
then
	mkdir -p /run/mysqld
	chown -R mysql:mysql /run/mysqld
fi

if [ ! -d "/var/lib/mysql/$WP_DB_NAME" ]
then
	chown -R mysql:mysql /var/lib/mysql
	mysql_install_db --basedir=/usr --datadir=/var/lib/mysql --user=mysql --rpm > /dev/null
	tmp=`mktemp`

	if [ ! -f "$tmp" ]
	then
		return 1
	fi

	cat << EOF > $tmp
USE mysql;
FLUSH PRIVILEGES;
DELETE FROM mysql.user WHERE User='';
DROP DATABASE test;
DELETE FROM mysql.db WHERE Db='test';
DELETE FROM mysql.user WHERE User='root' AND Host NOT IN ('localhost', '127.0.0.1', '::1');
ALTER USER 'root'@'localhost' IDENTIFIED BY '$MYSQL_ROOT_PWD';
CREATE DATABASE $WP_DB_NAME DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;
CREATE USER '$WP_DB_USR'@'%' IDENTIFIED BY '$WP_DB_PWD';
GRANT ALL PRIVILEGES ON $WP_DB_NAME.* TO '$WP_DB_USR'@'%';
FLUSH PRIVILEGES;
EOF

	/usr/bin/mysqld --user=mysql --bootstrap < $tmp
	rm -f $tmp
fi

sed -i 's/skip-networking/# skip-networking/g' /etc/my.cnf.d/mariadb-server.cnf
sed -i "s/#bind-address=.*/bind-address=0.0.0.0/g" /etc/my.cnf.d/mariadb-server.cnf

echo "MariaDB starting"

exec /usr/bin/mysqld --user=mysql --console