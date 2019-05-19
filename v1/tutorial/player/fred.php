<!DOCTYPE html>
<html>
<head>
	<title>fred</title>
<meta charset="UTF-8">
<!--
<div>Icons made by <a href="https://www.flaticon.com/authors/daniele-de-santis" title="Daniele De Santis">Daniele De Santis</a> from <a href="https://www.flaticon.com/" 		    title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" 		    title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>
-->
<!--tutorial for seek slider: https://www.developphp.com/video/JavaScript/Audio-Seek-and-Volume-Range-Slider-Tutorial -->


<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>


<style>
	body {
		width: 100%;
	}

	/*inputs */
	.input {
		outline: none;
	}

	.input #seekslider{
		width: 100%;
	}

	.input #volslider{
	width: 80px;
	}

	input[type='range'] {
    	-webkit-appearance: none !important;
		margin:0px;
		padding:0px;
    	background: #333;
    	height:3px;
		border-bottom:#333 1px solid;
	}
	
	input[type='range']::-ms-fill-lower  {
		background:#333;
	}

	input[type='range']::-ms-fill-upper  {
		background:#333;
	}
	
	input[type='range']::-moz-range-track {
		border:none;
    	background: #333;
	}	

	input[type='range']::-webkit-slider-thumb {
    	-webkit-appearance: none !important;
    	background: radial-gradient(#FFF, #333);
    	height:11px;
    	width:11px;
		border-radius:100%;
		cursor:pointer;
	}

	input[type='range']::-moz-range-thumb {
    	background: radial-gradient(#FFF, #333);
    	height:11px;
    	width:11px;
		border-radius:100%;
		cursor:pointer;
	}

	input[type='range']::-ms-thumb {
    	-webkit-appearance: none !important;
    	background: radial-gradient(#FFF, #333);
    	height:11px;
    	width:11px;
		border-radius:100%;
		cursor:pointer;
	}

	button{
		border: none;
		cursor:pointer;
		max-width:100%;
		max-height:100%;
		outline:none;
		
	}

	button#playpausebtn{
		background:url(icons/play-button.png) no-repeat;
		height: 40px;
		width: 40px; 
		background-size: cover;
	}

	button#mutebtn{
		background:url(icons/speaker.png) no-repeat;
		height: 30px;
		width: 30px; 
		background-size: cover;
	}
</style>
<script>
	var audio, playbtn, mutebtn, seekslider, volumeslider, seeking=false, seekto;



	function startAudioPlayer() {

		// invisible audio icon
		audio = new Audio();
		audio.src = "../../../1.mp3";


		audio.ontimeupdate = markerUpdate;



		 $('#seekslider').change(handleMarkerUpdate); 

		// set object refrences
		

		
		//functions
		
		
		// event handling

		//var el = document.getElementById('overlayBtn');
			//if(el){
  			//el.addEventListener('click', swapper, false);
		//}

		//mutebtn.addEventListener("click", mute);
	}
	//toggle play
	function playPause() {
		if(audio.paused) {
			audio.play();
			$("#playpausebtn").css({ "background-image": "url(icons/pause.png)" });
		} else {
			audio.pause();
			$("#playpausebtn").css({ "background-image": "url(icons/play-button.png)" });
		}
	}
	//toggle mute
	function mute() {
		if(audio.muted) {
			audio.muted = false;
		} else {
			audio.muted = true;
		}
	}
	//seek
	function seek(event) {
		if(seeking) {
			seekslider.value = event.clientX - seekslider.offsetLeft;
			seekto = audio.duration * (seekslider.value / 100);
			audio.currentTime = seekto;
		}
	}
	//volume
	function setvolume() {
		audio.volume = volslider.value / 100;
	}

	markerUpdate = function(){
				
		// GET DISPLAY TIME
		var currentTime = sToTime(audio.currentTime);
		var duration = sToTime(audio.duration);
		$('#display_current_place').html(currentTime + "/" + duration);


		// UPDATE MARKER
		var ratio = 100 * audio.currentTime / audio.duration;
		$('#seekslider')[0].value = ratio;

	}

	handleMarkerUpdate = function(){
		var place = $('#seekslider')[0].value;

		var time = place / 100 * audio.duration;

		audio.currentTime = time;
	}

	function sToTime(t) {
		var s =	padZero(parseInt((t / (60 * 60)) % 24)) + ":" +
				padZero(parseInt((t / (60)) % 60)) + ":" + 
				padZero(parseInt((t) % 60));

		var formattedTime = '';
		var copy = false;
		for(var i = 0; i < s.length; i++){
			var char = s.charAt(i);
			if(copy) formattedTime += char;

			else {
				if(char != '0' && char != ':') {
					copy = true;
					formattedTime += char;					
				}

				else if(i == 4) {
					copy = true;
					formattedTime += char;					
				}
			}
		}

		return formattedTime;
	}


	function padZero(v) {
		return (v < 10) ? "0" + v : v;
	}

	$(startAudioPlayer);

</script>


</head>
<body>
	<div>
		<button onclick="playPause()" id="playpausebtn"></button>


		<div id="display_current_place"></div>


		<div>
			<input id="seekslider" onmouseup="function(){ seeking=false; }" onmousedown="function(event){ seeking=true; seek(event); }" onmousemove="function(event){ seek(event); }" type="range" min="0" max="100" value="0" step="1">
		</div>
	</div>
	<div>
		<button onclick="mute()" id="mutebtn"></button>
		<div>
			<input id="volslider" onmousemove="setvolume()" type="range" min="0" max="100" value="100" step="1">	
		</div>	
	</div>
	<div class="todo">
		
		<b style="font-size: 16px">To Do:</b>
		<br /><br />

		<ol>
			<li>Toggle play / pause icon.</li>
			<li>Add track place / total length.</li>
			<li>Update slider position when song plays.</li>


		</ol>
		<div>Icons made by <a href="https://www.flaticon.com/authors/daniele-de-santis" title="Daniele De Santis">Daniele De Santis</a> from <a href="https://www.flaticon.com/" 		    title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" 		    title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>
	</div>
</body>
</html>