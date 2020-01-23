<section class="home-middle-content padding-top-50">
    <div class="prelatife container">
        <div class="clear height-15"></div>
        <div class="box-header-top-breadcumb">
        <div class="row">
          <div class="col-md-12 col-sm-12">
            <div class="breadcumb">
                <a href="<?php echo CHtml::normalizeUrl(array('/home/index')); ?>">Home</a>
                &gt; Forgot Password
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
							<div class="height-50"></div>
							<div class="height-10"></div>
							<p>Enter your email address to recover / reset your forgotten password</p>
							<?php echo CHtml::errorSummary($modelLogin, '', '', array('class'=>'alert alert-danger')); ?>
							<div class="clear height-30"></div>
					    	<?php echo $form->textField($modelLogin, 'username', array('class'=>'form-control', 'style'=>'display: inline-block; width: auto; height: 30px;', 'plcaholder'=>'Email Address')) ?>
					    	<button type="submit" class="btn back-btn-primary-gold">SUBMIT</button>
						</div>
						 

					</div>
<?php $this->endWidget(); ?>

			</div>
			<div class="height-50"></div>
			<div class="height-50"></div>

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



