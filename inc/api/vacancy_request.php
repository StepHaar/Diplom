<?php
add_action( 'rest_api_init', function () {
    register_rest_route( 'methods', '/vacancy_request', array(
    'methods' => 'GET',
    'callback' => 'getVacancyFields',
    'permission_callback' => '__return_true'
    ) );
} );


function getVacancyFields() {
    $page = get_page_by_path('vacancy');

    $fields = get_fields($page->ID);

    return $fields;
}
?>