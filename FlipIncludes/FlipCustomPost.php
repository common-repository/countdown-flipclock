<?php
/**
 * @package Countdown Flipclock
 * @version 2.7.3
*/
//Adding the CDFC custom post
function CDFC_custom_post(){
    register_post_type('cdfc', array(
        'public' => true,
        'label' => 'CountDown FlipClock',
        'menu_icon' => 'dashicons-backup',
        'labels' => array(
            'menu_name' => 'CountDown FlipClock',
            'all_items' => 'Added FlipClocks',
            'add_new' => 'Add new FlipClock', 
            'add_new_item' => 'Add new FlipClock',
            'edit_item' => 'Edit FlipClock',
            'view_item' => 'View FlipClock',
            'view_items' => 'View FlipClocks',
            'search_items' => 'Search FlipClocks',
            'not_found' => 'No FlipClocks Found',
            'not_found_in_trash' => 'No FlipClocks Found in Trash',
            'singular_name' => 'CountDown FlipClock',
        ),
        'supports' => array('title'),
    ));
    
}
add_action('init', 'CDFC_custom_post');