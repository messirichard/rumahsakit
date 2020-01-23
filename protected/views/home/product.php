<div id="content" class="shuttershock">
	<div class="container" id="products-page">
		<div class="row">
			<div class="col-md-2 din" id="left-menu">
				<span>Browse Categories</span>
				<ul>
					<?php for( $i = 1; $i< 7; $i++ ) : ?>

						<li><a class="upp <?php echo $i == 1 ? 'active' : '' ?>" href="#">product category <?php echo $i ?></a></li>

					<?php endfor ?>
				</ul>
			</div>
			<div class="col-md-10">

				<div class="row">
				<div class="bear-capt neutraLight">
					<p>Use this space to spread MamaBear awesomeness!</p>
					<p>Explain it in a fancy & simple sentences</p>
				</div>
				</div>

				<div class="row product-option">
					<div class="col-md-3">
						<label class="color1">Sort by</label>
						<select name="order" class="form-control">
							<option>Newest First</option>
						</select>
					</div>

					<div class="col-md-2">
					<label class="color1">Show per page</label>
						<select name="order" class="form-control">
							<option>15</option>
							<option>25</option>
							<option>50</option>
						</select>
					</div>
				</div>

				<div id="list-products" class="row">
			
					<?php for( $i = 0;$i<8;$i++ ) : ?>
						<div class="col-md-4 col-sm-6 products">

							<?php if( $i == 4 || $i == 2 || $i == 0 ) : ?>
							<div class="product-label <?php echo $i == 4 ? 'bg2' : 'bg1' ?>"><p>new</p></div>
							<?php endif ?>
							
							<a href="<?php echo CHtml::normalizeUrl(array('home/detailproduct')); ?>"><img width="100%" height="auto" src="<?php echo $this->assetBaseurl; ?>products-sample.jpg" /></a>
							<p><a href="<?php echo CHtml::normalizeUrl(array('home/detailproduct')); ?>">TEH PELANCAR ASI</a></p>
							<span>IDR 30.000</span>
						</div>
					<?php endfor ?>

				</div><!-- #list-products -->
			</div>
		</div>
	</div><!-- .container -->

	<h5 class="text-center title-products " style="margin-top:90px">FEATURED PRODUCTS</h5>

		<div id="list-products" class="container">
			
			<?php for( $i = 0;$i<3;$i++ ) : ?>
				<div class="col-md-4 col-sm-6 products">
					<div class="product-label bg1"><p>new</p></div>
					<a href="detail-products.php"><img width="100%" height="auto" src="<?php echo $this->assetBaseurl; ?>products-sample.jpg" /></a>
					<p><a href="detail-products.php">TEH PELANCAR ASI</a></p>
					<span>IDR 30.000</span>
				</div>
			<?php endfor ?>

		</div><!-- #list-products -->

	<div class="clear"></div>

	<div id="testimoni" class="text-center">
		<p>Use this space to spread<br />Consumer testimonial about MamaBear</p>
		<span>TARRA NADHIRA</span>
	</div>

</div><!-- #content -->