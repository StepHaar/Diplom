<?php
add_action( 'rest_api_init', function () {
    register_rest_route( 'methods', '/news_request', array(
    'methods' => 'GET',
    'callback' => 'getNewsFields',
    'permission_callback' => '__return_true'
    ) );
} );


function getNewsFields(WP_REST_Request $request) {
    $params = $request->get_params();
    $page = get_page_by_path('news');
    $args_news = $params['news'] ?? 6;
    $args_page = $params['page'] ?? 1;
    $args = [
        'post_type' => 'news',
        'posts_per_page' => $params['news'] ?? 6,
        'numberposts' => $args_news,
        'paged' => $args_page
    ];

    $query = new WP_Query($args);

    $news = [];
    foreach ($query->posts as $post) {
        $news[] = [
            'title' => $post->post_title,
            'content' => $post->post_content,
            'slug' => $post->post_name,
            'fields' => get_fields($post)
        ];
    }

    $fields = get_fields($page->ID);

    return array(
        'fields' => $fields,
        'news' => $news,
        'count_pages' => ceil($query->found_posts / $args_news),
        'count_items' => $query->found_posts,
        'count_on_page' => count($query->posts),
    );
}

add_action( 'rest_api_init', function () {
    register_rest_route( 'methods', '/news/(?P<id>.+\S)', array(
        'methods' => 'GET',
        'callback' => 'getNewsArticle',
        'permission_callback' => '__return_true',
    ) );
} );

function getNewsArticle(WP_REST_Request $request ) {
    $slug = $request->get_param('id');

    $page = get_page_by_path( $slug , OBJECT, 'news' );

    if (!$page) {
        return new WP_Error( 'Invalid article', 'Запись не найдена', array( 'status' => 404 ) );
    }

    $id = $page->ID;

    return [
        'title'   => $page->post_title,
        'slug'   => urldecode($page->post_name),
        'content' => $page->post_content,
        'fields'  => get_fields($id),
    ];
}
?>