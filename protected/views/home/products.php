<div class="outers_cont_inside_page back-white">

	<h1 style="visibilty: none; display:none;"><?php echo $this->pageTitle ?></h1>
	<div class="insides_toppage_blocks full_pg_carousel">
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		  <div class="carousel-inner" role="listbox">
		    <div class="item active">
		      <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(1920,960, '/images/static/'. $this->setting['product_hero_background'], array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="">
		      <div class="carousel-caption">
		        <div class="blocks_text_inpagesn">
		        	<h6><b>AMARI</b> UPVC ROOF</h6>
		        	<p><?php echo $this->setting['product_hero_title']; ?></p>
		        </div>
		      </div>
		    </div>
		  </div>
		</div>
		<div class="clear"></div>
	</div>
	
	<section class="default_sc" id="insides_page_product2">
		<div class="container prelatife conts_about_top_mins">
			<div class="content-text text-left tengah">
				<div class="row">
					<div class="col-md-6">
						<!-- {# <div class="pictn"><img src="<?php echo $this->assetBaseurl; ?>block_pict_roof_prod1.png" alt="" class="img-responsive"></div> #} -->
						<div class="clear height-45"></div>
						<div class="pictn_videos">
							<?php 
							$url_ytb = $this->setting['product_section1_youtube'];
							parse_str( parse_url( $url_ytb, PHP_URL_QUERY ), $my_array_of_vars );
							?>
							<a href="http://www.youtube.com/embed/<?php echo $my_array_of_vars['v'] ?>?&autoplay=1&rel=0" class="various fancybox.iframe">
								<img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(494,297, '/images/static/'. $this->setting['product_section1_picture'], array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="" class="img-responsive center-block">
							</a>
						</div>
					</div>
					<div class="col-md-6">
						<div class="clear height-50"></div><div class="height-25"></div>
						<?php echo $this->setting['product_section1_content']; ?>
						<!-- <h4><b>AMARI</b> UPVC Roof is the best for you!</h4>
						<p>Backed with a leading experience in the plastic PVC industry, PT. Suryasukses Inti Makmur put serious effort in producing the most anticipated product in the market. Latest technology and secret formula of UPVC composition material are the answer for the best UPVC product in the market.</p>
						<p>Amari UPVC roof performs better, it&rsquo;s that simple. Due to the manufacturing technology, Amari UPVC roof can be used within a larger temperature range than the usual UPVC product in the markets. They preserve all their physical qualities even in the extreme conditions.</p> -->
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</section>

	<section class="default_sc back_middleProductred" id="product_m2">
		<div class="prelatife container">
			<div class="insides text-center">
				<img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(256,279, '/images/static/'. $this->setting['product_section2_pictures'], array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="" class="center-block img-responsive">
				<div class="clear height-20"></div>
				<?php echo $this->setting['product_section2_content']; ?>
				<!-- <h2>10 years AMARI Warranty</h2>
				<p>Anda tidak perlu kuatir terhadap rusaknya atap Amari akibat umur pemakaian atau tidak berfungsinya atap<br>Amari seperti yang kami janjikan, karena kami menggaransi seluruh produk kami hingga 10 tahun.</p>
				<p><small>* Syarat dan ketentuan berlaku.</small></p> -->
				<div class="clear"></div>
			</div>
		</div>
	</section>

	<section class="default_sc back_middleProduct_middle3" id="product_m2">
		<div class="prelatife container">
			<div class="insides text-center content-text">
				<h2>DETAILED PRODUCT INFORMATION</h2>
				<div class="clear height-35"></div>
				<div class="pict_full">
					<img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(1292,394, '/images/static/'. $this->setting['product_section3_pictures'], array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="" class="img-responsive center-block">
				</div>
				<div class="clear height-30"></div>
				<p><small>All measurements in milimeters</small></p>
				<div class="clear height-50"></div>
				<div class="descs_table_info">
					<div class="row default">
						<div class="col-md-6">
							<div class="blocks_info_white">
								<div class="top"><h5><?php echo $this->setting['product_section3_titles1']; ?></h5></div>
								<div class="middles">
									<?php // echo $this->setting['product_section3_content1']; ?>
									<table class="table" border="0" cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<td>Tensile strength</td>
			<td>33 kgf/mm&#39;</td>
		</tr>
		<tr>
			<td>Elongation</td>
			<td>25,7 %</td>
		</tr>
		<tr>
			<td>Modulus Elasticity</td>
			<td>128 MPa</td>
		</tr>
		<tr>
			<td>Flexural</td>
			<td>39 kgf/mm&#39;</td>
		</tr>
		<tr>
			<td>Streght to impact load (UV-Light))</td>
			<td>7,99 mJ/mm&#39;</td>
		</tr>
		<tr>
			<td>Degradation Stability&nbsp;to heat</td>
			<td>194&nbsp;℃</td>
		</tr>
		<tr>
			<td>% Reduction of Heat Radiation</td>
			<td>Up to 32,5%</td>
		</tr>
		<tr>
			<td>Ability to flammed by fne</td>
			<td>V-0</td>
		</tr>
		<tr>
			<td>Resistance to degradation</td>
			<td>Very Good</td>
		</tr>
	</tbody>
</table>
									<!-- <table class="table">
										<tr>
											<td><b>Density</b></td>
											<td>1390 kg/m3</td>
										</tr>
										<tr>
											<td><b>Young's modulus (E)</b></td>
											<td>29003300 MPa</td>
										</tr>
										<tr>
											<td><b>Tensile strength</b></td>
											<td>50-80 MPa Elongation at break 20-40%</td>
										</tr>
										<tr>
											<td><b>Notch test</b></td>
											<td>2-5 kJ/m2</td>
										</tr>
										<tr>
											<td><b>Glass temperature</b></td>
											<td>82 C</td>
										</tr>
										<tr>
											<td><b>Melting point</b></td>
											<td>100-260 C; Vicat B 85 C</td>
										</tr>
										<tr>
											<td><b>Heat transfer coefficient</b></td>
											<td>0.16 W/(m K)</td>
										</tr>
										<tr>
											<td><b>Effective heat combustion</b></td>
											<td>17.95 Mj/kg</td>
										</tr>
										<tr>
											<td><b>Linear expansion Coefficient</b></td>
											<td>8 10-5/K</td>
										</tr>
										<tr>
											<td><b>Specific heat</b></td>
											<td>0.9 kJ/(kg K)</td>
										</tr>
										<tr>
											<td><b>Water absorbtion</b></td>
											<td>0.04-0.4</td>
										</tr>
									</table> -->
									<div class="clear"></div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="blocks_info_white">
								<div class="top"><h5><?php echo $this->setting['product_section3_titles2']; ?></h5></div>
								<div class="middles">
									<?php echo $this->setting['product_section3_content2']; ?>
									<!-- <table class="table">
										<tr>
											<td><b>Lebar</b></td>
											<td>840 mm, Lebar (efektif) 770 mm</td>
										</tr>
										<tr>
											<td><b>Panjang (max)</b></td>
											<td>12 m</td>
										</tr>
										<tr>
											<td><b>Tebal</b></td>
											<td>10 mm</td>
										</tr>
										<tr>
											<td><b>Material</b></td>
											<td>uPVC dengan ASA top layer coating & UV</td>
										</tr>
										<tr>
											<td><b>Tipe</b></td>
											<td>Opaque & Semi transparant</td>
										</tr>
										<tr>
											<td><b>Berat efektif</b></td>
											<td>4 kg/m (+- 3%), 4,8 kg/m2</td>
										</tr>
										<tr>
											<td><b>Jarak gording</b></td>
											<td>1,2 m</td>
										</tr>
										<tr>
											<td><b>Kemiringan instalasi</b></td>
											<td>15 derajat</td>
										</tr>
									</table> -->
									<div class="clear"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</section>

	<section class="default_sc blocks_bottomProduct_dnt" id="product_bottom_dtl">
		<div class="top"><span>Amari Supporting Accessories</span></div>
		<div class="middles">
			<div class="prelatife container">
				<div class="insides"> <div class="clear height-30"></div>
					<div class="row">
						<?php foreach ($data as $key => $value): ?>
						<div class="col-md-6 col-sm-6">
							<div class="block_itm w325">
								<div class="pict">
									<img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(170, 100, '/images/product/'. $value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" class="img-responsive" alt="<?php echo $value->description->name; ?>">
								</div>
								<div class="texts">
									<h3><?php echo strtoupper($value->description->name); ?></h3>
									<div class="clear"></div>
									<?php echo $value->description->desc; ?>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
					<div class="clear"></div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</section>

	<section class="default_sc backs_blueHome_bottom2" id="block_home_advantage">
		<div class="prelatife container">
			<div class="insides">
				<div class="lists_defaultx_textn top">
		          <div class="row">
		            <?php for ($i=1; $i <= 4; $i++) { ?>
		            <div class="col-md-3 col-sm-6 <?php echo ($i == 2)? 'nitem_2': ''; ?>">
		              <div class="items">
		                <div class="thumbs"><img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(79,90, '/images/static/'. $this->setting['home_why_banners_pict_'. $i], array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="" class="img-responsive"></div>
		                <div class="clear height-15"></div>
		                <div class="texts">
		                  <h5><?php echo $this->setting['home_why_banners_title_'.$i]; ?></h5>
		                  <div class="clear"></div>
		                  <p><?php echo $this->setting['home_why_banners_content_'.$i]; ?></p>
		                  <div class="clear"></div>
		                </div>
		                <div class="clear"></div>
		              </div>
		            </div>
		            <?php } ?>

		          </div>
		        </div>
				<div class="clear height-5"></div>
				<div class="middlesn_textn_pl prelatife">
					<div class="lines-white"></div>
					<span>OTHER ADVANTAGES</span>
				</div>
				<div class="clear height-10"></div>
			 <div class="lists_defaultx_textn bottom">
	          <div class="row">
	            <?php for ($i=1; $i <= 4; $i++) { ?>
	            <div class="col-md-3 col-sm-6 <?php echo ($i == 2)? 'nitem_2': ''; ?>">
	              <div class="items">
	                <div class="texts">
	                  <p>
	                    <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(71,63, '/images/static/'. $this->setting['home_advantage_banners_pict_'. $i], array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="" class="img-responsive d-inline"><?php echo $this->setting['home_advantage_banners_title_'. $i]; ?></p>
	                  <div class="clear"></div>
	                </div>
	                <div class="clear"></div>
	              </div>
	            </div>
	            <?php } ?>

	          </div>
	        </div>

				<div class="clear"></div>
			</div>
		</div>
	</section>
	<!-- {# end home middle 3 #} -->

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

<style type="text/css" media="screen">
	.pictn_videos img{
		-webkit-box-shadow: 0px 0px 8px 0px rgba(0, 0, 0, 0.3);
-moz-box-shadow:    0px 0px 8px 0px rgba(0, 0, 0, 0.3);
box-shadow:         0px 0px 8px 0px rgba(0, 0, 0, 0.3);
	}
</style>