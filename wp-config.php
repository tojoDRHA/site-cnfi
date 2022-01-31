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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'sitewebcnfi2021' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost:33066' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Aagfee<c8pbu>4~M_#1{@.a{zQbp{K0$M/0-oL}|7:zqoU^af.gjcQsYl2qIX0}%' );
define( 'SECURE_AUTH_KEY',  'IdX1++Re6}*GC}wF]w1/zDSS@qMY=-!NPxST_(|PIYHW%nB;Q,Aj/qV`o6ro]k^5' );
define( 'LOGGED_IN_KEY',    'c8n1*j `u)j#].n9U8/.#*ZgvG=Fxa9H_XW^T)3sVFjA?A8>so42{zNqro-#zF,3' );
define( 'NONCE_KEY',        'P+,$4mqz*M8UQ$rM&e!o0fYs-6_E-VUY0aH%A&@2y)oVphW;-N=l0>5]n:Fcc}`E' );
define( 'AUTH_SALT',        'KDHt:Wsvf2U.Zg|E3S5NSN42+BUzbSTh)gIt>CWZfI1ZWgBU$E/P)N=F#a|a_8.-' );
define( 'SECURE_AUTH_SALT', 'waVKLd%;A5b*[!,UmsI[*}e>9s`!-:U5LFO(Ea-%NE9fe4*s$6jq0]V)Ay!>+,w=' );
define( 'LOGGED_IN_SALT',   'c!0+%z2/|D*@]J^[z1!:`!$pxbF?,bsU22HK|q6H90&^|[({:sKI[y#U*A75R:8S' );
define( 'NONCE_SALT',       '$1UsK9I8(w/H0]Bk}P)YY0sj}@7+i@+5=.(s|jCpaes[L%^TO?4+T#QOd?56RjgG' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
