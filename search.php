<?php
	// require("server/database.php");

	require('_includes/header.php');
?>
		<div class="Client_Page_Container">
			<div class="Client_Home_Container">
				<div class="Search_Bar_Container">
					<input class="Search_Input" placeholder="Search by Artist, Song, Playlist" />
				</div>
				<div class="Search_Results_Container">
					<div class="Results_Container_Group">
						<div class="Search_Group">Songs</div>
						<div class="Result">
							<div style="background-image: url(client/images/sm.jpg);" class="Song_Picture"></div>
							<div class="Title">Sicko Mode</div>
							<div class="Search_Artist">Travis Scott</div>
						</div>
						<div class="Result">
							<div style="background-image: url(client/images/sm.jpg);" class="Song_Picture"></div>
							<div class="Title">Sicko Mode</div>
							<div class="Song_Artist Search_Artist">Travis Scott</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php require('_includes/footer.php');?>
	</body>
</html>