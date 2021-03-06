
<?php

/*



SKIN
-----------------------
0 - classic theme
1 - elegant
2 - chromic

STYLE
-----------------------
1 - justify
2 - lefty
*/
class AudioTube {
	
	private static $initiated = false;
	private static $options ;
	private static $skin ;
	private static $player_style ;
	
	function init(){
		if ( ! self::$initiated ) {
			self::init_audio_tube();
		}	
	}
	
	function init_audio_tube() {
		self::$initiated = true;
		self::$options = get_option('audiotube_options');
		self::$skin = self::$options['audiotube_skin'] ;
		self::$player_style = self::$options['audiotube_skin_style'];
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
			
			var playerSkin = "'.self::$skin.'" ; 
			var playerStyle = "'.self::$player_style.'" ; 
		</script>' ;
		#echo '<script src="https://www.youtube.com/player_api"></script>' ; 
		
		wp_register_script( 'audiotube-script-jquery', plugins_url('/js/jquery.min.js',__FILE__ ));
		wp_register_script( 'audiotube-script-youtube-player', plugins_url('/apis/youtube.player.js',__FILE__ ));

		if ( self::$skin == 'classic' ) {
			wp_register_style('audiotube-style', plugins_url('/css/classic-audiotube.php?'.time(),__FILE__ ));
			wp_register_script( 'audiotube-script', plugins_url('/js/classic-audiotube.js',__FILE__ ));
		} else if ( self::$skin == 'elegant' ) {
			wp_register_style('audiotube-style', plugins_url('/css/elegant-audiotube.php?'.time(),__FILE__ ));
			wp_register_script( 'audiotube-script', plugins_url('/js/elegant-audiotube.js',__FILE__ ));
		} else if ( self::$skin == 'chromic' ) {
			wp_register_style('audiotube-style', plugins_url('/css/chromic-audiotube.php?'.time(),__FILE__ ));
			wp_register_script( 'audiotube-script', plugins_url('/js/chromic-audiotube.js',__FILE__ ));
		} else {
			wp_register_style('audiotube-style', plugins_url('/css/classic-audiotube.php',__FILE__ ));
			wp_register_script( 'audiotube-script', plugins_url('/js/classic-audiotube.js',__FILE__ ));
		}
		
		wp_enqueue_style('audiotube-style');
		wp_enqueue_script('audiotube-script-jquery'); 
		wp_enqueue_script('audiotube-script-youtube-player'); 
		wp_enqueue_script('audiotube-script'); 
	}
	
}

?>