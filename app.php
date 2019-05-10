<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Basic JS Architecture</title>

			<link href="./client/css/html.css" type="text/css" rel="stylesheet">
			<link href="./html.css" type="text/css" rel="stylesheet">



<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<script>


		var numbers = {
			key1 : 'value 1',
			key2 : 'value 2'
		}


		// DEFINE OUR DATA OBJECT
		// JAVASCRIPT OBJECT NOTATION (JSON)

		var songs = 	[
														
							// songs[0]
							{
								song: "Church Oragon",
								artist : "Baxter Media",
								img: 'client/images/gc.jpg',
								likes: "0",
								replays: "0",
								audio: 'churchoragon.mp3'
							},

							
							// songs[1]
							{
								song: "Emilyblenk",
								artist: "Baxter Media",
								img: 'client/images/fls.png',
								likes: "0",
								replays: "0",
								audio: 'emilyblenk.mp3'
							},

							// songs[2]
							{
								song: "Mobile Games",
								artist: "Baxter Media",
								img : 'client/images/xotl.jpg',
								likes: "0",
								replays: "0",
								audio: 'Mobile Games.mp3'
							}
						];



		// start our empty html string
		/*<div class="Recommended-Song">
							<div style="background-image: url(client/images/gc.jpg);"  class="Song-IMG"></div>
							<div class="Song-Information">								
								<b class="Song-Name">Gucci Gang</b>
								<b class="Song-Artist">Lil Pump</b>
								<div class="Song-Data">
									<div class="Liked">
										<img src="client/images/icons/liked.png" />
										<b class="Song-Liked-Amount">5</b>
									</div>
									<div class="Replay">
										<img src="client/images/icons/replays.png" />
										<b class="Song-Replay-Amount">5k+</b>
									</div>
								</div>
							</div>
						</div> */

		var html = '';

		
		for(var i = 0; i < songs.length; i++){

			var song = songs[i];
			
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

		//audio player
		audio = new Audio();
		//playing song when clicked
		function playSong(i){
			var song = songs[i];
			audio.src = song.audio;
			console.log(song.audio);
			audio.play();
		}
		

		

	
		// WAIT UNTIL THE PAGE HAS LOADED
		$(function(){
					
			// AND THEN RUN THIS...
			var element = $('#html-frame');

			element.html(html);

			element.css('color', 'red');

		});


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
	</div>
	<?php require('_includes/footer.php');?>
</body>

</html>