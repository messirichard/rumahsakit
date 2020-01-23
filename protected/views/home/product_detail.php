<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.2.15/css/lightgallery.css"/>
<div id="content" class="shuttershock">

	<div class="container">

		<div class="row" id="detail-products">

			<div class="col-md-6 no-padding images">
				
				<img width="100%" height="auto" src="<?php echo $this->assetBaseurl; ?>products-sample.jpg" />

				<div style="margin-top:18px">
					
					<?php for( $i=0;$i<3;$i++ ) : ?>
					<div class="col-md-4 col-sm-4 product-slide-cover">
						<div class="product-slide"></div>
					</div>
					<?php endfor ?>
					<!-- contoh slide di script bawah -->
				</div>
				<div class="clear"></div>

			</div>

			<div class="col-md-6">

				<h2 class="upp color2">teh pelancar asi</h2>
				<p class="color1 pricing">IDR 30.000</p>

				<div id="toCart">

					<form action="cart.php" method="get">

						<label class="qty-label" for="qty">Quantity</label>

						<input type="number" name="qty" maxlength="3" class="form-control qty" />

						<input type="submit" value="add to cart" class="upp btn btn-bear" />

					</form>

				</div>

				<div id="itemDetails">

					<h5 class="title-products upp">item details</h5>

					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non unde sint odio magnam, placeat deleniti sapiente ipsa vero est repellat eius earum inventore at, nisi hic doloremque nostrum ipsam suscipit.
					</p>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non unde sint odio magnam, placeat deleniti sapiente ipsa vero est repellat eius earum inventore at, nisi hic doloremque nostrum ipsam suscipit.
					</p>

					<h5 class="title-products upp">share this</h5>

					<a href="#"><img src="<?php echo $this->assetBaseurl; ?>facebook.png" /></a>

					<a href="#"><img src="<?php echo $this->assetBaseurl; ?>twitter.png" /></a>

				</div> <!-- #itemDetails-->

			</div>

		</div><!-- #detail-products -->

		<hr />

		<h5 class="text-center title-products upp">featured products</h5>

		<div id="list-products" class="container">
		<div class="row">
			<?php for( $i = 0;$i<3;$i++ ) : ?>
				<div class="col-md-4 col-sm-6 products">
					<a href="#"><img width="100%" height="auto" src="<?php echo $this->assetBaseurl; ?>products-sample.jpg" /></a>
					<p><a href="#">TEH PELANCAR ASI</a></p>
					<span>IDR 30.000</span>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.2.15/js/lightgallery-all.min.js"></script>
<script>
	 $(document).ready(function() {
		$(".light-gallery").lightGallery({
			thumbnail:false,
		    animateThumb: false,
		    showThumbByDefault: false
		});
	});
</script>
