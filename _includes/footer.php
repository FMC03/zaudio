<div class="Client-Currently-Playing">
	<div class="Currently-Playing-Container">

		<div style="background-image: url(client/images/sm.jpg);"  class="Song-IMG"></div>

		<div class="Song-Information">
			<b class="Song-Playing">CURRENTLY PLAYING</b>
			<b class="Song-Name">Sicko Mode</b>
			<b class="Song-Artist">Travis Scott</b>
		</div>
		<div class="Song-Options">
			<button onclick="goBack()" id="arrow skip">PREV</button>
			<button onclick="togglePlayState()" id="playpausebtn" >PLAY / PAUSE</button>
			<button onclick="playNextSong()" id="arrow last">NEXT</button>
		</div>
	</div>
</div>

<footer class="Client-Footer-Container">
	<div class="Footer-Options-Container">
		<a href="app.php" class="Footer-Option Home">
			<i class="fas fa-home"></i>
		</a>
		<a onclick="toggleSearch()" class="Footer-Option Search">
			<i class="Search_Option fas fa-search"></i>
		</a>
		<a href="login.php" class="Footer-Option Search">
			<i class="User-Option fas fa-user-circle"></i>
		</a>
	</div>
	<script src="client/js/audioplayer.js"></script>
</footer>