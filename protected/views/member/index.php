<section class="home-middle-content padding-top-50">
    <div class="prelatife container">
        <div class="clear height-15"></div>
        <div class="box-header-top-breadcumb">
        <div class="row">
          <div class="col-md-12 col-sm-12">
            <div class="breadcumb">
                <a href="<?php echo CHtml::normalizeUrl(array('/home/index')); ?>"><?php echo Tt::t('front', 'Home') ?></a>
                &gt; <?php echo Tt::t('front', 'Login / Register') ?>
            </div>
          </div>
        </div>
        </div>


        <div class="prelatife product-list-warp content-text">
            <div class="box-featured-latestproduct" id="cart-shop">
                <div class="box-product-detailg">


	<!-- /. Start Content About -->
	<div class="inside-content">
		<div class="m-ins-content m-ins-myaccount margin-bottom-30">
			<?php if(Yii::app()->user->hasFlash('success')): ?>
			
			    <?php $this->widget('bootstrap.widgets.TbAlert', array(
			        'alerts'=>array('success'),
			    )); ?>
			
			<?php endif; ?>
			<div class="margin-15 ml-0 mr-0">
			
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-12">

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'login-form',
    'type'=>'horizontal',
    //'htmlOptions'=>array('class'=>'well'),
	'enableClientValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
)); ?>
					<div class="box-account-history">
						<h1 class="title"><?php echo Tt::t('front', 'Login / My Account') ?></h1>
						<div class="clear height-30"></div>
						
						<div class="basic-information form-horizontal">
						<?php echo CHtml::errorSummary($modelLogin, '', '', array('class'=>'alert alert-danger')); ?>
						<div class="form-group">
							<?php echo $form->labelEx($modelLogin, 'username', array('class'=>'control-label col-sm-4')) ?>
						    <div class="col-sm-5">
						    	<?php echo $form->textField($modelLogin, 'username', array('class'=>'form-control')) ?>
						    </div>
						</div>
						<div class="form-group">
							<?php echo $form->labelEx($modelLogin, 'password', array('class'=>'control-label col-sm-4')) ?>
						    <div class="col-sm-5">
						    	<?php echo $form->passwordField($modelLogin, 'password', array('class'=>'form-control')) ?>
						    </div>
						</div>
					 
					    <div class="form-group">
						    <label class="col-sm-4 control-label" for="input"></label>
						    <div class="col-sm-8">
						    	<button type="submit" class="btn btn-primary"><?php echo Tt::t('front', 'LOGIN') ?></button>
						    	&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo CHtml::normalizeUrl(array('forgot')); ?>" class="forgot-password"><?php echo Tt::t('front', 'Forgot Password?') ?></a>
						    </div>
					    </div>
						 

						 </div>
					</div>
<?php $this->endWidget(); ?>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12">
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'daftar-form',
    // 'type'=>'horizontal',
	'enableClientValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
)); ?>
					<div class="box-infomation-account border-left-brown padding-left-50">
						<div class="basic-information form-horizontal">
						<h1 class="title"><?php echo Tt::t('front', 'New Customer Sign Up') ?></h1>
						<div class="clear height-30"></div>
								
								<?php echo CHtml::errorSummary($model, '', '', array('class'=>'alert alert-danger')); ?>

								
								<div class="form-group">
									<?php echo $form->labelEx($model, 'email', array('class'=>'control-label col-sm-4')) ?>
								    <div class="col-sm-5">
								    	<?php echo $form->textField($model, 'email', array('class'=>'form-control')) ?>
								    </div>
								</div>
								<div class="form-group">
									<?php echo $form->labelEx($model, 'pass', array('class'=>'control-label col-sm-4')) ?>
								    <div class="col-sm-5">
								    	<?php echo $form->passwordField($model, 'pass', array('class'=>'form-control')) ?>
								    </div>
								</div>
								<div class="form-group">
									<?php echo $form->labelEx($model, 'pass2', array('class'=>'control-label col-sm-4')) ?>
								    <div class="col-sm-5">
								    	<?php echo $form->passwordField($model, 'pass2', array('class'=>'form-control')) ?>
								    </div>
								</div>

						 </div>

						 <div class="clear height-0"></div>
						 <div class="lines-grey"></div>
						 <div class="clear height-20"></div>
						 <div class="height-2"></div>

						 <div class="basic-information form-horizontal">
						 	<h4><?php echo Tt::t('front', 'DELIVERY INFORMATION') ?></h4>
						 	<div class="clear height-25"></div>


								<div class="form-group">
									<?php echo $form->labelEx($model, 'first_name', array('class'=>'control-label col-sm-4')) ?>
								    <div class="col-sm-5">
								    	<?php echo $form->textField($model, 'first_name', array('class'=>'form-control')) ?>
								    </div>
								</div>
								<div class="form-group">
									<?php echo $form->labelEx($model, 'last_name', array('class'=>'control-label col-sm-4')) ?>
								    <div class="col-sm-5">
								    	<?php echo $form->textField($model, 'last_name', array('class'=>'form-control')) ?>
								    </div>
								</div>
								<div class="form-group">
									<?php echo $form->labelEx($model, 'hp', array('class'=>'control-label col-sm-4')) ?>
								    <div class="col-sm-5">
								    	<?php echo $form->textField($model, 'hp', array('class'=>'form-control')) ?>
								    </div>
								</div>
								<div class="form-group">
									<?php echo $form->labelEx($model, 'address', array('class'=>'control-label col-sm-4')) ?>
								    <div class="col-sm-5">
								    	<?php echo $form->textField($model, 'address', array('class'=>'form-control')) ?>
								    </div>
								</div>
								<div class="form-group">
									<?php echo $form->labelEx($model, 'province', array('class'=>'control-label col-sm-4')) ?>
								    <div class="col-sm-5">
								    	<?php echo $form->dropDownList($model, 'province',CHtml::listData(City::model()->findAll('1 GROUP BY province_id'), 'province_id', 'province'), array('class'=>'form-control', 'empty'=>'Select Province')) ?>
								    </div>

								</div>
								
								<div class="form-group">
                                    <?php echo $form->labelEx($model, 'city', array('class'=>'control-label col-sm-4')) ?>
                                    <div class="col-sm-5">
                                        <?php echo $form->dropDownList($model, 'city',array(), array('class'=>'form-control', 'empty'=>'Select City')) ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'district', array('class'=>'control-label col-sm-4')) ?>
                                    <div class="col-sm-5">
                                        <?php echo $form->dropDownList($model, 'district',array(), array('class'=>'form-control', 'empty'=>'Select District')) ?>
                                    </div>
                                </div>
<script type="text/javascript">
    $('#MeMember_province').change(function() {
        $.ajax({
            method: "GET",
            url: "<?php echo CHtml::normalizeUrl(array('getkota')); ?>",
            data: { id: $('#MeMember_province').val() }
        }).done(function(e) {
            $('#MeMember_city').html(e);
        });     
    })

    $.ajax({
        method: "GET",
        url: "<?php echo CHtml::normalizeUrl(array('getkota')); ?>",
        data: { id: $('#MeMember_province').val() }
    }).done(function(e) {
        $('#MeMember_city').html(e);
        $('#MeMember_city').val('<?php echo $model->city ?>');
    });

    // get district
    $('#MeMember_province').change(function() {
        $.ajax({
            method: "GET",
            url: "<?php echo CHtml::normalizeUrl(array('getkota')); ?>",
            data: { id: $('#MeMember_province').val() }
        }).done(function(e) {
            $('#MeMember_city').html(e);
        });     
    })
    
    $.ajax({
        method: "GET",
        url: "<?php echo CHtml::normalizeUrl(array('getkota')); ?>",
        data: { id: $('#MeMember_province').val() }
    }).done(function(e) {
        $('#MeMember_city').html(e);
        $('#MeMember_city').val('<?php echo $model->city ?>');
    });     

    $('#MeMember_city').change(function() {
        $.ajax({
            method: "GET",
            url: "<?php echo CHtml::normalizeUrl(array('/member/getkecamatan')); ?>",
            data: { id: $('#MeMember_city').val() }
        }).done(function(e) {
            $('#MeMember_district').html(e);
        });
        return false;
    });

    <?php if ($model->city): ?>
    $.ajax({
            method: "GET",
            url: "<?php echo CHtml::normalizeUrl(array('/member/getkecamatan')); ?>",
            data: { id: <?php echo $model->city ?> }
        }).done(function(e) {
            $('#MeMember_district').html(e);
            $('#MeMember_district').val('<?php echo $model->district; ?>');
    });
    <?php endif ?>
</script>

								<div class="form-group">
									<?php echo $form->labelEx($model, 'postcode', array('class'=>'control-label col-sm-4')) ?>
								    <div class="col-sm-5">
								    	<?php echo $form->textField($model, 'postcode', array('class'=>'form-control')) ?>
								    </div>
								</div>





							    <div class="form-group">
								    <label class="col-sm-4 control-label" for="input"></label>
								    <div class="col-sm-5">
								    	<button type="submit" class="btn btn-primary"><?php echo Tt::t('front', 'SIGN UP') ?></button>
								    </div>
							    </div>

						 </div>

					</div>
<?php $this->endWidget(); ?>
				</div>
			</div>
			</div>
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
