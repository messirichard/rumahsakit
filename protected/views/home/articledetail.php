<div id="content" class="shuttershock">

	<div class="container">
		<div class="clear height-0"></div>
		<div class="back-to-article"><a href="#">< Back</a></div>
		<div class="clear height-10"></div>
		<div class="row" id="detail-products">
			<div class="col-md-6 no-padding images">
				<img width="100%" height="auto" src="<?php echo $this->assetBaseurl; ?>products-sample.jpg" />
			</div>

			<div class="col-md-6">

				<h2 class="upp color2">Judul Berita</h2>
				<div class="clear clearfix" style="height:30px;"></div>
				<div id="itemDetails">
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non unde sint odio magnam, placeat deleniti sapiente ipsa vero est repellat eius earum inventore at, nisi hic doloremque nostrum ipsam suscipit.
						<br>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non unde sint odio magnam, placeat deleniti sapiente ipsa vero est repellat eius earum inventore at, nisi hic doloremque nostrum ipsam suscipit.
					</p>

					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non unde sint odio magnam, placeat deleniti sapiente ipsa vero est repellat eius earum inventore at, nisi hic doloremque nostrum ipsam suscipit.
						<br>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non unde sint odio magnam, placeat deleniti sapiente ipsa vero est repellat eius earum inventore at, nisi hic doloremque nostrum ipsam suscipit.
					</p>

					<h5 class="title-products upp">share this</h5>

					<a href="#"><img src="<?php echo $this->assetBaseurl; ?>facebook.png" /></a>

					<a href="#"><img src="<?php echo $this->assetBaseurl; ?>twitter.png" /></a>
					<div class="clear"></div>
				</div> <!-- #itemDetails-->

			</div>

		</div><!-- #detail-products -->

		<hr />

		<h5 class="text-center title-products upp">Other Articles</h5>

		<div id="list-products" class="container">
			<div class="row">
			<?php for( $i = 0;$i<4;$i++ ) : ?>
				<div class="col-md-3 products">
					<a href="#"><img class="img-responsive" height="auto" src="<?php echo $this->assetBaseurl; ?>articles-sample.jpg" /></a>
					<p><a href="#">Title Article</a></p>
				</div>
			<?php endfor ?>
			</div>

			<div id="testimoni" class="text-center">
				<p>Use this space to spread<br />Consumer testimonial about MamaBear</p>
				<span>TARRA NADHIRA</span>
			</div>

		</div><!-- #list-products -->

	</div><!-- .container -->

	</div><!-- #content -->
