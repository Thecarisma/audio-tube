<?php
/**
 * @package Hello_Dolly
 * @version 1.7
 */
/*
Plugin Name: Audio Tube For Harjit
Plugin URI: https://www.freelancer.com/u/Thecarisma
Description: This is a custom plugin for harjit to render youtube videos as audios on wordpress pages 
Author: Azeez Adewale
Version: 1.1
Author URI: https://www.freelancer.com/u/Thecarisma
*/ 


function audiotube() {
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
	wp_enqueue_script('audiotube-script'); 
	
}

function fetch_scripts_styles() {
	
}


add_action('wp_enqueue_scripts', 'audiotube' );

?>
