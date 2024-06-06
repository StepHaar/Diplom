<?php
add_action( 'rest_api_init', function () {
    register_rest_route( 'methods', '/404_request', array(
    'methods' => 'GET',
    'callback' => 'getErrorFields',
    'permission_callback' => '__return_true'
    ) );
} );


function getErrorFields() {
    $page = get_page_by_path('error');

    $fields = get_fields($page->ID);

    return $fields;
}
?>