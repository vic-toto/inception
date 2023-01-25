FROM alpine:latest
RUN apk update && apk add mariadb mariadb-client
COPY conf/my.cnf /etc/mysql/conf.d
RUN apk add --no-cache tzdata
RUN mysql_install_db --user=mysql --datadir=/var/lib/mysql
CMD ["mysqld"]
