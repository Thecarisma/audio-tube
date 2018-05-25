<?php

header("Content-type: text/css");

echo '

.audio-tube {
	width:510px ;
	height:30px;
	background:#f6f6f6 ;
	display:flex;
}

.audio-tube #audio-tube-play {
	width:14px ;
	height:14px;
	margin:1.5%;
}
.audio-tube #audio-tube-currenttime {
	margin-top:1.5%;
	margin-right:1.5%;
	color:#717272;
	font-weight:bold;
	font-size:12px;
}
.audio-tube #audio-tube-duration {
	margin-top:1.5%;
	color:#717272;
	font-weight:bold;
	font-size:12px;
}
.audio-tube #audio-tube-progressbar {
	width:50% ;
	height:10%;
	margin-top:3%;
	margin-left:1.5%;
	margin-right:1.5%;
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
	width:14px ;
	height:14px;
	margin-top:1.5%;
	margin-right:2%;
}
.audio-tube #audio-tube-volumebar {
	width:20% ;
	height:10%;
	margin-top:3%;
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
	width:14px ;
	height:14px;
	margin:1.5%;
}
.audio-tube #audio-tube-divider {
	height:70%;
	width:3px;
	margin-top:1%;
	background-color:#dbd6d6;
}
.sided-chromic {
	margin-left:2%;
	margin-right:4%;
}



' ;



?>