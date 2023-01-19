FROM alpine:latest
RUN apk update && apk add mariadb mariadb-client
COPY my.cnf /etc/mysql/my.cnf
RUN apk add --no-cache tzdata
ENV TZ=UTC
RUN mysql_install_db --user=mysql --datadir=/var/lib/mysql
RUN mysqld & sleep 5 && \
    echo "GRANT ALL ON *.* TO 'root'@'%' IDENTIFIED BY 'mypassword'; FLUSH PRIVILEGES" | mysql
EXPOSE 3306
CMD ["mysqld"]
