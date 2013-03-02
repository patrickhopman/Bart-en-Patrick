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

if ( ! defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');


if ( file_exists( dirname( __FILE__ ) . '/p-dtap.config.php' ) ) {
	require_once( dirname( __FILE__ ) . '/p-dtap.config.php' );
	define( 'IS_PRODUCTION', true ); 
} elseif ( file_exists( dirname( __FILE__ ) . '/a-dtap.config.php' ) ) {
	require_once( dirname( __FILE__ ) . '/a-dtap.config.php' );
	define( 'IS_ACCEPTANCE', true );
} elseif ( file_exists( dirname( __FILE__ ) . '/t-dtap.config.php' ) ) {
	require_once( dirname( __FILE__ ) . '/t-dtap.config.php' );
	define( 'IS_TEST', true );
} elseif ( file_exists( dirname( __FILE__ ) . '/d-dtap.config.php' ) ) {
	require_once( dirname( __FILE__ ) . '/d-dtap.config.php' );
	define( 'IS_DEVELOP', true );
} else {
	exit( 'No config file found, please fix this.' );
}



/**
 * Specific Production settings
 */
if ( defined( 'IS_PRODUCTION' ) ) {
	define( 'WP_DEBUG',              false );
	define( 'WP_DEBUG_LOG',          false );
	define( 'WP_DEBUG_DISPLAY',      false );
	@ini_set( 'display_errors',      0 );
}

/**
 * Specific Acceptance settings
 */
if ( defined( 'IS_ACCEPTANCE' ) ) {
	define( 'WP_DEBUG',              true );
	define( 'WP_DEBUG_LOG',          true );
	define( 'WP_DEBUG_DISPLAY',      false );
	@ini_set( 'log_errors',          true );
	@ini_set( 'display_errors',      false );
	@ini_set( 'error_reporting',     E_ERROR );
	@ini_set( 'error_log',           ABSPATH . 'wp-content/debug.log');
}

/**
 * Specific Test settings
 */
if ( defined( 'IS_TEST' ) ) {
	define( 'WP_DEBUG',              true );
	define( 'WP_DEBUG_LOG',          true );
	define( 'WP_DEBUG_DISPLAY',      true );
	@ini_set( 'log_errors',          false );
	@ini_set( 'display_errors',      true );
	@ini_set( 'error_log',           ABSPATH . 'wp-content/debug.log');
}

/**
 * Specific developers local settings
 */
if ( defined( 'IS_DEVELOP' ) ) {
	define( 'WP_LOCAL_DEV',          true );
	define( 'WP_DEBUG',              true );
	define( 'WP_DEBUG_LOG',          false );
	define( 'WP_DEBUG_DISPLAY',      true );
	define( 'DISALLOW_FILE_MODS',    false );
}



/**
 * All environments must have WP_CACHE enabled when advanced-cache file excists
 */
if ( file_exists( dirname( __FILE__ ) . '/wp-content/advanced-cache.php' ) ) {
	define( 'WP_CACHE', true );
}

/**
 * Increase default Memory limit
 */
define( 'WP_MEMORY_LIMIT','64M' );


/**
 * Don't update wp-content folder on WordPress update
 */
define( 'CORE_UPGRADE_SKIP_NEW_BUNDLED', true );


/** 
 * Change default theme 
 */
define( 'WP_DEFAULT_THEME', 'Bart en Patrick' );

/**
 * How many Revisions should WordPress keep
 *
 * Default value is "true -1", so it saves all revisions
 * we don't like this, so change the value to max 10
 */
define( 'WP_POST_REVISIONS', 20 );

/**
 * Disable Plugin and Theme Update and Installation
 */
if( ! defined( 'DISALLOW_FILE_MODS' ) ) 
  define( 'DISALLOW_FILE_MODS', true );

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
define('AUTH_KEY',         ':|$1L^sHfxCd2nu:PY_SfCBOtM!A<MhB;T|<b]cuH=)R97U+=T/14@mSJ?jHTv2p');
define('SECURE_AUTH_KEY',  'zIh*Mxw9WF@X%jqo Jdb6t>,50];u):n`)WR4)0@Bc(ou6~*XxUS_-[y61gC=;}J');
define('LOGGED_IN_KEY',    '%)[Q3708x*9,I^;,)-{<m.BfDz7]-bwK4nguyoyYPB%MMCP2oEL:`M#ZnI=^ci6@');
define('NONCE_KEY',        ']zckr*@-uYu/{RGZGq?|=*Ptn-S@d(seG*oa^[cPdugRY3b|xKG.GEO7gGXm-IR$');
define('AUTH_SALT',        'Wj%p%6~*? vW! v$-2D=n)O4L^>0##i3d`em7j+qG|+D 8esFc]h.R3pUE/SiO*0');
define('SECURE_AUTH_SALT', 'T,cZ.+dOYIgX _8|[;3#1?qaRoFna|-%F,9}t3h,(O# Ex7g=:d+G)3eR!Uzi}8<');
define('LOGGED_IN_SALT',   'v,9+PhmZlz{KD$k?(jO(@ 9Sk69BD8Jqp)ui<vnNRT*.0J.!N7S6vpXJ>mM;|:ix');
define('NONCE_SALT',       '05sD[SZy^:4C$yv{L:^pd 3X/-Z,U]n2&zX sIo+=;)*s|%-!<w2JDc%eO8$OH.|');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
if ( ! WP_LOCAL_DEV ) {
	define( 'WP_DEBUG', false );
}

if ( ! WP_CACHE ) {
	define( 'WP_CACHE', true );
}


/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
