FROM alpine:3.13.6

RUN	apk update && apk upgrade && apk add --no-cache\
        mariadb \
        mariadb-client

#RUN rm /etc/mysql/mariadb.conf.d/50-server.cnf
#COPY conf/my.cnf /etc/mysql/mariadb.conf.d/50-server.cnf

#RUN chmod 644 /etc/mysql/mariadb.conf.d/50-server.cnf

COPY tools/config.sh /tmp/configure.sh

ENTRYPOINT ["sh", "/tmp/configure.sh"]