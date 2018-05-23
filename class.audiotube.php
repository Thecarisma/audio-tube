
<?php

/*

SKIN
-----------------------
0 - classic theme
1 - absurd blue red
1 - blued
*/
class AudioTube {
	
	private static $initiated = false;
	private static $skin = 2 ;
	
	function init(){
		if ( ! self::$initiated ) {
			self::init_audio_tube();
		}
	}
	
	function init_audio_tube() {
		add_action('wp_enqueue_scripts', array( 'AudioTube', 'fetch_scripts_styles' ) );
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
		#echo '<script src="https://www.youtube.com/player_api"></script>' ;

		if ( self::$skin == 0) {
			wp_register_style('audiotube-style', plugins_url('/css/classic-audiotube.css',__FILE__ ));
		} else if ( self::$skin == 1 ) {
			wp_register_style('audiotube-style', plugins_url('/css/blued-audiotube.css',__FILE__ ));
		} else if ( self::$skin == 2 ) {
			wp_register_style('audiotube-style', plugins_url('/css/blue-red-audiotube.css',__FILE__ ));
		} else {
			wp_register_style('audiotube-style', plugins_url('/css/classic-audiotube.css',__FILE__ ));
		}
		wp_register_script( 'audiotube-script-jquery', plugins_url('/js/jquery.min.js',__FILE__ ));
		wp_register_script( 'audiotube-script', plugins_url('/js/audiotube.js',__FILE__ ));
		
		wp_enqueue_style('audiotube-style');
		wp_enqueue_script('audiotube-script-jquery'); 
		wp_enqueue_script('audiotube-script'); 
	}
	
}

?>