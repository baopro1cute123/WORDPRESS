<?php

//Dang ky cac thanh phan ho tro cho theme

add_action('after_setup_theme', 'wp_theme_support');

function wp_theme_support() {
// Đăng ký menu
register_nav_menus([
'primary' => 'Primary Menu',
'vertical' => 'Vertical Menu',
'mobile' => 'Mobile Menu'
]);

// Đăng ký hình ảnh trong phan them moi bai viet

add_theme_support('post-thumbnails');
add_theme_support('post-formats');

}

?>