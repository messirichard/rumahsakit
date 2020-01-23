<?php
$this->breadcrumbs=array(
	'Bank',
);

$this->pageHeader=array(
	'icon'=>'fa fa-bank',
	'title'=>'Payment Confirmation',
	'subtitle'=>'Data Payment Confirmation',
);

$this->menu=array(
	// array('label'=>'Add Payment Confirmation', 'icon'=>'plus-sign','url'=>array('create')),
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
		<div class="span4">
			<?php echo $form->textFieldRow($model,'date_transfer',array('class'=>'span12 datepicker','maxlength'=>200 )); ?>
		</div>
		<div class="span4">
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
<h1>Payment Confirmation</h1>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'bank-grid',
	'dataProvider'=>$model->search(),
	// 'filter'=>$model,
	'enableSorting'=>false,
	'summaryText'=>false,
	'type'=>'bordered',
	'columns'=>array(
		array(
			'name'=>'order_id',
			'type'=>'raw',
			'value'=>'CHtml::link($data->order_id, array("/SystemLogin/order/detail", "nota"=>$data->order_id))',
		),
		// 'order_id',
		array(
			'header' => 'Nomer Invoice',
			'name'=>'order_id',
			'type'=>'raw',
			'value'=>'$data->order_id',
		),
		'name',
		'bank_name',
		'amount',
		// 'transfer_to',
		array(
			'name'=>'transfer_to',
			'type'=>'raw',
			'value'=>'Bank::model()->findByPk($data->transfer_to)->rekening',
		),
		'date_transfer',
		// array(
		// 	'class'=>'bootstrap.widgets.TbButtonColumn',
		// 	'template'=>'{update} &nbsp; {delete}',
		// ),
	),
)); ?>
