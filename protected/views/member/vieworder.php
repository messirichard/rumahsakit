<section class="home-middle-content padding-top-50">
    <div class="prelatife container">
        <div class="clear height-15"></div>
        <div class="box-header-top-breadcumb">
        <div class="row">
          <div class="col-md-9 col-sm-9">
            <div class="breadcumb">
                <a href="<?php echo CHtml::normalizeUrl(array('/home/index')); ?>"><?php echo Tt::t('front', 'HOME') ?></a>
                &gt;
                <a href="<?php echo CHtml::normalizeUrl(array('/member/index')); ?>"><?php echo Tt::t('front', 'MY ACCOUNT') ?></a>
                &gt; <?php echo $modelOrder->invoice_prefix ?>-<?php echo $modelOrder->invoice_no ?>
            </div>
          </div>
          <div class="col-md-3 col-sm-3">
          <?php /*
                <div class="sharer">SHARE: &nbsp;<a href="https://twitter.com/home?status=<?php echo urlencode(Yii::app()->request->hostInfo.Yii::app()->request->url) ?>"><i class="icon-twitter-ch"></i></a>&nbsp;
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(Yii::app()->request->hostInfo.Yii::app()->request->url) ?>"><i class="icon-facebook-ch"></i></a>&nbsp;
                        <a href="https://plus.google.com/share?url=<?php echo urlencode(Yii::app()->request->hostInfo.Yii::app()->request->url) ?>"><i class="icon-gplus-ch"></i></a>
                        <!-- <a href="#"><i class="icon-pinterest-ch"></i></a> -->
                    </div>
            */ ?>
          </div>
        </div>
        </div>


        <div class="prelatife product-list-warp">
            <div class="box-featured-latestproduct" id="cart-shop">
                <div class="box-product-detailg">
                    <div class="clear height-5"></div>
                    <div class="margin-15">




		<div class="inside-content">
			
			<!-- /. Start Content About -->
			<div class="m-ins-content detail-shopcart content-text">
				<h1 class="title-inside-page"><?php echo Tt::t('front', 'View Order') ?></h1>
				<div class="row">
					<div class="col-md-10">
						<?php if ($modelOrder->order_status_id == 1): ?>
						<p><b><?php echo Tt::t('front', 'Silahkan transfer sesuai dengan total pembayaran anda ke:') ?></b> <br>
						<?php foreach ($bank as $key => $value): ?>
							<b><?php echo ListBank::model()->findByPk($value->id_bank)->nama ?></b> 
							<?php echo $value->rekening ?> an <?php echo $value->nama ?> <br>
						<?php endforeach ?>
						</p>
						<div class="clear height-10"></div>
						<div class="alert alert-info">
						<h4><?php echo Tt::t('front', 'Dan lakukan konfirmasi pembayaran setelah transfer') ?> <a style="text-decoration: underline;" href="<?php echo CHtml::normalizeUrl(array('/home/paymentconf', 'lang'=>Yii::app()->language, 'nota'=>$modelOrder->invoice_prefix.'-'.$modelOrder->invoice_no)); ?>"><?php echo Tt::t('front', 'di sini') ?></a></h4>
						</div>
						<div class="height-20"></div>
						<?php endif ?>
					</div>
					<div class="col-md-2">
						<div class="fright">
						<a href="<?php echo CHtml::normalizeUrl(array('/member/print', 'nota'=>$modelOrder->invoice_prefix.'-'.$modelOrder->invoice_no)); ?>" target="_blank"><i class="fa fa-print fa-2x"></i></a>
						</div>
					</div>
				</div>
				<div class="alert alert-success">
					<h4>Order ID: <?php echo $modelOrder->invoice_prefix ?>-<?php echo $modelOrder->invoice_no ?> "<b><?php echo OrOrderStatus::model()->findByPk($modelOrder->order_status_id)->name ?></b>"</h4>
				</div>
				<div class="lines-green"></div>
				<div class="row">
					<div class="col-md-4">
						<p><b><?php echo Tt::t('front', 'Shipping address') ?></b><br>
						<?php echo $modelOrder->shipping_first_name ?> <?php echo $modelOrder->shipping_last_name ?><br>
						<?php echo $modelOrder->shipping_address_1 ?><br>

						Kec. <?php echo Subdistrict::model()->find('id = :id', array(':id'=>$modelOrder->shipping_district))->subdistrict_name ?><br>

						<?php echo City::model()->find('id = :id', array(':id'=>$modelOrder->shipping_city))->type ?> <?php echo City::model()->find('id = :id', array(':id'=>$modelOrder->shipping_city))->city_name ?><br>
						<?php echo City::model()->find('province_id = :province_id GROUP BY province_id', array(':province_id'=>$modelOrder->shipping_zone))->province ?>, <?php echo $modelOrder->shipping_postcode ?><br>
						<?php echo Tt::t('front', 'Mobile phone :') ?> <?php echo $modelOrder->phone ?><br>
						</p>
						<b><?php echo Tt::t('front', 'Comment:') ?></b><br>
						<?php echo nl2br($modelOrder->comment) ?>
						<div class="height-20"></div>
					</div>
					<div class="col-md-4">
						<p><b><?php echo Tt::t('front', 'Payment address') ?></b><br>
						<?php echo $modelOrder->payment_first_name ?> <?php echo $modelOrder->payment_last_name ?><br>
						<?php echo $modelOrder->payment_address_1 ?><br>
						Kec. <?php echo Subdistrict::model()->find('id = :id', array(':id'=>$modelOrder->payment_district))->subdistrict_name ?><br>
						
						<?php echo City::model()->find('id = :id', array(':id'=>$modelOrder->payment_city))->type ?> <?php echo City::model()->find('id = :id', array(':id'=>$modelOrder->payment_city))->city_name ?><br>
						<?php echo City::model()->find('province_id = :province_id GROUP BY province_id', array(':province_id'=>$modelOrder->shipping_zone))->province ?>, <?php echo $modelOrder->payment_postcode ?><br>
						<?php echo Tt::t('front', 'Mobile phone :') ?> <?php echo $modelOrder->phone ?><br>
						</p>
						<div class="height-20"></div>
					</div>
					<?php
					$qty = 0;
					$berat = 0;
					foreach ($data as $key => $value){
						$qty = $qty + $value->qty;
						$berat = $berat + ($value->qty*$value->berat);
					}
					?>
					<div class="col-md-4">
						<div class="row">
							<div class="col-sm-6">
								<b><?php echo Tt::t('front', 'Jumlah Barang:') ?></b> <br>
								<?php echo $qty ?> Item <br> (<?php echo $berat ?> gram)
								<div class="height-20"></div>
								<b><?php echo Tt::t('front', 'Tracking Code:') ?></b> <br>
								<?php if ($modelOrder->tracking_id != ''): ?>
								<div id="as-root"></div><script>(function(e,t,n){var r,i=e.getElementsByTagName(t)[0];if(e.getElementById(n))return;r=e.createElement(t);r.id=n;r.src="//button.aftership.com/all.js";i.parentNode.insertBefore(r,i)})(document,"script","aftership-jssdk")</script>
								<div data-tracking-number="<?php echo $modelOrder->tracking_id ?>" data-slug="jne" data-size="small" class="as-track-button"></div>
								<?php else: ?>
								<?php echo Tt::t('front', 'Barang belum di kirim') ?>
								<?php endif ?>
							</div>
							<div class="col-sm-6">
								<b><?php echo Tt::t('front', 'Biaya Kirim:') ?></b> <br>
								<?php echo Cart::money($modelOrder->delivery_price, 0) ?>
								<div class="height-20"></div>
								<b><?php echo Tt::t('front', 'Total:') ?></b> <br>
								<?php echo Cart::money($modelOrder->total, 0) ?>
								<div class="height-20"></div>
								<b><?php echo Tt::t('front', 'Total Pembayaran:') ?></b> <br>
								<?php echo Cart::money($modelOrder->grand_total, 0) ?>
							</div>
						</div>
						<div class="height-20"></div>
						<div class="row">
							<div class="col-sm-12">
							</div>
						</div>
					</div>
				</div>
				<div class="height-20"></div>
				<h4><b><?php echo Tt::t('front', 'Daftar Produk') ?></b></h4>
			    <table class="table table-striped shopcart">
			    	<thead>
			    		<tr>
			    			<td width="20%"><?php echo Tt::t('front', 'Item') ?></td>
			    			<td>&nbsp;</td>
			    			<!-- <td>Option</td> -->
			    			<td width="15%"><?php echo Tt::t('front', 'Quantity') ?></td>
			    			<td width="15%"><b><?php echo Tt::t('front', 'Sub Total') ?></b></td>
			    		</tr>
			    	</thead>
			    	<tbody>
			    		<?php $total = 0 ?>
			    		<?php foreach ($data as $key => $value): ?>
			    		<?php
			    		$dataSerialize = unserialize($value->data);
			    		?>
			    		<tr>
			    			<td>
			    				<div class="left pic">
			    					<img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(139,95, '/images/product/'.$value['image'] , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="">
			    				</div>
			    			</td>
			    			<td>
			    				<span class="title">
			    					<?php echo $value['name'] ?> @<?php echo Cart::money($value['price']) ?>
			    					<?php if ($dataSerialize['box'] != ''): ?>
			    					<br>With box + <?php echo Cart::money($dataSerialize['box']) ?>
			    					<?php endif ?>
			    					<?php if ($value['attributes_id'] != '0'): ?>
			    					<br><?php echo $value['attributes_name'] ?>
			    					<?php endif ?>
			    				</span>
			    			</td>
			    			<?php /*
			    			<td>
								<?php
								$totalOption = 0;
								$value['option'] = unserialize($value['option']);
								?>
								<?php if (count($value['option']) > 0 AND $value['option'] != ''): ?>
									<?php foreach ($value['option'] as $k => $v): ?>
									<?php
									$dataOption = explode('|', $v);
									?>
									<span class="varian"><?php echo $dataOption[1] ?> $<?php echo number_format($dataOption[2]) ?></span><br>
									<?php $totalOption = $totalOption + $dataOption[2]; ?>
									<?php endforeach ?>
								<?php endif ?>
			    			</td>
			    			*/ ?>
			    			<td>
			    				<form action="<?php echo CHtml::normalizeUrl(array('/product/edit')); ?>" method="post">
			    					<input type="hidden" value="<?php echo $value['id'] ?>" name="product_id">
			    					<?php /*
			    					<input type="hidden" value="<?php echo $value['option'] ?>" name="option">
			    					*/ ?>
				    				<span class="quantity"><?php echo $value['qty'] ?> <?php echo Tt::t('front', 'Item(s)') ?></span>
			    				</form>
			    			</td>
			    			<td>
			    				<b><?php echo Cart::money($subTotal = ($value['total'])) ?>.-</b>
			    			</td>
			    		</tr>
			    		<?php $total = $total + $subTotal ?>
			    		<?php endforeach ?>
			    	</tbody>
				</table>
				<h4><?php echo Tt::t('front', 'Total:') ?> <b><?php echo Cart::money($modelOrder->total, 0) ?></b></h4>
				<h4><?php echo Tt::t('front', 'Biaya Pengiriman:') ?> <b><?php echo Cart::money($modelOrder->delivery_price, 0) ?></b></h4>
				<h3><?php echo Tt::t('front', 'Total Pembayaran:') ?> <b><?php echo Cart::money($modelOrder->grand_total, 0) ?></b></h3>

				<div class="clear height-25"></div>
				<div class="clear"></div>
			</div>
			<!-- /. End Content About -->

			<div class="clear height-15"></div>


		<div class="clear"></div>
		</div>
		<div class="clear"></div>

					</div>
					<div class="height-5"></div>
                </div>
            </div>
        </div>
    </div>
</section>
