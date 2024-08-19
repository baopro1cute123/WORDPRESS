<?php
//Đăng ký post_types và taxonnomy
include_once WP_PATH.'includes/post_types.php';
//Đăng ký metaboxes

include_once WP_PATH.'includes/metaboxes.php';

// Thêm các cột vào custom postype và custom taxonmany
include_once WP_PATH.'includes/admin_columns.php';

// Tạo menu cho admin

include_once WP_PATH.'includes/admin_menus.php';

//Lam viec với CSDL trong Wp

include_once WP_PATH.'includes/classes/WpOrder.php';

//ham khai bao
include_once WP_PATH.'includes//fuctions.php';

//Su dung Ajax trong php

include_once WP_PATH.'includes/admin_ajaxs.php';

//tao trang admin settings

include_once WP_PATH.'includes/admin_settings.php';

//tao apis 

include_once WP_PATH.'includes/apis.php';


?>