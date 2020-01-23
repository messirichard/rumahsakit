<section class="home-middle-content padding-top-50">
    <div class="prelatife container">
        <div class="clear height-15"></div>
        <div class="box-header-top-breadcumb">
        <div class="row">
          <div class="col-md-12 col-sm-12">
            <div class="breadcumb">
                <a href="<?php echo CHtml::normalizeUrl(array('/home/index')); ?>">Home</a>
                &gt; Change Password
            </div>
          </div>
        </div>
        </div>



	<!-- /. Start Content About -->
	<div class="inside-content">
		<div class="m-ins-content m-ins-myaccount">
			<?php if(Yii::app()->user->hasFlash('success')): ?>
			
			    <?php $this->widget('bootstrap.widgets.TbAlert', array(
			        'alerts'=>array('success'),
			    )); ?>
			
			<?php endif; ?>
			<div class="margin-15">
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'login-form',
    'type'=>'horizontal',
    // 'action'=>array('index'),
    //'htmlOptions'=>array('class'=>'well'),
	'enableClientValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
)); ?>
					<div class="box-account-history">
						<div class="center">
							<div class="clear height-30"></div>
							<p>Enter your new password to access Mama Bear.</p>
							<div class="clear height-30"></div>
							<div class="basic-information form-horizontal col-md-6" style="margin: 0px auto; float: none;">
								<?php echo CHtml::errorSummary($model, '', '', array('class'=>'alert alert-danger')); ?>
								<div class="form-group">
									<?php echo $form->labelEx($model, 'pass', array('class'=>'control-label col-sm-4')) ?>
								    <div class="col-sm-5">
								    	<?php echo $form->passwordField($model, 'pass', array('class'=>'form-control')) ?>
								    </div>
								</div>

								<?php echo CHtml::errorSummary($model, '', '', array('class'=>'alert alert-danger')); ?>
								<div class="form-group">
									<?php echo $form->labelEx($model, 'pass2', array('class'=>'control-label col-sm-4')) ?>
								    <div class="col-sm-5">
								    	<?php echo $form->passwordField($model, 'pass2', array('class'=>'form-control')) ?>
								    </div>
								</div>
							 
							    <div class="form-group">
								    <label class="col-sm-4 control-label" for="input"></label>
								    <div class="col-sm-8" style="text-align: left;">
								    	<button type="submit" class="btn back-btn-primary-gold">SUBMIT</button>
								    </div>
							    </div>
							</div>
						</div>
						
					</div>
<?php $this->endWidget(); ?>

			</div>
			<div class="height-30"></div>
			<div class="height-30"></div>

			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
	<!-- /. End Content About -->

                </div>
            </div>
        </div>



    </div>
    <div class="clear"></div>
</section>

