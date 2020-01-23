<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'testimonials-form',
    'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

<?php echo $form->errorSummary($model); ?>

<div class="widget">
<h4 class="widgettitle">Data Testimonial</h4>
<div class="widgetcontent">


	<?php echo $form->textFieldRow($model,'nama',array('class'=>'span5','maxlength'=>225)); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>225)); ?>

	<?php echo $form->textFieldRow($model,'subjek',array('class'=>'span5','maxlength'=>225)); ?>

	<?php echo $form->textAreaRow($model,'pesan',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'date_add',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'date_modif',array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($model, 'status', array(
			        		'1'=>'Munculkan',
			        		'0'=>'Hide',
			        	), array('class'=>'span5')); ?>

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
