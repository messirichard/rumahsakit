<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'member-company-form',
    'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

<?php echo $form->errorSummary($model); ?>

<div class="widget">
<h4 class="widgettitle">Data Certificates</h4>
<div class="widgetcontent">


	<?php echo $form->textFieldRow($model,'info_sertifikat',array('class'=>'span5','maxlength'=>225)); ?>

	<?php echo $form->fileFieldRow($model,'image',array(
			'hint'=>'<b>Note:</b> Height Image size is 127px, and Width Proportional. Larger images will be cropped automatically, please upload photos of horizontal size')); ?>
			<?php if ($model->scenario == 'update'): ?>
			<div class="control-group">
				<label class="control-label">&nbsp;</label>
				<div class="controls">
				<img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(200,127, '/images/sertifikat/'.$model->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>"/>
				</div>
			</div>
			<?php endif; ?>

	<?php echo $form->textFieldRow($model,'sorting',array('class'=>'span2', 'hint'=>'Note. can only be filled with numbers <br> Example. 1, 2, 3, 5')); ?>

		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Add' : 'Save',
		)); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			// 'buttonType'=>'submit',
			// 'type'=>'info',
			'url'=>CHtml::normalizeUrl(array('index')),
			'label'=>'Batal',
		)); ?>
</div>
</div>
<div class="alert">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Warning!</strong> Fields with <span class="required">*</span> are required.
</div>

<?php $this->endWidget(); ?>
