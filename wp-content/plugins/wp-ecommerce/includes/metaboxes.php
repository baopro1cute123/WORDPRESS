<?php

// Product Screen: Màn hình chỉnh sửa/ thêm mới sản phẩm

// Đăng ký metabox cho sản phẩm
add_action('add_meta_boxes', 'wp_meta_box_product');
// Can thiệp vào hành động lưu bài viết
add_action('save_post', 'wp_save_pos_product');

function wp_save_pos_product($post_id) {
    // Kiểm tra xem có phải là tự động lưu không
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Kiểm tra quyền của người dùng
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Kiểm tra kiểu bài viết
    if (isset($_REQUEST['post_type']) && $_REQUEST['post_type'] == 'product') {
        // Cập nhật các trường meta cho sản phẩm
        if (isset($_REQUEST['product_price'])) {
            $product_price = sanitize_text_field($_REQUEST['product_price']);
            update_post_meta($post_id, 'product_price', $product_price);
        }
        if (isset($_REQUEST['product_price_sale'])) {
            $product_price_sale = sanitize_text_field($_REQUEST['product_price_sale']);
            update_post_meta($post_id, 'product_price_sale', $product_price_sale);
        }
        if (isset($_REQUEST['product_stock'])) {
            $product_stock = sanitize_text_field($_REQUEST['product_stock']);
            update_post_meta($post_id, 'product_stock', $product_stock);
        }
    }
}

function wp_meta_box_product() {
    add_meta_box(
        'wp_product_info',                // Unique ID
        'Thông tin sản phẩm',             // Box title
        'meta_box_product_html',          // Content callback, must be of type callable
        'product'                         // Post type
    );
}

function meta_box_product_html() {
    include_once WP_PATH . 'includes/template/meta_box_product.php';
}

// Category

// Thêm trường cho taxonomy
// Form lúc thêm mới
add_action('product_cat_add_form_fields', 'wp_meta_boxe_product_cat_add');

function wp_meta_boxe_product_cat_add() {
    include_once WP_PATH . 'includes/template/wp_meta_boxe_product_cat_add.php';
}
// Form lúc chỉnh sửa
add_action('product_cat_edit_form_fields', 'wp_meta_boxe_product_cat_edit', 10, 2);
function wp_meta_boxe_product_cat_edit($tag, $taxonomy) {
    include_once WP_PATH . 'includes/template/wp_meta_boxe_product_cat_edit.php';
}

// Xử lý khi lưu term
add_action('create_product_cat', 'wp_meta_boxe_product_cat_save', 10, 1);
add_action('edit_product_cat', 'wp_meta_boxe_product_cat_save', 10, 1);

function wp_meta_boxe_product_cat_save($term_id) {
    if (isset($_POST['image'])) {
        $image = sanitize_text_field($_POST['image']);
        update_term_meta($term_id, 'image', $image);
    }
}

?>