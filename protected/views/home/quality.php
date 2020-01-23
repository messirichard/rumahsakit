<div class="outers-middle-contents back-white">
	<div class="prelatife container">
		<div class="clear height-20"></div>		
		<div class="breadcrumbs">
			<ol class="breadcrumb">
			  <li><a href="<?php echo CHtml::normalizeUrl(array('/home/index')); ?>">Home</a></li>
			  <li class="active">Quality Statement</li>
			</ol>
			<div class="clear"></div>
		</div>

		<div class="clear height-50"></div><div class="height-25"></div>

		<div class="outer-insides-pages">
			<div class="content-text text-center">
				
				<div class="box-greys-locks back-grey">
					<div class="clear height-50"></div>
					<div class="title-certification">
						OUR QUALITY CERTIFICATIONS
					</div>
					<div class="clear height-40"></div>
					<div class="picture-quality">
						<?php if (count($data) > 0): ?>
						<ul class="list-inline">
							<?php foreach ($data as $key => $value): ?>
							<li><img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(600, 127, '/images/sertifikat/'. $value->image , array('method' => 'resize', 'quality' => '90')) ?>" alt="<?php echo $value->info_sertifikat ?>" class="img-responsive center-block"></li>
							<?php endforeach ?>
						</ul>
						<?php endif ?>
					</div>

					<div class="clear height-50"></div><div class="height-10"></div>
					<div class="clear"></div>
				</div> 
				<div class="clear height-25"></div><div class="height-50"></div>

				<h1 class="titlepages"><?php echo $this->setting['quality_hero_title']; ?></h1>				
				<div class="clear"></div>
				<?php echo $this->setting['quality_hero_subtitle']; ?>
				<div class="clear"></div>

				<div class="clear height-40"></div>
				<div class="big-quality"><img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(966, 506, '/images/static/'. $this->setting['quality_hero_picture'] , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt=""></div>

				<div class="mw-970 text-center tengah">
					<div class="clear height-35"></div>
					<div class="mw-825 tengah">
						<?php echo $this->setting['quality_hero_content']; ?>
					</div>
					<div class="clear height-50"></div><div class="height-5"></div>
					<div class="row">
						<div class="col-md-6">
							<img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(463, 646, '/images/static/'. $this->setting['quality_middle_left_picture1'] , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="">
						</div>
						<div class="col-md-6">
							<div class="clear height-50"></div>
							<div class="fright text-center right-qualitythumbs">
								<img class="img-responsive" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(323, 196, '/images/static/'. $this->setting['quality_middle_right_picture1'] , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="">
								<div class="clear height-15"></div>
								<p><?php echo nl2br($this->setting['quality_middle_right_text1']); ?></p>
							</div>
							<div class="clear height-50"></div><div class="height-2"></div>
							<div class="fright text-center right-qualitythumbs">
								<img class="img-responsive" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(323, 196, '/images/static/'. $this->setting['quality_middle_right_picture2'] , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="">
								<div class="clear height-15"></div>
								<p><?php echo nl2br($this->setting['quality_middle_right_text2']); ?></p>
							</div>
							
						</div>
					</div>

					<div class="clear height-50"></div><div class="height-35"></div>
					<div class="cols-bottom-quality">
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(493, 363, '/images/static/'. $this->setting['quality_bottom_picture1'] , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="" class="img-responsive">
							</div>
							<div class="col-md-6 col-sm-6">
								<img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(493, 363, '/images/static/'. $this->setting['quality_bottom_picture2'] , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="" class="img-responsive">
							</div>
						</div>
						<div class="clear height-40"></div>
						<div class="text-center detail_cp">
							<?php echo nl2br($this->setting['quality_bottom_content']); ?>
							<div class="clear"></div>
						</div>

					</div>

					<div class="clear"></div>
				</div>
				

				<div class="clear"></div>
			</div>

			<div class="clear"></div>
		</div>

		<div class="clear height-50"></div>
		<div class="clear"></div>
	</div>
</div>