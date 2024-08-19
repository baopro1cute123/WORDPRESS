<?php
    if (!function_exists('dd')){
        function dd($data){
            echo '<pre>';
            print_r($data);
            echo '</pre>'; // Sửa lại thẻ đóng <pre> cho đúng
            die();
        }
    }
    
    if (!function_exists('pr')){
        function pr($data){ // Sửa tên hàm từ dd thành pr
            echo '<pre>';
            print_r($data);
            echo '</pre>'; // Sửa lại thẻ đóng <pre> cho đúng
        }
    }

    if (!function_exists('wp_redirect')){
        function wp_redirect($url){ // Sửa tên hàm từ dd thành pr
           echo ("<script>location.href = '".$url."'</script>");
        }
    }
?>