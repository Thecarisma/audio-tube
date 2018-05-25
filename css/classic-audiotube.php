<?php

header("Content-type: text/css");

echo '

.audio-tube {
	width:510px ;
	height:30px;
	background:#eff0f2 ;
	display:flex;
	margin:5px;
}

.audio-tube #audio-tube-play {
	width:20px ;
	height:20px;
	margin:1%;
}
.audio-tube #audio-tube-currenttime {
	margin-top:1.21%;
	margin-right:1.5%;
}
.audio-tube #audio-tube-duration {
	margin-top:1.21%;
	margin-left:1.5%;
}
.audio-tube #audio-tube-progressbar {
	width:50% ;
	height:65%;
	margin-top:1%;
	background-color:#dbd6d6;
	display:flex;
}
.audio-tube #audio-tube-progress {
	height:100%;
	width:30%;
	background-color:#e87171;
    display:inline-block;
}
.audio-tube #audio-tube-volume {
	width:20px ;
	height:20px;
	margin:1%;
	//margin-right:2%;
}
.audio-tube #audio-tube-volumebar {
	width:20% ;
	height:65%;
	margin-top:1%;
	background-color:#dbd6d6;
	margin-right:1%;
	display:flex;
}
.audio-tube #audio-tube-volumeprogress {
	width:100% ;
	height:100%;
	background-color:#e87171;
    display:inline-block;
}
.audio-tube #audio-tube-repeat {
	width:20px ;
	height:20px;
	margin:1%;
	//margin-right:2%;
}
.audio-tube #audio-tube-divider {
	height:70%;
	width:3px;
	margin-right:1%;
	margin-top:1%;
	background-color:#dbd6d6;
}
.sided{
	margin-left:4%;
	margin-right:4%;
}

' ;



?>