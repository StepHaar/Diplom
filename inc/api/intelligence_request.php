<?php
add_action( 'rest_api_init', function () {
    register_rest_route( 'methods', '/intelligence_request', array(
    'methods' => 'GET',
    'callback' => 'getIntelligenceFields',
    'permission_callback' => '__return_true'
    ) );
} );


function getIntelligenceFields() {
    $page = get_page_by_path('intelligence');

    $fields = get_fields($page->ID);

    return $fields;
}

?>