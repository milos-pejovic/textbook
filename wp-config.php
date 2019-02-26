<?php

// BEGIN iThemes Security - Do not modify or remove this line
// iThemes Security Config Details: 2
define( 'DISALLOW_FILE_EDIT', true ); // Disable File Editor - Security > Settings > WordPress Tweaks > File Editor
// END iThemes Security - Do not modify or remove this line

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
define( 'DB_NAME', 'eng' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'PGEJU[11C+!Y&iB!#@5C<8D/O;5K78[fZ 1x-s9if0LReMwq%68F|G*/_#aV <Dy' );
define( 'SECURE_AUTH_KEY',  '45.qX+2Q~K0KV}f0CN0/dJKW.dR7ySyfn4P5wkP!rgW8jeQ3Ce}|Bhw3,4/1z^f`' );
define( 'LOGGED_IN_KEY',    ',9wl~+E~$Tn=+qfp[@w^:99<HnE6~%K?S5ZrN1?4qJJExkBc5u+c[[: .wb1R=+{' );
define( 'NONCE_KEY',        '@#LR/tJg=<h@dPs&)/5d8&A*~?%$rWY(Ft-g6,|k;`e|R0wa TAw-6I%sO&pWfvu' );
define( 'AUTH_SALT',        'wB@T~q,UY.UgbMiesI-|<eK-YqW[lKn0EIY5y@{YCK;`.ar:8?Q;Cxj(E/.twav5' );
define( 'SECURE_AUTH_SALT', 'B j4V)*uwsP[yo:[>wwgjal/ISx?emZk$N*wuq%7@CDAj4Nn0Sr;b8#O#NXOtNYB' );
define( 'LOGGED_IN_SALT',   'pY2y9#{`T4JG.D6<oe9k1w[ZW4FIHj)-Rr4;:0WdrEP+31@DK`}hzKveouXm_}&-' );
define( 'NONCE_SALT',       'cv>*qHmhyQ[~$nUWvJD3^gB9!KG/1LqsMFD[c-X=pXin#?iUjCLpzILY?4k!a?n)' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
