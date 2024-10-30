<?php
/**
 * @package Countdown Flipclock
 * @version 2.7.3
*/
//Adding the paypal metabox
function CDFC_ppl_mb(){
    global $post;
    ?>
    <h2>The Premium version of this plugin with a boatload of new modes, fonts and more is coming soon! Please stay tuned while we work on the final part. For more information, knock us at: support@bluelevel.in. Good Day!</h2>
    <?php    
}
add_action( 'add_meta_boxes', 'CDFC_ppl_mb_init' );

//Initializing the shortcode metabox
function CDFC_ppl_mb_init()
{
    add_meta_box( 'CDFC_ppl_mb_disp', 'Buy The Premium Version!', 'CDFC_ppl_mb', 'CDFC', 'side', 'low' );
}

//Adding the shortcode metabox
function CDFC_SC_mb(){
    global $post;
    ?>
    <p>
        <h3>For Using In Any Post Or Page</h3>
        <p>[FlipClock id="<?php echo $post->ID; ?>"]
    </p>
     
    <p>
        <h3>For Integration In The Theme</h3>
        <p><?php echo '&lt;?php echo do_shortcode("[FlipClock id="'.$post->ID.'"]"); ?&gt;'; ?>
    </p>
     
    <?php    
}
add_action( 'add_meta_boxes', 'CDFC_meta_box_init' );

//Initializing the shortcode metabox
function CDFC_meta_box_init()
{
    add_meta_box( 'ShortCode_mb', 'FlipClock ShortCode', 'CDFC_SC_mb', 'CDFC', 'side', 'low' );
}

//Adding the options metabox
function CDFC_SC_mb2(){
    global $post;
    $CDFC_values = get_post_custom( $post->ID );
    $CDFC_text = isset( $CDFC_values['CDFC_meta_box_text'] ) ? esc_attr( $CDFC_values['CDFC_meta_box_text'][0] ) : '';
    $CDFC_time = isset( $CDFC_values['CDFC_meta_box_time'] ) ? esc_attr( $CDFC_values['CDFC_meta_box_time'][0] ) : '';
    $CDFC_colb = isset( $CDFC_values['CDFC_meta_box_colb'] ) ? esc_attr( $CDFC_values['CDFC_meta_box_colb'][0] ) : '';
    $CDFC_cold = isset( $CDFC_values['CDFC_meta_box_cold'] ) ? esc_attr( $CDFC_values['CDFC_meta_box_cold'][0] ) : '';
    $CDFC_selected = isset( $CDFC_values['CDFC_meta_box_select'] ) ? esc_attr( $CDFC_values['CDFC_meta_box_select'][0] ) : '';
    $CDFC_mode = get_post_meta($post->ID, "CDFC_meta_box_mode", true);
    
    $CDFC_sel_mode = isset( $CDFC_values['CDFC_meta_box_mode'] ) ? esc_attr( $CDFC_values['CDFC_meta_box_mode'][0] ) : '';
    
    $CDFC_end_code = isset( $CDFC_values['CDFC_meta_box_code'] ) ? esc_attr( $CDFC_values['CDFC_meta_box_code'][0] ) : '';
    
    $CDFC_check1 = isset( $CDFC_values['CDFC_meta_box_check1'] ) ? esc_attr( $CDFC_values['CDFC_meta_box_check1'][0] ) : '';
    
    $CDFC_check2 = isset( $CDFC_values['CDFC_meta_box_check2'] ) ? esc_attr( $CDFC_values['CDFC_meta_box_check2'][0] ) : '';
    
    $CDFC_check3 = isset( $CDFC_values['CDFC_meta_box_check3'] ) ? esc_attr( $CDFC_values['CDFC_meta_box_check3'][0] ) : '';
    
    $CDFC_check4 = isset( $CDFC_values['CDFC_meta_box_check4'] ) ? esc_attr( $CDFC_values['CDFC_meta_box_check4'][0] ) : '';
    
    $CDFC_aligned = isset( $CDFC_values['CDFC_meta_box_align'] ) ? esc_attr( $CDFC_values['CDFC_meta_box_align'][0] ) : '';
    
    wp_nonce_field( 'CDFC_meta_box_nonce', 'CDFC_meta_box_nonce' );
    ?>
    <p>
        <label for="CDFC_meta_box_text">Select the date the clock stops:</label>
        <input class="datepicker" type="text" name="CDFC_meta_box_text" id="CDFC_meta_box_text" value="<?php echo $CDFC_text; ?>" />
     
    </p>
    <p>
        <label for="CDFC_meta_box_time">Select the time the clock stops:</label>
        <input class="timepicker" type="text" name="CDFC_meta_box_time" id="CDFC_meta_box_time" value="<?php echo $CDFC_time; ?>" />
        <span class="desc">Hint: Just enter the time and press Tab.</span>
     
    </p>
    <p class="abc">
        <label for="CDFC_meta_box_colb">Select the counter's background color:</label>
        <input class="colorpickerbg" type="text" name="CDFC_meta_box_colb" id="CDFC_meta_box_colb" value="<?php echo $CDFC_colb; ?>" />
     
    </p>
    <p class="abc">
        <label for="CDFC_meta_box_cold">Select the counter number's color:</label>
        <input class="colorpickerfg" type="text" name="CDFC_meta_box_cold" id="CDFC_meta_box_cold" value="<?php echo $CDFC_cold; ?>" />
     
    </p>
     
    <p>
        <label for="CDFC_meta_box_mode">Select the FlipClock Mode: </label>
        <select name="CDFC_meta_box_mode" id="CDFC_meta_box_mode">
            <option value="hrup" <?php selected( $CDFC_sel_mode, 'hrup' ); ?> 
            disabled>Hourly CountUp (Hours, Minutes and Seconds)</option>
            <option value="HourlyCounter" <?php selected( $CDFC_sel_mode, 'hrdn' ); ?>>Hourly CountDown (Hours, Minutes and Seconds)</option>
            <option value="minup" <?php selected( $CDFC_sel_mode, 'minup' ); ?> disabled>Minutes CountUp (Minutes and Seconds)</option>
            <option value="mindn" <?php selected( $CDFC_sel_mode, 'mindn' ); ?> disabled>Minutes CountDown (Minutes and Seconds)</option>
            <option value="dayup" <?php selected( $CDFC_sel_mode, 'dayup' ); ?> disabled>Daily CountUp (Days, Hours, Minutes and Seconds)</option>
            <option value="DailyCounter" <?php selected( $CDFC_sel_mode, 'daydn' ); ?>>Daily CountDown (Hours, Minutes and Seconds)</option>
            <option value="12hr" <?php selected( $CDFC_sel_mode, '12hr' ); ?> disabled>12Hr Clock</option>
            <option value="24hr" <?php selected( $CDFC_sel_mode, '24hr' ); ?> disabled>24hr Clock</option>
        </select>
    </p>
     
    <p>
        <label for="CDFC_meta_box_select">Select the font to be used: </label>
        <select name="CDFC_meta_box_select" id="CDFC_meta_box_select">
            <option value="Ct" <?php selected( $CDFC_selected, 'Ct' ); ?> style="font-family: Ct">Carrington</option>
            <option value="Dg7" <?php selected( $CDFC_selected, 'Dg7' ); ?> style="font-family: Dg7">Digital 7</option>
            <option value="nsp" <?php selected( $CDFC_selected, 'nsp' ); ?> style="font-family: nsp">None Shall Pass</option>
            <option value="spst" <?php selected( $CDFC_selected, 'spst' ); ?> >Superstar</option>
            <option value="spst" <?php selected( $CDFC_selected, 'spst' ); ?> disabled>Vinograd</option>
            <option value="spst" <?php selected( $CDFC_selected, 'spst' ); ?> disabled>Mu-Th-UR</option>
            <option value="spst" <?php selected( $CDFC_selected, 'spst' ); ?> disabled>Roska</option>
            <option value="spst" <?php selected( $CDFC_selected, 'spst' ); ?> disabled>Akrobat</option>
        </select>
    </p>
     
     <p>
         <label for="CDFC_meta_box_check1">Display:</label>
         
        <?php if($CDFC_mode == "DailyCounter"){ ?>
        <label for="CDFC_meta_box_check1">Day Label:</label>
        <input type="checkbox" id="CDFC_meta_box_check1" name="CDFC_meta_box_check1" <?php checked( $CDFC_check1, 'on' ); ?> />
         <?php } ?>
         
        <label for="CDFC_meta_box_check2">Hour Label:</label>
        <input type="checkbox" id="CDFC_meta_box_check2" name="CDFC_meta_box_check2" <?php checked( $CDFC_check2, 'on' ); ?> />
         
        <label for="CDFC_meta_box_check3">Minute Label:</label>
        <input type="checkbox" id="CDFC_meta_box_check3" name="CDFC_meta_box_check3" <?php checked( $CDFC_check3, 'on' ); ?> />
         
        <label for="CDFC_meta_box_check4">Second Label:</label>
        <input type="checkbox" id="CDFC_meta_box_check4" name="CDFC_meta_box_check4" <?php checked( $CDFC_check4, 'on' ); ?> />
    </p>
    
    <p class="code">
        <span>
            <label for="CDFC_meta_box_code" style="vertical-align:top">Enter JS code:</label>
            <label class="desc" for="CDFC_meta_box_code">(Executed after CountDown ends)</label>
        </span>
        
        <textarea type="text" name="CDFC_meta_box_code" id="CDFC_meta_box_code" rows="2" cols="60">
            <?php echo $CDFC_end_code; ?>
        </textarea>
        
        <span class="desc">
            Hint: Don't include functions, just the raw code. $ is acceped.
        </span>
     
    </p>
    <?php    
}
add_action( 'add_meta_boxes', 'CDFC_meta_box_init2' );

//Initializing the options metabox
function CDFC_meta_box_init2()
{
    add_meta_box( 'ShortCode_mb2', 'FlipClock Options', 'CDFC_SC_mb2', 'CDFC', 'normal', 'high' );
}

//Adding the preview metabox
function CDFC_SC_mb3(){
    global $post;
    ?>
    <?php echo do_shortcode('[FlipClock id="'.$post->ID.'"]'); ?>
     <script></script>
    <?php    
}
add_action( 'add_meta_boxes', 'CDFC_meta_box_init3' );

//Initializing the preview metabox
function CDFC_meta_box_init3(){
    global $post;
    if(get_post_meta($post->ID, 'CDFC_meta_box_text', true) != "") {
        add_meta_box( 'ShortCode_mb3', 'Live Preview', 'CDFC_SC_mb3', 'CDFC', 'normal', 'high' );
    }
}

//Saving the options data
function CDFC_meta_box_save( $post_id )
{
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
     
    if( !isset( $_POST['CDFC_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['CDFC_meta_box_nonce'], 'CDFC_meta_box_nonce' ) ) return;
     
    if( !current_user_can( 'edit_post', $post_id ) ) return;
     
    if( isset( $_POST['CDFC_meta_box_text'] ) )
        update_post_meta( $post_id, 'CDFC_meta_box_text', wp_kses( $_POST['CDFC_meta_box_text'], array() ) );
    if( isset( $_POST['CDFC_meta_box_time'] ) )
        update_post_meta( $post_id, 'CDFC_meta_box_time', wp_kses( $_POST['CDFC_meta_box_time'], array() ) );
    if( isset( $_POST['CDFC_meta_box_colb'] ) )
        update_post_meta( $post_id, 'CDFC_meta_box_colb', wp_kses( $_POST['CDFC_meta_box_colb'], array() ) );
    if( isset( $_POST['CDFC_meta_box_cold'] ) )
        update_post_meta( $post_id, 'CDFC_meta_box_cold', wp_kses( $_POST['CDFC_meta_box_cold'], array() ) );
    if( isset( $_POST['CDFC_meta_box_code'] ) )
        update_post_meta( $post_id, 'CDFC_meta_box_code', wp_kses( $_POST['CDFC_meta_box_code'], array() ) );
    if( isset( $_POST['CDFC_meta_box_select'] ) )
        update_post_meta( $post_id, 'CDFC_meta_box_select', esc_attr( $_POST['CDFC_meta_box_select'] ) );
    if( isset( $_POST['CDFC_meta_box_mode'] ) )
        update_post_meta( $post_id, 'CDFC_meta_box_mode', esc_attr( $_POST['CDFC_meta_box_mode'] ) );
    
    $chk = isset( $_POST['CDFC_meta_box_check1'] ) && $_POST['CDFC_meta_box_select'] ? 'on' : 'off';
    update_post_meta( $post_id, 'CDFC_meta_box_check1', $chk );    
    
    $chk = isset( $_POST['CDFC_meta_box_check2'] ) && $_POST['CDFC_meta_box_select'] ? 'on' : 'off';
    update_post_meta( $post_id, 'CDFC_meta_box_check2', $chk );  
    
    $chk = isset( $_POST['CDFC_meta_box_check3'] ) && $_POST['CDFC_meta_box_select'] ? 'on' : 'off';
    update_post_meta( $post_id, 'CDFC_meta_box_check3', $chk ); 
    
    $chk = isset( $_POST['CDFC_meta_box_check4'] ) && $_POST['CDFC_meta_box_select'] ? 'on' : 'off';
    update_post_meta( $post_id, 'CDFC_meta_box_check4', $chk );
    
    if( isset( $_POST['CDFC_meta_box_align'] ) )
        update_post_meta( $post_id, 'CDFC_meta_box_align', esc_attr( $_POST['CDFC_meta_box_align'] ) );
}
add_action( 'save_post', 'CDFC_meta_box_save' );
