
var youtubeAudioss = [] ;
var youtubeAudios = [] ;
var youtubeAudioPPB = [] ;
var youtubeAudioTimeSpans = [] ;
var youtubeAudioProgressBar = [] ;
var youtubeAudioProgress = [] ;
var youtubeAudioDuration = [] ;
var youtubeAudioVB = [] ;
var youtubeAudioRB = [] ;
var youtubeAudioVolumeBar = [] ;
var youtubeAudioVolume = [] ;
var youtubeUrl = [] ;
var youtubePlayers = [] ;
var youtubeIPlayer = [] ; 
var youtubeAudioRepeat = [] ;

//skin specific vars
var youtubeAudioTimeSplash = [] ;
	
$(window).bind("load", function() {	
//$(window).load(function() {
	youtubeAudioss = document.getElementsByClassName("audio-tube");
	for(var i = 0; i < youtubeAudioss.length; i++)
	{ 
		youtubeAud = youtubeAudioss.item(i);
		youtubeAudios[i] = youtubeAudioss.item(i);
		youtubeUrl[i] = youtubeAud.id ; 
		//iplayer
		var iplayer = document.createElement("div");
		iplayer.id = "player"+i ;
		youtubeIPlayer[i] = iplayer ;
		//the play/pause button
		var ppb = document.createElement("img");
		ppb.src = playIcon;
		ppb.id = "audio-tube-play" ;
		ppb.className = youtubeAud.id ; 
		youtubeAudioPPB[i] = ppb ;
		//current time
		var timeSpan = document.createElement("span");
		timeSpan.id = "audio-tube-currenttime" ;
		timeSpan.innerHTML = "00:00:00" ;
		youtubeAudioTimeSpans[i] = timeSpan ;
		//progress bar
		var progressBar = document.createElement("div");
		progressBar.id = "audio-tube-progressbar" ;
		//progress
		var progress = document.createElement("span");
		progress.id = "audio-tube-progress" ;
		youtubeAudioProgress[i] = progress ;
		youtubeAudioProgressBar[i] = progressBar ;
		//total time duration
		var durationSpan = document.createElement("span");
		durationSpan.id = "audio-tube-duration" ;
		durationSpan.innerHTML = "00:00:00" ;
		youtubeAudioDuration[i] = durationSpan ;
		//the volume button
		var vb = document.createElement("img");
		vb.src = unMuteIcon;
		vb.id = "audio-tube-volume" ;
		youtubeAudioVB[i] = vb ;
		//volume bar
		var volumeBar = document.createElement("div");
		volumeBar.id = "audio-tube-volumebar" ;
		//volume
		var volume = document.createElement("span");
		volume.id = "audio-tube-volumeprogress" ;
		youtubeAudioVolume[i] = volume ;
		youtubeAudioVolumeBar[i] = volumeBar ;
		//the repeat button
		var rb = document.createElement("img");
		rb.src = notRepeatIcon;
		rb.id = "audio-tube-repeat" ;
		youtubeAudioRB[i] = rb ;
		youtubeAudioRepeat[i] = false ;
		
		//skin specific 
		//time slash
		var timeSlash = document.createElement("span");
		timeSlash.id = "audio-tube-currenttime" ;
		timeSlash.innerHTML = "/" ;
		youtubeAudioTimeSplash[i] = timeSlash ;
	}
	createLayout();
//}
function createLayout() { 
	//add elements
	for(var i = 0; i < youtubeAudioss.length; i++)
	{ 
		(function(i) {
			var position = i ;
			youtubeAudios[i].appendChild(youtubeAudioPPB[i]);
			youtubeAudioPPB[i].onclick = function () {
				if (this.src.endsWith(playIcon) ) {
					this.src = pauseIcon ;
					youtubePlayers[position].playVideo();
				} else {
					this.src = playIcon ;
					youtubePlayers[position].pauseVideo();
				}
			};
		}(i));
		youtubeAudios[i].appendChild(youtubeIPlayer[i]);
		youtubeAudios[i].appendChild(youtubeAudioTimeSpans[i]);
		youtubeAudios[i].appendChild(youtubeAudioTimeSplash[i]);
		youtubeAudios[i].appendChild(youtubeAudioDuration[i]);
		youtubeAudioProgressBar[i].appendChild(youtubeAudioProgress[i]);
		youtubeAudios[i].appendChild(youtubeAudioProgressBar[i]);
		(function(i) {
			var position = i ;
			youtubeAudioProgressBar[i].onclick = function (e) {
				var percent = (e.offsetX / this.offsetWidth) * youtubePlayers[position].getDuration() ;
				youtubePlayers[position].seekTo(percent);
				if (youtubeAudioPPB[position].src.endsWith(playIcon) ) {
					youtubeAudioPPB[position].src = pauseIcon ;
				}
			};
			youtubeAudioProgressBar[i].addEventListener("mousemove", function(e){
				var percent = (e.offsetX / this.offsetWidth) * youtubePlayers[position].getDuration() ;
				youtubeAudioProgress[position].style.width = percent + "%";
			}, false);
			youtubeAudioProgressBar[i].addEventListener("mouseleave", function(e){
				var percent = Math.floor((100 / youtubePlayers[position].getDuration()) * youtubePlayers[position].getCurrentTime()) ;
				youtubeAudioProgress[position].style.width = percent + "%";
			}, false);
		}(i));
		youtubeAudios[i].appendChild(youtubeAudioVB[i]);
		(function(i) {
			var position = i ;
			youtubeAudioVB[i].onclick = function () {
				if (this.src.endsWith(unMuteIcon)) {
					this.src = muteIcon ;
					youtubePlayers[position].mute();
				} else {
					this.src = unMuteIcon ;
					youtubePlayers[position].unMute();
				}
			};
		}(i));
		youtubeAudioVolumeBar[i].appendChild(youtubeAudioVolume[i]);
		youtubeAudios[i].appendChild(youtubeAudioVolumeBar[i]);
		(function(i) {
			var position = i ;
			youtubeAudioVolumeBar[i].onclick = function (e) {
				var percent = (e.offsetX / this.offsetWidth) * 100 ; 
				youtubePlayers[position].setVolume(percent);
				if ( percent <= 0 ) {
					youtubeAudioVB[position].src = muteIcon ;
				} else {
					youtubeAudioVB[position].src = unMuteIcon ;
				}
				var value = 0;
				if (percent > 0) {
					value = Math.floor((100 / 100) * percent);
				}
				youtubeAudioVolume[position].style.width = value + "%"; console.log(value + "%");
			};
		}(i));	
		youtubeAudios[i].appendChild(youtubeAudioRB[i]);
		(function(i) {
			var position = i ;
			youtubeAudioRB[i].onclick = function () {
				//youtubePlayers[position].seekTo(0);
				//youtubeAudioProgress[position].style.width = "0%"; 
				//youtubeAudioTimeSpans[position].innerHTML = "00:00:00" ;
				//youtubeAudioPPB[position].src = pauseIcon ;
				if (this.src.endsWith(notRepeatIcon)) {
					this.src = repeatIcon ;
					youtubeAudioRepeat[position] = true ;
				} else {
					this.src = notRepeatIcon ;
					youtubeAudioRepeat[position] = false ;
				}
			};
		}(i));		
	} 
} onYouTubeIframeAPIReady();
});

function onYouTubeIframeAPIReady() {
	for(var i = 0; i < youtubeAudioss.length; i++)
	{ 
		(function(i) {
			var position = i ; 
			youtubePlayers[i] = new YT.Player("player"+i, {
			height: "0",
			width: "0",
			videoId: youtubeUrl[i],
			rel:"0",
			events: {
				"onReady" : function(e) {
					var date = new Date(null); date.setSeconds(e.target.getDuration()); 
					var audioDuration = date.toISOString().substr(11, 8);
					youtubeAudioDuration[position].innerHTML = audioDuration ; 
					initProgressTimer(position);
				},
				"onStateChange": function(e) {
					var value = 0;
					if (e.target.getCurrentTime() > 0) {
						value = Math.floor((100 / e.target.getDuration()) * e.target.getCurrentTime());
					}
					youtubeAudioProgress[position].style.width = value + "%"; 
					var date = new Date(null); date.setSeconds(e.target.getCurrentTime()); 
					var audioDuration = date.toISOString().substr(11, 8);
					youtubeAudioTimeSpans[position].innerHTML = audioDuration ;
				 }
			}
		  });
	  }(i));
		
	}
}

/**
	dynamically load the progress and time in timer
**/
function initProgressTimer(i) {
	(function(i) {
		var position = i ;
		if(typeof youtubePlayers[position] != "undefined" ){
			var downloadTimer = setInterval(function(){
				var value = 0;
				if (youtubePlayers[position].getCurrentTime() > 0) {
					value = Math.floor((100 / youtubePlayers[position].getDuration()) * youtubePlayers[position].getCurrentTime());
				}
				youtubeAudioProgress[position].style.width = value + "%"; 
				youtubeAudioProgress[position].style.width = value + "%"; 
				var date = new Date(null); date.setSeconds(youtubePlayers[position].getCurrentTime()); 
				var audioDuration = date.toISOString().substr(11, 8);
				youtubeAudioTimeSpans[position].innerHTML = audioDuration ;
				if (value>=99 && youtubeAudioRepeat[position] == true ) {
					youtubePlayers[position].seekTo(0);
				}
			},1000);
		}
	}(i)); 
}
