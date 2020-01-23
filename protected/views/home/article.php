<div id="content" class="shuttershock">

	<div class="container small-width">

		<?php for( $j = 0; $j< 4;$j++ ) : ?>

			<div class="row articles">

				<div class="col-md-5">

					<img class="img-responsive" width="100%" height="auto" src="<?php echo $this->assetBaseurl; ?>articles-sample.jpg" />

				</div>

				<div class="col-md-7">

					<span class="upp">category</span>

					<h3 class="upp color2">judul artikel</h3>

					<article>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni perferendis pariatur molestias dicta, et quisquam, ex odio est ad in, praesentium explicabo facilis totam dolor. Ducimus dignissimos provident, rem nemo?
					</article>

					<a class="btn btn-bear upp" href="#">read more</a>

				</div>

			</div><!-- .row -->

		<?php endfor ?>

		<div id="paging">
			
			<div class="col-md-4 text-left"><a class="btn btn-bear2 upp" href="#">newer</a></div>

			<div class="col-md-4"></div>

			<div class="col-md-4 text-right"><a class="btn btn-bear3 upp" href="#">older</a></div>

		</div>

		<div id="testimoni" class="text-center">
			<p>Use this space to spread<br />Consumer testimonial about MamaBear</p>
			<span>TARRA NADHIRA</span>
		</div>

	</div><!-- .container -->

</div><!-- #content -->