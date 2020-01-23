<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'cs-customer-form',
    // 'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>
<?php echo $form->errorSummary($model); ?>
<div class="row-fluid">
	<div class="span8">
		<div class="widget">
		<h4 class="widgettitle">Data Customer</h4>
		<div class="widgetcontent">
			<?php 
			// list province
			$criteria = new CDbCriteria();
			$criteria->group = 'province_id';
			$criteria->order = 't.id ASC';
			$master_prov = City::model()->findAll($criteria);
			$list_province = CHtml::listData($master_prov,'province_id', 'province');

			// list city
			if ($model->scenario == 'update') {
				$master_cty = City::model()->findAll('province_id ='.$model->province);
			}else{
				$master_cty = City::model()->findAll();
			}
			$list_cty = CHtml::listData($master_cty,'id', 'city_name');

			// list district
			if ($model->scenario == 'update') {
				$master_distrct = Subdistrict::model()->findAll('city_id ='.$model->city);
			} else {
				$master_distrct = Subdistrict::model()->findAll();
			}
			$list_distrct = CHtml::listData($master_distrct,'id', 'subdistrict_name');			
			?>
			<div class="row-fluid">
				<div class="span4">
					<?php echo $form->textFieldRow($model,'first_name',array('class'=>'span12','maxlength'=>100)); ?>
					<?php echo $form->textFieldRow($model,'last_name',array('class'=>'span12','maxlength'=>100)); ?>
					<?php echo $form->textFieldRow($model,'hp',array('class'=>'span12','maxlength'=>20)); ?>
				</div>
				<div class="span4">
					<?php echo $form->textFieldRow($model,'address',array('class'=>'span12')); ?>
					<?php echo $form->dropDownListRow($model,'city', $list_cty, array('empty'=>'-- Pilih Kota --', 'class'=>'span12')); ?>
					<?php echo $form->textFieldRow($model,'postcode',array('class'=>'span12')); ?>
				</div>
				<div class="span4">
					<?php echo $form->dropDownListRow($model,'province', $list_province, array('empty'=>'-- Pilih Provinsi --', 'class'=>'span12')); ?>
					<?php echo $form->dropDownListRow($model,'district', $list_distrct, array('empty'=>'-- Pilih Kecamatan --', 'class'=>'span12')); ?>
				</div>
			</div>


		</div>
		</div>

		<div class="alert">
		  <button type="button" class="close" data-dismiss="alert">×</button>
		  <strong>Warning!</strong> Fields with <span class="required">*</span> are required.
		</div>
		
	</div>
	<div class="span4">
		<div class="widgetbox block-rightcontent">                        
		    <div class="headtitle">
		        <h4 class="widgettitle">Action</h4>
		    </div>
		    <div class="widgetcontent">
				<?php $this->widget('bootstrap.widgets.TbButton', array(
					'buttonType'=>'submit',
					'type'=>'primary',
					'label'=>$model->isNewRecord ? 'Simpan dan Tambahkan' : 'Simpan',
					'htmlOptions'=>array('class'=>'btn-large'),
				)); ?>
				<?php $this->widget('bootstrap.widgets.TbButton', array(
					// 'buttonType'=>'submit',
					// 'type'=>'info',
					'url'=>CHtml::normalizeUrl(array('index')),
					'label'=>'Reset',
					'htmlOptions'=>array('class'=>'btn-large'),
				)); ?>
		    </div>
		</div>
		<div class="divider15"></div>
		<div class="widget">
		<h4 class="widgettitle">Data Login</h4>
		<div class="widgetcontent">
        	<?php echo $form->dropDownListRow($model, 'level', array(
        		'0'=>'Member',
        		'1'=>'Vendor',
        	), array('class'=>'span12')); ?>

			<?php echo $form->textFieldRow($model,'diskon',array('class'=>'span12','maxlength'=>200)); ?>

			<?php echo $form->textFieldRow($model,'email',array('class'=>'span12','maxlength'=>200)); ?>

			<?php echo $form->passwordFieldRow($model,'pass',array('class'=>'span12','maxlength'=>100)); ?>

			<?php echo $form->passwordFieldRow($model,'pass2',array('class'=>'span12','maxlength'=>100)); ?>

        	<?php echo $form->dropDownListRow($model, 'aktif', array(
        		'1'=>'Aktif',
        		'0'=>'Tidak Aktif',
        	), array('class'=>'span12')); ?>
            <div class="divider5"></div>
			<div class="alert">
			  <button type="button" class="close" data-dismiss="alert">×</button>
			  Kosongkan password jika tidak ingin di ganti
			</div>

		</div>
		</div>
	</div>
</div>
<?php $this->endWidget(); ?>
<script type="text/javascript">
jQuery(document).ready(function($){
	$('#MeMember_province').change(function() {
	    $.ajax({
	        method: "GET",
	        url: "<?php echo CHtml::normalizeUrl(array('/member/getkota')); ?>",
	        data: { id: $('#MeMember_province').val() }
	    }).done(function(e) {
	        $('#MeMember_city').html(e);
	    });     
	});

	$('#MeMember_city').change(function() {
	    $.ajax({
	        method: "GET",
	        url: "<?php echo CHtml::normalizeUrl(array('/member/getkecamatan')); ?>",
	        data: { id: $('#MeMember_city').val() }
	    }).done(function(e) {
	        $('#MeMember_district').html(e);
	    });     
	});
})
</script>