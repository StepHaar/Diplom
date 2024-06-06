<?php 
/**
 * The header for our theme
 *
 * @package Your_Startup
 */
get_header();

    $RESULT = basename($_SERVER['REQUEST_URI']);

    require_once (get_template_directory() . '/client/.output/public/200.html');
    //require_once (get_template_directory() . '/client/.output/public/'.$RESULT.'/index.html');

get_footer();