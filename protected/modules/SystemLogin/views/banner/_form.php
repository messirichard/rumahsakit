<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'banner-form',
    // 'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>
<div class="row-fluid">
	<div class="span8">
	<?php if ($model->scenario == 'update'): ?>
	<h1>Edit Banner</h1>
	<?php else: ?>
	<h1>Add Banner</h1>
	<?php endif ?>
	<div class="widget">
		<!-- <h4 class="widgettitle">Data Pages</h4> -->
		<div class="widgetcontent">

			<div class="multilang pj-form-langbar">
				<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
				<a href="#" data-index="<?php echo $value->id ?>" data-abbr="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>" class="pj-form-langbar-item <?php if ($value->code==$this->setting['lang_deff']): ?>pj-form-langbar-item-active<?php endif ?>"><abbr style="background-image: url(<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>);"></abbr></a>
				<?php endforeach ?>
			</div>
			<div class="divider5"></div>

			<?php echo $form->errorSummary($model); ?>
			<?php if(Yii::app()->user->hasFlash('success')): ?>
			
			    <?php $this->widget('bootstrap.widgets.TbAlert', array(
			        'alerts'=>array('success'),
			    )); ?>
			
			<?php endif; ?>

			<?php Yii::import('ext.imperavi-redactor-widget.ImperaviRedactorWidget'); ?>
			<?php $this->widget('ImperaviRedactorWidget', array(
			    'selector' => '.redactor',
			    'options' => array(
			        'imageUpload'=> $this->createUrl('/SystemLogin/setting/imgUpload', array('type'=>'image')),
			        'clipboardUploadUrl'=> $this->createUrl('/SystemLogin/setting/imgUpload', array('type'=>'clip')),
			    ),
			    'plugins' => array(
			        'clips' => array(
			        ),
			    ),
			)); ?>
			
			<?php echo $form->textFieldRow($model,'title',array('class'=>'span8', 'maxlength'=>100)); ?>

		</div>
	<!-- span 12 -->
	</div>

	</div>

	<div class="span4">
		<div class="widgetbox block-rightcontent">                        
		    <div class="headtitle">
		        <h4 class="widgettitle">Action</h4>
		    </div>
		    <div class="widgetcontent">
				<?php $this->widget('bootstrap.widgets.TbButton', array(
					'buttonType'=>'submit',
					'type'=>'primary',
					'label'=>$model->isNewRecord ? 'Simpan dan Tambahkan' : 'Simpan',
					'htmlOptions'=>array('class'=>'btn-large'),
				)); ?>
				<?php $this->widget('bootstrap.widgets.TbButton', array(
					// 'buttonType'=>'submit',
					// 'type'=>'info',
					'url'=>CHtml::normalizeUrl(array('index')),
					'label'=>'Batal',
					'htmlOptions'=>array('class'=>'btn-large'),
				)); ?>
				<?php /*<?php if ($model->scenario == 'update'): ?>
				<?php $this->widget('bootstrap.widgets.TbButton', array(
					// 'buttonType'=>'submit',
					// 'type'=>'info',
					'url'=>CHtml::normalizeUrl(array('create', 'copy'=>$model->id)),
					'label'=>'Copy',
					'htmlOptions'=>array('class'=>'btn-large'),
				)); ?>
				<?php endif ?>*/?>
		    </div>
		</div>
		<div class="divider15"></div>
		<div class="widgetbox block-rightcontent">                        
		    <div class="headtitle">
		        <h4 class="widgettitle">Gambar</h4>
		    </div>
		    <div class="widgetcontent">
				<?php echo $form->fileFieldRow($model,'image',array(
				'hint'=>'<b>Note:</b> Image size is 1240 x 470px. Larger image will be automatically cropped.', 'style'=>"width: 100%")); ?>
				<?php if ($model->scenario == 'update'): ?>
				<img style="width: 100%;" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(1240,470, '/images/banner/'.$model->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>"/>
				<?php endif; ?>
		    </div>
		</div>
		<div class="divider15"></div>
		<div class="widgetbox block-rightcontent">                        
		    <div class="headtitle">
		        <h4 class="widgettitle">Gambar Besar</h4>
		    </div>
		    <div class="widgetcontent">
				<?php echo $form->fileFieldRow($model,'image_big',array(
				'hint'=>'<b>Note:</b> Image size max 1200 x 1200px. Larger image will be automatically cropped.', 'style'=>"width: 100%")); ?>
				<?php if ($model->scenario == 'update'): ?>
				<img style="width: 100%;" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(1200,1200, '/images/banner/'.$model->image_big , array('method' => 'resize', 'quality' => '90')) ?>"/>
				<?php endif; ?>
		    </div>
		</div>

	</div>
</div>
<?php $this->endWidget(); ?>
<script type="text/javascript">
if (typeof RedactorPlugins === 'undefined') var RedactorPlugins = {};

RedactorPlugins.advanced = {
    init: function()
    {
        alert(1);
    }
}
jQuery(function( $ ) {
	$('.multilang').multiLang({
	});
})

</script>
