<div id="content" class="container small-width">
	
	<h3 class="text-center color2 title">Account Information</h3>

	<ul class="nav nav-tabs upp" role="tablist" id="menu-profile">
		<li role="presentation" class="active">
			<a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">profile</a>
		</li>

		<li role="presentation">
			<a href="#address" aria-controls="address" role="tab" data-toggle="tab">address</a>
		</li>

		<li role="presentation">
			<a href="#history" aria-controls="history" role="tab" data-toggle="tab">order history</a>
		</li>

		<li role="presentation">
			<a href="#credit" aria-controls="credit" role="tab" data-toggle="tab">credit</a>
		</li>
	</ul><!-- #menu-profile -->

	<div class="tab-content" id="content-profile">
		<div role="tabpanel" class="tab-pane active" id="profile">

			<form action="#" method="post">

				<div class="row">
					<label class="upp color1">username</label>
					<a href="#">Edit</a>
					<p>Antonius Sindhu</p>
				</div>

				<div class="row">
					<label class="upp color1">email address</label>
					<a href="#">Edit</a>
					<p>sindhu.widyatama@gmail.com</p>
				</div>

				<div class="row">
					<label class="upp color1">current password</label>
					<a href="#">Edit</a>
					<p>********</p>
				</div>

				<div class="row">
					<label class="upp color1">timezone</label>
					<a href="#">Edit</a>
					<p>Bangkok, Jakarta GMT +7</p>
				</div>

				<div class="row text-center">
					<input type="submit" name="update" value="update" class="upp btn btn-bear" />
				</div>

			</form>

		</div><!-- #profile -->

		<div role="tabpanel" class="tab-pane" id="address">

			<form action="#" method="post">

				<div class="row">
					<label class="upp color1">nama penerima</label>
					<a href="#">Edit</a>
					<p>Antonius Sindhu</p>
				</div>

				<div class="row">
					<label class="upp color1">alamat</label>
					<a href="#">Edit</a>
					<p>
						Jl Pekunden Timur IV/12<br />
						50134<br />
						Jawa Tengah<br />
						Semarang Barat<br />
						Semarang
					</p>
				</div>

				<div class="row text-center">
					<input type="submit" name="update" value="update" class="upp btn btn-bear" />
				</div>

			</form>

		</div><!-- #address -->

		<div role="tabpanel" class="tab-pane " id="history">

			<?php for( $i=0;$i<3;$i++ ) : ?>

			<div class="row order-list">

				<div class="col-md-3 image">
					<img width="100%" height="auto" src="<?php echo $this->assetBaseurl; ?>products-sample.jpg">
				</div>

				<div class="col-md-9 details">
					<h5 class="upp color2">invoice number</h5>
					<ul>
						<li>Product Name</li>
						<li>Tanggal Transaksi: <strong>06 April 2015</strong></li>
						<li>Total: <strong>IDR 30.000</strong></li>
					</ul>
					<article>
						<p>06 April 2015, 16.52 WIB - Pesanan telah dikirim</p>
						<p>Pesanan</p>
						<p>Nomor Resi: 8987869876</p>
					</article>
				</div>

			</div><!-- .order-list -->

			<?php endfor ?>

		</div><!-- #history -->

	</div>

</div><!-- #content -->