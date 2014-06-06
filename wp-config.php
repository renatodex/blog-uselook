<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Heroku Postgres settings - from Heroku Environment ** //
$db = parse_url($_ENV["DATABASE_URL"]);

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', trim($db["path"],"/"));

/** MySQL database username */
define('DB_USER', $db["user"]);

/** MySQL database password */
define('DB_PASSWORD', $db["pass"]);

/** MySQL hostname */
define('DB_HOST', $db["host"]);

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
/*define('AUTH_KEY',         getenv('AUTH_KEY'));
define('SECURE_AUTH_KEY',  getenv('SECURE_AUTH_KEY'));
define('LOGGED_IN_KEY',    getenv('LOGGED_IN_KEY'));
define('NONCE_KEY',        getenv('NONCE_KEY'));
define('AUTH_SALT',        getenv('AUTH_SALT'));
define('SECURE_AUTH_SALT', getenv('SECURE_AUTH_SALT'));
define('LOGGED_IN_SALT',   getenv('LOGGED_IN_SALT'));
define('NONCE_SALT',       getenv('NONCE_SALT'));*/
define('AUTH_KEY',         '{-5|Y?h]|r69d0p5=4Y;*#/T?n<T>lmbfdo<%og]Y)E.*0azv(LXVd[c$U`Af7t,');
define('SECURE_AUTH_KEY',  'BTt7>Xt|6cIu~DnsIbbG+*pz+~BMqW_La0_2P/3yh#kNeep-PQJ-W&P*1}JeTEl#');
define('LOGGED_IN_KEY',    'g2$-KbJnyYP4@a-9E}XE(|<>A`7KM)Ooebcp/NR<lM7)-@8sLH %Z~*(tH1}n.1=');
define('NONCE_KEY',        'n$;-ZPKz(o$C[dFcuBkkvA<y^IMNd=B^lJ-Rbz<*RGRa)pAmPRLp27=/^!V+:{lY');
define('AUTH_SALT',        '$Vj)B9gv?c|Q*iX+p<H:co.*5#OfRcyvQIl<newd3IYx/GXpa{JuYNg+l|1Dk]{s');
define('SECURE_AUTH_SALT', ':5VXEjtuv8*ygP!#z=[zjHIAuT9URz0Y[|CzT!k^]|R]}`NxliGMW(|>o*Jj+mPQ');
define('LOGGED_IN_SALT',   'Usppg;){{M,4/.NHI}eaGSn<-p!*+sPi`ohXDps|zh(/1~%A}R4OTr^dt<rb[-H5');
define('NONCE_SALT',       's~DV.#K7l>q>z)7)5#IwCLuC.MZ)9ez=Apq+^juhSBpG&Hf,YME|+jg8(zzL~5^q');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
