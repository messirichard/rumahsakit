<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'user-form',
	// 'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

<?php echo $form->errorSummary($model); ?>

<div class="widget">
<h4 class="widgettitle">Data User</h4>
<div class="widgetcontent">
	
	<div class="row-fluid">
		<div class="span3">
			<?php echo $form->textFieldRow($model,'year',array('class'=>'input-block-level','maxlength'=>100)); ?>
			
		</div>
		<div class="span3">
			<?php echo $form->dropDownListRow($model,'month',array(
				'1'=>'Januari',
				'2'=>'February',
				'3'=>'Maret',
				'4'=>'April',
				'5'=>'Mei',
				'6'=>'Juni',
				'7'=>'July',
				'8'=>'Agustus',
				'9'=>'September',
				'10'=>'Oktober',
				'11'=>'November',
				'12'=>'Desember',
			),array('class'=>'input-block-level','maxlength'=>100)); ?>
		</div>
		<div class="span3">
			<?php echo $form->textFieldRow($model,'awal',array('class'=>'input-block-level','maxlength'=>100)); ?>
		</div>
		<div class="span3">
			<?php echo $form->textFieldRow($model,'akhir',array('class'=>'input-block-level','maxlength'=>100)); ?>
		</div>
	</div>

	<?php echo $form->textFieldRow($model,'trip',array('class'=>'input-block-level','maxlength'=>100)); ?>

	

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
