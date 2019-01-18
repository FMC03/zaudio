<?php
	// require("server/database.php");

	require('_includes/header.php');
?>
		<div class="Client_Page_Container">
			<div class="Client_Container">
				<div class="Search_Bar_Container">
					<input class="Search_Input" placeholder="Search by Artist, Song, Playlist" />
				</div>
				<div class="Search_Result_Container">
					<div class="Result_Contianer">
						<div style="background-image: url(client/images/ttcfb.png);"  class="Song_IMG"></div>
						<div class="Song_Information">
							<b class="Song_Name">Who Dat Boy</b>
							<b class="Song_Artist">Tyler The Creator</b>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php require('_includes/footer.php');?>
	</body>
</html>