<?php
$this->breadcrumbs=array(
	' Customers',
);

$this->pageHeader=array(
	'icon'=>'fa fa-group',
	'title'=>'Customer',
	'subtitle'=>'Data Customer',
);

$this->menu=array(
	array('label'=>'Add Customer', 'icon'=>'plus-sign','url'=>array('create')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php if(Yii::app()->user->hasFlash('success')): ?>

    <?php $this->widget('bootstrap.widgets.TbAlert', array(
        'alerts'=>array('success'),
    )); ?>

<?php endif; ?>

<!-- start search -->
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
	<div class="row-fluid">
		<div class="span3">
			<?php echo $form->textFieldRow($model,'first_name',array('class'=>'span12','maxlength'=>200 )); ?>
		</div>
		<div class="span3">
			<?php echo $form->textFieldRow($model,'email',array('class'=>'span12','maxlength'=>200 )); ?>
		</div>
		<div class="span3">
			<?php echo $form->textFieldRow($model,'hp',array('class'=>'span12','maxlength'=>200 )); ?>
		</div>
		<div class="span3">
			<label for="">&nbsp;</label>
			<?php $this->widget('bootstrap.widgets.TbButton', array(
				'buttonType'=>'submit',
				'type'=>'primary',
				'label'=>'Search',
			)); ?>

			<?php $this->widget('bootstrap.widgets.TbButton', array(
				// 'buttonType'=>'button',
				'type'=>'primary',
				'label'=>'Reset',
				'url'=>Yii::app()->createUrl($this->route),
			)); ?>
		</div>
	</div>

	

<?php $this->endWidget(); ?>
<!-- end search -->

<h1>Customer</h1>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'cs-customer-grid',
	'dataProvider'=>$model->search(),
	// 'filter'=>$model,
	'enableSorting'=>false,
	'summaryText'=>false,
	'type'=>'bordered',
	'columns'=>array(
		// 'id',
		'email',
		// 'pass',
		'hp',
		'first_name',
		'last_name',
		// 'group_member_id',
		array(
			'name'=>'aktif',
			'filter'=>array(
				'0'=>'Non Active',
				'1'=>'Active',
			),
			'type'=>'raw',
			'value'=>'($data->aktif == "1") ? "Aktif" : "Tidak Aktif"',
		),
		array(
			'name'=>'level',
			'type'=>'raw',
			'value'=>'($data->level == "1") ? "Vendor" : "Member"',
		),
		'diskon',
		/*
		'date_join',
		'last_login',
		'data',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update} &nbsp; {delete}',
		),
	),
)); ?>
