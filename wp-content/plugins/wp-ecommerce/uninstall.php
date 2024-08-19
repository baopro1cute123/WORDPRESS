<?php
//Định nghĩa hành động khi plugin bị gỡ
// if uninstall.php is not called by WordPress, die

// Xóa CSDL
include_once WP_PATH.'includes/db/migration-rollback.php';
// Xóa option
delete_option('wp_settings_options');