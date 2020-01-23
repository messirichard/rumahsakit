<?php
$this->breadcrumbs=array(
	'Confirm Print',
);
$this->pageHeader=array(
	'icon'=>'fa fa-fax',
	'title'=>'Confirm Print',
	'subtitle'=>'Data Confirm Print',
);

?>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php if(Yii::app()->user->hasFlash('success')): ?>

    <?php $this->widget('bootstrap.widgets.TbAlert', array(
        'alerts'=>array('success'),
    )); ?>

<?php endif; ?>

<h1>Confirm Print Order (PRINT RESI BARANG)</h1>

<form action="<?php echo CHtml::normalizeUrl(array('/SystemLogin/order/printShipping')); ?>" method="post">
<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'or-order-grid_Print',
	'dataProvider'=>$dataProvider,
	// 'filter'=>$model,
	'enableSorting'=>false,
	'summaryText'=>false,
	'type'=>'bordered',
	// 'htmlOptions'=>array('class'=>''),
	'columns'=>array(
		array(
			'header'=>'Pilih',
			'type'=>'raw',
			'value'=>'OrOrder::model()->createCheck($data[invoice_prefix]."-".$data[invoice_no],$data[id])',
		),
		array(
			'header'=>'Invoice',
			'type'=>'raw',
			'value'=>'$data[invoice_prefix]."-".$data[invoice_no]',
		),
		array(
			'header'=>'Tanggal Order',
			'type'=>'raw',
			'value'=>'date("Y-m-d", strtotime($data[date_add]))',
		),
		'email',
		'first_name',
		array(
			'header'=>'Order Status',
			'type'=>'raw',
			'value'=>'OrOrderStatus::model()->findByPk($data[order_status_id])->name',
		),
		array(
			'header'=>'GRAND TOTAL',
			'type'=>'raw',
			'value'=>'Cart::money($data[grand_total])',
		),
	),
)); ?>

	<input type="hidden" name="tanggal" value="<?php echo $_GET['tanggal'] ?>">
	<!-- <input type="hidden" name="limit" value="<?php // echo $_GET['limit'] ?>"> -->
	<input type="hidden" name="order_status" value="<?php echo $_GET['order_status'] ?>">
	<!-- <button class="btn btn-default checks_all" type="button">Check All / Uncheck</button>&nbsp;&nbsp;&nbsp; -->
	<button class="btn btn-default" type="submit"><i class="fa fa-print"></i> &nbsp;PRINT RESI</button>
</form>
<script type="text/javascript">
	jQuery(function($){
		// $('button.checks_all').click(function() {
		//   if ($('input.inps_check').hasAttribute("checked")) {
		//   	$('input.inps_check').removeAttr('checked');
		//   }
		//   if ($('input.inps_check').hasAttribute("checked") == false){
		//   	$('input.inps_check').prop('checked', true);
		//   }
		// });
	})
</script>