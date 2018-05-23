<?php
/**
 * @package audio-tube
 * @version 1.0
 */
/*
Plugin Name: Audio Tube
Plugin URI: https://github.com/Thecarisma/audio-tube
Description: Embed Youtube, Vimeo, Dailymotion Videos on your wordpress site as audio with various control, skins and function
Author: Azeez Adewale
Version: 1.0
Author URI: https://twitter.com/iamthecarisma
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

add_action( 'init', array( 'AudioTube', 'init' ) );

function audiotube() {
	
	
}

function fetch_scripts_styles() {
	$play_icon = plugins_url('/images/play-arrow.png', __FILE__); 
	$pause_icon = plugins_url('/images/pause-button.png', __FILE__); 
	$mute_icon = plugins_url('/images/volume-off-indicator.png', __FILE__); 
	$unmute_icon = plugins_url('/images/volume-up-indicator.png', __FILE__); 
	$repeat_icon = plugins_url('/images/repeat-button.png', __FILE__);
	$not_repeat_icon = plugins_url('/images/not-repeat-button.png', __FILE__);
	echo '<script>
		var playIcon = "'.$play_icon.'" ;
		var pauseIcon = "'.$pause_icon.'" ;
		var muteIcon = "'.$mute_icon.'" ;
		var unMuteIcon = "'.$unmute_icon.'" ;
		var repeatIcon = "'.$repeat_icon.'" ; 
		var notRepeatIcon = "'.$not_repeat_icon.'" ; 
	</script>' ;
	echo '<script src="https://www.youtube.com/player_api"></script>' ;

	wp_register_style('audiotube-style', plugins_url('/audiotube.css',__FILE__ ));
	wp_register_script( 'audiotube-script-jquery', plugins_url('/jquery.min.js',__FILE__ ));
	wp_register_script( 'audiotube-script', plugins_url('/audiotube.js',__FILE__ ));
	
	wp_enqueue_style('audiotube-style');
	wp_enqueue_script('audiotube-script-jquery'); 
	//wp_enqueue_script('audiotube-script'); 
}


//add_action('wp_enqueue_scripts', 'fetch_scripts_styles' );

?>
