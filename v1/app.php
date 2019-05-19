<!-- 

	TO DO:

	X UPDATE "NOW PLAYING" CONTENT

	X PROGRAM playNextSong()

	X PROGRAM goBack() = 
		- if within the two seconds, go to previous song.
		- else back to start of song. 

	X SEARCH FUNCTIONALITY

	X SHUFFLE

	X TOGGLE SEARCH BOX DISPLAY

	- MOVE JS INTO ITS OWN FILE

	- FIX UI, SO IT LOOKS THE WAY YOU WANT IT TO

	- CLEAN UP FILES / FOLDERS AND CREATE NEW REPO






 --><!DOCTYPE html>
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
	tracklist_total = <?php include('client/tracklist.json'); ?>;

	tracklist_current = {
		search_term : '',
		tracks : []
	}


	// now playing 
	now_playing = {
		index : 0,
		song: null
	}

	//audio player
	audioPlayer = new Audio();


	// initialize app
	$(function(){

		// load current track list
		processSearch();


		// ATTACH A FUNCTION ONTO THE SEARCH BOX'S keydown() event
		$('#searchBox').keyup(processSearch);


		$('#shuffleSongs').click(shuffleSongs);

		 $('#seekslider').change(handleMarkerUpdate); 


	});


	// APP ACTIONS


	// SHUFFLE SONGS
	function shuffleSongs(){
		shuffle(tracklist_current.tracks);
		renderCurrentTrackList();
	}

	function shuffle(array) {
		array.sort(() => Math.random() - 0.5);
	}



	// PROCESS SEARCH		
	function processSearch(){

		// update search string

		var search_term = $('#searchBox').val();

		tracklist_current.search_term = search_term;

		// reset current tracklist
		tracklist_current.tracks = [];

		// go through total tracklist and add songs that meet criteria onto current tracklist
		for(var i = 0; i < tracklist_total.length; i++){
			var song = tracklist_total[i];

			var includeTrack = false;

			search_term = search_term.toUpperCase();

			// run tests
			if(song.artist.toUpperCase().indexOf(search_term) != -1) includeTrack = true;

			if(song.song.toUpperCase().indexOf(search_term) != -1) includeTrack = true;


			// if you're including the track, update global app state object "tracklist_current.tracks"
			if(includeTrack) tracklist_current.tracks.push(song);
		}


		// re-render it
		renderCurrentTrackList();

	}

	function renderCurrentTrackList(){

		var html = '';
		for(var i = 0; i < tracklist_current.tracks.length; i++){

			var song = tracklist_current.tracks[i];

			console.log(song.song)
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

	}


	function playSong(i){
		// UPDATE APP STATE: now_playing
		var song = tracklist_current.tracks[i];
		now_playing = {
			"index" : i,
			"song" : song
		};


		// PLAY SONG - UPDATE APP STATE: audioPlayer
		audioPlayer.src = song.audio;
		audioPlayer.play();
			

		// UPDATE UI HTML
		var nowPlayingHTML = 

			'<div style="background-image: url(' + song.img + ');"  class="Song-IMG"></div>' +

			'<div class="Song-Information">' +
				'<b class="Song-Playing">CURRENTLY PLAYING</b>' +
				'<b class="Song-Name">' + song.song + '</b>' +
				'<b class="Song-Artist">' + song.artist + '</b>' +
				'<div id="display_current_place"></div>' +
			'</div>' +
			'<div class="Song-Options">' +
				'<button onclick="goBack()" id="arrow-last"></button>' +
				'<button onclick="togglePlayState()" id="playpausebtn"></button>' +
				'<button onclick="playNextSong()" id="arrow-skip"></button>' +
			'</div>';

		$('.Currently-Playing-Container').html(nowPlayingHTML);



	}

	function togglePlayState() {
		if(audioPlayer.paused) {
			audioPlayer.play();
			$("#playpausebtn").css({ "background-image": "url(iCONS/pause.png)" });
		} else {
			audioPlayer.pause();
			$("#playpausebtn").css({ "background-image": "url(iCONS/play-button.png)" });
		}
	}


	function playNextSong(){

		// get current index from global app state object "now_playing" 
		var currentIndex = now_playing.index;

		// iterate current index
		currentIndex++;

		// check against "trackList" object in global app state
		if(currentIndex == tracklist_current.tracks.length) currentIndex = 0;

		playSong(currentIndex);

	}


	function goBack(){

		// get current place from global app state object "audioPlayer"
		var currentTime = audioPlayer.currentTime;

		// get current index from global app state object "now_playing"
		var currentIndex = now_playing.index;
		

		// if we're in the first two seconds AND it's not the first song
		if(currentTime < 2 && currentIndex != 0){

			// play the previous song
			playSong(currentIndex - 1);
			
		}

		else {
			// go back to beginning
			audioPlayer.currentTime = 0;
		}

	}

	function toggleSearch(){

		var is_search_displaying = $('#searchBox').css('display');

		if(is_search_displaying == 'block')  $('#searchBox').css('display', 'none');

		if(is_search_displaying == 'none')  $('#searchBox').css('display', 'block');
	}


	// HANDLE EVENTS


	audioPlayer.ontimeupdate = function(){

		// GET DISPLAY TIME
		var currentTime = sToTime(audioPlayer.currentTime);


		var duration = audioPlayer.duration;

		if(!$.isNumeric(duration)){
			$('#display_current_place').html('--');
			return;
		}


		var durationStr = sToTime(duration);


		// GET CURRENT SONG
		
		$('#display_current_place').html( currentTime + "/" + durationStr);

		// UPDATE MARKER
		var ratio = 100 * audioPlayer.currentTime / audioPlayer.duration;
		$('#seekslider')[0].value = ratio;

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


	

	// HANDLE TRACK MARKER AND VOLUME CONTROLS
	

	//toggle mute
	function mute() {
		if(audioPlayer.muted) {
			audioPlayer.muted = false;
		} else {
			audioPlayer.muted = true;
		}
	}
	//seek
	function seek(event) {
		if(seeking) {
			seekslider.value = event.clientX - seekslider.offsetLeft;
			seekto = audio.duration * (seekslider.value / 100);
			audioPlayer.currentTime = seekto;
		}
	}
	//volume
	function setvolume() {
		audioPlayer.volume = volslider.value / 100;
	}


	handleMarkerUpdate = function(){
		var place = $('#seekslider')[0].value;

		var time = place / 100 * audioPlayer.duration;

		audioPlayer.currentTime = time;
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

			<input type="text" id="searchBox" style="padding: 5px; font-size: 14px; display: none" placeholder="Search...">

			<button id="shuffleSongs"></button>

			<div class="Home-Recommended-Songs-Container">
				<div class="Recommended-Songs-Container" id="html-frame"></div>
			</div>
		</div>

	</div>

	<div>
		<input id="seekslider" onmouseup="function(){ seeking=false; }" onmousedown="function(event){ seeking=true; seek(event); }" onmousemove="function(event){ seek(event); }" type="range" min="0" max="100" value="0" step="1">
	</div>
	<div>
		<button onclick="mute()" id="mutebtn">MUTE</button>
		<div>
			<input id="volslider" onmousemove="setvolume()" type="range" min="0" max="100" value="100" step="1">	
		</div>	
	</div>


	<?php require('_includes/footer.php');?>
</body>

</html>