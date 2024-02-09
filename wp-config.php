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
define( 'DB_NAME', 'bizaka' );

/** Database username */
define( 'DB_USER', 'ugalaxy' );

/** Database password */
define( 'DB_PASSWORD', 'uGalaxy123$' );

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
define( 'AUTH_KEY',         'LqdW}*YnOE24nl_^]w^;:K#: !sj{NV+Kx(!M4y}6Z8t0.~iC_BB!5[B,Uov&Ax`' );
define( 'SECURE_AUTH_KEY',  '5&8G(.[KJ%A[I@h i>3__c9#$fwy2Mg5o/xawhc.^a!r<`;IXweR`;$uT}n9 fq?' );
define( 'LOGGED_IN_KEY',    'J Z9&gO9]Wn1#uyBDU-P5!`xT-#^mq4uzXH{l?pm] <mqcE|!#8KV|/]L`Ou*V2)' );
define( 'NONCE_KEY',        'j3fN78%s3&t%jK$*JKFdLCxX7|!cz{5p3w!}ek0CoByNWCY|dyj8ew`+qUq)5N`3' );
define( 'AUTH_SALT',        '7th4ZdPGCm>Ra48=d8P`iT^^:aWWvUdPU=PdK_3f9FEr7:GT-=WsE*G]jGYv<I2x' );
define( 'SECURE_AUTH_SALT', 'c:ZmaAS7:95q`QL*OC1D$$gIEK_ytBJ!`A}1G`J45PHzn4 Iw+EI+wKky=Z%aY_4' );
define( 'LOGGED_IN_SALT',   'AOAB+ILh3l68j4Cm@baxsh&t]5Wt&&/ -nF46rO.wp+p *r=yz1WoE1=!FHPm@2V' );
define( 'NONCE_SALT',       'eC.h+wt%39RuTG0jmm}z`3YyDFM4$YUA]1I^FY+1ae)k:?U`}gM0Yt]kE!cKpxf`' );

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
