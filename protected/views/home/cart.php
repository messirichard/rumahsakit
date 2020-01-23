<div id="content" class="shuttershock">
	
	<h3 class="text-center">Shopping Cart</h3>

	<div class="container small-width" id="cart-page">

		<form action="checkout.php" method="get">
	
			<table class="table" width="100%">
				
				<tr class="upp">
					
					<th width="40%">product</th>

					<th width="10%">price</th>

					<th width="15%">quantity</th>

					<th width="15%" class="text-right">remove</th>

					<th width="20%" class="text-right">total</th>

				</tr>

				<tr class="list-cart">
					
					<td>

						<div class="col-md-5"><img width="100%" height="auto" src="<?php echo $this->assetBaseurl; ?>products-sample.jpg" /></div>

						<div class="col-md-7 cart-product">

							<p class="upp color2">product name</p>

							<span>Sub Detail</span>

						</div>

					</td>

					<td class="upp">idr 30.000</td>

					<td><input type="text" name="qty" class="qty" /></td>

					<td class="text-right remove"><a class="danger" href="#">Remove</a></td>

					<td class="upp text-right">idr 30.000</td>

				</tr>

				<tr>
					
					<td class="text-right color3" colspan="4">Products Total</td>

					<td class="upp text-right">idr 30.000</td>

				</tr>

			</table>

			<div class="row">
				
				<div class="col-md-9 color3">
					
					<a class="color2" href="#">Continue Shopping</a> or <a class="color2" href="#">Update subtotal</a>

				</div>

				<div class="col-md-3 text-right"><input type="submit" name="submit" value="Checkout" class="btn btn-bear" /></div>

			</div><!-- .row -->

		</form>

		<div id="testimoni" class="text-center">
			<p>Use this space to spread<br />Consumer testimonial about MamaBear</p>
			<span>TARRA NADHIRA</span>
		</div>
	
	</div><!-- .container -->

</div><!-- content -->