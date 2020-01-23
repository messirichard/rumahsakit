<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
	<div class="block-wrap-fcss-top-conhome prelatife">
		<?php echo $this->renderPartial('//layouts/_header', array()); ?>

		
	<!-- end fcs -->
		<?php echo $content ?>
	<?php echo $this->renderPartial('//layouts/_footer', array()); ?>
<?php $this->endContent(); ?>