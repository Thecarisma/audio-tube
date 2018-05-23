<?php

header("Content-type: text/css");

echo '

.audio-tube {
	width:510px ;
	height:30px;
	background:#eff0f2 ;
	display:flex;
}

.audio-tube #audio-tube-play {
	width:13px ;
	height:13px;
	margin:1.5%;
}
.audio-tube #audio-tube-currenttime {
	margin-top:1.21%;
	margin-right:1%;
}
.audio-tube #audio-tube-duration {
	margin-top:1.21%;
	margin-left:1%;
}
.audio-tube #audio-tube-progressbar {
	width:50% ;
	height:20%;
	margin-top:2.7%;
	background-color:#dbd6d6;
	display:flex;
}
.audio-tube #audio-tube-progress {
	height:100%;
	width:100%;
	background-color:#e87171;
    display:inline-block;
}
.audio-tube #audio-tube-volume {
	width:13px ;
	height:13px;
	margin:1.5%;
}
.audio-tube #audio-tube-volumebar {
	width:20% ;
	height:20%;
	margin-top:2.3%;
	border-radius:20%;
	background-color:#ff0000;
	margin-right:1%;
	display:flex;
}
.audio-tube #audio-tube-volumeprogress {
	width:100% ;
	height:100%;
	border-radius:20%;
	background-color:#e87171;
    display:inline-block;
}
.audio-tube #audio-tube-repeat {
	width:13px ;
	height:13px;
	margin:1.5%;
}



' ;



?>