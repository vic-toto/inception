FROM alpine:latest
RUN apk update && apk add mariadb mariadb-client
RUN mkdir -p /run/mysqld
RUN chown -R mysql:mysql /run/mysqld
COPY conf/my.cnf /etc/mysql/conf.d
RUN apk add --no-cache tzdata
RUN mysql_install_db --user=mysql --datadir=/var/lib/mysql
CMD ["mysqld", "--user=mysql"]
