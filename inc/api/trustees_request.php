<?php
add_action( 'rest_api_init', function () {
    register_rest_route( 'methods', '/trustees_request', array(
    'methods' => 'GET',
    'callback' => 'getTrusteesFields',
    'permission_callback' => '__return_true'
    ) );
} );


function getTrusteesFields() {
    $page = get_page_by_path('trustees');

    $fields = get_fields($page->ID);

    return $fields;
}
?>