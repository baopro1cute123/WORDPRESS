<?php

add_action('rest_api_init','wp_apis');

function wp_apis (){
    
    $namespace = 'wp/v1';
    $base = 'orders';

    register_rest_route($namespace, '/'.$base,[
        [
            'methods' => WP_REST_Server::READABLE,//GET
            'callback'=> 'wp_apis_order_all'
        ],
        [
            'methods' => WP_REST_Server::CREATABLE,//POST
            'callback'=> 'wp_apis_order_store'
        ],
    ]);
    register_rest_route($namespace, '/'.$base.'/(?P<id>[\d]+)',[
        [
            'methods' => WP_REST_Server::READABLE,//GET
            'callback'=> 'wp_apis_order_show'
        ],
        [
            'methods' => WP_REST_Server::EDITABLE,//PUT
            'callback'=> 'wp_apis_order_update'
        ],
        [
            'methods' => WP_REST_Server::DELETABLE,//DELETE
            'callback'=> 'wp_apis_order_destroy'
        ]
    ]);

    register_rest_route($namespace, '/'.$base.'/(?P<id>[\d]+)/order_items',[
            'methods' => WP_REST_Server::READABLE,//GET
            'callback'=> 'wp_apis_order_order_items'
    ]);

}

function wp_apis_order_all ($request){
    $objWpOrder = new WpOrder();
    $result = $objWpOrder->paginate();
    $data = [
        'success' => true,
        'data' => $result
    ];
    return new WP_REST_Response($data, 200);
    
}
function wp_apis_order_store ($request){
    $objWpOrder = new WpOrder();
    $saved = $objWpOrder->save($_POST);

    $data = [
        'success' => true,
        'data' => $saved
    ];
    return new WP_REST_Response($data, 200);

}
function wp_apis_order_show ($request){
    $id = $request['id'];
    $objWpOrder = new WpOrder();
    $item = $objWpOrder->find($id);
    $data = [
        'success' => true,
        'data' => $item
    ];
    return new WP_REST_Response($data, 200);

}
function wp_apis_order_update ($request){
    $id = $request['id'];
    $objWpOrder = new WpOrder();
    $saved = $objWpOrder->update($id, $_POST);
    
    $data = [
        'success' => true,
        'data' => $saved
    ];
    return new WP_REST_Response($data, 200);


   
}
function wp_apis_order_destroy ($request){
    $id = $request['id'];
    $objWpOrder = new WpOrder();

    $saved = $objWpOrder->destroy($id, $_POST);
    
    $data = [
        'success' => true,
    ];
    return new WP_REST_Response($data, 200);
}

function wp_apis_order_order_items ($request) {
    $id = $request['id'];
    $data = [
        'success' => true,
        'message'=> 'Ban da lay ket qua thanh cong cua order id '.$id.' '
    ];
    return new WP_REST_Response($data, 200);
}

?>