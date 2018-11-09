<?php
	// require("server/database.php");

	require('_includes/header.php');
?>
		<div class="Client_Page_Container">
			<div class="Client_Home_Container">
				<!-- SPONSORED CONTAINER -->
				<div class="Home_Sponsored_Container">
					<!-- YOUNG THUG -->
					<!-- <div class="Sponsored_Text_Container">
						<b class="Sponsored_Artist_Text">YOUNG THUG</b>
						<b class="Sponsored_Song_Text">Jeffery</b>
					</div> -->

					<!-- TRAVIS SCOTT -->
					<div class="Sponsored_Text_Container">
						<b class="Sponsored_Artist_Text">TRAVIS SCOTT</b>
						<b class="Sponsored_Song_Text">Astroworld</b>
					</div>

					<!-- DRAKE -->
					<!-- <div class="Sponsored_Text_Container">
						<b class="Sponsored_Artist_Text">DRAKE</b>
						<b class="Sponsored_Song_Text">We made it</b>
					</div> -->

					<!-- TYLER THE CREATOR -->
					<!-- <div class="Sponsored_Text_Container">
						<b class="Sponsored_Artist_Text">TYLER THE CREATOR</b>
						<b class="Sponsored_Song_Text">Who dat boi</b>
					</div> -->

					<!-- ARIANA GRANDE -->
					<!-- <div class="Sponsored_Text_Container">
						<b class="Sponsored_Artist_Text">ARIANA GRANDE</b>
						<b class="Sponsored_Song_Text">God is a woman</b>
					</div> -->
					<div class="Sponsored_Artist_IMG" style="background-image: url(client/images/travis.jpg);"></div>
					<div class="Sponsored_ViewMore">
						<b class="ViewMore">View More</b>
					</div>
					<div class="Sponsored_Circles">
						<div class="Circle_ _Selected 1"></div>
						<div class="Circle_ 2"></div>
						<div class="Circle_ 3"></div>
					</div>
				</div>

				<!-- RECOMMENDED ARTIST CONTAINER -->
				<div class="Home_Recommended_Artist_Container">
					<div class="Title_Container">
						<b class="TextStyle_Title">Recommended Artists</b>
					</div>
					<div class="Recommended_Artists_Container">
						<div class="Recommended_Artist">
							<div style="background-image: url(client/images/ytj.jpg);" class="Artist_IMG"></div>
						</div>
						<div class="Recommended_Artist">
							<div style="background-image: url(client/images/ttcfb.png);" class="Artist_IMG"></div>
						</div>
						<div class="Recommended_Artist">
							<div style="background-image: url(client/images/ag.jpg);" class="Artist_IMG"></div>
						</div>
						<div class="Recommended_Artist">
							<div style="background-image: url(client/images/ck.jpg);" class="Artist_IMG"></div>
						</div>
						<div class="Recommended_Artist">
							<div style="background-image: url(client/images/drakepfp.jpg);" class="Artist_IMG"></div>
						</div>
						<div class="Recommended_Artist">
							<div style="background-image: url(client/images/travis.jpg);" class="Artist_IMG"></div>
						</div>
						<div class="Recommended_Artist">
							<div style="background-image: url(client/images/ba.jpg);" class="Artist_IMG"></div>
						</div>
					</div>
				</div>

				<!-- Recommended SONGS CONTAINER -->
				<div class="Home_Recommended_Songs_Container">
					<div class="Title_Container">
						<b class="TextStyle_Title">Recommended Songs</b>
					</div>
					<div class="Recommended_Songs_Container">

						<div class="Recommended_Song Lil Pump - Gucci Gang">
							<div style="background-image: url(client/images/gc.jpg);"  class="Song_IMG"></div>
							<div class="Song_Information">								
								<b class="Song_Name">Gucci Gang</b>
								<b class="Song_Artist">Lil Pump</b>
								<b class="Song_Trending">TRENDING</b>
							</div>
						</div>

						<div class="Recommended_Song Childish Gambino - Feels Like Summer">
							<div style="background-image: url(client/images/fls.png);"  class="Song_IMG"></div>
							<div class="Song_Information">
								<b class="Song_Name">Feels Like Summer</b>
								<b class="Song_Artist">Childish Gambino</b>
							</div>
						</div>

						<div class="Recommended_Song Lil Uzi Vert - XO Tour Life">
							<div style="background-image: url(client/images/xotl.jpg);"  class="Song_IMG"></div>
							<div class="Song_Information">
								<b class="Song_Name">XO Tour Lif3</b>
								<b class="Song_Artist">Lil Uzi Vert</b>
							</div>
						</div>

						<div class="Recommended_Song Lil Pump - Gucci Gang">
							<div style="background-image: url(client/images/gp.jpg);"  class="Song_IMG"></div>
							<div class="Song_Information">
								<b class="Song_Name">God's Plan</b>
								<b class="Song_Artist">Drake</b>
							</div>
						</div>

						<div class="Recommended_Song Travis Scott - Sicko Mode">
							<div style="background-image: url(client/images/sm.jpg);"  class="Song_IMG"></div>
							<div class="Song_Information">
								<b class="Song_Name">Sicko Mode</b>
								<b class="Song_Artist">Travis Scott</b>
							</div>
						</div>

						<div class="Recommended_Song 21 Savage - Bank Account">
							<div style="background-image: url(client/images/ba.jpg);"  class="Song_IMG"></div>
							<div class="Song_Information">
								<b class="Song_Name">Bank Account</b>
								<b class="Song_Artist">21 Savage</b>
							</div>
						</div>

						<div class="Recommended_Song XXXTentacion - SAD!">
							<div style="background-image: url(client/images/sad.jpg);"  class="Song_IMG"></div>
							<div class="Song_Information">
								<b class="Song_Name">SAD!</b>
								<b class="Song_Artist">XXXTentacion</b>
							</div>
						</div>

						<div class="Recommended_Song Juice WRLD - Lucid Dreams">
							<div style="background-image: url(client/images/ld.jpg);"  class="Song_IMG"></div>
							<div class="Song_Information">
								<b class="Song_Name">Lucid Dreams</b>
								<b class="Song_Artist">Juice WRLD</b>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php require('_includes/footer.php');?>
	</body>
</html>