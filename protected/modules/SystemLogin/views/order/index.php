<?php
$this->breadcrumbs=array(
	'Order',
);
$this->pageHeader=array(
	'icon'=>'fa fa-fax',
	'title'=>'Order',
	'subtitle'=>'Data Order',
);

?>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php if(Yii::app()->user->hasFlash('success')): ?>

    <?php $this->widget('bootstrap.widgets.TbAlert', array(
        'alerts'=>array('success'),
    )); ?>

<?php endif; ?>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
	<div class="row-fluid">
		<div class="span4">
			<?php echo $form->textFieldRow($model,'date_add',array('class'=>'span12 datepicker','maxlength'=>200 )); ?>
		</div>
		<div class="span4">
			<label class="required" for="OrOrder_category_id">Order Status</label>
			<select id="OrOrder_category_id" name="OrOrder[order_status_id]" class="input-block-level span12">
				<?php 
				// $dataStatusOrd = OrOrderStatus::model()->findAll();
				$dataStatusOrd = array(
	        		'1'=>'Pending',
	        		'2'=>'Waiting Confirmation',
	        		'3'=>'Shipped',
	        		'5'=>'Complete',
	        		'7'=>'Canceled',
	        		'14'=>'Expired',
	        		'11'=>'Refunded'
	        		);
				?>
				<option value="">---- Pilih Order Status ----</option>
				<?php foreach ($dataStatusOrd as $key => $value): ?>
					<option value="<?php echo $key ?>"><?php echo $value ?></option>
				<?php endforeach ?>
			</select>
		</div>
		<div class="span1">
			<label for="Print" class="required">&nbsp;</label> <div class="clear"></div>
			<?php echo $form->checkBox($model,'print_ship', array()); ?> Print
		</div>
		<?php /*<div class="span1">
			<label for="Print" class="required">&nbsp;</label> <div class="clear"></div>
			<?php echo $form->textField($model,'jml_print_ship', array('placeholder'=>'Jumlah Print')); ?>
		</div>*/ ?>
	</div>

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

<?php $this->endWidget(); ?>

<h1>Orders</h1>
<?php 
$session = new CHttpSession;
$session->open();
$checks_user = $session['login']['group_id'];
?>
<?php if ($checks_user == 0): ?>
	<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'or-order-grid',
	'dataProvider'=>$model->search(),
	// 'filter'=>$model,
	'enableSorting'=>false,
	'summaryText'=>false,
	'type'=>'bordered',
	// 'htmlOptions'=>array('class'=>''),
	'columns'=>array(
		array(
			'header'=>'Invoice',
			'type'=>'raw',
			'value'=>'CHtml::link($data->invoice_prefix."-".$data->invoice_no, array("/SystemLogin/order/detail", "id"=>$data->id))',
		),
		'email',
		'first_name',
		array(
			'header'=>'Order Status',
			'type'=>'raw',
			'value'=>'OrOrderStatus::model()->findByPk($data->order_status_id)->name',
		),
		array(
			'header'=>'GRAND TOTAL',
			'type'=>'raw',
			'value'=>'Cart::money($data->grand_total)',
		),
		// 'login_terakhir',
		// 'tanggal_input',
		// array(
		// 	'name'=>'aktif',
		// 	'filter'=>array(
		// 		'0'=>'No',
		// 		'1'=>'Yes',
		// 	),
		// 	'value'=>'($data->aktif=="1")? "Yes" : "No" ',
		// ),

		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{delete} &nbsp; {print}',
			'header'=>'Action',
			'buttons'=>array(
				'print' => array(
					'label'=>'<i class="fa fa-print fa-2x"></i>',     // text label of the button
					'url'=>'CHtml::normalizeUrl(array("print", "nota"=>$data->invoice_prefix."-".$data->invoice_no))',       // a PHP expression for generating the URL of the button
					'options'=>array('target'=>'_blank'), // HTML options for the button tag
				)
			)
		),
	),
)); ?>

<?php else: ?>
	<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'or-order-grid',
	'dataProvider'=>$model->search(),
	// 'filter'=>$model,
	'enableSorting'=>false,
	'summaryText'=>false,
	'type'=>'bordered',
	// 'htmlOptions'=>array('class'=>''),
	'columns'=>array(
		array(
			'header'=>'Invoice',
			'type'=>'raw',
			'value'=>'CHtml::link($data->invoice_prefix."-".$data->invoice_no, array("/SystemLogin/order/detail", "id"=>$data->id))',
		),
		'email',
		'first_name',
		array(
			'header'=>'Order Status',
			'type'=>'raw',
			'value'=>'OrOrderStatus::model()->findByPk($data->order_status_id)->name',
		),
		array(
			'header'=>'GRAND TOTAL',
			'type'=>'raw',
			'value'=>'Cart::money($data->grand_total)',
		),
		// 'login_terakhir',
		// 'tanggal_input',
		// array(
		// 	'name'=>'aktif',
		// 	'filter'=>array(
		// 		'0'=>'No',
		// 		'1'=>'Yes',
		// 	),
		// 	'value'=>'($data->aktif=="1")? "Yes" : "No" ',
		// ),

		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{print}',
			'header'=>'Action',
			'buttons'=>array(
				'print' => array(
					'label'=>'<i class="fa fa-print fa-2x"></i>',     // text label of the button
					'url'=>'CHtml::normalizeUrl(array("print", "nota"=>$data->invoice_prefix."-".$data->invoice_no))',       // a PHP expression for generating the URL of the button
					'options'=>array('target'=>'_blank'), // HTML options for the button tag
				)
			)
		),
	),
)); ?>

<?php endif ?>
