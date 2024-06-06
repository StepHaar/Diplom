<?php
add_action( 'rest_api_init', function () {
    register_rest_route( 'methods', '/memo_cards', array(
    'methods' => 'GET',
    'callback' => 'getMemoCards',
    'permission_callback' => '__return_true'
    ) );
} );


function getMemoCards() {
    $page_id = get_page_by_path('students'); 

    $group_field = 'memo'; 
    $repeater_field = 'card';

    $group_values = get_field($group_field, $page_id);

    $cards = array();


    if ($group_values) {
        $repeater_values = $group_values[$repeater_field];

        if ($repeater_values) {
            foreach ($repeater_values as $repeater_row) {
                $field_value_1 = $repeater_row['number'];
                $field_value_2 = $repeater_row['content'];

                $row_values = array(
                    'number' => $field_value_1,
                    'content' => $field_value_2,
                );
    
                $cards[] = $row_values;
            }
        }
    }
    $result['cards'] = $cards;
    return $result;
}
?>