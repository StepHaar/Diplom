<?php
add_action( 'rest_api_init', function () {
    register_rest_route( 'methods', '/site_info', array(
        'methods' => 'GET',
        'callback' => 'getSiteInfo',
        'permission_callback' => '__return_true',
    ) );
} );

function getSiteInfo( WP_REST_Request $request ){
    $city_id = $request->get_param('id');
    $cities_posts = get_posts([
        'post_type'      => 'cities',
        'numberposts'    => -1,
        'posts_per_page' => -1,
        'orderby'        => 'sort',
        'order'          => 'ASC',
    ]);

    $result = [];

    $Header_items = wp_get_nav_menu_items('Header');
    $Footer_items = wp_get_nav_menu_items('Footer');

    $Header = [];
    $Footer = [];

    $site_url = get_site_url();

    // foreach ($Header_items as $key=>$item) {
    //     $Header[$key]['title'] = $item->title;
    //     $Header[$key]['link']  = str_replace($site_url, '', $item->url);
    // }
    
    function get_child_menu_items($menu_items, $parent_id) {
		$children = array();
	
		foreach ($menu_items as $menu_item) {
			if ($menu_item->menu_item_parent == $parent_id) {
				$children[] = $menu_item;
			}
		}
		return $children;
	}

    // foreach ($Header_items as $key=>$item) {
    //     if ($item->menu_item_parent == 0) {
    //         $link = str_replace($site_url, '', $item->url);
    //         if (strlen($link) > 1) {
    //             $link = rtrim($link, '/');
    //         }
    //         $menu_item = array(
    //             'label' => $item->title,
    //             'link'  => $link,
    //             'children' => array(),
    //         );
    //         $childrens = get_child_menu_items($Header_items, $item->ID);
    //         foreach ($childrens as $children_key=>$children) {
    //             $link = str_replace($site_url, '', $children->url);
    //             $menu_item['children'][] = array(
    //                 'label' => $children->title,
    //                 'link'  => $link,
    //             );
    //         }
    //         $Header['menu'][] = $menu_item;
    //     }
    // }

    foreach ($Header_items as $key=>$item) {
        if ($item->menu_item_parent == 0) {
            $link = str_replace($site_url, '', $item->url);
            if (strlen($link) > 1) {
                $link = rtrim($link, '/');
            }
            $Header[] = array(
                'label' => $item->title,
                'link'  => $link . '/',
            );
            $childrens = get_child_menu_items($Header_items, $item->ID);
            foreach ($childrens as $children_key=>$children) {
                $link = str_replace($site_url, '', $children->url);
                if (strlen($link) > 1) {
                    $link = rtrim($link, '/');
                }
                $Header[$key]['children'][$children_key]['label'] = $children->title;
                $Header[$key]['children'][$children_key]['link']  = $link . '/';
            }
        }
    }

    // foreach ($Footer_items as $key=>$item) {
    //     if ($item->menu_item_parent == 0) {
    //         $link = str_replace($site_url, '', $item->url);
    //         if (strlen($link) > 1) {
    //             $link = rtrim($link, '/');
    //         }
    //         $Footer[] = array(
    //             'label' => $item->title,
    //             'link'  => $link,
    //         );
    //         $childrens = get_child_menu_items($Footer_items, $item->ID);
    //         foreach ($childrens as $children_key=>$children) {
    //             $link = str_replace($site_url, '', $children->url);
    //             if (strlen($link) > 1) {
    //                 $link = rtrim($link, '/');
    //             }
    //             $Footer[$key]['children'][$children_key]['label'] = $children->title;
    //             $Footer[$key]['children'][$children_key]['link']  = $link;
    //         }
    //     }
    // }

    foreach ($Footer_items as $key=>$item) {
        if ($item->menu_item_parent == 0) {
            $link = str_replace($site_url, '', $item->url);
            if (strlen($link) > 1) {
                $link = rtrim($link, '/');
            }
            $menu_item = array(
                'label' => $item->title,
                'link'  => $link,
                'children' => array(),
            );
            $childrens = get_child_menu_items($Footer_items, $item->ID);
            foreach ($childrens as $children_key=>$children) {
                $link = str_replace($site_url, '', $children->url);
                $isRedirect = $children->title === 'Вконтакте' ? true : false;
                $menu_item['children'][] = array(
                    'label' => $children->title,
                    'link'  => $link,
                    'isRedirect' => $isRedirect
                );
            }
            $Footer['menu'][] = $menu_item;
        }
    }
    $result['header']['menu'] = $Header;
    $result['footer'] = $Footer;
    $result['additional'] = get_fields('options');
    echo json_encode($result);
    die;
}