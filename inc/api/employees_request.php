<?php
add_action( 'rest_api_init', function () {
    register_rest_route( 'methods', '/employees_request', array(
    'methods' => 'GET',
    'callback' => 'getEmployeesFields',
    'permission_callback' => '__return_true'
    ) );
} );


function getEmployeesFields() {
    $page = get_page_by_path('employees');

    $fields_page = get_fields($page->ID);

    $fields_opt['request'] = get_fields('options');

    $fields_all = array_merge($fields_page, $fields_opt);

    return $fields_all;
}
?>