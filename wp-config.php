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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'snu' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'ysuWB{uOAJY6u 4s9wD#ho1NlO5lS=NkW&MQpy<Jr=vMK5Un;xNvX|ZtuzZ`e aH' );
define( 'SECURE_AUTH_KEY',  'uNc@{U}6qJorR21G7`0c]*-n`*C*o7p ]N>>Rp,(;+{]u;LE1h^N]]$I[8gDIv%S' );
define( 'LOGGED_IN_KEY',    '$#/woDa4Z(qhYr*mO<@b~UrfaUP>V.B3Q!0kH+1Hha(W3<MDw+n58Tw^layb><hu' );
define( 'NONCE_KEY',        '_>OMz#.Tj9n@dFv4F!@5mm9{8YUf A{#LIt/pCFIuu(PmjxtcE2]YDo7?j<Ul=K`' );
define( 'AUTH_SALT',        '!/3&^:3S<a).}@uN=vY/H=m^Cy|!{xypn+;8Nd/uCA{=7s}z!L[7a_M$&0|(EvO`' );
define( 'SECURE_AUTH_SALT', 'pAqh8cI`QB~Kb.MF&)vI9m-V=/MBk=T1V<%qL!~+={ +m@lbPx}oO?cAb6gIXA-W' );
define( 'LOGGED_IN_SALT',   'u:#tv}gS#,EG5zyEv63;>C6/zfTZ>pKK34K*?pPF/Y&/DYN<b]5g.ZF$|B`A4#,g' );
define( 'NONCE_SALT',       'M3@Aor(E,(XU[4(]+*H0h_^ZF_I5?Ngi K}E}Y/Q?{4^81u[dr9[1Yb;W%s<q>WO' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
