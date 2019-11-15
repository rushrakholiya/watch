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
define('DB_NAME', 'watch');


/** MySQL database username */
define('DB_USER', 'root');


/** MySQL database password */
define('DB_PASSWORD', '');


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
define('AUTH_KEY',         'kFA~1`AX u$TH^d+rxz-!^m7(dh$]53pJnpVZWACW~QM7zI9wozfP8*DoL.!VVGw');

define('SECURE_AUTH_KEY',  'xg/8Z<U:O938.<I0rx_Kg<j@yhYf70N0p;LpveM5$2x+Rc=?,+{w.N5aY2D;2^as');

define('LOGGED_IN_KEY',    '{q1ilthInqpU?Q_UO)l=Tk9:26t(bOjNNi>vtC4j~M$K 9vmGA+wW:aGNCp7QaCD');

define('NONCE_KEY',        '$9lS9dORn1JZ4:O/eYjlX2|Iq9H6dX.L<qByOQw8cL,a~TRoA*1 [`LaKj5r^|/W');

define('AUTH_SALT',        'Bg8Pg m$5C]P.g6fE-P~6+-yJx#?NKgvAy@Mm5.Q0.aa+Ns%m7ci>4=(U)}#iO&3');

define('SECURE_AUTH_SALT', 'Yj#<k@.XBJ<9*Q.)rBj}kz*Y<~?u!|g):QS48!m>Co,/i2^?;jd.y(lZB=[!QN#L');

define('LOGGED_IN_SALT',   '3L46<i9L${O9~yt!W_fKevA;?jrA#To62%pD!Mf3{>Lzi5LYjYXi>T9X6)/I-{c>');

define('NONCE_SALT',       'IaLhYN`OxHipkBoZ3Z@gS_a|(9BX)Udt=,V<y3_;pw36;7X``]X/@O, gPbKpu,]');


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'lw_';


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
define( 'WP_MEMORY_LIMIT', '256M' );