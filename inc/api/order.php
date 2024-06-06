<?php

function createOrder( WP_REST_Request $request ) {
    
    include_once ABSPATH . 'wp-admin/includes/media.php';

    include_once ABSPATH . 'wp-admin/includes/file.php';

    include_once ABSPATH . 'wp-admin/includes/image.php';

    header('Access-Control-Allow-Origin: *');

    try {
               
        $params = $request->get_params();

        if (empty($params['phone']) || empty($params['name'])) {
            return json_encode([
                'success' => false,
                'message' => 'Не заполнены обязательные данные.'
            ]);
        }

        $fields = [];

        foreach ($params as $key => $item) {
            $fields[$key] = $item;  
        }
            
        $data = [
            'success' => true
        ];
        $title = '';

        $title = 'Заявка от ' . wp_date('j F Y');

        $request_data = array(
            'post_title'    => $title,
            'post_type'     => 'request',
            'post_status'   => 'pending',
        );
        
        $request_id = wp_insert_post( $request_data );
    
        if ( is_wp_error($request_id) ){
            $data['success'] = false;
        }
            
        foreach ($fields as $key => $field) {
            update_field($key, $field, $request_id);
        }
        
        $frame_fields = get_field_objects($request_id);

        $labels = [];

        foreach ($frame_fields as $field) {
            $labels[$field['name']] = $field['label'];
        }
        
        $result = [
            'success'  => true,
        ];
        
        $txt = '<b>' . $title . '</b>' . "\n";
        foreach ($fields as $key => $field) {
            $name = 'undefined';
            foreach ($labels as $label_name => $label) {
                if ($key == $label_name) {
                    $name = $label;
                }
            }
            $txt .= '<b>' . $name . ': </b>' . $field . "\n";
        }
    
        // $botToken = get_field('tg_bot_token', 'options');
        // $idGroup = get_field('tg_group_id', 'options');
    
        // $url = "https://api.telegram.org/bot" . $botToken . "/sendMessage?chat_id=" . $idGroup . "&parse_mode=HTML";
        // $url = $url . "&text=" . urlencode($txt);
        // $ch = curl_init();
        // $optArray = array(
        //         CURLOPT_URL => $url,
        //         CURLOPT_RETURNTRANSFER => true
        // );
        // curl_setopt_array($ch, $optArray);
        // $messageResult = curl_exec($ch);
        // curl_close($ch);
      
        // if (is_uploaded_file($_FILES['file']['tmp_name'])) {
        //     $attachment_id = media_handle_upload('file', $request_id); 
        //     if ( is_wp_error( $attachment_id ) ) {
        //         $result = [
        //             'success'  => false,
        //             'message' => $attachment_id->get_error_message(),
        //         ];
        //     } 

        //     update_field('file', $attachment_id, $request_id);
    
        //     $arrayQuery = array(
        //         'chat_id' => $idGroup,
        //         'caption' => 'Приложение',
        //         'document' => curl_file_create(wp_get_attachment_url($attachment_id))
        //     );	
        //     $ch = curl_init('https://api.telegram.org/bot'. $botToken .'/sendDocument');
        //     curl_setopt($ch, CURLOPT_POST, 1);
        //     curl_setopt($ch, CURLOPT_POSTFIELDS, $arrayQuery);
        //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //     curl_setopt($ch, CURLOPT_HEADER, false);
        //     $res = curl_exec($ch);
        //     curl_close($ch);
            
        // } 
    } 
    catch (Exception $e) {
        $result = [
            'success'  => false,
            'message' => $e->getMessage(),
        ];
    }

    $result['params'] = $params;
    return $result;
}

add_action( 'rest_api_init', function () {
        register_rest_route( 'methods', '/createOrder', array(
        'methods' => 'POST',
        'callback' => 'createOrder',
        'permission_callback' => '__return_true'
    ) );
} );


?>