<?php
add_action( 'rest_api_init', function () {
    register_rest_route( 'methods', '/documents_request', array(
    'methods' => 'GET',
    'callback' => 'getDocumentsFields',
    'permission_callback' => '__return_true'
    ) );
} );


function getDocumentsFields() {
    $page = get_page_by_path('documents');

    $fields = get_fields($page->ID);

    return $fields;
}

?>