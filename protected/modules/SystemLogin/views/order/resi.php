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
		<div class="span3">
		<label for="">Date</label>
		<?php echo CHtml::textField('date', $date, array('class'=>'span12 datepic')) ?>
		</div>
		<div class="span4">
			<label class="required" for="OrOrder_category_id">Order Status</label>
			<select id="OrOrder_category_id" name="status" class="input-block-level span12">
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
					<option <?php if ($_GET['status'] == $key): ?>selected="selected"<?php endif ?> value="<?php echo $key ?>"><?php echo $value ?></option>
				<?php endforeach ?>
			</select>
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
<form action="" method="post">
<?php $this->widget('bootstrap.widgets.TbButton', array(
	'buttonType'=>'submit',
	'type'=>'primary',
	'label'=>'Submit Resi',
)); ?>
<h1>Input Resi <?php echo $date ?></h1>
<table class="table table-bordered responsive">
    <thead>
        <tr>
            <th>No Invoice</th>
            <th>Name</th>
            <th>Email</th>
            <th>Kota</th>
            <th>Kode Pos</th>
            <th>No Resi</th>
        </tr>
    </thead>
    <tbody>
    	<?php foreach ($model as $key => $value): ?>
        <tr>
        	<td><?php echo $value->invoice_prefix ?>-<?php echo $value->invoice_no ?></td>
        	<td><?php echo $value->shipping_first_name ?></td>
        	<td><?php echo $value->email ?></td>
        	<td><?php echo City::model()->find('id = :id', array(':id'=>$value->shipping_city))->type ?> <?php echo City::model()->find('id = :id', array(':id'=>$value->shipping_city))->city_name ?></td>
        	<td><?php echo $value->shipping_postcode ?></td>
        	<td><input type="text" name="Resi[<?php echo $value->id ?>]" class="input-block-level" value="<?php echo $value->tracking_id ?>" placeholder="No Resi"></td>
        </tr>
    	<?php endforeach ?>
    </tbody>
</table>
<?php $this->widget('bootstrap.widgets.TbButton', array(
	'buttonType'=>'submit',
	'type'=>'primary',
	'label'=>'Submit Resi',
)); ?>
</form>
<script>
	jQuery(function($) {
		$( ".datepic" ).datepicker({
		  dateFormat: "yy-mm-dd"
		});
	});
</script>