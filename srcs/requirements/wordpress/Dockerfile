FROM alpine:3.13

RUN apk update && apk add --no-cache \
    mariadb-client \
    php \
    php7-fpm \
    php7-phar \
    php-pear \
    php-cgi \
    php-common \
    php-zip \
    php-mbstring \
    php-gd \
    php-gettext \
    php-bcmath \
    wget

RUN wget https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
RUN chmod +x wp-cli.phar
RUN mv wp-cli.phar /usr/local/bin/wp

RUN wget https://wordpress.org/latest.tar.gz -O /tmp/wordpress.tar.gz \
    && mkdir /var/www \
    && mkdir /var/www/wordpress \
    && tar -xvzf /tmp/wordpress.tar.gz -C /var/www/ \
    && rm /tmp/wordpress.tar.gz \
    && mv /var/www/wordpress/* /var/www/ \
    && rm -rf /var/www/wordpress \
    && chown -R nobody:nobody /var/www

COPY config/php-fpm.conf /etc/php7/php-fpm.conf
COPY config/www.conf /etc/php7/php-fpm.d/www.conf
COPY config/wp-config.php /var/www/wp-config.php

    #Config php-fpm
RUN mkdir /run/php
RUN sed "s/listen = \/run\/php\/php7.3-fpm.sock/listen = 9000/" -i /etc/php7/php-fpm.d/www.conf
RUN touch /var/log/php7.3-fpm.log
RUN chown -R root:root /run/php /var/log/php7.3-fpm.log 

RUN adduser -u 1007 -D -S -G root www-data


USER www-data


RUN chown -R www-data:www-data /var/www

WORKDIR /var/www/
RUN wp user create $WP_USR $WP_EMAIL --user_pass=$WP_PWD --role=subscriber

#EXPOSE 9000

CMD ["/usr/sbin/php-fpm7", "--nodaemonize", "-c", "/etc/php7/php-fpm.conf"]

#CMD ["php-fpm7", "-F"]