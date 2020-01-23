<div class="outers_cont_inside_page back-white">

	<h1 style="visibilty: none; display:none;"><?php echo $this->pageTitle ?></h1>
	<div class="insides_toppage_blocks full_pg_carousel">
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		  <div class="carousel-inner" role="listbox">
		    <div class="item active">
		      <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(1920,960, '/images/static/'. $this->setting['install_hero_background'], array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="">
		      <div class="carousel-caption">
		        <div class="blocks_text_inpagesn">
		        	<h6><b>AMARI</b> UPVC ROOF</h6>
		        	<p><?php echo $this->setting['install_hero_title']; ?></p>
		        </div>
		      </div>
		    </div>
		  </div>
		</div>
		<div class="clear"></div>
	</div>
	
	<section class="default_sc cont_pg_grey">
		<div class="container prelatife blocks_installation">
			<div class="content-text text-center tengah">
				<span><?php echo $this->setting['install_section1_subtitle']; ?></span>
				<div class="height-10"></div>

				<div class="blocks_default_listInstall">
					<div class="row">
						<?php for ($j=1; $j <= 6; $j++) { ?>
						<div class="col-md-4 col-sm-6">
							<div class="items">
								<div class="pict">
									<img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(433, 300, '/images/static/'. $this->setting['install_widget_picture_'. $j], array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="" class="img-responsive">
								</div>
								<div class="info">
									<span><?php echo $this->setting['install_widget_title_'. $j]; ?></span>
									<p><?php echo $this->setting['install_widget_content_'. $j]; ?></p>
								</div>
							</div>
						</div>
						<?php } ?>

						<!-- <div class="col-md-4 col-sm-6">
							<div class="items">
								<div class="pict"><img src="<?php echo $this->assetBaseurl; ?>ap-install_2.jpg" alt="" class="img-responsive"></div>
								<div class="info">
									<span>Sudut Kemiringan</span>
									<p>Sudut kemiringan minimal 15 derajat. Jarak Gording pertama dari titik tengah pertemuan kuda-kuda maksimal 10 cm.</p>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="items">
								<div class="pict"><img src="<?php echo $this->assetBaseurl; ?>ap-install_3.jpg" alt="" class="img-responsive"></div>
								<div class="info">
									<span>Pasang Amari UPVC Roof</span>
									<p>Pasang atap UPVC Roof secara interlock</p>
								</div>
							</div>
						</div>

						<div class="col-md-4 col-sm-6">
							<div class="items">
								<div class="pict"><img src="<?php echo $this->assetBaseurl; ?>ap-install_4.jpg" alt="" class="img-responsive"></div>
								<div class="info">
									<span>Pasang SDS</span>
									<p>Pasang SDS seperti gambar ini. (1 m2 membutuhkan 4 SDS & 4 Roofseal)</p>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="items">
								<div class="pict"><img src="<?php echo $this->assetBaseurl; ?>ap-install_5.jpg" alt="" class="img-responsive"></div>
								<div class="info">
									<span>Panjang Overlap</span>
									<p>Panjang Overlap adalah 30 cm (Sudut kemiringan 15 derajat)</p>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="items">
								<div class="pict"><img src="<?php echo $this->assetBaseurl; ?>ap-install_6.jpg" alt="" class="img-responsive"></div>
								<div class="info">
									<span>Aplikasi Atap Lengkung</span>
								</div>
							</div>
						</div> -->

					</div>
				</div>
				<div class="clear height-0"></div>
				<a href="http://www.youtube.com/embed/4R6wr-uYFn8?&autoplay=1&rel=0" class="btn btns_customs_blue various fancybox.iframe">View Amari UPVC Installation Video</a>
				<div class="clear height-30"></div>

				<div class="clear"></div>
			</div>
		</div>
	</section>

	<div class="clear"></div>
</div>

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


		$(".various").fancybox({
				maxWidth	: 800,
				maxHeight	: 600,
				fitToView	: false,
				width		: '70%',
				height		: '70%',
				autoSize	: false,
				closeClick	: false,
				openEffect	: 'none',
				closeEffect	: 'none'
			});
	})
</script>