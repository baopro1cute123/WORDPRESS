<?php
    $objWpOrder = new WpOrder();
    $result = $objWpOrder->paginate(1);

    extract($result);
    
    $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';
    if ($action == 'trash') {
        $orderIds = $_REQUEST['post'];
        if ($orderIds) {
            foreach ($orderIds as $orderId) {
                $objWpOrder->trash($orderId);
            }
        }

        wp_redirect('http://localhost/WebWordPress/wp-admin/admin.php?page=wp_orders');
        exit();
    }

    if ( isset($_GET['order_id']) && $_GET['order_id'] != ''){
        include_once WP_PATH.'includes/admin_pages/orders/edit.php';

    }else{
        include_once WP_PATH.'includes/admin_pages/orders/list.php';

    }
?>


