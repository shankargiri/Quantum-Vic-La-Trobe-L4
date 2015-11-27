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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'industry_project_wp');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         '!|cxLpc<Ya[i9}>-u.781.,Jq:T:LXv*Y`es3Vc>;>SiadDLC<}yEag|ow8+|GbN');
define('SECURE_AUTH_KEY',  'Mbz~6YJMdzdLZ;?0}~F*^BV0=/6oovZ-4K:dhgTGF6.y|g8[t.h)bb:)U;ahuvJ}');
define('LOGGED_IN_KEY',    'nt!P8/x2sU@j-U1V|)CP>:sX_q1*-2rSxCmc9`(1yC}QC&-iqZibfMD(YEef}+48');
define('NONCE_KEY',        'd.`)?nagqr9|.efSJ6?a>-#wGEkclB.||<wh|p<X[Z;tN@pTU|5xe3JUPTZ|R[eG');
define('AUTH_SALT',        'I6x,u&*1xG/py+2vr]Lb1Y/6Gvo! [!$fEx zX7}3ba-&/aSdH}+m}oQr>s29RB2');
define('SECURE_AUTH_SALT', 'Gh^wFB-cUUug|GH/|G:bW5.&lHE~RJ2-zG8rX+W?Jc$&m]>]~<L2RF6mGwHUf.TW');
define('LOGGED_IN_SALT',   '6Zze+Q06]R_ Pv ,c5o8j8V,}Ie>a|U4g%7B<#8Kj]gP*uLN&ZpYWBnm(/z%^>+0');
define('NONCE_SALT',       '-XJbrUcuIMBe37Xwx;-` V)-XWq)Qa6Ro+Xft#{$wcviWu|I[aRZ?{UiAp[JP~|n');

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
