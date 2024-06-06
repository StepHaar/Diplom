<?php
add_action( 'rest_api_init', function () {
    register_rest_route( 'methods', '/privacy_request', array(
    'methods' => 'GET',
    'callback' => 'getPrivacyFields',
    'permission_callback' => '__return_true'
    ) );
} );


function getPrivacyFields() {
    $page = get_page_by_path('privacy-policy');

    $result = array('title' => $page -> post_title, 'content' => $page -> post_content);

    return $result;
}
?>