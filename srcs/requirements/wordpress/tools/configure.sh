while ! mariadb -h$MYSQL_HOST -u$WP_DB_USR -p$WP_DB_PWD $WP_DB_NAME &>/dev/null; do
    sleep 3
done

if [ ! -f "/var/www/html/index.php" ]; then

    wp core download --allow-root
    wp config create --dbname=$WP_DB_NAME --dbuser=$WP_DB_USR --dbpass=$WP_DB_PWD --dbhost=$MYSQL_HOST --dbcharset="utf8" --dbcollate="utf8_general_ci" --allow-root
    wp core install --url=$DOMAIN_NAME --title=$WP_TITLE --admin_user=$WP_ADMIN_USR --admin_password=$WP_ADMIN_PWD --admin_email=$WP_ADMIN_EMAIL --skip-email --allow-root
    wp user create $WP_USR $WP_EMAIL --user_pass=$WP_PWD --role=subscriber --allow-root

fi

echo "Wordpress started on :9000"
/usr/sbin/php-fpm7 -F -R