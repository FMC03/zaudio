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
								song: "Gucci Gang",
								artist : "Lil Pump",
								img: 'client/images/gc.jpg',.
								likes: "5",
								replays: "5k+"
								audio: 
							},

							
							// songs[1]
							{
								song: "Feels Like Summer",
								artist: "Childish Gambino",
								img: 'client/images/fls.png',
								likes: "1.3k+",
								replays: "5k+"
								audio:
							},

							// songs[2]
							{
								song: "XO Tour Lif3",
								artist: "Lil Uzi Vert",
								img : 'client/images/xotl.jpg',
								likes: "2k+",
								replays: "5k+",
								audio:
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
			
			html 	+= 	'<div class="Recommended-Song">' + 	
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


		

		

	
		// WAIT UNTIL THE PAGE HAS LOADED
		$(function(){
					
			// AND THEN RUN THIS...
			var element = $('#html-frame');

			element.html(html);

			element.css('color', 'red');

			element.click(function(){
				alert('click!!!')
			})

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