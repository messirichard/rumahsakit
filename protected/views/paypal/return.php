<section class="top-content-inside about">
    <div class="container">
        <div class="titlepage-Inside">
            <h1>e-STORE</h1>
        </div>
    </div>
    <div class="celar"></div>
</section>
<section class="middle-content">
    <div class="prelatife container">
        
        <div class="clear height-20"></div>
        <div class="height-3"></div>
        <div class="prelatife">
            <div class="box-featured-latestproduct">
                <div class="box-title">
                    <div class="titlebox-featured" alt="title-product">DONE</div>
                    <div class="fright brd-linksetcart"><b>REVIEW SHOPPING CART</b> --- <b>PERSONAL / SHIPPING INFO</b> --- <b>PAYMENT</b> --- <b>DONE</b></div>
                    <div class="clear"></div>
                </div>
                <div class="box-product-detailg">
                	<div class="height-5"></div>
                	<div class="margin-15">


		<div class="inside-content">
			
			<!-- /. Start Content About -->
			<div class="m-ins-content detail-shopcart content-text">
				<h1 class="title-inside-page">Payment <?php echo $paymentDetails['ACK'] ?></h1>
				<p>
					Thank you for placing you order with DV Computers! <br>
					Your order is in process.
				</p>
				<div class="height-10"></div>
					
				<h4>Order ID: <?php echo $modelOrder->invoice_prefix ?>-<?php echo $modelOrder->invoice_no ?></h4>
				<div class="lines-green"></div>
				<div class="row">
					<div class="col-md-6">
						<b>Shipping address</b><br>
						<?php echo $modelOrder->shipping_first_name ?> <?php echo $modelOrder->shipping_last_name ?><br>
						<?php echo $modelOrder->shipping_address_1 ?><br>
						<?php echo $modelOrder->shipping_city ?><br>
						<?php echo $modelOrder->shipping_zone ?> <?php echo $modelOrder->shipping_postcode ?><br>
						Mobile phone : <?php echo $modelOrder->phone ?><br>
									</p>
					</div>
					<div class="col-md-6">
						<b>Payment address</b><br>
						<?php echo $modelOrder->payment_first_name ?> <?php echo $modelOrder->payment_last_name ?><br>
						<?php echo $modelOrder->payment_address_1 ?><br>
						<?php echo $modelOrder->payment_city ?><br>
						<?php echo $modelOrder->payment_zone ?> <?php echo $modelOrder->payment_postcode ?><br>
						Mobile phone : <?php echo $modelOrder->phone ?><br>
						</p>
					</div>
				</div>
				<p>
				    <table class="table table-hover shopcart">
				    	<thead>
				    		<tr>
				    			<td width="20%">Item</td>
				    			<td>&nbsp;</td>
				    			<!-- <td>Option</td> -->
				    			<td width="15%">Quantity</td>
				    			<td width="15%"><b>Total</b></td>
				    		</tr>
				    	</thead>
				    	<tbody>
				    		<?php $total = 0 ?>
				    		<?php foreach ($data as $key => $value): ?>
				    		<tr>
				    			<td>
				    				<div class="left pic">
				    					<img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(139,95, '/images/product/'.$value['image'] , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="">
				    				</div>
				    			</td>
				    			<td>
				    				<span class="title">
				    					<?php echo $value['name'] ?> @<?php echo Cart::money($value['price']) ?>
				    					<?php /*
				    					<?php if ($value['color'] != ''): ?>
				    					<br> Type: <?php echo $value['color'] ?>
				    					<?php endif ?>
				    					*/ ?>
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
					    				<span class="quantity"><?php echo $value['qty'] ?> Item(s)</span>
				    				</form>
				    			</td>
				    			<td>
				    				<b><?php echo Cart::money($subTotal = ($value['price']+$totalOption) * $value['qty']) ?></b>
				    			</td>
				    		</tr>
				    		<?php $total = $total + $subTotal ?>
				    		<?php endforeach ?>
				    	</tbody>
					</table>

					<div class="clear height-0"></div>
					<div class="lines-green"></div>
					<div class="clear height-15"></div>


					<div class="right box-total" style="width: 30%;">
						<table class="table borderless">
							<tr>
								<td width="50%">Subtotal</td>
								<td width="50%"><?php echo Cart::money($total) ?></td>
							</tr>
							<?php /*
							<tr>
								<td colspan="2">&nbsp;</td>
							</tr>
							<tr>
								<td>Weight</td>
								<td><?php echo ($modelOrder->delivery_weight) ?> grams</td>
							</tr>
							*/ ?>
							<tr>
								<td>Shipping Cost</td>
								<?php if ($modelOrder->delivery_price == '0'): ?>
								<td>Free Shipping
								</td>
								<?php else: ?>
								<td><?php echo Cart::money($modelOrder->delivery_price) ?>
								</td>
								<?php endif ?>
							</tr>
							<tr>
								<td>GST Included</td>
								<td><?php echo Cart::money($modelOrder->tax) ?></td>
							</tr>
							<tr class="clear height-5"></tr>
							<tr class="double-border">
								<td class="total"><b>TOTAL</b></td>
								<td class="price-total"><b><?php echo Cart::money($modelOrder->total + $modelOrder->delivery_price) ?></b></td>
							</tr>
							<?php /*
							<tr>
								<td>Dari</td>
								<td><?php echo $modelOrder->delivery_from ?></td>
							</tr>
							<tr>
								<td>Ke</td>
								<td><?php echo $modelOrder->delivery_to ?></td>
							</tr>
							<tr>
								<td>Paket</td>
								<td><?php echo $modelOrder->delivery_package ?></td>
							</tr>
							<tr>
								<td>Perkiraan berat total</td>
								<td><?php echo Cart::gramToKg($modelOrder->delivery_weight) ?> Kg</td>
							</tr>
							*/ ?>
							<tr>
								<td colspan="2">
									<div class="clear height-10"></div>
									<a href="<?php echo CHtml::normalizeUrl(array('/member/index')); ?>" class="btn btn-primary">Click here to view My Account</a>
								</td>
							</tr>
						</table>
					</div>
					<style type="text/css">
					.right.box-total table.table.borderless tr td{
						padding: 5px;
					}
					</style>




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

                <div class="clearfix"></div>
            </div>
            <div class="back-shadow-bottom-featproduct"></div>
        <div class="clear"></div>
        </div>

        <div class="clear height-35"></div>
        <div class="clearfix"></div>
        <!-- Go to www.addthis.com/dashboard to customize your tools -->
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-54092b87219ecbb4" async="async"></script>
        <!-- Go to www.addthis.com/dashboard to customize your tools -->
        <div class="addthis_native_toolbox"></div>
        <div class="clear height-35"></div>
    </div>
    <div class="clearfix"></div>
</section>