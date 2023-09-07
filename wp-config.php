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
define( 'DB_NAME', 'gymfitness' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '16437616' );

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
define( 'AUTH_KEY',         'tK/|D9P/x4Q(VR.mJ*wk@b<;+/sD(VO7QOxDXn_FCm BWHGAeA^V+#sn2B|kAf8q' );
define( 'SECURE_AUTH_KEY',  'Ad^m =Rv+B1EBD_x$=>10wTIRofn6kkN^_(dqi!wV6C!6CuIy  w$XrkTnAO,2r8' );
define( 'LOGGED_IN_KEY',    'U::_t|hdO5G2h5tbFpJ@e6KB,$*s_[ZNfA:Ke?E0KuS}:F[f|x4}UO8qdz]/jl[`' );
define( 'NONCE_KEY',        'ZA>4~%E+8GaXr:90RSZ+p[GhrCM$<T4NVf_}%R[4G2a?op^9lzfrlc2|R%E3w7)c' );
define( 'AUTH_SALT',        'S@8rF.tPUuUskn/)#Q}pK%st;I2cRd4X)bmXS>Vl[He))FPnIMdr37}{KVFSxU6D' );
define( 'SECURE_AUTH_SALT', 'IUrv)(,`nRB94K#H-Oan&aFeS+1Y(FdIs9S+}i 5IH}Hz);rLP.<Y%B[es:!l(o!' );
define( 'LOGGED_IN_SALT',   'E@631quXa4dH.z$bee.usTCfR-~6|}KE4K%_gT-AV~:lrw_2,/Wq6gW%pdz6)dV<' );
define( 'NONCE_SALT',       'M1Oe/ylyA:3t>}#_lGhCDAC_Uh[QtOFXY<lsuX@UA *#f]m_?5?xz:[RiNIXmisJ' );

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
