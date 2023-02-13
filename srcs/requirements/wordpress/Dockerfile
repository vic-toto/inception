FROM alpine:3.13

RUN apk update && apk add --no-cache \
    mariadb-client \
    php7				\
    php7-fpm			\
    php7-bcmath			\
    php7-bz2 			\
    php7-calendar		\
    php7-ctype			\
    php7-curl			\
    php7-dom			\
    php7-exif			\
    php7-fileinfo		\
    php7-gd				\
    php7-gmagick		\
    php7-gmp			\
    php7-iconv			\
    php7-imap			\
    php7-intl			\
    php7-json			\
    php7-mbstring		\
    php7-mcrypt			\
    php7-memcache		\
    php7-mysqli			\
    php7-mysqlnd		\
    php7-openssl		\
    php7-pcntl			\
    php7-pdo			\
    php7-pdo_mysql		\
    php7-pdo_pgsql		\
    php7-pdo_sqlite 	\
    php7-pgsql			\
    php7-phar			\
    php7-posix			\
    php7-session		\
    php7-shmop			\
    php7-simplexml		\
    php7-soap			\
    php7-sockets		\
    php7-sodium			\
    php7-sqlite3		\
    php7-sysvsem		\
    php7-sysvshm		\
    php7-tokenizer		\
    php7-xml			\
    php7-xmlreader		\
    php7-xmlwriter		\
    php7-xsl			\
    php7-zip			\
    php7-zlib           \
    wget                \
    tar                 \
    redis

RUN adduser -D -S -G root www-data
#RUN addgroup www-data root

#RUN wget https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
#RUN chmod +x wp-cli.phar
#RUN mv wp-cli.phar /usr/local/bin/wp

#RUN wget https://wordpress.org/latest.tar.gz -O /tmp/wordpress.tar.gz \
RUN     mkdir /var/www \
        && mkdir /var/www/html
#    && tar -xvzf /tmp/wordpress.tar.gz -C /var/www/ \
#    && rm /tmp/wordpress.tar.gz \
#    && mv /var/www/wordpress/* /var/www/ \
#    && rm -rf /var/www/wordpress 
    #&& chown -R nobody:nobody /var/www

COPY config/php-fpm.conf /etc/php7/php-fpm.conf
COPY config/www.conf /etc/php7/php-fpm.d/www.conf
#COPY config/wp-config.php /var/www/wp-config.php

#COPY config/index.html /tmp/index.html

    #Config php-fpm
#RUN mkdir /run/php
#RUN sed "s/listen = \/run\/php\/php7.3-fpm.sock/listen = 9000/" -i /etc/php7/php-fpm.d/www.conf
#RUN touch /var/log/php7.3-fpm.log
RUN wget https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
RUN chmod +x wp-cli.phar
RUN cp wp-cli.phar /usr/bin/wp
#RUN chown -R root:root /run/php /var/log/php7.3-fpm.log 
RUN chown -R www-data:root /var/www/
RUN chown -R www-data:root /var/www/html/

WORKDIR /var/www/html
#WORKDIR /var/www/

#RUN wp user create $WP_USR $WP_EMAIL --user_pass=$WP_PWD --role=subscriber --allow-root
#RUN find . -type d -exec chmod 755 {} \;
#RUN find . -type f -exec chmod 644 {} \;
#EXPOSE 9000
COPY tools/configure.sh /tmp/configure.sh
#CMD ["/usr/sbin/php-fpm7", "--nodaemonize", "-c", "/etc/php7/php-fpm.conf"]
ENTRYPOINT ["sh", "/tmp/configure.sh"]
#CMD ["php-fpm7", "-F"]