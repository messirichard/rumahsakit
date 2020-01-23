<?php
$this->breadcrumbs=array(
	'setting'=>array('/SystemLogin/setting/index'),
	'Location Edit',
);

$this->pageHeader=array(
	'icon'=>'fa fa-home',
	'title'=>'Location',
	'subtitle'=>'Location Edit',
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
	<div class="span12">
		<div class="widget">
		<h4 class="widgettitle">Section 1</h4>
		<div class="widgetcontent">
			<div class="multilang pj-form-langbar">
				<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
				<a href="#" data-index="<?php echo $value->id ?>" data-abbr="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>" class="pj-form-langbar-item <?php if ($value->code==$this->setting['lang_deff']): ?>pj-form-langbar-item-active<?php endif ?>"><abbr style="background-image: url(<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>);"></abbr></a>
				<?php endforeach ?>
			</div>
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
				        'imageUpload'=> $this->createUrl('admin/setting/uploadimage', array('type'=>'image')),
				        'clipboardUploadUrl'=> $this->createUrl('admin/setting/uploadimage', array('type'=>'clip')),
				    ),
				    'plugins' => array(
				        'clips' => array(
				        ),
				    ),
				)); ?>
				<div class="row-fluid">
					<div class="span12">
					<?php $type = 'location_hero_title'; ?>
						<?php Common::createSetting($type, 'Title', 'text', 'y') ?>
						<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
							<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($value->code==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
								<label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
								<input value="<?php echo $model[$type]['desc'][$value->code]->value ?>" type="text" id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span10">

							    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>"></span>
							    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
				<div class="divider10"></div>
				<h4><b>Location 1</b></h4>
				<div class="divider10"></div>
				<div class="row-fluid">
					<div class="span6">
						<?php $type = 'location1_name'; ?>
						<?php Common::createSetting($type, 'Name Location', 'text', 'n') ?>
						<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
						<?php echo CHtml::textField('Setting['.$model[$type]['data']->name.']', $model[$type]['data']->value, array('class'=>'span12')) ?>
					</div>
					<div class="span6">
						<?php $type = 'location1_city'; ?>
						<?php Common::createSetting($type, 'City', 'text', 'n') ?>
						<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
						<?php echo CHtml::textField('Setting['.$model[$type]['data']->name.']', $model[$type]['data']->value, array('class'=>'span12')) ?>
					</div>
				</div>
				<div class="divider5"></div>

				<?php $type = 'location1_address'; ?>
				<?php Common::createSetting($type, 'Address', 'text', 'n') ?>
				<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
				<?php echo CHtml::textArea('Setting['.$model[$type]['data']->name.']', $model[$type]['data']->value, array('class'=>'span12')) ?>
				<div class="divider5"></div>

				<?php $type = 'location1_map'; ?>
				<?php Common::createSetting($type, 'Map', 'text', 'n') ?>
				<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
				<?php echo CHtml::textField('Setting['.$model[$type]['data']->name.']', $model[$type]['data']->value, array('class'=>'span12')) ?>
				<div class="divider5"></div>

				<div class="row-fluid">
					<div class="span6">
						<?php $type = 'location1_phone'; ?>
						<?php Common::createSetting($type, 'Phone', 'text', 'n') ?>
						<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
						<?php echo CHtml::textField('Setting['.$model[$type]['data']->name.']', $model[$type]['data']->value, array('class'=>'span12')) ?>
					</div>
					<div class="span6">
						<?php $type = 'location1_fax'; ?>
						<?php Common::createSetting($type, 'City', 'text', 'n') ?>
						<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
						<?php echo CHtml::textField('Setting['.$model[$type]['data']->name.']', $model[$type]['data']->value, array('class'=>'span12')) ?>
					</div>
				</div>

				<div class="divider10"></div>
				<h4><b>Location 2</b></h4>
				<div class="divider10"></div>

				<div class="row-fluid">
					<div class="span6">
						<?php $type = 'location2_name'; ?>
						<?php Common::createSetting($type, 'Name Location', 'text', 'n') ?>
						<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
						<?php echo CHtml::textField('Setting['.$model[$type]['data']->name.']', $model[$type]['data']->value, array('class'=>'span12')) ?>
					</div>
					<div class="span6">
						<?php $type = 'location2_city'; ?>
						<?php Common::createSetting($type, 'City', 'text', 'n') ?>
						<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
						<?php echo CHtml::textField('Setting['.$model[$type]['data']->name.']', $model[$type]['data']->value, array('class'=>'span12')) ?>
					</div>
				</div>
				<div class="divider5"></div>

				<?php $type = 'location2_address'; ?>
				<?php Common::createSetting($type, 'Address', 'text', 'n') ?>
				<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
				<?php echo CHtml::textArea('Setting['.$model[$type]['data']->name.']', $model[$type]['data']->value, array('class'=>'span12')) ?>
				<div class="divider5"></div>

				<?php $type = 'location2_map'; ?>
				<?php Common::createSetting($type, 'Map', 'text', 'n') ?>
				<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
				<?php echo CHtml::textField('Setting['.$model[$type]['data']->name.']', $model[$type]['data']->value, array('class'=>'span12')) ?>
				<div class="divider5"></div>

				<div class="row-fluid">
					<div class="span6">
						<?php $type = 'location2_phone'; ?>
						<?php Common::createSetting($type, 'Phone', 'text', 'n') ?>
						<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
						<?php echo CHtml::textField('Setting['.$model[$type]['data']->name.']', $model[$type]['data']->value, array('class'=>'span12')) ?>
					</div>
					<div class="span6">
						<?php $type = 'location2_fax'; ?>
						<?php Common::createSetting($type, 'City', 'text', 'n') ?>
						<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
						<?php echo CHtml::textField('Setting['.$model[$type]['data']->name.']', $model[$type]['data']->value, array('class'=>'span12')) ?>
					</div>
				</div>
				
				<div class="divider10"></div>
				<h4><b>Location 3</b></h4>
				<div class="divider10"></div>

				<div class="row-fluid">
					<div class="span6">
						<?php $type = 'location3_name'; ?>
						<?php Common::createSetting($type, 'Name Location', 'text', 'n') ?>
						<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
						<?php echo CHtml::textField('Setting['.$model[$type]['data']->name.']', $model[$type]['data']->value, array('class'=>'span12')) ?>
					</div>
					<div class="span6">
						<?php $type = 'location3_city'; ?>
						<?php Common::createSetting($type, 'City', 'text', 'n') ?>
						<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
						<?php echo CHtml::textField('Setting['.$model[$type]['data']->name.']', $model[$type]['data']->value, array('class'=>'span12')) ?>
					</div>
				</div>
				<div class="divider5"></div>

				<?php $type = 'location3_address'; ?>
				<?php Common::createSetting($type, 'Address', 'text', 'n') ?>
				<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
				<?php echo CHtml::textArea('Setting['.$model[$type]['data']->name.']', $model[$type]['data']->value, array('class'=>'span12')) ?>
				<div class="divider5"></div>

				<?php $type = 'location3_map'; ?>
				<?php Common::createSetting($type, 'Map', 'text', 'n') ?>
				<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
				<?php echo CHtml::textField('Setting['.$model[$type]['data']->name.']', $model[$type]['data']->value, array('class'=>'span12')) ?>
				<div class="divider5"></div>

				<div class="row-fluid">
					<div class="span6">
						<?php $type = 'location3_phone'; ?>
						<?php Common::createSetting($type, 'Phone', 'text', 'n') ?>
						<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
						<?php echo CHtml::textField('Setting['.$model[$type]['data']->name.']', $model[$type]['data']->value, array('class'=>'span12')) ?>
					</div>
					<div class="span6">
						<?php $type = 'location3_fax'; ?>
						<?php Common::createSetting($type, 'City', 'text', 'n') ?>
						<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
						<?php echo CHtml::textField('Setting['.$model[$type]['data']->name.']', $model[$type]['data']->value, array('class'=>'span12')) ?>
					</div>
				</div>

				<?php $this->widget('bootstrap.widgets.TbButton', array(
					'buttonType'=>'submit',
					'type'=>'primary',
					'label'=>'Save',
				)); ?>
		</div>
		</div>

	</div>
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
<?php $this->endWidget(); ?>
<style type="text/css" media="screen">
	.row-fluid.list_data .span4{
		margin-left: 0;
		padding: 0 0.8em;
	}
</style>