<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'user-form',
	'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

<?php echo $form->errorSummary($model); ?>

<div class="widget">
<h4 class="widgettitle">Data User</h4>
<div class="widgetcontent">

	<?php if ($model->scenario == 'insert'): ?>
	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>100)); ?>
	<?php endif ?>

	<?php echo $form->textFieldRow($model,'nama',array('class'=>'span5','maxlength'=>100)); ?>
	
	<?php if ($model->scenario != 'update'): ?>
	<?php echo $form->passwordFieldRow($model,'pass',array('class'=>'span5','maxlength'=>100)); ?>
	<?php endif ?>

	<?php echo $form->dropDownListRow($model, 'group_id', array(
		'0'=>'Full Akses',
		'8'=>'Admin',
	), array('empty'=>'-- Pilih Hak Akses --') ); ?>

	<?php echo $form->dropDownListRow($model, 'aktif', array(
		'1'=>'Active',
		'0'=>'Non Active',
	)); ?>

	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>$model->isNewRecord ? 'Create' : 'Save',
	)); ?>

</div>
</div>
<div class="alert">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Warning!</strong> Fields with <span class="required">*</span> are required.
</div>

<?php $this->endWidget(); ?>
