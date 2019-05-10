<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Basic JS Architecture</title>

			<link href="./client/css/html.css" type="text/css" rel="stylesheet">
			<link href="./music.css" type="text/css" rel="stylesheet">



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
								song: "Church Oragan",
								artist : "Baxer Academy Music Cluster",
								img: 'client/images/gc.jpg',
								likes: "0",
								replays: "0"
							},

							
							// songs[1]
							{
								song: "Jazzy 01",
								artist: "Baxter Academy Music Cluster",
								img: 'client/images/fls.png',
								likes: "0",
								replays: "0"
							},

							// songs[2]
							{
								song: "Emily Blenk",
								artist: "Baxter Academy Music Cluster",
								img : 'client/images/xotl.jpg',
								likes: "0",
								replays: "0",
							}
						];



		// start our empty html string
		/*<div class="Recommended_Song">
							<div style="background-image: url(client/images/gc.jpg);"  class="Song_IMG"></div>
							<div class="Song_Information">								
								<b class="Song_Name">Gucci Gang</b>
								<b class="Song_Artist">Lil Pump</b>
								<div class="Song_Data">
									<div class="Liked">
										<img src="client/images/icons/liked.png" />
										<b class="Song_Liked_Amount">5</b>
									</div>
									<div class="Replay">
										<img src="client/images/icons/replays.png" />
										<b class="Song_Replay_Amount">5k+</b>
									</div>
								</div>
							</div>
						</div> */

		var html = '';



		for(var i = 0; i < songs.length; i++){

			var song = songs[i];
			
			html 	+= 	'<div class="Recommended_Song">' + 	
							'<div style="background-image: url('+ song.img +');"  class="Song_IMG"></div>' +
							'<div class="Song_Information">'+
								'<b class="Song_Name">' + song.song	 + '</b>' +
								'<b class="Song_Artist">' + song.artist	 + '</b>' +
								'<div class="Song_Data">' + 
									'<div class="Liked">' +
										'<img src="client/images/icons/liked.png" />' +
										'<b class="Song_Replay_Amount">' + song.likes + '</b>' +
									'</div>' +
									'<div class="Replay">' +
										'<img src="client/images/icons/replays.png" />' +
										'<b class="Song_Replay_Amount">' + song.replays + '</b>' +
									'</div>'+
								'</div>' +
						'</div>';

		}


		

		

	
		// WAIT UNTIL THE PAGE HAS LOADED
		$(function(){
					
			// AND THEN RUN THIS...
			var element = $('#html_frame');

			element.html(html);

			element.css('color', 'red');

			element.click(function(){
				alert('click!!!')
			})

		});


	</script>

</head>
<body>
	<div class="Client_Page_Container">
		<div class="Client_Home_Container">
			<div id="html_frame"></div>
		</div>
	</div>
	
</body>
</html>