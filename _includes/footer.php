<div class="Client-Currently-Playing">
	<div class="Currently-Playing-Container">
		<div style="background-image: url(client/images/sm.jpg);"  class="Song-IMG"></div>
		<div class="Song-Information">
			<b class="Song-Playing">CURRENTLY PLAYING</b>
			<b class="Song-Name">Sicko Mode</b>
			<b class="Song-Artist">Travis Scott</b>
		</div>
		<div class="Song-Options">
			<a href="index.php" class="Song-Option Back">
				<i class="fas fa-angle-double-left"></i>
			</a>
			<a href="index.php" class="Song-Option Action">
				<i class="fas fa-pause-circle"></i>
			</a>
			<a href="index.php" class="Song-Option Skip">
				<i class="fas fa-angle-double-right"></i>
			</a>
		</div>
	</div>
</div>
<audio controls id="audio_player">
  		<source id="source_ctrl" src="client/songs/Travis Scott - SICKO MODE ft. Drake.mp3" type="audio/mpeg">
</audio>
<footer class="Client-Footer-Container">
	<div class="Footer-Options-Container">
		<a href="index.php" class="Footer-Option Home">
			<i class="fas fa-home"></i>
		</a>
		<a href="search.php" class="Footer-Option Search">
			<i class="Search_Option fas fa-search"></i>
		</a>
		<a href="login.php" class="Footer-Option Search">
			<i class="User-Option fas fa-user-circle"></i>
		</a>
	</div>
	<script src="client/js/audioplayer.js"></script>
</footer>