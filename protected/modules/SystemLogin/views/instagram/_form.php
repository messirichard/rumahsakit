<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'user-form',
	// 'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

<?php echo $form->errorSummary($model); ?>

<div class="row-fluid">
	<div class="span12">
		<div class="widget">
		<h4 class="widgettitle">Data Instagram</h4>
		<div class="widgetcontent">
			<?php echo $form->textFieldRow($model,'username',array('class'=>'span10')); ?>

			<?php echo $form->textFieldRow($model,'first_name',array('class'=>'span10')); ?>
			
			<?php echo $form->textAreaRow($model,'bio',array('class'=>'span12')); ?>
			<div class="divider10"></div>
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
	</div>	
</div>

<?php $this->endWidget(); ?>
