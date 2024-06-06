<?php
add_action( 'rest_api_init', function () {
    register_rest_route( 'methods', '/graduates_request', array(
    'methods' => 'GET',
    'callback' => 'getGraduatesFields',
    'permission_callback' => '__return_true'
    ) );
} );


function getGraduatesFields() {
    $page = get_page_by_path('graduates');

    $fields = get_fields($page->ID);

    return $fields;
}
?>