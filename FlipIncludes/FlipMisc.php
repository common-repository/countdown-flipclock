<?php
/**
 * @package Countdown Flipclock
 * @version 2.7.3
*/
function CDFC_activate() {
  global $CDFC_StartDate;
  $CDFC_StartDate = get_the_time('U');
}
register_activation_hook( __FILE__, 'CDFC_activate' );


if(human_time_diff($CDFC_StartDate, current_time('timestamp')) >= '7 days' ) {
    // display default admin notice
    function CDFC_add_settings_errors() {
        global $CDFC_StartDate;
    ?>	
        <div class="notice notice-success is-dismissible"> 
            <p>Looks like You're using the CountDown FlipClock plugin for <strong><?php echo human_time_diff($CDFC_StartDate, current_time('timestamp')); ?></strong> days now! If you like it, would you mind to rate it five stars and leave a review? You can do so <a href="https://wordpress.org/plugins/countdown-flipclock/#reviews">here</a>. Thanks!</p>
        </div>
    <?php
    }
    add_action('admin_notices', 'CDFC_add_settings_errors');
}