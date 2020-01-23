<div class="content-text text-center mw-836 tengah">
<h4>SERTIFIKASI</h4>
<p>&nbsp;</p>
<?php 
	$model = Sertifikasi::model()->findAll();
?>
<div class="b-width-serti row">
	<?php foreach ($model as $key => $value): ?>
	<div class="col-md-6">
		<div class="list-sertifikat">
			<div class="hd"><?php echo $value->name; ?></div>
			<div class="clear height-0"></div>
			<div class="height-15"></div>
			<div class="pic"><img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(100, 95, '/images/sertifikat/icon/'.$value->images_icon , array('method' => 'resize', 'quality' => '90')) ?>" alt=""></div>
			<div class="txt text-content">
				<?php echo strip_tags($value->description); ?>
			</div>
			<div class="clear height-10"></div>
			<div class="b-viewd"><a class="ser_fancy" href="<?php echo Yii::app()->baseurl; ?>/images/sertifikat/bg/<?php echo $value->images_big; ?>">View Detail</a></div>
		</div>
	</div>
	<?php // if ( (($key+1) % 2) == 0 ): ?>
		<!-- <div class="clear"></div> -->
	<?php // endif; ?>
	<?php endforeach; ?>
	
</div>
<p>&nbsp;</p>
</div>