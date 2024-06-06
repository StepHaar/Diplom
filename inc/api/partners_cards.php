<?php
add_action( 'rest_api_init', function () {
    register_rest_route( 'methods', '/partners_cards', array(
    'methods' => 'GET',
    'callback' => 'getPartnersCards',
    'permission_callback' => '__return_true'
    ) );
} );


function getPartnersCards() {
    $page_id = get_page_by_path('home'); 

    $group_field = 'partners'; 
    $repeater_field = 'card';

    $group_values = get_field($group_field, $page_id);

    $cards = array();


    if ($group_values) {
        $repeater_values = $group_values[$repeater_field];

        if ($repeater_values) {
            foreach ($repeater_values as $repeater_row) {
                $field_value_1 = $repeater_row['img'];
                $field_value_2 = $repeater_row['name'];

                $row_values = array(
                    'img' => $field_value_1,
                    'name' => $field_value_2,
                );
    
                $cards[] = $row_values;
            }
    
        }
    } 
    $result['cards'] = $cards;
    return $result;
}
?>