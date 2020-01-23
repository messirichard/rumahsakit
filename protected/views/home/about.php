<div class="outers_cont_inside_page back-white">

	<h1 style="visibilty: none; display:none;"><?php echo $this->pageTitle ?></h1>
	<div class="insides_toppage_blocks full_pg_carousel">
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		  <div class="carousel-inner" role="listbox">
		    <div class="item active">
		      <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(1920,960, '/images/static/'. $this->setting['about_hero_background'], array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="">
		      <div class="carousel-caption">
		        <div class="blocks_text_inpagesn">
		        	<h6><b>AMARI</b> UPVC ROOF</h6>
		        	<p><?php echo $this->setting['about_hero_title']; ?></p>
		        </div>
		      </div>
		    </div>
		  </div>
		</div>
		<div class="clear"></div>
	</div>
	
	<section class="default_sc" id="insides_page_about2">
		<div class="container prelatife conts_about_top_mins">
			<div class="content-text text-center maw970 tengah">
				<?php echo $this->setting['about_section_1_title']; ?>
				<div class="clear height-10"></div>
				<div class="lines_whiteMid2"></div>
				<div class="clear"></div>

				<?php echo $this->setting['about_section_1_subtitle']; ?>
				<?php echo $this->setting['about_section_1_content']; ?>

				<div class="clear"></div>
			</div>
		</div>
	</section>

	<div class="blocks_sectionmiddle_blue_about table_out" style="background-image: url('<?php echo Yii::app()->baseUrl.ImageHelper::thumb(1920,443, '/images/static/'. $this->setting['about_section_2_background'], array('method' => 'adaptiveResize', 'quality' => '90')) ?>');">
		<div class="table_in texts">
			<?php echo $this->setting['about_section_2_content']; ?>
		</div>
	</div>

	<section class="default_sc blocks_bottomBuilding_about" id="about_building">
		<div class="prelatife container">
			<div class="content-text text-center insides">
				<h2><?php echo $this->setting['about_section_3_title']; ?></h2>
				<div class="clear height-25"></div>
				<div class="desc_list_three">
					<div class="row">
						<?php for ($i=1; $i < 5; $i++) { ?>
						<div class="col-md-4">
							<div class="block_text">
								<p><?php echo $this->setting['about_section_3_content_'. $i]; ?></p>
							</div>
						</div>
						<?php } ?>

					</div>
				</div>
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
	})
</script>