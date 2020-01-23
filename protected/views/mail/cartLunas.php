<?php
$baseUrl = Yii::app()->request->hostInfo . Yii::app()->request->baseUrl;
$url = Yii::app()->request->hostInfo;
?>
<table width="800" align="center" cellspacing="0" cellpadding="0" style="font-family:Arial,Helvetica,sans-serif; color: #505050">
	<tr>
		<td>
			<a href="<?php echo $baseUrl ?>"><img style="display: block;" src="<?php echo $baseUrl ?>/asset/images/logo-dv-comp.png" alt=""></a>
		</td>
		<td valign="top">
			<span style="font-size:16px;">Shipping Address:</span> <br>
			<img style="display: block;" src="<?php echo $baseUrl ?>/asset/images/trans.gif" width="1" height="5">
			<div style="height: 0px; border-bottom: 1px solid #24477B;"></div>
			<img style="display: block;" src="<?php echo $baseUrl ?>/asset/images/trans.gif" width="1" height="5">
			<table width="100%" cellspacing="0" cellpadding="0">	
				<tr>
					<td>
					<span style="font-size:12px; font-family:Arial,Helvetica,sans-serif;">
					<?php echo $model->shipping_first_name ?> <?php echo $model->shipping_last_name ?> <br>
					<?php echo $model->shipping_address_1 ?> <br>
					<?php echo $model->shipping_city ?> <br>
					<?php echo $model->shipping_zone ?> <?php echo $model->shipping_postcode ?> <br>
					</span>
					</td>
					<td>
					<span style="font-size:12px; font-family:Arial,Helvetica,sans-serif;">
						<b>Ponsel:</b> <br>
						<?php echo $model->phone ?><br>
					</span>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td><img style="display: block;" src="<?php echo $baseUrl ?>/asset/images/trans.gif" width="1" height="20"></td>
	</tr>
	<tr>
		<td colspan="2">
			<span style="font-size:24px;">INVOICE <?php echo $model->invoice_prefix ?><?php echo $model->invoice_no ?></span>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<table width="100%">
				<tr>
					<td colspan="5">
						<div style="height: 0px; border-bottom: 1px solid #24477B;"></div>
					</td>
				</tr>
				<tr style="border-top: 1px solid #24477B;">
					<th align="left" style="font-size:14px; font-family:Arial,Helvetica,sans-serif;" height="40">Item</th>
					<th align="left" style="font-size:14px; font-family:Arial,Helvetica,sans-serif;">&nbsp;</th>
					<th align="left" style="font-size:14px; font-family:Arial,Helvetica,sans-serif;">Option</th>
					<th width="15%" align="left" style="font-size:14px; font-family:Arial,Helvetica,sans-serif;">Quantity</th>
					<th width="15%" align="left" style="font-size:14px; font-family:Arial,Helvetica,sans-serif;">Total</th>
				</tr>
				<tr>
					<td colspan="5">
						<div style="height: 0px; border-bottom: 1px solid #24477B;"></div>
					</td>
				</tr>
				<?php $total = 0 ?>
				<?php foreach ($order as $key => $value): ?>
	    		<tr style="border-top: 1px solid #24477B;">
	    			<td align="left">
    					<img style="display: block;" src="<?php echo $baseUrl.ImageHelper::thumb(139,95, '/images/product/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="">
	    			</td>
	    			<td>
	    				<span  style="font-size:12px; font-family:Arial,Helvetica,sans-serif;">
	    					<?php echo $value->name ?> <br>
	    					@<?php echo Cart::money($value->price) ?>
	    					<?php if ($value->attributes_id != '0'): ?>
	    					<br> Product Variations: <?php echo $value->attributes_name ?>
	    					<?php endif ?>
	    				</span>
	    			</td>
	    			<td>
	    				<span  style="font-size:12px; font-family:Arial,Helvetica,sans-serif;"><?php // echo $value->option ?></span>
	    			</td>
	    			<td>
		    			<span  style="font-size:12px; font-family:Arial,Helvetica,sans-serif;"><?php echo $value->qty ?> Item(s)</span>
	    			</td>
	    			<td>
	    				<span style="font-size:12px; font-family:Arial,Helvetica,sans-serif;"><?php echo Cart::money($subtotal = $value->price * $value->qty) ?></span>
	    			</td>
	    		</tr>
				<tr>
					<td colspan="5">
						<div style="height: 0px; border-bottom: 1px solid #24477B;"></div>
					</td>
				</tr>
				<?php $total = $total + $subtotal; ?>
				<?php endforeach ?>

				<tr>
					<td colspan="3">
						<?php /* <span style="font-size:20px; font-family:Arial,Helvetica,sans-serif; font-weight: bold;">Payment Using:</span> <br>
						<img style="display: block;" src="<?php echo $baseUrl ?>/asset/images/trans.gif" width="1" height="20"> <br>
						<img style="display: block;" src="<?php echo $baseUrl ?>/asset/images/bank-transfer.jpg" alt=""> */ ?>
					</td>
					<td colspan="2">
						<table width="100%" align="center" cellspacing="0" cellpadding="0" style="font-family:Arial,Helvetica,sans-serif; color: #505050">
							<tr>
								<td height="40" width="50%">Sub Total</td>
								<td width="50%"><?php echo Cart::money($total) ?></td>
							</tr>
							<tr>
								<td>Shipping Cost</td>
								<?php if ($model->delivery_price == '0'): ?>
								<td>Free Shipping
								</td>
								<?php else: ?>
								<td><?php echo Cart::money($model->delivery_price) ?>
								</td>
								<?php endif ?>
							</tr>
							<?php /*
							<tr>
								<td colspan="2">
									&nbsp;
								</td>
							</tr>
							<tr>
								<td>Weight</td>
								<td><?php echo ($model->delivery_weight) ?> grams</td>
							</tr>
							*/ ?>
							<tr>
								<td colspan="2">
									<div style="height: 0px; border-bottom: 5px solid #24477B;"></div>
								</td>
							</tr>
							<tr>
								<td height="40"><span style="font-size:20px; font-family:Arial,Helvetica,sans-serif; font-weight: bold;">TOTAL</span></td>
								<td><span style="font-size:20px; font-family:Arial,Helvetica,sans-serif; font-weight: bold;"><?php echo Cart::money($model->delivery_price + $model->total) ?></span></td>
							</tr>
							<tr>
								<td>GST</td>
								<td><?php echo Cart::money($model->tax) ?></td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<img style="display: block;" src="<?php echo $baseUrl ?>/asset/images/trans.gif" width="1" height="40">
		</td>
	</tr>
</table>
</font>