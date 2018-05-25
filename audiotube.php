<?php
/**
 * @package audio-tube
 * @version 1.0
 */
/*
Plugin Name: Audio Tube
Plugin URI: https://github.com/Thecarisma/audio-tube
Description: Embed Youtube, Vimeo, Dailymotion Videos on your wordpress site as audio with various control, skins and function. Manually change players skins and theme. Auto Replay, Mute, after and before function. Open to contribution and features additions.
Author: Azeez Adewale
Version: 1.0
Author URI: https://twitter.com/iamthecarisma
License:  LGPL-v3.0 or later
*/ 

/*
GNU Lesser General Public License v3.0

Permissions of this copyleft license are conditioned on making available complete 
source code of licensed works and modifications under the same license or the 
GNU GPLv3. Copyright and license notices must be preserved. Contributors provide 
an express grant of patent rights. However, a larger work using the licensed work 
through interfaces provided by the licensed work may be distributed under different 
terms and without source code for the larger work
*/


# Make sure we don't expose any info if called directly,
#this security mechanism is copied from the askimet plugin 
#https://automattic.com/wordpress-plugins/
if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

define( 'AUDIO_TUBE_VERSION', '4.0.3' );
define( 'AUDIO_TUBE_MINIMUM_WP_VERSION', '4.0' );
define( 'AUDIO_TUBE_PLUGIN_DIR', plugin_dir_path( __FILE__ ) ); 
define( 'AUDIO_TUBE_PLUGIN_URL', plugins_url( __FILE__ ) ); 

require_once( AUDIO_TUBE_PLUGIN_DIR . 'class.audiotube.php' );
require_once( AUDIO_TUBE_PLUGIN_DIR . 'settings.audiotube.php' );

add_action( 'init', array( 'AudioTube', 'init' ) );

?>
