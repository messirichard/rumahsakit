<div class="outers-middle-contents back-white">
	<div class="prelatife container">
		<div class="clear height-20"></div>		
		<div class="breadcrumbs">
			<ol class="breadcrumb">
			  <li><a href="<?php echo CHtml::normalizeUrl(array('/home/index')); ?>">Home</a></li>
			  <li class="active">Production Facility</li>
			</ol>
			<div class="clear"></div>
		</div>

		<div class="clear height-50"></div><div class="height-25"></div>

		<div class="outer-insides-pages">
			<div class="content-text text-center top-insides-contentfoll">
				<h1 class="titlepages"><?php echo $this->setting['facility_hero_title']; ?></h1>				
				<div class="clear"></div>
				<?php echo $this->setting['facility_hero_content']; ?>
				
				<div class="clear height-50"></div><div class="height-5"></div>
				<div class="clear"></div>
			</div>
			<div class="outer-facility-listing">
				<?php if ($data): ?>
				<?php foreach ($data  as $key => $value): ?>
				<div class="itemss">
						<div class="row">
							<div class="col-md-6">
								<div class="picts padding-left-40"><img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(513, 319, '/images/gallery/'. $value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="" class="img-responsive"></div>
							</div>
							<div class="col-md-6">
								<div class="blocks-title"> <div class="clear height-20"></div>
									<span><?php echo $value->description->title; ?></span>
								</div>
								<div class="clear height-30"></div>
								<div class="desc">
									<?php echo $value->description->content; ?>
									<div class="clear height-10"></div>
									<div id="light-gallery" class="tlight-gallery">
										<?php if (count($value->images) > 0): ?>
											<?php foreach ($value->images as $key1 => $value1): ?>
											<?php if ($key1 == 0): ?>
												<a data-sub-html="<?php echo $value->description->title ?>" href="<?php echo Yii::app()->baseUrl; ?>/images/gallery/<?php echo $value1->image; ?>">
													<img src="<?php echo $this->assetBaseurl; ?>view-more-image-facility.png" alt="">
												</a>
											<?php else: ?>
												<a data-sub-html="<?php echo $value->description->title ?>" href="<?php echo Yii::app()->baseUrl; ?>/images/gallery/<?php echo $value1->image; ?>"></a>
											<?php endif; ?>
											<?php endforeach ?>
										<?php else: ?>
											<!-- <a href="#">
												<img src="<?php echo $this->assetBaseurl; ?>view-more-image-facility.png" alt="">
											</a> -->
										<?php endif ?>
									</div>

								</div>

							</div>
						</div>
					</div>
					<?php endforeach ?>
				<?php endif ?>

				<div class="clear"></div>
			</div>


		<div class="clear height-20"></div>

		<div class="clear"></div>
	</div>
</div>
	
	<link rel="stylesheet"  href="<?php echo Yii::app()->baseUrl; ?>/asset/js/light-gallery/css/lightGallery.css"/>
    <script src="<?php echo Yii::app()->baseUrl; ?>/asset/js/light-gallery/js/lightGallery.js"></script>
    <script>
    	 $(document).ready(function() {
			$(".tlight-gallery").lightGallery({
			    thumbnail:false,
			    animateThumb: false,
			    showThumbByDefault: false,
			    // mode: 'lg-zoom-out',
			});
		});
    </script>