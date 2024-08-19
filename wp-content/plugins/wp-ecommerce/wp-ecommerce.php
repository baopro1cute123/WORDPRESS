<?php

//Buoc dau tien de tao ra plugin
/*
* Plugin Name: WordPress - E-commerce
* Plugin URI: #
* Description: Lập trình Plugin
* Version: 1.0.0
* Requires at least: 5.2
* Requires PHP: 7.2
* Author: Nguyen Duong Gia Bao
* Author URI: #
* License: GPL v2 or later
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
* Update URI: #
* Text Domain: wp-ecommerce
* Domain Path: /languages
*/

// Định nghĩa các hàm số của plugin

define('WP_PATH', plugin_dir_path(__FILE__));
define('WP_URI', plugin_dir_url(__FILE__));

// Tải file ngôn ngữ
add_action( 'init', 'wp_load_textdomain' );
function wp_load_textdomain(){
    load_plugin_textdomain( 'wp-ecommerce', false, WP_PATH . '/languages' ); 
}
function wp_load_textdomain_mofile( $mofile, $domain ) {
	if ( 'wp-ecommerce' === $domain && false !== strpos( $mofile, WP_LANG_DIR . '/plugins/' ) ) {
		$locale = apply_filters( 'plugin_locale', determine_locale(), $domain );
		$mofile = WP_PATH . '/languages/' . $domain . '-' . $locale . '.mo';
	}
	return $mofile;
}
add_filter( 'load_textdomain_mofile', 'wp_load_textdomain_mofile', 10, 2 );


// Định nghĩa hành động khi plugin được kích hoạt
register_activation_hook(
    __FILE__,
    'wp_ecommerce_activation'
);

function wp_ecommerce_activation(){
    // Tạo cơ sở dữ liệu
    include_once WP_PATH.'includes/db/migration.php';

    // Tạo dữ liệu mẫu
    include_once WP_PATH.'includes/db/seeder.php';

    // Tạo options
    update_option('wp_settings_options',[]);
}

// Định nghĩa hành động khi plugin được tắt
register_deactivation_hook(
    __FILE__,
    'wp_ecommerce_deactivation'
);

function wp_ecommerce_deactivation(){
    // // Xóa cơ sở dữ liệu
    // include_once WP_PATH.'includes/db/migration-rollback.php';

    // // Xóa options
    // delete_option('wp_settings_options');

    include_once WP_PATH.'uninstall.php';

}

include_once WP_PATH.'includes/includes.php';

?>