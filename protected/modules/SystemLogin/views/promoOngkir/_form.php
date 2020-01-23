<?php if(Yii::app()->user->hasFlash('success')): ?>

    <?php $this->widget('bootstrap.widgets.TbAlert', array(
        'alerts'=>array('success'),
    )); ?>

<?php endif; ?>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'promo-ongkir-form',
    'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

<?php echo $form->errorSummary($model); ?>

<div class="row-fluid">
	<div class="span6">
		<div class="widget">
			<h4 class="widgettitle">Data PromoOngkir</h4>
			<div class="widgetcontent">
				<?php echo $form->textFieldRow($model,'maxnilaikg', array('class'=>'span5', 'hint'=>'Potongan dalam kg setiap produk<br>Note: Isi nilai kg dengan angka')); ?>
				<?php echo $form->dropDownListRow($model, 'status', array(
			        		'0'=>'Non Aktif',
			        		'1'=>'Aktif',
			        	)); ?>

				<?php echo $form->textFieldRow($model,'date_end', array('class'=>'span5 datepicker', 'hint'=>'Note: Masa berakhir promo')); ?>
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
		<!-- end widget -->
	</div>
	<div class="span6">
		<div class="widget">
			<h4 class="widgettitle">Pilih Data Product</h4>
			<div class="widgetcontent">
					<?php echo $form->dropDownListRow($model, 'id_product', $list_prd, array('multiple'=>'multiple')); ?>
				<!-- end control group -->
			</div>
		</div>
	</div>
</div>



<div class="alert">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Warning!</strong> Fields with <span class="required">*</span> are required.
</div>

<?php $this->endWidget(); ?>
<style type="text/css">
	select#PromoOngkir_id_product{
		min-height: 200px; height: auto;
	}
</style>
<?php 
	$ds_promoongkir = PromoOngkirProduct::model()->findAll('id_promo = :id_promo', array(':id_promo'=> $model->id));
?>
<script type="text/javascript">
	jQuery(document).ready(function($){
		<?php foreach ($ds_promoongkir as $key => $value): ?>
	  	<?php $strs .= "'$value->id_product',"; ?>
		<?php endforeach ?>
		
		var obj = [<?php echo substr($strs, 0, -1) ?>];

		jQuery.each( obj, function( i, val ) {
			// alert(val);
			$('select#PromoOngkir_id_product option[value="' + val + '"]').attr( "selected", "selected" );
		});
	});
</script>