<?php
add_action( 'rest_api_init', function () {
    register_rest_route( 'methods', '/index_request', array(
    'methods' => 'GET',
    'callback' => 'getIndexFields',
    'permission_callback' => '__return_true'
    ) );
} );


function getIndexFields() {
    $page = get_page_by_path('home');

    $fields = get_fields($page->ID);

    return $fields;
}
?>