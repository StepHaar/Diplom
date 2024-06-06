<?php
add_action( 'rest_api_init', function () {
    register_rest_route( 'methods', '/contacts_request', array(
    'methods' => 'GET',
    'callback' => 'getContactsFields',
    'permission_callback' => '__return_true'
    ) );
} );


function getContactsFields() {
    $page = get_page_by_path('contacts');

    $fields_page = get_fields($page->ID);

    $fields_opt['request'] = get_fields('options');

    $fields_all = array_merge($fields_page, $fields_opt);

    return $fields_all;
}
?>