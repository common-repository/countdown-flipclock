<?php 
/**
 * @package Countdown Flipclock
 * @version 2.7.3
*/
/*
Plugin Name: CountDown FlipClock
Plugin URI: http://demos.bluelevel.in/countdown-flipclock/
Description: Bored of the same old dusty countdown clocks with next to no animations and limited customization? Then you are at the right place. CountDown Flipclock is the #1 countdown timer plugin to use in your WordPress website!
Author: Bluelevel 
Author URI: http://www.bluelevel.in
Version: 2.7.3
License: GPL2
Copyright 2018 BlueLevel Communications (email : support@bluelevel.in)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

//Preventing direct access to the plugin folder
if ( ! defined( 'ABSPATH' ) ) {
	header( 'HTTP/1.0 404 Not Found', true, 404 );
	exit;
}

//Default Definitions
define( 'CDFC_VERSION', '2.7.3' );
define( 'CDFC_ABSPATH', __FILE__ );
define( 'CDFC_ABSURL', plugins_url( '/', __FILE__ ) );
global $CDFC_StartDate;

if ($allow_url_include == 0) {
require_once(ABSPATH.'/wp-content/plugins/countdown-flipclock/FlipIncludes/FlipShortcode.php');

require_once(ABSPATH.'/wp-content/plugins/countdown-flipclock/FlipTinymce/FlipTinyMCE.php');

require_once(ABSPATH.'/wp-content/plugins/countdown-flipclock/FlipIncludes/FlipCustomPost.php');

require_once(ABSPATH.'/wp-content/plugins/countdown-flipclock/FlipIncludes/FlipMetaboxes.php');

require_once(ABSPATH.'/wp-content/plugins/countdown-flipclock/FlipIncludes/FlipFiles.php');

require_once(ABSPATH.'/wp-content/plugins/countdown-flipclock/FlipIncludes/FlipMisc.php');
}

else{
require_once('/FlipIncludes/FlipShortcode.php');

require_once('/FlipTinymce/FlipTinyMCE.php');

require_once('/FlipIncludes/FlipCustomPost.php');

require_once('/FlipIncludes/FlipMetaboxes.php');

require_once('/FlipIncludes/FlipFiles.php');

require_once('/FlipIncludes/FlipMisc.php');
    
}
