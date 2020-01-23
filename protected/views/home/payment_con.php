<?php 
$session=new CHttpSession;
$session->open();
$login_member = $session['login_member'];
?>
<?php if (!isset($login_member)): ?>
<script type="text/javascript">
	$(document).ready(function(){
		$('#payment-confirmation input.form-control,#payment-confirmation textarea,#payment-confirmation select,#payment-confirmation button').prop('disabled', 'disabled');
	});
</script>
<?php endif ?>
<div id="content" class="shuttershock customs_cpage">
	
	<div class="container small-width" id="payment-confirmation">

		<article class="color2">
			<h1 class="title-page"><?php echo $this->setting['payment_title'] ?></h1>
			<div class="clear height-10"></div>

			<?php echo $this->setting['payment_content'] ?>
			
			<?php if (!isset($login_member)): ?>
				<div class="alert alert-warning">
					<p style="margin-bottom: 0px;">Anda harus login terlebih dahulu untuk melakukan konfirmasi pembayaran</p>
				</div>
			<?php endif ?>	
		</article>

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    // 'id'=>'login-form',
    // 'type'=>'horizontal',
    // 'action'=>array('index'),
    //'htmlOptions'=>array('class'=>'well'),
	'enableClientValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
)); ?>
<?php echo CHtml::errorSummary($model, '', '', array('class'=>'alert alert-danger')); ?>
            <?php if(Yii::app()->user->hasFlash('success')): ?>
            
                <?php $this->widget('bootstrap.widgets.TbAlert', array(
                    'alerts'=>array('success'),
                )); ?>
            
            <?php endif; ?>
			
			<p>
				<label><?php echo Tt::t('front', 'order number') ?> *</label>
				<?php if ($_GET['nota'] != ''):
				$model->order_id = $_GET['nota'];
				endif ?>
				<?php echo $form->textField($model, 'order_id', array('class'=>'form-control')) ?>
			</p>

			<p>
				<label><?php echo Tt::t('front', 'name in bank account') ?> *</label>
				<?php echo $form->textField($model, 'name', array('class'=>'form-control')) ?>
			</p>

			<p>
				<label><?php echo Tt::t('front', 'bank name') ?> *</label>
				<?php echo $form->textField($model, 'bank_name', array('class'=>'form-control')) ?>
			</p>

			<p>
				<label><?php echo Tt::t('front', 'amount transferred') ?> (idr) *</label>
				<?php echo $form->textField($model, 'amount', array('class'=>'form-control')) ?>
			</p>
			<p class="help-block alert alert-warning">*) Jumlah transfer harus berupa angka, tidak boleh memakai karakter</p>

			<p>
				<label><?php echo Tt::t('front', 'transfer to') ?> *</label>
<?php
$bank = Bank::model()->findAll();
$bankData = array();
foreach ($bank as $key => $value) {
	$bankData[$value->id] = ListBank::model()->findByPk($value->id_bank)->nama.' '.$value->rekening.' an '.$value->nama;
}
?>
				<?php echo $form->dropDownList($model, 'transfer_to', $bankData,array('class'=>'form-control')) ?>
			</p>

			<p>
				<label><?php echo Tt::t('front', 'date of transfer') ?> *</label>
				<?php echo $form->textField($model, 'date_transfer', array('class'=>'form-control datepic')) ?>
			</p>

			<p>
				<!-- <label>verification *</label><br />
				<span style="text-transform:none !important">Type the characters you see in the pictures; if you can't read them, submit the form and a new image will 	generated. Not case sensitive. Switch to <a href="#">audio verification</a></span>
				<input type="text" name="amount" class="form-control" /> -->
				<div class="g-recaptcha" data-sitekey="6LcKyiUTAAAAADl3LvgsX8eDktzMzXN9UU_YTt_s"></div>
			</p>

			<p class="upp color1">(*) <?php echo Tt::t('front', 'Required') ?></p>

			<p class="text-center"><input type="submit" name="submit" value="send" class="btn btn-bear upp" /></p>

<?php $this->endWidget(); ?>

		<!-- <div id="testimoni" class="text-center" style="margin-top:50px">
	        <p><?php //echo nl2br($this->setting['home_testimoni']) ?></p>
	        <span><?php //echo $this->setting['home_testimoni_name'] ?></span>
		</div> -->

	</div><!-- .container -->

</div><!-- #content -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script>
	// $(function() {
		jQuery( ".datepic" ).datepicker({
		  dateFormat: "yy-mm-dd"
		});
	// });
</script>