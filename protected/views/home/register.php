<div id="content" class="container">

	<h3 class="text-center color2 title">Create New Account</h3>

	<div class="row">

		<form action="#" method="post">

			<div class="col-md-4 register-first-column">
				<h5 class="text-center title-products upp">alamat pengiriman</h5>

				<div class="form-group">

					<label class="upp">username*</label>
					<input type="text" name="username" class="form-control" />

				</div>

				<div class="form-group">

					<label class="upp">email*</label>
					<input type="text" name="email" class="form-control" />

				</div>

				<div class="form-group">

					<label class="upp">password*</label>
					<input type="password" name="password" class="form-control" />

				</div>

				<div class="form-group">

					<label class="upp">confirm password*</label>
					<input type="text" name="password2" class="form-control" />

				</div>

			</div> <!-- first column -->


			<div class="col-md-4 register-second-column">

				<h5 class="text-center title-products upp">alamat pengiriman</h5>

				<div class="form-group">

					<label class="upp">nama penerima*</label>
					<input type="text" name="penerima" class="form-control" />

				</div>

				<div class="form-group">

					<label class="upp">alamat*</label>
					<textarea class="form-control" name="alamat"></textarea>

				</div>

				<div class="form-group">

					<label class="upp">kode pos*</label>
					<input type="text" name="postal" class="form-control" />

				</div>

				<div class="form-group">

					<label class="upp">provinsi*</label>
					<select name="provinsi" class="form-control">
						<option selected=""></option>
						<option value="01">Jawa Tengah</option>
						<option value="01">Jawa Tengah</option>
						<option value="01">Jawa Tengah</option>
						<option value="01">Jawa Tengah</option>
					</select>

				</div>

				<div class="form-group">

					<label class="upp">kotamadya*</label>
					<select name="kotamadya" class="form-control">
						<option selected=""></option>
						<option value="01">Semarang</option>
						<option value="01">Semarang</option>
						<option value="01">Semarang</option>
						<option value="01">Semarang</option>
					</select>

				</div>

				<div class="form-group">

					<label class="upp">kecamatan*</label>
					<select name="kotamadya" class="form-control">
						<option selected=""></option>
						<option value="02">Gandusari</option>
						<option value="02">Gandusari</option>
						<option value="02">Gandusari</option>
						<option value="02">Gandusari</option>
					</select>

				</div>

				<div class="form-group">

					<label class="upp">no telpon*</label>
					<input type="text" name="telp" class="form-control" />

				</div>

				<div class="form-group text-center">

					<p class="upp color1 requred-text">(*) required</p>

					<input type="submit" name="submit" value="send" class="btn btn-bear upp" />

				</div>

			</div><!-- second column -->

			<div class="col-md-4 customer-care color1 register-third-column">
				
				<p class="upp color2">mamabear customer care</p>

				<p>Monday to Friday</p>

				<p>09.00 - 17.00 WIB</p>

				<p>
					<img src="<?php echo $this->assetBaseurl; ?>rp.png">
					<span>+6231 876543</span>
				</p>

			</div><!-- third column -->

		</form>

	</div><!-- .row -->

</div><!-- content -->