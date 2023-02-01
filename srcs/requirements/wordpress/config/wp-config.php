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
