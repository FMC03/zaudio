<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Basic JS Architecture</title>

			<link href="./client/css/html.css" type="text/css" rel="stylesheet">
			<link href="./html.css" type="text/css" rel="stylesheet">



<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<script>


	// DEFINE OUR APP STATE

	// tracklist
	tracklist = <?php include('client/tracklist.json'); ?>;

	// now playing 
	now_playing = {
		index : 0,
		song: tracklist[0]
	}

	//audio player
	audio = new Audio();



	// initialize app
	$(function(){

		var html = '';

		
		for(var i = 0; i < tracklist.length; i++){

			var song = tracklist[i];
			
			html 	+= 	'<div class="Recommended-Song" onclick="playSong(' + i + ')">' + 	
							'<div style="background-image: url('+ song.img +');"  class="Song-IMG"></div>' +
							'<div class="Song-Information">'+
								'<b class="Song-Name">' + song.song	 + '</b>' +
								'<b class="Song-Artist">' + song.artist	 + '</b>' +
								'<div class="Song-Data">' + 
									'<div class="Liked">' +
										'<img src="client/images/icons/liked.png" />' +
										'<b class="Song-Replay-Amount">' + song.likes + '</b>' +
									'</div>' +
									'<div class="Replay">' +
										'<img src="client/images/icons/replays.png"/>' +
										'<b class="Song-Replay-Amount">' + song.replays + '</b>' +
									'</div>'+
								'</div>' +
							'</div>' +
						'</div>';

		}

		// AND THEN RUN THIS...
		$('#html-frame').html(html);

	});


	// APP ACTIONS

	function playSong(i){
		var song = tracklist[i];
		audio.src = song.audio;
		console.log(song.audio);
		audio.play();

		// update app state
		now_playing = {
			"index" : i,
			"song" : song
		};
	}

	function playPause() {
		if(audio.paused) {
			audio.play();
			$("#playpausebtn").css({ "background-image": "url(icons/pause.png)" });
		} else {
			audio.pause();
			$("#playpausebtn").css({ "background-image": "url(icons/play-button.png)" });
		}
	}

	// HANDLE EVENTS


	audio.ontimeupdate = function(){

		console.log('are we running?')

		// GET DISPLAY TIME
		var currentTime = sToTime(audio.currentTime);
		var duration = sToTime(audio.duration);


		// GET CURRENT SONG
		var title = now_playing.song.song + ' - ' + now_playing.song.artist;

		$('#display_current_place').html(title + '<br />' + currentTime + "/" + duration);


		// UPDATE MARKER
		// var ratio = 100 * audio.currentTime / audio.duration;
		// $('#seekslider')[0].value = ratio;

	}
	


	// UTILITY FUNCTIONS
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


		
		

	


	</script>

</head>

<body>
	<?php
	// require("server/database.php");
	require('_includes/header.php');
	?>
	<div class="Client-Page-Container">
		<div class="Client-Home-Container">
			<div class="Home-Recommended-Songs-Container">
				<div class="Title-Container">
						<b class="TextStyle-Title">Recommended Songs</b>
				</div>
					<div class="Recommended-Songs-Container" id="html-frame">
					</div>
			</div>
		</div>
			<div id="display_current_place"></div>

	</div>


	<?php require('_includes/footer.php');?>
</body>

</html>