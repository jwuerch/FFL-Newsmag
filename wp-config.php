<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/Users/jasonwuerch/Desktop/wordpress/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'FFL_News_Mag');

/** MySQL database username */
define('DB_USER', 'NMAdmin');

/** MySQL database password */
define('DB_PASSWORD', 'NMPass');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'D1t,sMqZ ^Dbomg|(ju>/d&kudBIfZbE2i=akVfeDmMi-l<[HE}Qq$Hubq:^z^.-');
define('SECURE_AUTH_KEY',  'E8|d0~XnpT</KoXRCLF%&Tqh*P7a.in;T#:&o>NE?#c4h0L5lR |(lqp#FsXpxgH');
define('LOGGED_IN_KEY',    '90@Gh+`WCzI*2BH(u~/_ QIi5=TmY05i uw;WgH=![^Jsu<0h}p5G::2l<FafG7x');
define('NONCE_KEY',        '.uBY (uN-](v7F!|Wlb-On|WOlz%b@8Tc`X~JpJ:1-KN?wUo6lh>ED|TIm}=Oal:');
define('AUTH_SALT',        'CoF-}boV;S>BR&>1#/S]I,cs`L_4[~_.7Z,a=SI]`rHS<[]%rwf8i3QYgmpkn%kb');
define('SECURE_AUTH_SALT', 'HsWX?0j=m15?cDoDMzi4m$,eik;SY|iup4ViPd}B>,w@XuDb_)6YL+Nm*l}46D6x');
define('LOGGED_IN_SALT',   ',,}E9>{FrMT0dHfiE9VO[V&t-LV.JNi65T@{bc27?KDEhjsG>sh9Gs/~w1Jt@0da');
define('NONCE_SALT',       '&or759&>5]WRepA*4#Pc-?.CuW6/q+X%KOT~h&{i38p9&*.Y!jp^bC;_tOw5oO;f');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
