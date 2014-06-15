<?php

/**
* The base configurations of the WordPress.
*
* This file has the following configurations: MySQL settings, Table Prefix,
* Secret Keys, WordPress Language, and ABSPATH. You can find more information
* by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
* wp-config.php} Codex page. You can get the MySQL settings from your web host.
*
* This file is used by the wp-config.php creation script during the
* installation. You don't have to use the web site, you can just copy this file
* to "wp-config.php" and fill in the values.
*
* @package WordPress
*/

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'kinkeadw_gbc');

/** MySQL database username */
define('DB_USER', 'kinkeadw_gbc');

/** MySQL database password */
define('DB_PASSWORD', 'gr@ceandtruth');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'n6AA#T:).Wx&m+^~}KEe.d[?QmL+#|iK{a+!S)CB >sy%9c<MZ L.*q3Kd8Wti?k');
define('SECURE_AUTH_KEY',  'wVo{#RpQG|zJjOGrm2; ?W1j$*)zN5v2(UcAVo^ixSmw;}?ngW%h`W|#iW)n-z~q');
define('LOGGED_IN_KEY',    'm%ll;H|YYWm$O2Tm0F;qYd}WZ+l_nsBkXy9TY4tV_u6![QL}qb]d%[Hqz]|4n#4w');
define('NONCE_KEY',        '7dtxB8,5]jQ tmW}wQ29<$xmU0>;9J(fLpA#E>&7g,YzDbTr@QQ5/`M%jf-.[%W!');
define('AUTH_SALT',        'P~+h0%wE9d6 .=<)Z!$FP.QHoSq+ZDtF~k] [VyRd|v-h);Lp9WqtYG!6;A,lRFD');
define('SECURE_AUTH_SALT', 'eKX|6+`LJ|Ay1PjNv`mQu4l;!jz:jXo?V*>v2Iu4B))a*3}q63hJl%{|Myror p`');
define('LOGGED_IN_SALT',   'KP4Y(2ARg5:#J^DJmqKMhpQUU^9bElbh_K?*O<}oi6e1;4Az^<9}LDu,b$8->>Xc');
define('NONCE_SALT',       'Fk@=*`9hIPRI-F6D+#5FhbO72^_5h<an-+x(-XyT-fY|eOI~o=Q(xY@=HgQHV?=,');

/**#@-*/

/**
* WordPress Database Table prefix.
*
* You can have multiple installations in one database if you give each a unique
* prefix. Only numbers, letters, and underscores please!
*/
$table_prefix  = 'gbcwp7';

/**
* WordPress Localized Language, defaults to English.
*
* Change this to localize WordPress. A corresponding MO file for the chosen
* language must be installed to wp-content/languages. For example, install
* de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
* language support.
*/
define('WPLANG', '');

/**
* For developers: WordPress debugging mode.
*
* Change this to true to enable the display of notices during development.
* It is strongly recommended that plugin and theme developers use WP_DEBUG
* in their development environments.
*/
define('WP_DEBUG', false);

define( 'WP_AUTO_UPDATE_CORE', true );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
