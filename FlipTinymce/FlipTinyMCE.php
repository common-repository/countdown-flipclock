<?php
/**
 * @package Countdown Flipclock
 * @version 2.7.3
*/
//Adding TinyMCE button filters
function CDFC_add_tinymce() {
    add_filter( 'mce_external_plugins', 'CDFC_add_tinymce_plugin' );
    add_filter( 'mce_buttons', 'CDFC_add_tinymce_button' );
}
add_action( 'admin_head', 'CDFC_add_tinymce' );

//Adding our TinyMCE plugin
function CDFC_add_tinymce_plugin( $plugin_array ) {
    $plugin_array['BL_CDFC_button'] = CDFC_ABSURL.'FlipTinymce/mce-button.js';
    return $plugin_array;
}

//Adding the TinyMCE button *Finally!!*
function CDFC_add_tinymce_button( $buttons ) {
    array_push( $buttons, 'BL_CDFC_button' );
    return $buttons;
}