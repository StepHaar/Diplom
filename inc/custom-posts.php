<?php
add_action( 'init', 'register_post_types' );
function register_post_types(){
    //Заявки
    register_post_type( 'request', [
        'label'  => null,
        'labels' => [
            'name'               => 'Заявки', // основное название для типа записи
            'singular_name'      => 'Заявка', // название для одной записи этого типа
            'add_new'            => 'Создать заявку', // для добавления новой записи
            'add_new_item'       => 'Создание заявки', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование заявки', // для редактирования типа записи
            'new_item'           => 'Заявка', // текст новой записи
            'view_item'          => 'Смотреть заявку', // для просмотра записи этого типа.
            'search_items'       => 'Искать заявку', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Заявки', // название меню
        ],
        'description'         => '',
        'public'              => true,
        'show_in_menu'        => true, // показывать ли в меню адмнки
        'publicly_queryable'  => false,
        'exclude_from_search' => true,
        // 'show_in_admin_bar'   => null, // зависит от show_in_menu
        'show_in_rest'        => null, // добавить в REST API. C WP 4.7
        'rest_base'           => null, // $post_type. C WP 4.7
        'menu_position'       => 30,
        'menu_icon'           => 'dashicons-bell',
        'hierarchical'        => false,
        'supports'            => [ 'title', 'custom-fields' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => ['request_category'],
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => true,
    ] );
    //Новости
    register_post_type( 'news', [
        'label'  => null,
        'labels' => [
            'name'               => 'Новости', // основное название для типа записи
            'singular_name'      => 'Новость', // название для одной записи этого типа
            'add_new'            => 'Создать новость', // для добавления новой записи
            'add_new_item'       => 'Создание новости', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование новости', // для редактирования типа записи
            'new_item'           => 'Новость', // текст новой записи
            'view_item'          => 'Смотреть новость', // для просмотра записи этого типа.
            'search_items'       => 'Искать новость', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Новости', // название меню
        ],
        'description'         => '',
        'public'              => true,
        'show_in_menu'        => true, // показывать ли в меню адмнки
        'publicly_queryable'  => true,
        'exclude_from_search' => true,
        // 'show_in_admin_bar'   => null, // зависит от show_in_menu
        'show_in_rest'        => true, // добавить в REST API. C WP 4.7
        'rest_base'           => null, // $post_type. C WP 4.7
        'menu_position'       => 31,
        'menu_icon'           => 'dashicons-edit-page',
        'hierarchical'        => false,
        'supports'            => [ 'title', 'editor', 'custom-fields'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => [],
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => true,
    ] );
    //СМИ
    register_post_type( 'smi', [
        'label'  => null,
        'labels' => [
            'name'               => 'Новости СМИ', // основное название для типа записи
            'singular_name'      => 'Новость СМИ', // название для одной записи этого типа
            'add_new'            => 'Создать новость СМИ', // для добавления новой записи
            'add_new_item'       => 'Создание новости СМИ', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование новости СМИ', // для редактирования типа записи
            'new_item'           => 'Новость СМИ', // текст новой записи
            'view_item'          => 'Смотреть новость СМИ', // для просмотра записи этого типа.
            'search_items'       => 'Искать новость СМИ', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Новости СМИ', // название меню
        ],
        'description'         => '',
        'public'              => true,
        'show_in_menu'        => true, // показывать ли в меню адмнки
        'publicly_queryable'  => true,
        'exclude_from_search' => true,
        // 'show_in_admin_bar'   => null, // зависит от show_in_menu
        'show_in_rest'        => true, // добавить в REST API. C WP 4.7
        'rest_base'           => null, // $post_type. C WP 4.7
        'menu_position'       => 32,
        'menu_icon'           => 'dashicons-edit-page',
        'hierarchical'        => false,
        'supports'            => [ 'title', 'editor', 'custom-fields'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => [],
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => true,
    ] );
}

add_action( 'init', 'create_taxonomy' );
function create_taxonomy(){
register_taxonomy( 'request_category', [ 'request' ], [
    'label'                 => '', // определяется параметром $labels->name
    'labels'                => [
        'name'              => 'Категории заявок',
        'singular_name'     => 'Категория заявки',
        'search_items'      => 'Поиск категории',
        'all_items'         => 'Все категории',
        'view_item '        => 'Показать категорию',
        'parent_item'       => 'Родительская категория',
        'parent_item_colon' => 'Родительские категории:',
        'edit_item'         => 'Редактировать категорию',
        'update_item'       => 'Обновить категорию',
        'add_new_item'      => 'Создать категорию',
        'new_item_name'     => 'Новая категория',
        'menu_name'         => 'Категории',
        'back_to_items'     => '← Назад к категориям',
    ],
    'description'           => '', // описание таксономии
    'public'                => true,
    'hierarchical'          => true,

    'rewrite'               => true,
    'capabilities'          => array(),
    'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
    'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
    'show_in_rest'          => null, // добавить в REST API
    'rest_base'             => null, // $taxonomy
] );
}