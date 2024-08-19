<?php

// Đăng ký cấu hình
/*
option_group: wp_settings_page
option_name: wp_settings_options
wp_settings_section_shop_info: Thông tin cửa hàng
wp_settings_field_name: Tên cửa hàng
wp_settings_field_phone: Điện thoại cửa hàng
wp_settings_field_email: Email cửa hàng

wp_settings_section_payment: Thông tin thanh toán
wp_settings_field_bank_name: Tên cửa hàng
wp_settings_field_bank_number: Số tài khoản
wp_settings_field_bank_user: Chủ tài khoản
*/

add_action('admin_init', 'wp_settings_init');

function wp_settings_init() {
    // Đăng ký nhóm tùy chọn và phần của cài đặt
    register_setting('wp_settings_page', 'wp_settings_options');

    add_settings_section(
        'wp_settings_section_shop_info',   // ID của phần
        'Thông tin cửa hàng',               // Tiêu đề của phần
        'wp_settings_section_shop_info_callback', // Hàm callback hiển thị nội dung phần
        'wp_settings_page'                 // Trang cài đặt mà phần này thuộc về
    );

    add_settings_field(
        'wp_settings_field_name',          // ID của trường
        'Tên cửa hàng',                    // Tiêu đề của trường
        'wp_settings_field_render',        // Hàm callback hiển thị trường
        'wp_settings_page',                // Trang cài đặt mà trường này thuộc về
        'wp_settings_section_shop_info',   // Phần của cài đặt mà trường này thuộc về
        [
            'label_for' => 'wp_settings_field_name',
            'type' => 'text',
            'class' => 'form-control'
        ]
    );
    add_settings_field(
        'wp_settings_field_phone',          // ID của trường
        'Số điện thoại',                    // Tiêu đề của trường
        'wp_settings_field_render',        // Hàm callback hiển thị trường
        'wp_settings_page',                // Trang cài đặt mà trường này thuộc về
        'wp_settings_section_shop_info',   // Phần của cài đặt mà trường này thuộc về
        [
            'label_for' => 'wp_settings_field_phone',
            'type' => 'text',
            'class' => 'form-control'
        ]
    );
    add_settings_field(
        'wp_settings_field_email',          // ID của trường
        'Email',                    // Tiêu đề của trường
        'wp_settings_field_render',        // Hàm callback hiển thị trường
        'wp_settings_page',                // Trang cài đặt mà trường này thuộc về
        'wp_settings_section_shop_info',   // Phần của cài đặt mà trường này thuộc về
        [
            'label_for' => 'wp_settings_field_email',
            'type' => 'text',
            'class' => 'form-control'
        ]
    );

    add_settings_section(
        'wp_settings_section_payment',   // ID của phần
        'Thông tin thanh toán',               // Tiêu đề của phần
        'wp_settings_section_payment_callback', // Hàm callback hiển thị nội dung phần
        'wp_settings_page'                 // Trang cài đặt mà phần này thuộc về
    );

    add_settings_field(
        'wp_settings_field_bank_name',          // ID của trường
        'Tên ngân hàng',                    // Tiêu đề của trường
        'wp_settings_field_render',        // Hàm callback hiển thị trường
        'wp_settings_page',                // Trang cài đặt mà trường này thuộc về
        'wp_settings_section_payment',   // Phần của cài đặt mà trường này thuộc về
        [
            'label_for' => 'wp_settings_field_bank_name',
            'type' => 'text',
            'class' => 'form-control'
        ]
    );
    add_settings_field(
        'wp_settings_field_bank_number',          // ID của trường
        'Số tài khoản',                    // Tiêu đề của trường
        'wp_settings_field_render',        // Hàm callback hiển thị trường
        'wp_settings_page',                // Trang cài đặt mà trường này thuộc về
        'wp_settings_section_payment',   // Phần của cài đặt mà trường này thuộc về
        [
            'label_for' => 'wp_settings_field_bank_number',
            'type' => 'text',
            'class' => 'form-control'
        ]
    );
    add_settings_field(
        'wp_settings_field_bank_user',          // ID của trường
        'Tên tài khoản',                    // Tiêu đề của trường
        'wp_settings_field_render',        // Hàm callback hiển thị trường
        'wp_settings_page',                // Trang cài đặt mà trường này thuộc về
        'wp_settings_section_payment',   // Phần của cài đặt mà trường này thuộc về
        [
            'label_for' => 'wp_settings_field_bank_user',
            'type' => 'text',
            'class' => 'form-control'
        ]
    );
}

// Hàm hiển thị trường cấu hình
// Hàm hiển thị trường cấu hình
function wp_settings_field_render($args) {
    $type = isset($args['type']) ? $args['type'] : 'text';

    $options = get_option('wp_settings_options');
    $value = isset($options[$args['label_for']]) ? esc_attr($options[$args['label_for']]) : '';
    $id = esc_attr($args['label_for']);

    switch ($type) {
        case 'text':
            ?>
<input type="text" value="<?= $value ?>" name="wp_settings_options[<?= $id ;?>]" id="<?= $id ?>">
<?php
            break;
        case 'password':
            ?>
<input type="password" value="<?= $value ?>" name="wp_settings_options[<?= $id ;?>]" id="<?= $id ?>">
<?php
            break;
        default:
            // Bạn có thể thêm thông báo lỗi hoặc xử lý loại trường không hợp lệ ở đây
            echo '<p>Loại trường không hợp lệ.</p>';
            break;
    }
}


// Hàm hiển thị nội dung của phần
function wp_settings_section_shop_info_callback() {
    echo '<p>Thông tin về cửa hàng của bạn.</p>';
}

function wp_settings_section_payment_callback() {
    echo '<p>Thông tin về tài khoản ngân hàng.</p>';
}

?>