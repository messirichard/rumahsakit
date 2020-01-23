<?php 
$session=new CHttpSession;
$session->open();
$login_member = $session['login_member'];
?>
<?php if (!isset($login_member)): ?>
<script type="text/javascript">
	$(document).ready(function(){
		$('#feedback input.form-control,#feedback textarea,#feedback select,#feedback button').prop('disabled', 'disabled');
	});
</script>
<?php endif ?>
<div id="content" class="shuttershock customs_cpage">
	
	<div class="container small-width outers_form_testimonial" id="feedback">

		<article class="color2">
			<h1 class="title-page"><?php echo $this->setting['feedback_title'] ?></h1>
			<div class="clear height-10"></div>

			<?php echo $this->setting['feedback_content'] ?>
			
			<?php if (!isset($login_member)): ?>
				<div class="alert alert-warning">
					<p style="margin-bottom: 0px;">Anda harus login terlebih dahulu sebelum mengirim testimonial</p>
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
				<label><?php echo Tt::t('front', 'name') ?></label>
				<?php echo $form->textField($model, 'nama', array('class'=>'form-control')) ?>
			</p>

			<p>
				<label><?php echo Tt::t('front', 'your email address') ?></label>
				<?php echo $form->textField($model, 'email', array('class'=>'form-control')) ?>
			</p>

			<p>
				<label><?php echo Tt::t('front', 'subject') ?></label>
				<?php echo $form->textField($model, 'subjek', array('class'=>'form-control')) ?>
			</p>

			<p>
				<label><?php echo Tt::t('front', 'subject') ?></label>
				<?php echo $form->textField($model, 'subjek', array('class'=>'form-control')) ?>
			</p>

			<p>
				<label><?php echo Tt::t('front', 'message') ?></label>
				<?php echo $form->textArea($model, 'pesan', array('class'=>'form-control')) ?>
			</p>
			<p>
				<!-- <label>verification *</label><br />
				<span style="text-transform:none !important">Type the characters you see in the pictures; if you can't read them, submit the form and a new image will 	generated. Not case sensitive. Switch to <a href="#">audio verification</a></span>
				<input type="text" name="amount" class="form-control" /> -->
				<div class="g-recaptcha" data-sitekey="6LcKyiUTAAAAADl3LvgsX8eDktzMzXN9UU_YTt_s"></div>
			</p>

			<p class=" text-center">
				<input type="submit" name="send" class="upp btn btn-bear" value="send" />
			</p>

		<?php $this->endWidget(); ?>

		<!-- <div id="testimoni" class="text-center" style="margin-top:50px">
	        <p><?php // echo nl2br($this->setting['home_testimoni']) ?></p>
	        <span><?php // echo $this->setting['home_testimoni_name'] ?></span>
		</div> -->

	</div><!-- .container -->

</div><!-- #content -->