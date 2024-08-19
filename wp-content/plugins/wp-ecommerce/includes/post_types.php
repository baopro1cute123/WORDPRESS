<?php

// Đăng ký loại bài viết sản phẩm

add_action('init','wp_custom_post_type');

function wp_custom_post_type(){
    //post: Bài viết
    //page: Trang
    //product: sản phẩm
    //http://localhost/WebWordPress/products/ip-12
    //tóm tắt
    register_post_type('product',
		array(
			'labels'      => array(
				'name'          => __('Các sản phẩm', 'wp-ecommerce'),
				'singular_name' => __('Sản phẩm', 'wp-ecommerce'),
			),
				'public'      => true,
				'has_archive' => true,
                'rewrite' => array('slug' => 'products'),
                'supports'=> array('title','editor','thumbnail', 'excerpt'),
		)
	);
}

// Đăng ký loại taxonomy
add_action( 'init', 'wp_register_taxonomy_product' );

function wp_register_taxonomy_product(){
    $labels = array(
        'name'              => _x( 'Danh mục', 'taxonomy general name' ),
        'singular_name'     => _x( 'Danh mục', 'taxonomy singular name' ),
        'search_items'      => __( 'Tìm kiếm danh mục' ),
        'all_items'         => __( 'Tất cả danh mục' ),
        'parent_item'       => __( 'Parent danh mục' ),
        'parent_item_colon' => __( 'Parent danh mục:' ),
        'edit_item'         => __( 'Sửa Danh mục' ),
        'update_item'       => __( 'Cập nhật Danh mục' ),
        'add_new_item'      => __( 'Thêm mới danh mục' ),
        'new_item_name'     => __( 'Tên danh mục mới' ),
        'menu_name'         => __( 'Danh mục' ),
    );
    $args   = array(
        'hierarchical'      => true, // make it hierarchical (like categories)
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => [ 'slug' => 'course' ],
    );
    register_taxonomy( 'product_cat', [ 'product' ], $args );
}


?>