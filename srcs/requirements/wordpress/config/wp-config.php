<?php

$WP_DB_NAME = getenv('WP_DB_NAME');
$WP_DB_USR = getenv('WP_DB_USR');
$WP_DB_PWD = getenv('WP_DB_PWD');
$MYSQL_HOST = getenv('MYSQL_HOST');
$DOMAIN_NAME = getenv('DOMAIN_NAME');
$WP_TITLE = getenv('WP_TITLE');
$WP_ADMIN_USR = getenv('WP_ADMIN_USR');
$WP_ADMIN_PWD = getenv('WP_ADMIN_PWD');
$WP_ADMIN_EMAIL = getenv('WP_ADMIN_EMAIL');
$WP_USR = getenv('WP_USR');
$WP_EMAIL = getenv('WP_EMAIL');
$WP_PWD = getenv('WP_PWD');

define('DB_NAME', $WP_DB_NAME);
define('DB_USER', $WP_DB_USR);
define('DB_PASSWORD', $WP_DB_PWD);
define('DB_HOST', $MYSQL_HOST);
define('DOMAIN_NAME', $DOMAIN_NAME);
define('WP_TITLE', $WP_TITLE);
define('WP_ADMIN_USR', $WP_ADMIN_USR);
define('WP_ADMIN_PWD', $WP_ADMIN_PWD);
define('WP_ADMIN_EMAIL', $WP_ADMIN_EMAIL);
define('WP_USR', $WP_USR);
define('WP_EMAIL', $WP_EMAIL);
define('WP_PWD', $WP_PWD);

$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
