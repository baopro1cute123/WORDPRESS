<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'WebWordPress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'qNIenZnW3{iQ!(#Q{d$x K42GNc4eAAPAx7P-t&QGcbWd:ZY*M/Y@b(0{kZCPm6c' );
define( 'SECURE_AUTH_KEY',  '/#C7zOWu|^1F|H2Z8oM/qZTo21EB$W@Xb!2]`w4f1iV?HP&fmDHl#F:x}u]xAj@$' );
define( 'LOGGED_IN_KEY',    'OQ=[mLie$bMVFzA[`VF!JiHy`+z0%V)-l5HE${ ]:<|~&LN`+F4XLYi>U[u|3ysa' );
define( 'NONCE_KEY',        ' m1,Bw;f=E%/9I:|RtM.X-W&Z?Q)z3QIDS!tw&B?UTPzY[jXy+c/<u1*?(?J6g/U' );
define( 'AUTH_SALT',        'E>v$R|;++tuP.B|8xw!|rq]GAc8nd}TH7WdxRw9O30[0k9X88GEy,!!<oC-6lYf#' );
define( 'SECURE_AUTH_SALT', '(XP3FQ?)&P`n8I@E}-qYD/{F#0}sBfWX:B:|WX2BU|Q9hWGGa^#gL6rDL#WiD(P]' );
define( 'LOGGED_IN_SALT',   '3x5G~.>R4;7/k+ fhegj-z%}W9-vyaD=f8qNh(g)5~V[iJ+`Fgyuz%BL[l5dpf`D' );
define( 'NONCE_SALT',       'q0xcK7@ 315rU@eo)TG(Ni?[7w Z~.&jmp}Kz2P0~C1@}or||kFCurM)J&k`.<lB' );

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
