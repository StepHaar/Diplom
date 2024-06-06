<?php
add_action( 'rest_api_init', function () {
    register_rest_route( 'methods', '/students_request', array(
    'methods' => 'GET',
    'callback' => 'getStudentsFields',
    'permission_callback' => '__return_true'
    ) );
} );


function getStudentsFields() {
    $page = get_page_by_path('students');

    $fields = get_fields($page->ID);

    $schedule = $fields['schedule'];
    
    foreach ($schedule['card'] as $key=>$card) {
        $card = array(
            'day' => $card['day'],
            'date' => strtotime($card['date']),
            'event' => $card['event'],
        );

        $schedule['card'][$key] = $card;
     }

    $fields['schedule'] = $schedule;

    // return $fields;



    // с платформы 
    // $curl_token = curl_init();

    // curl_setopt_array($curl_token, array(
    // CURLOPT_URL => 'http://45.80.69.32:1337/api/auth/local',
    // CURLOPT_RETURNTRANSFER => true,
    // CURLOPT_ENCODING => '',
    // CURLOPT_MAXREDIRS => 10,
    // CURLOPT_TIMEOUT => 0,
    // CURLOPT_FOLLOWLOCATION => true,
    // CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    // CURLOPT_CUSTOMREQUEST => 'POST',
    // CURLOPT_POSTFIELDS => array('identifier' => 'penev1y@yandex.ru','password' => 'MQX-jgN-eV5-B5Q'),
    // ));

    // $response_token = curl_exec($curl_token);

    // curl_close($curl_token);
    // $token = json_decode($response_token)->jwt;

    // $curl = curl_init();

    // curl_setopt_array($curl, array(
    // CURLOPT_URL => 'http://45.80.69.32:1337/api/schedule_apparel',
    // CURLOPT_RETURNTRANSFER => true,
    // CURLOPT_ENCODING => '',
    // CURLOPT_MAXREDIRS => 10,
    // CURLOPT_TIMEOUT => 0,
    // CURLOPT_FOLLOWLOCATION => true,
    // CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    // CURLOPT_CUSTOMREQUEST => 'GET',
    // CURLOPT_HTTPHEADER => array(
    //     'Authorization: Bearer ' . $token
    // ),
    // ));

    // $response = curl_exec($curl);

    // curl_close($curl);
    // // return $response;

    // $response = json_decode($response);
    // $fields['platform'] = $response;
    return $fields;
}


add_action( 'rest_api_init', function () {
    register_rest_route( 'methods', '/getScheduleFromPlatform', array(
    'methods' => 'GET',
    'callback' => 'getScheduleFromPlatform',
    'permission_callback' => '__return_true'
    ) );
} );

function getScheduleFromPlatform() {
    $curl_token = curl_init();

    curl_setopt_array($curl_token, array(
    CURLOPT_URL => 'http://45.80.69.32:1337/api/auth/local',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array('identifier' => 'penev1y@yandex.ru','password' => 'MQX-jgN-eV5-B5Q'),
    ));

    $response_token = curl_exec($curl_token);

    curl_close($curl_token);
    $token = json_decode($response_token)->jwt;

    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://45.80.69.32:1337/api/schedule_apparel',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $token
    ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;

    // $response = json_decode($response);
    // echo json_encode($response);
    // wp_die();   

}

?>