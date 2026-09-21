<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          '}nPYTJ5q$hw-@zL(c%6[]yp+{z04UWb,i5?f`DQg+K/|,a+cBUPGf!NU<3(KB4rr' );
define( 'SECURE_AUTH_KEY',   '67tYNLIH^m{sqvGy:V7J*CuXUC7+En0;</gn v&94643eDmQ]/u/0xCV5? *@EU ' );
define( 'LOGGED_IN_KEY',     ']w]Z-b97|_V<H<1&tCkmk4]]{!tDHJUCOb9XB$3<b?( NxfJgK^R;d9;E1%rR6?Y' );
define( 'NONCE_KEY',         'lQVo{f1Edt3iQo0kUI:tAj!Wag+K$I@CHK|i~?[`}b>AA7LV(Cg+L4#%&{GZ^FGc' );
define( 'AUTH_SALT',         'lQ6^q[iokxX.Mn>QO[?|}k$}ep^#Kv|2zAa1hL^:`|EMl3cZPtmpq1|nqCA&W)(f' );
define( 'SECURE_AUTH_SALT',  '>bki)%Y1S8=v_~+/}cd8r0I6TVL6umu. |glT]V$~BlBN~J[-PS7=Jg8kZ^k~1a5' );
define( 'LOGGED_IN_SALT',    'ZmzJa=K U{A3[7Ko2Oyq1,9~^*!M<Tom&]*B-BplfEc|kE9%w=)V&X9jxYNk-ASa' );
define( 'NONCE_SALT',        ',Gi?W)BN2HB )@do09Bm4/|#vdE,+BNCcQ`PD>vK{CM@PJhi5OTj^GuBe BuM>{0' );
define( 'WP_CACHE_KEY_SALT', ' 0(9EY$B^s0x@y&2`p^F:1 T=>,yuw0ABa+.Z%1#J|eu74^hHqYdmwS}`M`^L|&$' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
