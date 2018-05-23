<?php

header("Content-type: text/css");

echo '

.audio-tube {
	width:510px ;
	height:30px;
	background:#A4C639 ;
	display:flex;
}

.audio-tube #audio-tube-play {
	width:20px ;
	height:20px;
	margin:5px;
}
.audio-tube #audio-tube-currenttime {
	margin-top:4px;
	margin-right:1px;
}
.audio-tube #audio-tube-duration {
	margin-top:4px;
	margin-left:1px;
}
.audio-tube #audio-tube-progressbar {
	width:50% ;
	height:65%;
	margin:5px;
	background-color:brown;
}
.audio-tube #audio-tube-progress {
	width:0%;
	height:100%;
	background-color:green;
    display:inline-block;
}
.audio-tube #audio-tube-volume {
	width:20px ;
	height:20px;
	margin:5px;
}
.audio-tube #audio-tube-volumebar {
	width:18% ;
	height:35%;
	margin-top:10px;
	margin-right:5px;
	border-radius:20%;
	display:flex;
	background-color:brown;
}
.audio-tube #audio-tube-volumeprogress {
	width:100%;
	height:100%;
	border-radius:20%;
	background-color:green;
    display:inline-block;
}
.audio-tube #audio-tube-repeat {
	width:20px ;
	height:20px;
	margin:5px;
}



' ;



?>