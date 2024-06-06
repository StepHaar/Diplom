<?php
add_action( 'rest_api_init', function () {
    register_rest_route( 'methods', '/about_request', array(
    'methods' => 'GET',
    'callback' => 'getAboutFields',
    'permission_callback' => '__return_true'
    ) );
} );


function getAboutFields() {
    $page = get_page_by_path('about-company');

    $fields = get_fields($page->ID);

    return $fields;
}
?>