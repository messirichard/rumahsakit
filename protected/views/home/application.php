<div class="outers_cont_inside_page back-white">

	<h1 style="visibilty: none; display:none;"><?php echo $this->pageTitle ?></h1>
	<div class="insides_toppage_blocks full_pg_carousel">
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		  <div class="carousel-inner" role="listbox">
		    <div class="item active">
		      <img src="<?php echo $this->assetBaseurl; ?>ill-application-1.jpg" alt="">
		      <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(1920,960, '/images/static/'. $this->setting['application_hero_background'], array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="">
		      <div class="carousel-caption">
		        <div class="blocks_text_inpagesn">
		        	<h6><b>AMARI</b> UPVC ROOF</h6>
		        	<p><?php echo $this->setting['application_hero_title']; ?></p>
		        </div>
		      </div>
		    </div>
		  </div>
		</div>
		<div class="clear"></div>
	</div>
	<?php
	$lists_applications_dta = array(
                        array(
                            'title' => 'Commercial Building',
                            'folder' => 'Commercial Building',
                            'lists' => array('ex_application_1.jpg', 'ex_application_2.jpg', 'ex_application_3.jpg', 'ex_application_4.jpg'),
                            ),
                        array(
                            'title' => 'Factory & Warehouse',
                            'folder' => 'Factory & Warehouse',
                            'lists' => array('ex_application_1.jpg', 'ex_application_2.jpg', 'ex_application_3.jpg', 'ex_application_4.jpg', 'ex_application_5.jpg'),
                            ),
                        array(
                            'title' => 'Residental',
                            'folder' => 'Residental',
                            'lists' => array('ex_application_1.jpg', 'ex_application_2.jpg', 'ex_application_3.jpg', 'ex_application_4.jpg', 'ex_application_5.jpg'),
                            ),

                    );
	$topik_app = array(
				1 => 'Commercial Building',
				2 => 'Factory & Warehouse',
				3 => 'Residential',
				);
	?>
	<section class="default_sc cont_pg_grey">
		<div class="container prelatife conts_about_top_mins">
			<div class="content-text text-center tengah">
				<!-- <h2><b>AMARI</b> UPVC ROOF APPLICATION</h2>
				<h3>ALL BUILDING WILL NEED AMARI ROOF FOR BETTER CLIMATE AND EFFICIENCY</h3> -->
				<?php echo $this->setting['application_section1_subtitle']; ?>
				<div class="h80"></div>
				<div class="blocks_application">
					
					<?php foreach ($topik_app as $kee => $valu_data): ?>
					<div class="list">
						<div class="top margin-bottom-20">
							<div class="lines-grey"></div>
							<span>Amari Application on <?php echo ucwords( $valu_data ) ?></span>
						</div>
						<?php
						$criteria = new CDbCriteria;
						$criteria->with = array('images', 'description');
						$criteria->order = 'date_input ASC';
						$criteria->addCondition('t.active = "1"');
						$criteria->addCondition('t.topik_id = :topik_id');
						$criteria->params[':topik_id'] = $kee;

						$criteria->addCondition('description.language_id = :language_id');
						$criteria->params[':language_id'] = $this->languageID;

						$datas = Gallery::model()->findAll($criteria);
						?>
						<div class="middles prelatife itemd_<?php echo $kee ?>">
							<div class="row owl-carousel owl-theme lists_OwlFeatured_data owl_<?php echo $kee ?>">
								<?php foreach ($datas as $key => $value): ?>
									<div class="col-md-12">
										<div class="items">
											<img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(296,220, '/images/gallery/'. $value->image, array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="<?php echo ucwords($valu->description->title) ?>" class="img-responsive">
										</div>
									</div>
								<?php endforeach ?>
							</div>
							<div class="customNavigation">
							  <a class="btn prev"><img src="<?php echo $this->assetBaseurl; ?>backs-chevron-leftn.png" alt="" class="img-responsive"></a>
							  <a class="btn next"><img src="<?php echo $this->assetBaseurl; ?>backs-chevron-rightn.png" alt="" class="img-responsive"></a>
							</div>
							<!-- {# end data application #} -->
						</div>
					</div>
					<div class="clear"></div>
					<?php endforeach ?>

				</div>
				<div class="clear"></div>
			</div>
		</div>
	</section>

	<div class="clear"></div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
<script type="text/javascript">
	$(function(){
		var $item = $('.full_pg_carousel .carousel .item'); 
		var $wHeight = $(window).height();
		$item.eq(0).addClass('active');
		$item.height($wHeight); 
		$item.addClass('full-screen');

		$('.full_pg_carousel .carousel img').each(function() {
		  var $src = $(this).attr('src');
		  var $color = $(this).attr('data-color');
		  $(this).parent().css({
		    'background-image' : 'url(' + $src + ')',
		    'background-color' : $color
		  });
		  $(this).remove();
		});

		$(window).on('resize', function (){
		  $wHeight = $(window).height();
		  $item.height($wHeight);
		});

		$('.carousel').carousel({
		  interval: 5000,
		  pause: "false"
		});


		var owl = $(".lists_OwlFeatured_data.owl_3");
		  owl.owlCarousel({
		          margin:0,
		          nav: true,
		          pagination: false,
		          items: 4,
		          loop: true,
		          autoPlay: true,
		          autoplayTimeout:1000,
		          autoplayHoverPause:true,
		          responsive:{
		              0:{
		                  items:1
		              },
		              600:{
		                  items:1
		              },
		              1100:{
		                  items: 3
		              },
		              1300:{
		                  items:4
		              }
		          }
		      });

			$(".blocks_application .middles.itemd_3 .next").click(function(){
				owl.trigger('owl.next');
			})
			$(".blocks_application .middles.itemd_3 .prev").click(function(){
				owl.trigger('owl.prev');
			})

		var owl2 = $(".lists_OwlFeatured_data.owl_1");
		  owl2.owlCarousel({
		          margin:0,
		          nav: true,
		          pagination: false,
		          items: 4,
		          loop: true,
		          autoPlay: true,
		          autoplayTimeout:1000,
		          autoplayHoverPause:true,
		          responsive:{
		              0:{
		                  items:1
		              },
		              600:{
		                  items:1
		              },
		              1100:{
		                  items: 3
		              },
		              1300:{
		                  items:4
		              }
		          }
		      });

			$(".blocks_application .middles.itemd_1 .next").click(function(){
				owl2.trigger('owl.next');
			})
			$(".blocks_application .middles.itemd_1 .prev").click(function(){
				owl2.trigger('owl.prev');
			})

		var owl3 = $(".lists_OwlFeatured_data.owl_2");
		  owl3.owlCarousel({
		          margin:0,
		          nav: true,
		          pagination: false,
		          items: 4,
		          loop: true,
		          autoPlay: true,
		          autoplayTimeout:1000,
		          autoplayHoverPause:true,
		          responsive:{
		              0:{
		                  items:1
		              },
		              600:{
		                  items:1
		              },
		              1100:{
		                  items: 3
		              },
		              1300:{
		                  items:4
		              }
		          }
		      });

			$(".blocks_application .middles.itemd_2 .next").click(function(){
				owl3.trigger('owl.next');
			})
			$(".blocks_application .middles.itemd_2 .prev").click(function(){
				owl3.trigger('owl.prev');
			})
	})
</script>