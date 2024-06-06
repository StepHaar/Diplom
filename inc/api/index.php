<?php
add_filter( 'rest_url_prefix', function() {
    return 'v1';
} );

// require_once get_template_directory() . '/inc/api/wp-admin_helper.php';
require_once get_template_directory() . '/inc/api/news_request.php';
require_once get_template_directory() . '/inc/api/media_request.php';
require_once get_template_directory() . '/inc/api/trustees_request.php';
require_once get_template_directory() . '/inc/api/vacancy_request.php';
require_once get_template_directory() . '/inc/api/index_request.php';
require_once get_template_directory() . '/inc/api/incoming_request.php';
require_once get_template_directory() . '/inc/api/contacts_request.php';
require_once get_template_directory() . '/inc/api/home_request.php';
require_once get_template_directory() . '/inc/api/site_info.php';
require_once get_template_directory() . '/inc/api/documents_request.php';
require_once get_template_directory() . '/inc/api/order.php';
require_once get_template_directory() . '/inc/api/training_request.php';
require_once get_template_directory() . '/inc/api/about_request.php';
require_once get_template_directory() . '/inc/api/intelligence_request.php';
require_once get_template_directory() . '/inc/api/graduates_request.php';
require_once get_template_directory() . '/inc/api/employees_request.php';
require_once get_template_directory() . '/inc/api/privacy_request.php';
require_once get_template_directory() . '/inc/api/students_request.php';
require_once get_template_directory() . '/inc/api/partners_cards.php';
require_once get_template_directory() . '/inc/api/404_request.php';
require_once get_template_directory() . '/inc/api/memo_cards.php';
require_once get_template_directory() . '/inc/api/search.php';


