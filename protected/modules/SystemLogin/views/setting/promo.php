<?php
$this->breadcrumbs=array(
	'setting'=>array('/SystemLogin/setting/index'),
	'Promo Free Ongkir',
);

$this->pageHeader=array(
	'icon'=>'fa fa-file',
	'title'=>'Promotion',
	'subtitle'=>'Promo Free Ongkir',
);
?>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'setting-form',
    // 'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

<div class="row-fluid">
	<div class="span8">
		<div class="widget">
		<h4 class="widgettitle">Promotion Free Ongkir</h4>
		<div class="widgetcontent">

			<div class="divider5"></div>

				<?php if(Yii::app()->user->hasFlash('success')): ?>
				
				    <?php $this->widget('bootstrap.widgets.TbAlert', array(
				        'alerts'=>array('success'),
				    )); ?>
				
				<?php endif; ?>

				<?php Yii::import('ext.imperavi-redactor-widget.ImperaviRedactorWidget'); ?>
				<?php $this->widget('ImperaviRedactorWidget', array(
				    'selector' => '.redactor',
				    'options' => array(
				        'imageUpload'=> $this->createUrl('SystemLogin/setting/uploadimage', array('type'=>'image')),
				        'clipboardUploadUrl'=> $this->createUrl('SystemLogin/setting/uploadimage', array('type'=>'clip')),
				    ),
				    'plugins' => array(
				        'clips' => array(
				        ),
				    ),
				)); ?>
				<?php $type = 'setting_promo_freeongkir' ?>
				<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
				<select id="Setting_<?php echo $model[$type]['data']->name ?>" name="Setting[<?php echo $model[$type]['data']->name ?>]" class="span10">
							<?php if ($model[$type]['data']->value == '1'): ?>
								<option selected value="1">Aktif</option>
							<?php else: ?>
								<option value="1">Aktif</option>
							<?php endif ?>
							<?php if ($model[$type]['data']->value == 0): ?>
								<option selected value="0">Tidak Aktif</option>
							<?php else: ?>
								<option value="0">Tidak Aktif</option>
							<?php endif ?>
						</select>
				<p class="help-block">*) Note: Aktifkan promo free ongkir bila ingin memberikan free ongkir 1kg kepada customer</p>
				
				<?php /*
				<?php $type = 'about_header_background' ?>
				<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
				<?php echo CHtml::fileField('Setting['.$model[$type]['data']->name.']', $model[$type]['data']->value, array('class'=>'span12')) ?>
				<p class="help-block">NOTE: Picture landscape</p>
				<?php if ($model[$type]['data']->value): ?>
					<div style="">
						<img style="height: auto; max-width: 300px;" src="<?php echo Yii::app()->baseUrl; ?>/images/static/<?php echo $model[$type]['data']->value; ?>" alt="">
					</div>
					<div class="clearfix" style="height: 15px;"></div>
					<div class="clearfix" style="height: 1px;"></div>
				<?php endif ?>
				<div class="divider10"></div>
				*/ ?>
				<?php $this->widget('bootstrap.widgets.TbButton', array(
					'buttonType'=>'submit',
					'type'=>'primary',
					'label'=>'Save',
				)); ?>

			
		</div>
		</div>
		
		<div class="alert">
		  <button type="button" class="close" data-dismiss="alert">×</button>
		  <strong>Warning!</strong> Fields with <span class="required">*</span> are required.
		</div>
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
	</div>
	<div class="span4">
		<?php // $this->renderPartial('/setting/page_menu') ?>
	</div>
</div>
<?php $this->endWidget(); ?>