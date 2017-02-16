<?php
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'habitech_wyhomesearch');
define('DB_USER', 'habitech_wyhomes');
define('DB_PASSWORD', 'uw!thxonPk#^');
define('DB_HOST', 'localhost');
define('DB_CHARSET', 'utf8mb4');
define('DB_COLLATE', '');
$table_prefix  = 'wp_ghxcv';
// define('WP_HOME','http://wyhomesearch.com');
// define('WP_SITEURL','http://wyhomesearch.com');
//define('WP_HOME','http://wyhomesearch.com');
//define('WP_SITEURL','http://wyhomesearch.com');
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'WP_MEMORY_LIMIT', '1024M' );
define('AUTH_KEY',         'd?o#=Rj7#[]+x7*?Y-Zk8W^hq- 0G2ZbPCUm~%H&@U,}N)I!J.r_hYFyT?Zf)V}e');
define('SECURE_AUTH_KEY',  'L%|g K-KZZR{3L_a!E#@^&wA1s(Z>.FqRm.o+EI#Ad61]GzTDAX /5W8Sa=]C?z{');
define('LOGGED_IN_KEY',    '#+z@*A=-<U4,3-I):`JTtoIuK`{jx&[}2+iHI|-r;6os(R,hXD$b?~b$6Ss{IupK');
define('NONCE_KEY',        'dKqs+Qh+|bYL6PIV(>)y b Cb,<&c4KeO`jt)&dqSA(Cgo}^5Gg6jEN]MY!/w3nC');
define('AUTH_SALT',        '[]Xd)KPlHfI402vEFru] x#,{[-fo;>Do4fO-pA*lh0HcqroTbd<;o[=gil-yPkf');
define('SECURE_AUTH_SALT', '!N>TVDZT|3Lw!86l-R{fuW@}~RLe)4T@gFx|j~V/XibE>gP6M:?CSzBG<!t&6WS9');
define('LOGGED_IN_SALT',   '=oIt0Pc54pe|olJs,eui_unRbT!=+)m+nrFr=O&tU+ -?e`mdST^uDz+fhoW+n!?');
define('NONCE_SALT',       '+(S3J_XQ!Y?vS?fnhk7&s-4ZfC}9JCDQB*AG}a.c*BbZk>?&`Q*G+aX{+vNe{|JR');
/**#@-*/
/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);
/* That's all, stop editing! Happy blogging. */
/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
update_option( 'siteurl', 'http://23.250.19.146/wyhomesearch' );
update_option( 'home', 'http://23.250.19.146/wyhomesearch' );
