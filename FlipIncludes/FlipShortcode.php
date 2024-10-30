<?php
/**
 * @package Countdown Flipclock
 * @version 2.7.3
*/
//Adding the shortcode for the plugin
function CDFC_shortcode($CDFC_atts){
    //Extracting the ID
    extract( 
        shortcode_atts( array(
            'id' => '',
	    ), $CDFC_atts) 
    );
    
    //Obtaining data of the specific FlipClock
    $CDFC_post_id = $id;
    $CDFC_mode = get_post_meta($id, "CDFC_meta_box_mode", true);
    $CDFC_queried_post = get_post($CDFC_post_id);
    $CDFC_title = $CDFC_queried_post->post_title; 
    $CDFC_color = get_post_meta($id, "CDFC_meta_box_cold", true); 
    $CDFC_bgcolor = get_post_meta($id, "CDFC_meta_box_colb", true);
    $CDFC_font = get_post_meta($id, "CDFC_meta_box_select", true);
    $CDFC_time = get_post_meta($id, "CDFC_meta_box_time", true);
    $CDFC_date = get_post_meta($id, "CDFC_meta_box_text", true);
    $CDFC_code = get_post_meta($id, "CDFC_meta_box_code", true);
    $CDFC_label1 = get_post_meta($id, "CDFC_meta_box_check1", true);
    $CDFC_label2 = get_post_meta($id, "CDFC_meta_box_check2", true);
    $CDFC_label3 = get_post_meta($id, "CDFC_meta_box_check3", true);
    $CDFC_label4 = get_post_meta($id, "CDFC_meta_box_check4", true);
    $CDFC_align = get_post_meta($id, "CDFC_meta_box_align", true);

    //Processing the data
    $CDFC_day = substr($CDFC_date, 0, 2);
    $CDFC_mnth = substr($CDFC_date, 3, 2);
    $CDFC_mnth2 = $CDFC_mnth;
    $CDFC_mnth3 = $CDFC_day;
    $CDFC_yr = substr($CDFC_date, 6, 11);
    if($CDFC_mnth > '12'){
        $CDFC_mnth2 = $CDFC_day;
        $CDFC_mnth3 = $CDFC_mnth;
    }
    $CDFC_random_ID = mt_rand();
    
  
        //Starting Markup - Inline Styles
        $CDFC_markup = '<style>body .flip-clock-wrapper ul li a div div.inn{color:'.$CDFC_color.';background-color:'.$CDFC_bgcolor.';font-family:"'.$CDFC_font.'"}body .flip-clock-dot{background-color:'.$CDFC_bgcolor.';}';
        if ($CDFC_label1 == 'on'){
            $CDFC_markup .='.flip-clock-divider[class~=days] .flip-clock-label{display:block;}';
        }    
        if ($CDFC_label2 == 'on'){
            $CDFC_markup .='.flip-clock-divider[class~=hours] .flip-clock-label{display:block;}';
        }    
        if ($CDFC_label3 == 'on'){
            $CDFC_markup .='.flip-clock-divider[class~=minutes] .flip-clock-label{display:block;}';
        }    
        if ($CDFC_label4 == 'on'){
            $CDFC_markup .='.flip-clock-divider[class~=seconds] .flip-clock-label{display:block;}';
        }
        $CDFC_markup .= '</style>';
        //Inline Styles End

        //Flipclock Markup
        $CDFC_markup .= '<div class="clock'.$CDFC_random_ID.' clock '.$CDFC_title.'" style="margin:2em;"></div>
        <script type="text/javascript">
            (function($) {
                $(document).ready(function() {
                    var futureDate = new Date("'.$CDFC_mnth2.'/'.$CDFC_mnth3.'/'.$CDFC_yr.' '.$CDFC_time.'");
                    var currentDate = new Date();
                    // Calculate the difference in seconds between the future and current date
                    var diff = futureDate.getTime() / 1000 - currentDate.getTime() / 1000;
                    // Calculate day difference and apply class to .clock for extra digit styling.
                    function dayDiff(first, second) {
                        return (second - first) / (1000 * 60 * 60 * 24);
                    }
                    if (dayDiff(currentDate, futureDate) < 100) {
                        $(".clock").addClass("twoDayDigits");
                    } 
                    else {
                        $(".clock").addClass("threeDayDigits");
                    }
                    if (diff < 0) {
                        diff = 0;
                    }
                    // Instantiate a coutdown FlipClock
                    $(".clock").each(function() {
                        var cdfc = $(".clock'.$CDFC_random_ID.'").FlipClock(diff, {
                            clockFace: "'.$CDFC_mode.'",
                            countdown: true,
                            callbacks: {
                                stop: function() {
                                    $(".clock'.$CDFC_random_ID.'").html("");
                                    '.$CDFC_code.'
                                }
                            }
                        });
                    });
                });
            })(jQuery);
        </script>';
        //FlipClock Markup Ends
    if($CDFC_mode === "DailyCounter" or "HourlyCounter") {
        return $CDFC_markup;
    }
    else {
        $msg = "Please don't waste your time in this fruitless pursuit. Buy the premium version for $10 and get all the features of this plugin. :)";
        return $msg;
    }
}
add_shortcode('FlipClock', 'CDFC_shortcode');