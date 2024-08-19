<?php

global $theme_prefix, $theme_uri, $theme_version;

$theme_prefix = 'wp_theme' ;
$theme_uri = get_template_directory_uri().'/assets';
$theme_dir = get_template_directory();

$theme_version = '1.0' ;

//Dang ky scripts va css
include_once $theme_dir.'/inc/scripts.php';

//Dang ky thanh phan ho tro cho theme menu. post_thumbnail...

include_once $theme_dir.'/inc/theme_support.php';

//Dang ky side bar, widgets

include_once $theme_dir.'/inc/widgets.php';





?>