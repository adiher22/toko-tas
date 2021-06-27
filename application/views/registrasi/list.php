<!-- Registrasi -->
<section class="bgwhite p-t-70 p-b-100">
<div class="container">
<!-- Cart item -->
<div class="pos-relative">
	<div class="bgwhite">
		<h1><?php echo $title ?></h1><hr>
		<div class="clrearfix"></div>
		<br><br>
		<?php if($this->session->flashdata('sukses')) {
				echo '<div class="alert alert-warning">';
				echo $this->session->flashdata('sukses');
				echo '</div>';
		}
		 ?>
	<p class="alert alert-success"> Sudah memiliki akun ? Silahkan <a href="<?php echo base_url('masuk') ?>" class="btn btn-info btn-sm">Login disini </a></p>
	<div class="col-md-12">
		<?php
		// Display error
		echo validation_errors('<div class="alert alert-warning">', '</div>');

		// Form open 
		echo form_open(base_url('registrasi'), 'class="leave-comment"'); ?>
	 <table class="table">
		<input type="hidden" name="id_pelanggan" class="form-control" placeholder="Id Pelanggan" value="<?php echo $kode_otomatis; ?>"></th>
		<thead>
			<tr>
				<th width="25%">Nama</th>
				<th><input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama Lengkap" value="<?php echo set_value('nama_pelanggan') ?>"></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Email</td>
				<td><input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo set_value('email') ?>"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password" id="password" class="form-control" placeholder="password" value="<?php echo set_value('password') ?>"></td>
				<td><input type="checkbox" id="checkbox"> Lihat Password</td>
			</tr>
			<tr>
				<td>Telepon</td>
				<td><input type="number" name="telepon" class="form-control" placeholder="Telepon" value="<?php echo set_value('telepon') ?>"></td>
			</tr>
			<!-- <tr>
				<td>Provinsi</td>
				<td><select name="prov" class="form-control" id="prov">
					<option value="" disabled selected>--Pilih Provinsi--</option>
					<?php $this->load->view('registrasi/prov'); ?>
				</select></td>
			</tr>
			<tr>
				<td>Kota/Kabupaten</td>
				<td><select name="kota" class="form-control" id="kota">
					<option value="" disabled selected>--Kota/Kabupaten--</option>
				</select></td>
			</tr> -->
			<tr>
				<td>Alamat</td>
				<td><textarea name="alamat" class="form-control" placeholder="Alamat" value="<?php echo set_value('alamat') ?>"></textarea></td>
			</tr>

			<tr>
				<td></td>
				<td>
					<button class="btn btn-success btn-lg" type="submit">
						<i class="fa fa-save"></i> Submit
					</button>
					<button class="btn btn-primary btn-lg" type="reset">
						<i class="fa fa-times"></i> Reset
					</button>

				</td>
			</tr>
		</tbody>
	</table>
		<?php echo form_close(); ?>
	</div>
	</div>
</div>

<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
	<div class="flex-w flex-m w-full-sm">
		
	</div>

	<div class="size10 trans-0-4 m-t-10 m-b-10">
		<!-- Button -->
		
	</div>
</div>


</div>
</section>
