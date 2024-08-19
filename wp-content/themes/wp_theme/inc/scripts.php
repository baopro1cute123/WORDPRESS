<?php
//Dang ky style cho theme

add_action('wp_enqueue_scripts', 'wp_theme_register_styles');

function wp_theme_register_styles() {
    global $theme_prefix, $theme_uri, $theme_version;
    
    // Enqueue the main theme stylesheet
    wp_enqueue_style($theme_prefix.'-style', $theme_uri , [], $theme_version, 'all');
    
    // Enqueue Google Font
    wp_enqueue_style($theme_prefix.'-google-font', 'https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap');
    
    // Enqueue additional stylesheets
    wp_enqueue_style($theme_prefix.'-bootstrap', $theme_uri . '/css/bootstrap.min.css');
    wp_enqueue_style($theme_prefix.'-font-awesome-css', $theme_uri . '/css/font-awesome.min.css');
    wp_enqueue_style($theme_prefix.'-elegant-icons-css', $theme_uri . '/css/elegant-icons.css');
    wp_enqueue_style($theme_prefix.'-nice-select-css', $theme_uri . '/css/nice-select.css');
    wp_enqueue_style($theme_prefix.'-jquery-ui-css', $theme_uri . '/css/jquery-ui.min.css');
    wp_enqueue_style($theme_prefix.'-owl-carousel-css', $theme_uri . '/css/owl.carousel.min.css');
    wp_enqueue_style($theme_prefix.'-slicknav-css', $theme_uri . '/css/slicknav.min.css');
    wp_enqueue_style($theme_prefix.'-style-css', $theme_uri . '/css/style.css');
    wp_enqueue_style($theme_prefix.'-custom-css',$theme_uri.'/css/custom.css');


}

//Dang ky js cho theme
add_action('wp_enqueue_scripts','wp_theme_register_scripts');

function wp_theme_register_scripts() {
    global $theme_prefix, $theme_uri, $theme_version;

    // Enqueue jQuery
    wp_enqueue_script($theme_prefix.'-jquery', $theme_uri.'/js/jquery-3.3.1.min.js', [], $theme_version, true);

    // Enqueue additional scripts
    wp_enqueue_script($theme_prefix.'-bootstrap-js', $theme_uri.'/js/bootstrap.min.js', ['jquery'], $theme_version, true);
    wp_enqueue_script($theme_prefix.'-nice-select-js', $theme_uri.'/js/jquery.nice-select.min.js', ['jquery'], $theme_version, true);
    wp_enqueue_script($theme_prefix.'-jquery-ui-js', $theme_uri.'/js/jquery-ui.min.js', ['jquery'], $theme_version, true);
    wp_enqueue_script($theme_prefix.'-slicknav-js', $theme_uri.'/js/jquery.slicknav.js', ['jquery'], $theme_version, true);
    wp_enqueue_script($theme_prefix.'-mixitup-js', $theme_uri.'/js/mixitup.min.js', ['jquery'], $theme_version, true);
    wp_enqueue_script($theme_prefix.'-owl-carousel-js', $theme_uri.'/js/owl.carousel.min.js', ['jquery'], $theme_version, true);
    wp_enqueue_script($theme_prefix.'-main-js', $theme_uri.'/js/main.js', ['jquery'], $theme_version, true);
    wp_enqueue_script($theme_prefix.'-custom-js', $theme_uri.'/custom.js', ['jquery'], $theme_version, true);

}

?>