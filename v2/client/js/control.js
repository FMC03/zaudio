// DEFINE OUR APP STATE

	// tracklist
	tracklist_total = $.getJSON("list.json");

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
		// $('#searchBox').keyup(processSearch);


		// $('#shuffleSongs').click(shuffleSongs);

		//  $('#seekslider').change(handleMarkerUpdate); 


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

		var search_term = $('#search-box').val();

		tracklist_current.search_term = search_term;

		// reset current tracklist
		tracklist_current.tracks = [];

		// go through total tracklist and add songs that meet criteria onto current tracklist
		for(var i = 0; i < tracklist_total.length; i++){
			console.log('hi')
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
		$('#htmlframe').html(html);

	}