<?php
global $theme_dir;
include_once $theme_dir.'/inc/widgets/WP_Recent_News.php';
include_once $theme_dir.'/inc/widgets/WP_Tags.php';

add_action('widgets_init','wp_register_widgets');
//Đăng ký trong giao diện / widgets(tiện ích)
function wp_register_widgets (){
    
    register_sidebar(
		array(
			'id'            => 'primary',
			'name'          => __( 'Primary Sidebar','wp_theme' ),
			'description'   => __( 'A short description of the sidebar.','wp_theme' ),
			'before_widget' => '<div id="%1$s" class="blog__sidebar__item %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);

    register_widget('WP_Recent_News');
    register_widget('WP_Tags');

}

?>