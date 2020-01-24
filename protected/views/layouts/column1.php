<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
	<div class="block-wrap-fcss-top-conhome prelatife">
		<?php echo $this->renderPartial('//layouts/_header', array()); ?>

		<header>
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner" role="listbox">
					<div class="carousel-item active">
						<img class="w-100" src="<?php echo $this->assetBaseurl ?>big-image.jpg" alt="">
						<div class="carousel-caption d-none d-md-block">
							<h4>Selecting The Right Apnea Treatment</h4>
							<p>For more than 10 years, Beth McFadden, a 44-year- old mother of three, lived with strange leg sensations that were not only difficult to describe, but were also uncomfortable and disruptive.</p>
						</div>
					</div>
				</div>
			</div>
		</header>

		
	<!-- end fcs -->
		<?php echo $content ?>
	<?php echo $this->renderPartial('//layouts/_footer', array()); ?>
<?php $this->endContent(); ?>