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
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'tool-email' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

if ( !defined('WP_CLI') ) {
    define( 'WP_SITEURL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
    define( 'WP_HOME',    $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
}



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
define( 'AUTH_KEY',         'GKqezoDu3iGq4igMUP16FJrvbZopQxnaJ9fZqzdDO0ToJP5KawqloKex0fSq3tI4' );
define( 'SECURE_AUTH_KEY',  'VQneV0pmGUQZlQJXAL7FPCAQo0KD5TbtUJMG8vCFigx5E3qAKytSPTg4Zi0GDlB6' );
define( 'LOGGED_IN_KEY',    '3DZWGjPp7TraxwhDs6ZLo1nLVMYxtqlSrovkdFgdLV8tUahXAbWvCBx9QBXLukXB' );
define( 'NONCE_KEY',        'H5j7YcxK93hxuVhSpkZZ9d1CE6rP6TbOcQdfHSmGm8cRAN5cmrbq76yBI79zZJeT' );
define( 'AUTH_SALT',        'th6i6XEcGO8dScJFKcuQMXawGA4T2GlspIdI7L4LTiIfBZk5TUg33pi9JvWgfSHB' );
define( 'SECURE_AUTH_SALT', 'BCCgBP3YONhsJTKj3x6M3jMPzzgkVHR40UsRR1RasoWVcBdhJItS1IByrEAD5Zpe' );
define( 'LOGGED_IN_SALT',   'QgvvIiNA0p16FrHs8uTcSaLy87A6Ex2zx4v5cZs52WgTshCXkVhCDtFp9xHaDZFm' );
define( 'NONCE_SALT',       'hUsbdEBsOY7hej4kVT1PBghqFsBj7Acqp7NnUCcGBCIhdygmxfZcIpRni1wrklfg' );

/**#@-*/

/**
 * WordPress database table prefix.
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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
