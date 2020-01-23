<div class="row-fluid">
	<div class="span8">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'bank-form',
    'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

<?php echo $form->errorSummary($model); ?>

<div class="widget">
<h4 class="widgettitle">Data Bank</h4>
<div class="widgetcontent">

	<?php echo $form->textFieldRow($model,'nama',array('class'=>'span5','maxlength'=>225)); ?>

	<?php echo $form->textAreaRow($model,'alamat',array('class'=>'span8')); ?>
	<?php echo $form->textFieldRow($model,'telp',array('class'=>'span5')); ?>
	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5')); ?>
	<?php echo $form->textAreaRow($model,'peta',array('class'=>'span8')); ?>
	
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
</div>
	<div class="span4">
		<?php $this->renderPartial('/setting/page_menu') ?>
	</div>
</div>