<?php
add_action( 'rest_api_init', function () {
    register_rest_route( 'methods', '/search', array(
    'methods' => 'GET',
    'callback' => 'search',
    'permission_callback' => '__return_true'
    ) );
} );

function search(WP_REST_Request $request) : array {
    $result = [];
    $post_types =  ["page","news"];
    $search =$request['search'];
    $args = [
        'post_type' => $post_types,
        'posts_per_page' => -1,
        's'=> $search
    ];
    $query = new WP_Query( $args );
    $args = [
        'post_type' => $post_types,
        'posts_per_page' => -1,
        "meta_query"=>[
            [
                "value"=>$search,
                "compare"=>"LIKE",
            ]
        ]
    ];
    $posts = $query->posts;
    $posts2 =(new WP_Query( $args ))->posts;
    $query = array_merge($posts, $posts2);
    $finded = [];
    $exceptions = ["404"];
    foreach ($query as $key => $post) {
        if (in_array($post->ID,$finded) || in_array($post->post_title, $exceptions)) continue;
        $finded[] = $post->ID;
        if ($post->post_type == "news"){
            $result[] = [
                "title"=>$post->post_title,
                "link"=>"/news/".urldecode($post->post_name),
                // "fields"=>get_fields($post)
            ];
        }else{
            $result[] =[
                "title"=>$post->post_title,
                "link"=>"/".urldecode($post->post_name),
                // "fields"=>get_fields($post)
            ];
        }
    }
    return $result;
}