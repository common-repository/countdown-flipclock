<?php
/**
 * @package Countdown Flipclock
 * @version 2.7.3
*/
//Adding CSS and JS files for the plugin
function CDFC_files(){
    wp_register_style('clock', CDFC_ABSURL.'FlipCss/flipclock.css', true);
    wp_enqueue_style('clock');
    
    wp_enqueue_script('jquery');
    wp_enqueue_script('clock-min', CDFC_ABSURL.'FlipJs/flipclock.min.js', array('jquery'), true);
}
add_action('wp_enqueue_scripts', 'CDFC_files');

//Adding CSS and JS files for the plugin backend
//Update: Added timepicker CSS & JS 
function CDFC_admin_files(){    
    wp_register_style('tp', CDFC_ABSURL.'FlipCss/jquery.timepicker.min.css', true);
    wp_enqueue_style('tp');     
    wp_register_style('dp', CDFC_ABSURL.'FlipCss/datepicker.css', true);
    wp_enqueue_style('dp');    
    wp_register_style('jq-ui', CDFC_ABSURL.'FlipCss/jquery-ui.css', true);
    wp_enqueue_style('jq-ui');
    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery-ui-datepicker'); 
    wp_enqueue_style( 'wp-color-picker');
    wp_enqueue_script( 'wp-color-picker'); 
    wp_enqueue_script('timepicker', CDFC_ABSURL.'FlipJs/jquery.timepicker.min.js', array('jquery'), true);
    wp_enqueue_script('customjs', CDFC_ABSURL.'FlipJs/custom.js', array('jquery-ui-core'), true);
    wp_register_style('clock', CDFC_ABSURL.'FlipCss/flipclock.css', true);
    wp_enqueue_style('clock');
    wp_enqueue_script('clock-min', CDFC_ABSURL.'FlipJs/flipclock.min.js', array('jquery'), true);
}
add_action('admin_footer', 'CDFC_admin_files');