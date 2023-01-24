FROM alpine:3.13

RUN apk update && apk add --no-cache \
    php7-fpm \
    php7-mysqli \
    php7-json \
    php7-opcache \
    php7-mbstring \
    wget

RUN wget https://wordpress.org/latest.tar.gz -O /tmp/wordpress.tar.gz \
    && tar -xvzf /tmp/wordpress.tar.gz -C /var/www/ \
    && rm /tmp/wordpress.tar.gz \
    && mv /var/www/wordpress/* /var/www/ \
    && rm -rf /var/www/wordpress \
    && chown -R nobody:nobody /var/www

COPY config/php-fpm.conf /etc/php7/php-fpm.conf
COPY config/www.conf /etc/php7/php-fpm.d/www.conf
COPY config/wp-config.php /var/www/wp-config.php

EXPOSE 9000

CMD ["php-fpm7", "-F"]
