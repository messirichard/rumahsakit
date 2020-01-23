<?php
$session=new CHttpSession;
$session->open();
$login_member = $session['login_member'];
?>
<section class="home-middle-content padding-top-50">
    <div class="prelatife container">
        <div class="clear height-15"></div>
        <div class="box-header-top-breadcumb">
        <div class="row">
          <div class="col-md-12">
            <div class="breadcumb">
                <a href="<?php echo CHtml::normalizeUrl(array('/home/index')); ?>"><?php echo Tt::t('front', 'Home') ?></a>
                &gt; <?php echo Tt::t('front', 'Detail Pembelian') ?>
            </div>
          </div>
          
        </div>
        </div>
        <div class="clear height-30"></div>
        
        <div class="outer-cont-carts">
            <div class="row">
                <div class="col-md-8">
                    <div class="left-conts-tabl-cart content-text">
                        <div id="cart-shop">

                        <?php if (count($data)>0): ?>
                        <div class="table-responsive">
	                        <table class="table table-hover shopcart">
	                            <thead>
	                                <tr>
	                                    <td style="width: 51%;"><?php echo Tt::t('front', 'ITEM') ?></td>
	                                    <td style="width: 24%;"><?php echo Tt::t('front', 'ORDER DETAIL') ?></td>
	                                    <td><?php echo Tt::t('front', 'PRICE') ?></td>
	                                    <td>&nbsp;</td>
	                                </tr>
	                            </thead>
	                            <tbody>
	                            <?php $total = 0 ?>
	                            <?php $weight = 0 ?>
	                            <?php foreach ($data as $key => $value): ?>
	                            <?php
	                                    if ($value['option'] != '') {
	                                        $option = PrdProductAttributes::model()->find('id_str = :id_str', array(':id_str'=>$value['option']));
	                                        $value['price'] = $option->price;
	                                    }
                                        $product = PrdProduct::model()->findByPk($value['id']);
                                        $weightItem = $product->berat;
	                            ?>
	                            <tr>
	                                <td>
	                                    <div class="fleft pic">
	                                        <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(70,100, '/images/product/'.$value['image'] , array('method' => 'resize', 'quality' => '90')) ?>" alt="">
	                                    </div>
	                                    <div class="fleft nm-descr margin-left-15 maw250">
	                                        <span class="name"><?php echo $value['name'] ?></span> <div class="clear height-3"></div>
	                                        <span class="cat"><?php echo ViewCategory::model()->find('id = :id', array(':id'=>$product->category_id))->name ?></span>
	                                        <div class="clear height-1"></div>
                                			<span><?php $uns1_isi = unserialize($product->data); echo $uns1_isi['qty_box']. " Box"; ?></span>
	                                    </div>
	                                </td>
	                                <td>
	                                <form action="<?php echo CHtml::normalizeUrl(array('/product/edit')); ?>" method="post">
                                    <?php if ($value['option'] != ''): ?>
                                    <?php echo $option->attribute ?> <div class="clear height-5"></div>
                                    <input type="hidden" value="<?php echo $value['option'] ?>" name="option">
                                    <?php endif ?>
                                    <?php if ($value['optional']['box'] != ''): ?>
                                    With box + <?php echo Cart::money($value['optional']['box']) ?> <div class="clear height-5"></div>
                                    <?php
                                    $value['price'] = $value['optional']['box'] + $value['price'];
                                    ?>
                                    <?php endif ?>
	                                QTY &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $value['qty'] ?>
	                                <input type="hidden" value="<?php echo $value['id'] ?>" name="id">
	                                <?php if (count($value['optional']) > 0 AND $value['optional'] != ''): ?>
	                                    <?php foreach ($value['optional'] as $k => $v): ?>
	                                    <input type="hidden" value="<?php echo $v ?>" name="option[<?php echo $k ?>]">
	                                    <?php endforeach ?>
	                                <?php endif ?>
	                                </form>
	                                </td>
	                                <td>
	                                <span class="price"><?php echo Cart::money($subTotal = $value['price']*$value['qty']) ?></span>
	                                </td>
		                            <?php 
		                            	// Call table uniqTransfer
		                            	$uniq_transfer = UniqTransfer::model()->findByPk(1)->number;
		                            	if ($uniq_transfer == 0) {
		                            		$uniq_transfer = $uniq_transfer+1;
		                            	}
		                             $total = $total + $subTotal;

		                             // produk khusus berat di kurangi
		                             $get_prm_ongkir = Promote_ongkir::promote($product->id);
		                             if ($get_prm_ongkir != false) {
		                             	$weight = (($weightItem*$value['qty']) - intval($get_prm_ongkir['nilai_potongan_kg'] * 1000)) + $weight;
		                             } else {
		                            	$weight = ($weightItem*$value['qty']) + $weight; 
		                             }
		                             ?>
	                                <td>
	                                  <?php if ($get_prm_ongkir != false): ?>
	                                  	<img class="promote_im" src="<?php echo $this->assetBaseurl ?>free-shipping.png" alt="">
	                                  <?php endif ?>
	                                  <span class="hidden hide"><?php echo $weight; ?></span>
	                                </td>
	                            </tr>
	                            <?php endforeach ?>
	                            <?php $weight = max($weight,0); ?>
	                            <tr class="sub_total">
	                                <td>&nbsp;</td>
	                                <td class="text-right"><span class="totl"><?php echo Tt::t('front', 'SUBTOTAL') ?></span></td>
	                                <td><span class="price"><?php echo Cart::money($total) ?></span></td>
	                                <td>&nbsp;</td>
	                            </tr>

	                             <tr class="sub_total">
	                                <td>&nbsp;</td>
	                                <td class="text-right"><span class="totl"><?php echo Tt::t('front', 'Tarif Pengiriman') ?></span></td>
	                                <td><span class="price" id="totalshipping">NA</span> (<?php echo $weight ?>g)</td>
	                                <td>&nbsp;</td>
	                            </tr>
	                            <?php $total = $total  + $uniq_transfer; ?>
	                            <tr class="sub_total">
	                                <td>&nbsp;</td>
	                                <td class="text-right"><span class="totl">Total <?php echo Tt::t('front', 'kode unik') ?></span></td>
	                                <td><span class="price" id="grandtotal2"><?php echo Cart::money($uniq_transfer) ?>,-</span></td>
	                                <td>&nbsp;</td>
	                            </tr>
	                             <tr class="sub_total">
	                                <td>&nbsp;</td>
	                                <td class="text-right"><span class="totl"><?php echo Tt::t('front', 'TOTAL') ?></span></td>
	                                <td><span class="price" id="grandtotal"><?php echo Cart::money($total) ?></span></td>
	                                <td>&nbsp;</td>
	                            </tr>
	                            </tbody>
	                        </table>
	                        <div class="alert alert-danger text-left">
	                        	<p><b>Mohon diperhatikan petunjuk dibawah ini:</b>
	                        		<br>
	                        		* Transfer: <b><?php echo Cart::money($total); ?></b> (sama persis/ jangan dibulatkan) <br>
	                        		* Kesalahan jumlah transfer yg merugikan Mamabear, bukan tanggung jawab Mamabear <br>
	                        		* Setelah melakukan transfer segera konfirmasi pembayaran anda kepada Mamabear
	                        	</p>
	                        </div>
	                    </div>

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'shipping-form',
    'type'=>'horizontal',
    //'htmlOptions'=>array('class'=>'well'),
	'enableClientValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
)); ?>
                                <?php echo $form->errorSummary($model, '', '', array('class' => 'alert alert-danger')); ?>
                                <?php if(Yii::app()->user->hasFlash('success')): ?>
                                    <?php $this->widget('bootstrap.widgets.TbAlert', array(
                                        'alerts'=>array('success'),
                                    )); ?>
                                <?php endif; ?>
<?php if ($login_member == null): ?>
								<h3><?php echo Tt::t('front', 'User Login') ?></h3>
								<div class="basic-information">
								<div class="height-20"></div>
<div>

	<!-- Nav tabs -->
	<ul class="nav nav-tabs">
		<li class="active"><a class="tombol-daftar" href="#daftar"><?php echo Tt::t('front', 'New Member') ?></a></li>
		<li><a class="tombol-daftar" href="#login"><?php echo Tt::t('front', 'Login') ?></a></li>
	</ul>

</div>
								<input type="hidden" name="OrOrder[type_login]" value="new" id="OrOrder_type_login">
								<div class="height-20"></div>
		                        <div class="row">
		                            <div class="col-md-6 col-sm-6">
										<div class="form-group">
											<?php echo $form->labelEx($model, 'email', array('class'=>'col-sm-4 control-label')); ?>
										    <div class="col-sm-7">
										    <?php echo $form->textField($model, 'email', array('class'=>'form-control')); ?>
										    </div>
										</div>
									</div>
		                            <div class="col-md-6 col-sm-6">
										<div class="form-group">
											<?php echo $form->labelEx($model, 'pass', array('class'=>'col-sm-4 control-label')); ?>
										    <div class="col-sm-7">
										    <?php echo $form->passwordField($model, 'pass', array('class'=>'form-control')); ?>
										    </div>
										</div>
										<div class="daftar-baru">
											<div class="form-group">
												<?php echo $form->labelEx($model, 'confirm_pass', array('class'=>'col-sm-4 control-label')); ?>
											    <div class="col-sm-7">
											    <?php echo $form->passwordField($model, 'confirm_pass', array('class'=>'form-control')); ?>
											    </div>
											</div>
										</div>
									</div>
								</div>
								<script>
								$('a.tombol-daftar').on('click',function() {
									$(this).parent().parent().find('li').removeClass('active');
									$(this).parent().addClass('active');
									if ($(this).attr('href') == '#daftar') {
										$('.daftar-baru').show();
										$('#OrOrder_type_login').val('new');
									}else{
										$('.daftar-baru').hide();
										$('#OrOrder_type_login').val('login');
									};
								})
								</script>
								</div>
<?php else: ?>
	<input type="hidden" name="OrOrder[email]" value="<?php echo $login_member['email'] ?>">
	<input type="hidden" name="OrOrder[type_login]" value="" id="OrOrder_type_login">
<?php endif ?>
								<div class="daftar-baru">
									<h3><?php echo Tt::t('front', 'Shipping') ?></h3>
									<div class="basic-information">
									<div class="height-20"></div>
			                        <div class="row">
			                            <div class="col-md-6 col-sm-6">

												<div class="form-group">
													<?php echo $form->labelEx($model, 'shipping_first_name', array('class'=>'col-sm-4 control-label')); ?>
												    <div class="col-sm-7">
												    <?php echo $form->textField($model, 'shipping_first_name', array('class'=>'form-control')); ?>
												    </div>
												</div>

												<div class="form-group">
													<?php echo $form->labelEx($model, 'shipping_last_name', array('class'=>'col-sm-4 control-label')); ?>
												    <div class="col-sm-7">
												    <?php echo $form->textField($model, 'shipping_last_name', array('class'=>'form-control')); ?>
												    </div>
												</div>
												<div class="form-group">
													<?php echo $form->labelEx($model, 'phone', array('class'=>'col-sm-4 control-label')); ?>
												    <div class="col-sm-7">
												    <?php echo $form->textField($model, 'phone', array('class'=>'form-control')); ?>
												    </div>
												</div>
												<div class="form-group">
													<?php echo $form->labelEx($model, 'shipping_address_1', array('class'=>'col-sm-4 control-label')); ?>
												    <div class="col-sm-7">
												    <?php echo $form->textField($model, 'shipping_address_1', array('class'=>'form-control')); ?>
												    </div>
												</div>

			                            </div>
			                            <div class="col-md-6 col-sm-6">


												<div class="form-group">
													<?php echo $form->labelEx($model, 'shipping_zone', array('class'=>'col-sm-4 control-label')); ?>
												    <div class="col-sm-7">
			                                        <?php echo $form->dropDownList($model, 'shipping_zone',CHtml::listData(City::model()->findAll('1 GROUP BY province_id'),'province_id', 'province'), array('class'=>'form-control', 'empty'=>'Select State')) ?>
												    </div>
												</div>

												<div class="form-group">
													<?php echo $form->labelEx($model, 'shipping_city', array('class'=>'col-sm-4 control-label')); ?>
												    <div class="col-sm-7">
												    <?php echo $form->dropDownList($model, 'shipping_city',array(), array('class'=>'form-control', 'empty'=>'Select City')) ?>
												    </div>
												</div>

												<div class="form-group">
													<?php echo $form->labelEx($model, 'shipping_district', array('class'=>'col-sm-4 control-label')); ?>
												    <div class="col-sm-7">
												    <?php echo $form->dropDownList($model, 'shipping_district',array(), array('class'=>'form-control', 'empty'=>'Select District')) ?>
												    </div>
												</div>

												<div class="form-group">
													<?php echo $form->labelEx($model, 'shipping_postcode', array('class'=>'col-sm-4 control-label')); ?>
												    <div class="col-sm-7">
												    <?php echo $form->textField($model, 'shipping_postcode', array('class'=>'form-control')); ?>
												    </div>
												</div>
												<?php 
												$data_list = array(
															'' => 'Pilih Kurir',
															'jne'=>'Jalur Nugraha Ekakurir',
															'wahana'=>'Wahana Prestasi Logistik',
															'jet'=>'JET Express',
														);
												?>
												<div class="form-group hidden hide vw_freeongkir_kurir"></div>
												<div class="form-group fld_kurir_d">
													<?php echo $form->labelEx($model, 'delivery_kurir', array('class'=>'col-sm-4 control-label')); ?>
												    <div class="col-sm-7">
												    <?php echo $form->dropDownList($model, 'delivery_kurir', $data_list, array('class'=>'form-control')); ?>
												    </div>
												</div>
												<div class="form-group prelatife fld_cpackage_d">
													<div id="LoadingImage">
														<img src="<?php echo Yii::app()->baseUrl; ?>/asset/images/icon_loading.gif" alt="">
													</div>
													<?php echo $form->labelEx($model, 'delivery_package', array('class'=>'col-sm-4 control-label')); ?>
												    <div class="col-sm-7">
												    <?php if ($weight == 0): ?>
												    	<?php echo $form->dropDownList($model, 'delivery_package', array(), array('class'=>'form-control')); ?>
												    <?php else: ?>
												    	<?php echo $form->dropDownList($model, 'delivery_package', array(), array('class'=>'form-control', 'required'=>'required')); ?>
												    <?php endif ?>
												    </div>
												</div>

												<!-- <div class="form-group">
													<label for="" class="control-label col-sm-4">Tarif Pengiriman</label>
													<div class="col-sm-7">
														<input type="text" class="form-control cs_tarif_pengiriman" id="Id_cs_tarif_pengiriman">
													</div>
												</div> -->
			                            </div>
			                        </div>
									</div>


									<h3><?php echo Tt::t('front', 'Payment') ?></h3>
									<div class="basic-information">
									<div class="height-20"></div>
	                            	<input type="checkbox" id="payment_check" value="1"> <?php echo Tt::t('front', 'Same with the data shipping') ?>
									<div class="height-20"></div>
			                        <div class="row">
			                            <div class="col-md-6 col-sm-6">

												<div class="form-group">
													<?php echo $form->labelEx($model, 'payment_first_name', array('class'=>'col-sm-4 control-label')); ?>
												    <div class="col-sm-7">
												    <?php echo $form->textField($model, 'payment_first_name', array('class'=>'form-control')); ?>
												    </div>
												</div>

												<div class="form-group">
													<?php echo $form->labelEx($model, 'payment_last_name', array('class'=>'col-sm-4 control-label')); ?>
												    <div class="col-sm-7">
												    <?php echo $form->textField($model, 'payment_last_name', array('class'=>'form-control')); ?>
												    </div>
												</div>

												<div class="form-group">
													<?php echo $form->labelEx($model, 'payment_address_1', array('class'=>'col-sm-4 control-label')); ?>
												    <div class="col-sm-7">
												    <?php echo $form->textField($model, 'payment_address_1', array('class'=>'form-control')); ?>
												    </div>
												</div>


			                            </div>
			                            <div class="col-md-6 col-sm-6">

												<div class="form-group">
													<?php echo $form->labelEx($model, 'payment_zone', array('class'=>'col-sm-4 control-label')); ?>
												    <div class="col-sm-7">
			                                        <?php echo $form->dropDownList($model, 'payment_zone', CHtml::listData(City::model()->findAll('1 GROUP BY province_id'),'province_id', 'province'), array('class'=>'form-control', 'empty'=>'Select State')) ?>
												    </div>
												</div>

												<div class="form-group">
													<?php echo $form->labelEx($model, 'payment_city', array('class'=>'col-sm-4 control-label')); ?>
												    <div class="col-sm-7">
												    <?php echo $form->dropDownList($model, 'payment_city',array(), array('class'=>'form-control', 'empty'=>'Select City')) ?>
												    </div>
												</div>

												<div class="form-group">
													<?php echo $form->labelEx($model, 'payment_district', array('class'=>'col-sm-4 control-label')); ?>
												    <div class="col-sm-7">
												    <?php echo $form->dropDownList($model, 'payment_district',array(), array('class'=>'form-control', 'empty'=>'Select Kecamatan')) ?>
												    </div>
												</div>

												<div class="form-group">
													<?php echo $form->labelEx($model, 'payment_postcode', array('class'=>'col-sm-4 control-label')); ?>
												    <div class="col-sm-7">
												    <?php echo $form->textField($model, 'payment_postcode', array('class'=>'form-control')); ?>
												    </div>
												</div>

			                                

			                            </div>
			                        </div>
									</div>
								</div>
							
							<!-- tambahan utk comment -->
							<h5 class="upp border-bottom color2"><?php echo Tt::t('front', 'order comments') ?></h5>
							<?php echo $form->textArea($model, 'comment', array('class'=>'form-control')); ?>

							<h5 class="upp border-bottom color2"><?php echo Tt::t('front', 'terms & condition') ?></h5>

							<p class="tnc"><?php echo $form->checkBox($model,'tos'); ?> <a class="red" href="<?php echo CHtml::normalizeUrl(array('/home/tos', 'lang'=>Yii::app()->language)); ?>" target="_blank"><?php echo Tt::t('front', 'I agree the terms & conditions.') ?></a></p>
							<!-- end tambahan utk comment -->
							<div class="height-10"></div>
                    	<button type="submit" class="btn upp btn-bear"><?php echo Tt::t('front', 'SUBMIT YOUR ORDER') ?></button>
						<?php echo $form->hiddenField($model, 'delivery_to', array('class'=>'form-control')); ?>
						<?php echo $form->hiddenField($model, 'delivery_from', array('class'=>'form-control')); ?>

<?php $this->endWidget(); ?>




                        <div class="clear height-30"></div>
                        <a href="<?php echo CHtml::normalizeUrl(array('/product/index', 'lang'=>Yii::app()->language)); ?>"><img src="<?php echo $this->assetBaseurl ?>t-backshopping.png" alt=""></a>
                        <div class="clear height-50"></div>
                        <?php else: ?>
                        <h3><?php echo Tt::t('front', 'Shopping cart is empty') ?></h3>
                        <?php endif; ?>
                        
                        <div class="clear"></div>
                        </div>
                    </div>

                </div>
                <!-- end left content -->
                <div class="col-md-4">
                    <?php echo $this->renderPartial('_info') ?>
                </div>
                <!-- end right content -->
            </div>
            <div class="clear"></div>
        </div> <div class="height-25"></div>

    </div>
    <div class="clear"></div>
</section>

<script type="text/javascript">
var data_ongkir;
function fill_data_payment () {
	if($('#payment_check:checked').val()==1){
		$('#OrOrder_payment_first_name').val($('#OrOrder_shipping_first_name').val());
		$('#OrOrder_payment_last_name').val($('#OrOrder_shipping_last_name').val());
		$('#OrOrder_payment_address_1').val($('#OrOrder_shipping_address_1').val());
		// $('#OrOrder_payment_city').val($('#OrOrder_shipping_city').val());
		$('#OrOrder_payment_postcode').val($('#OrOrder_shipping_postcode').val());
		$('#OrOrder_payment_zone').val($('#OrOrder_shipping_zone').val());
    	$.ajax({
	        method: "GET",
	        url: "<?php echo CHtml::normalizeUrl(array('/member/getkota')); ?>",
	        data: { id: $('#OrOrder_payment_zone').val() }
	    }).done(function(e) {
	        $('#OrOrder_payment_city').html(e);
	        $('#OrOrder_payment_city').val($('#OrOrder_shipping_city').val());
		    
		    // get kecamatan pada waktu checkbox same
		    $.ajax({
		        method: "GET",
		        url: "<?php echo CHtml::normalizeUrl(array('/member/getkecamatan')); ?>",
		        data: { id: $('#OrOrder_payment_city').val() }
		    }).done(function(e) {
		        $('#OrOrder_payment_district').html(e);
		        $('#OrOrder_payment_district').val($('#OrOrder_shipping_district').val());
		    });
	    });

		// $('#OrOrder_payment_district').val($('#OrOrder_shipping_district').val());
	}else{
		$('#OrOrder_payment_first_name').val('');
		$('#OrOrder_payment_last_name').val('');
		$('#OrOrder_payment_address_1').val('');
		$('#OrOrder_payment_city').val('');
		$('#OrOrder_payment_postcode').val('');
		$('#OrOrder_payment_zone').val('');
        $('#OrOrder_payment_city').html('');
        $('#OrOrder_payment_district').html('');
	}
}
$('#payment_check').click(function(){
	fill_data_payment();
})

$('#OrOrder_shipping_zone').change(function() {
    $.ajax({
        method: "GET",
        url: "<?php echo CHtml::normalizeUrl(array('/member/getkota')); ?>",
        data: { id: $('#OrOrder_shipping_zone').val() }
    }).done(function(e) {
        $('#OrOrder_shipping_city').html(e);
    });     
});

$('#OrOrder_shipping_city').change(function() {
    $.ajax({
        method: "GET",
        url: "<?php echo CHtml::normalizeUrl(array('/member/getkecamatan')); ?>",
        data: { id: $('#OrOrder_shipping_city').val() }
    }).done(function(e) {
        $('#OrOrder_shipping_district').html(e);
    });     
});

$('#OrOrder_payment_city').change(function() {
    $.ajax({
        method: "GET",
        url: "<?php echo CHtml::normalizeUrl(array('/member/getkecamatan')); ?>",
        data: { id: $('#OrOrder_payment_city').val() }
    }).done(function(e) {
        $('#OrOrder_payment_district').html(e);
    });     
});

<?php if ($user->city): ?>
$.ajax({
    method: "GET",
    url: "<?php echo CHtml::normalizeUrl(array('/member/getkota')); ?>",
    data: { id: $('#OrOrder_shipping_zone').val() }
}).done(function(e) {
    $('#OrOrder_shipping_city').html(e);
    $('#OrOrder_shipping_city').val('<?php echo $user->city ?>');
	
	// get data kecamatan
	$.ajax({
	    method: "GET",
	    url: "<?php echo CHtml::normalizeUrl(array('/member/getkecamatan')); ?>",
	    data: { id: $('#OrOrder_shipping_city').val() }
	}).done(function(e) {
	    $('#OrOrder_shipping_district').html(e);
	    <?php if ($user->district): ?>
	    	$('#OrOrder_shipping_district').val('<?php echo $user->district ?>');
	    <?php endif ?>
	});
});
<?php endif ?>


// payment zone
$('#OrOrder_payment_zone').change(function() {
    $.ajax({
        method: "GET",
        url: "<?php echo CHtml::normalizeUrl(array('/member/getkota')); ?>",
        data: { id: $('#OrOrder_payment_zone').val() }
    }).done(function(e) {
        $('#OrOrder_payment_city').html(e);
    });     
});

$("#LoadingImage").hide();
function cari_harga() {
	$("#LoadingImage").show();
	$.ajax({
	    method: "GET",
	    url: "<?php echo CHtml::normalizeUrl(array('/member/getcost')); ?>",
	    data: { id: $('#OrOrder_shipping_district').val(), weight: <?php echo $weight ?>, kurir: $('#OrOrder_delivery_kurir').val() },
	    dataType: 'json',
	}).done(function(e) {
		$('#OrOrder_delivery_package').html(e.html);
		$("#LoadingImage").hide();
		data_ongkir = e.data;
	});
}

$(document).on('change', '#OrOrder_delivery_package', function() {
		totalharga = data_ongkir[$('#OrOrder_delivery_package').val()].cost + <?php echo $total ?>;
		$('#grandtotal').html('Rp '+formatMoney(totalharga, 0, '.', ','));
		$('#totalshipping').html('Rp '+formatMoney(data_ongkir[$('#OrOrder_delivery_package').val()].cost, 0, '.', ','));
});

$(document).on('change', '#OrOrder_delivery_kurir', function() {
	cari_harga();
});

<?php if ($weight <= 0): ?>
	$('.fld_kurir_d, .fld_cpackage_d').addClass('hidden hide');
	$('.vw_freeongkir_kurir').removeClass('hide').removeClass('hidden').addClass('alert alert-success').html("<i class='fa fa-truck fa-flip-horizontal'></i> &nbsp;Pesanan anda akan di kirim oleh Mamabear secara GRATIS.");
<?php endif ?>

// function fill_data_shipping () {
// 	if($('#shipping_check:checked').val()==1){
// 		$('#OrOrder_shipping_first_name').val('<?php echo $user->first_name ?>');
// 		$('#OrOrder_shipping_last_name').val('<?php echo $user->last_name ?>');
// 		$('#OrOrder_shipping_address_1').val('<?php echo $user->address ?>');
// 		$('#OrOrder_shipping_city').val('<?php echo $user->city ?>');
// 		$('#OrOrder_shipping_postcode').val('<?php echo $user->postcode ?>');
// 		$('#OrOrder_shipping_zone').val('<?php echo $user->province ?>');
// 		if ($('#OrOrder_shipping_zone').val() == 'Western Australia') {
// 			$('#shipping_zone_div').show();
// 			$('#shipping_zone_div2').hide();
// 		}else{
// 			$('#shipping_zone_div').hide();
// 			$('#shipping_zone_div2').show();
// 		};
// 	}else{
// 		$('#OrOrder_shipping_first_name').val('');
// 		$('#OrOrder_shipping_last_name').val('');
// 		$('#OrOrder_shipping_address_1').val('');
// 		$('#OrOrder_shipping_city').val('');
// 		$('#OrOrder_shipping_postcode').val('');
// 		$('#OrOrder_shipping_zone').val('');
// 		if ($('#OrOrder_shipping_zone').val() == 'Western Australia') {
// 			$('#shipping_zone_div').show();
// 			$('#shipping_zone_div2').hide();
// 		}else{
// 			$('#shipping_zone_div').hide();
// 			$('#shipping_zone_div2').show();
// 		};
// 	}
// }
// $('#shipping_check').click(function(){
// 	fill_data_shipping();
// })

<?php if ($model->payment_city != '') { ?>
    $.ajax({
        method: "GET",
        url: "<?php echo CHtml::normalizeUrl(array('/member/getkota')); ?>",
        data: { id: $('#OrOrder_payment_zone').val() }
    }).done(function(e) {
        $('#OrOrder_payment_city').html(e);
        $('#OrOrder_payment_city').val('<?php echo $model->payment_city; ?>');
    });

    $.ajax({
        method: "GET",
        url: "<?php echo CHtml::normalizeUrl(array('/member/getkecamatan')); ?>",
        data: { id: <?php echo $model->payment_city; ?> }
    }).done(function(e) {
        $('#OrOrder_payment_district').html(e);
        $('#OrOrder_shipping_district').html(e);
    });     
<?php }; ?>
<?php if ( ! isset($_POST['OrOrder'])) { ?>
fill_data_payment();
// fill_data_shipping();
<?php }; ?>

// $('#OrOrder_shipping_zone').change(function() {
// 	if ($(this).val() == 'Western Australia') {
// 		$('#shipping_zone_div').show();
// 		$('#shipping_zone_div2').hide();
// 	}else{
// 		$('#shipping_zone_div').hide();
// 		$('#shipping_zone_div2').show();
// 	};
// })
// $('#shipping_zone_div').hide();
// $('#shipping_zone_div2').hide();
// if ($('#OrOrder_shipping_zone').val() == 'Western Australia') {
// 	$('#shipping_zone_div').show();
// 	$('#shipping_zone_div2').hide();
// }else if($('#OrOrder_shipping_zone').val() == null){
// 	$('#shipping_zone_div').hide();
// 	$('#shipping_zone_div2').hide();
// }else{
// 	$('#shipping_zone_div').hide();
// 	$('#shipping_zone_div2').show();
// };
// function shipping_area () {
// 	var value = $(".OrOrder_shipping_area:checked").attr('value');
// 	if($("#OrOrder_express_ship").is(':checked'))
// 	    var check = 1;
// 	else
// 	    var check = 0;
// 	// alert(check);
// 	$.ajax({
// 		url: '<?php echo CHtml::normalizeUrl(array('getshippingprice')); ?>',
// 		data: 'shipping_area=' + value + '&check=' + check,
// 		dataType: 'html',
// 		type: 'post',
// 		success: function(msg){
// 			$('.shipping_price_price').html(msg);
// 		},
// 		error: function(msg){
// 			alert('sending data error, cek your connection');
// 			console.log(msg);
// 		}
// 	});
// }
// 	$('.OrOrder_shipping_area').click(function() {
// 		shipping_area();
// 	});

	function formatMoney(n ,c, d, t){
    var c = isNaN(c = Math.abs(c)) ? 2 : c, 
        d = d == undefined ? "." : d, 
        t = t == undefined ? "," : t, 
        s = n < 0 ? "-" : "", 
        i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", 
        j = (j = i.length) > 3 ? j % 3 : 0;
       return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
    };
	// $("#Order_delivery_package").live('change',function(){
 //        total = parseInt($('#total').val());
	// 	var harganya = 0;
	// 	for (i=0; i < hiddenArray.length ; i++) { 
	// 		if(hiddenArray[i].service_code==$(this).val()){
	// 			harganya = hiddenArray[i].value*1;
	// 		}
	// 	}
		
 //        $('#shipping').html('IDR '+formatMoney(harganya, 0, '.', ',') + '.- ');
 //        $('#total_akhir').html('IDR '+formatMoney(total + harganya, 0, '.', ',') + '.- ');
 //        $('#Order_delivery_price').val(harganya);
	// 	// $('#view_ongkir').html("Rp. "+harganya.formatMoney(2,'.',','));
	// 	// $('#ContactForm_ongkir').val(harganya);
	// 	// hitung();
	// });
	// $('#Order_delivery_from').change(function() {

	// 	$.post( "<?php echo CHtml::normalizeUrl(array('cart/getTo')); ?>", { from: $(this).val() }, function( data ) {
	// 		$('#Order_delivery_to').html(data)
	//     });
	// })

</script>