<!-- Cart -->
<section class="cart bgwhite p-t-70 p-b-100">
<div class="container">
<!-- Cart item -->
<div class="container-table-cart pos-relative">
	<div class="wrap-table-shopping-cart bgwhite">
		<h1><?php echo $title ?></h1><hr>
		<div class="clrearfix"></div>
		<br><br>
		<?php if($this->session->flashdata('sukses')) {
				echo '<div class="alert alert-warning">';
				echo $this->session->flashdata('sukses');
				echo '</div>';
		}
		 ?>
		<table class="table-shopping-cart">
			<tr class="table-head">
				<th class="column-1">Gambar</th>
				<th class="column-2">Produk</th>
				<th class="column-3">Harga</th>
				<th class="column-4">Berat</th>
				<th class="column-4 p-l-70">Jumlah</th>
				<th class="column-5" width="15%">Subtotal</th>
				<th class="column-6" width="20%">Action</th>
			</tr>

			
			<?php 
			

			// Looping keranjang belanja 
			foreach ($keranjang as $keranjang) { 
				// Ambil data produk
				$id_produk = $keranjang['id']; 
				$produk = $this->produk_model->detail($id_produk);

				// Form Open untuk update 
				echo form_open(base_url('belanja/update_cart/'.$keranjang['rowid']));
		
				?>
			
			
			<tr class="table-row">
				<td class="column-1">
					<div class="cart-img-product b-rad-4 o-f-hidden">
						<img src="<?php echo base_url('assets/upload/image/thumbs/'.$produk->gambar) ?>" alt="<?php echo $keranjang['name'] ?>">
					</div>
				</td>
				<td class="column-2"><?php echo $keranjang['name'] ?></td>
				<td class="column-3">Rp. <?php echo number_format($keranjang['price'],'0',',','.') ?></td>
				<td class="column-4"><?php echo $keranjang['weight'] ?> Gram</td>
				<td class="column-5">
					<div class="flex-w bo5 of-hidden w-size17">
						<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
							<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
						</button>

						<input class="size8 m-text18 t-center num-product" type="number" name="qty" value="<?php echo $keranjang['qty'] ?>" max="<?php echo $produk->stok ?> ">

						<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
							<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
						</button>
					</div>
				</td>
				<td class="column-6">Rp. <?php $sub_total = $keranjang['price'] * $keranjang['qty'];
				echo number_format($sub_total,'0',',','.') ?></td>
				<td>
					<button type="submit" name="update" class="btn btn-success btn-sm">
						<i class="fa fa-edit"> Update</i>
					</button>
						<a href="<?php echo base_url('belanja/hapus/'.$keranjang['rowid']) ?>" class="btn btn-warning btn-sm"><i class="fa fa-trash-o"></i> Hapus
					</a>
				</td>
			</tr>
			<?php 
			// Tutup form close
			echo form_close();
			} // Tutup keranjang belanja

			
			?>
			<tr class="table-row text-strong" style="font-weight: bold; color: white !important;">
				
			</style>
				<td colspan="4" class="column-1">Total Belanja</td>
				<td colspan="2" class="column-2">Rp. <?php echo number_format($this->cart->total(),'0',',','.') ?></td>
			</tr>

		</table>
		<br>
		<?php 
		echo form_open(base_url('belanja/checkout'));
		echo validation_errors('<div class="alert alert-warning">', '</div>');
		$kode_otomatis;
		
		?>
		<input type="hidden" name="id_pelanggan" value="<?php echo $pelanggan->id_pelanggan; ?>">
		<input type="hidden" name="jumlah_transaksi" value="">
		<input type="hidden" name="tanggal_transaksi" value="<?php echo date('Y-m-d'); ?>">
		
			 <table class="table">	
		<thead>
			<tr>
				<th width="25%">Kode Transaksi</th>
				<th><input type="text" name="kode_transaksi" class="form-control" placeholder="Kode Transaksi" value="<?php echo $kode_otomatis; ?>" readonly></th>
			</tr>
			<tr>
				<th width="25%">Nama Penerima</th>
				<th><input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama Lengkap" value="<?php echo $pelanggan->nama_pelanggan; ?>"></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Email Penerima</td>
				<td><input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $pelanggan->email; ?>"></td>
			</tr>
			<tr>
				<td>Telepon Penerima</td>
				<td><input type="text" name="telepon" class="form-control" placeholder="Telepon" value="<?php echo $pelanggan->telepon; ?>"></td>
			</tr>
			
			<tr>
				<td>Kota Pengirim</td>
				<td><select name="kota_pengirim" id="kota_pengirim" class="form-control">
				<option value="">--Pilih Kota--</option>
				<?php $this->load->view('belanja/kota_asal') ?>
					
				</select></td>
			</tr>
				<tr>
				<td>Provinsi Penerima</td>
				<td><select name="provinsi_penerima" id="provinsi_penerima" class="form-control">
				<option value="">--Pilih Provinsi--</option>
				<?php $this->load->view('belanja/prov') ?>
					
				</select></td>
			</tr>
			<tr>
				<td>Kota Penerima</td>
				<td><select name="kota_penerima" id="kota_penerima" class="form-control">
				<option value="" disabled selected>--Kota/Kabupaten--</option>
					
				</select></td>
			</tr>
			<tr>
				<td>Alamat </td>
				<td><textarea name="alamat" class="form-control" placeholder="Alamat"><?php echo $pelanggan->alamat ?></textarea></td>
			</tr>
			<tr>
			<tr>
				<td>Kurir</td>
				<td><select name="kurir" id="kurir" class="form-control">
				<option value="">--Pilih Kurir--</option>
				<option value="jne">JNE</option>
				<option value="pos">POS</option>
				<option value="tiki">TIKI</option>	
				</select></td>
			</tr>
			<tr>
				<td>Layanan/Paket</td>
				<td><select name="layanan" id="layanan" class="form-control">
				<option value="" disabled selected>--Layanan Tersedia--</option>
					
				</select></td>
			</tr>
			<tr>
				<td>Ongkos Kirim</td>
				<td><input type="number" name="ongkir" id="ongkir" class="form-control"></td>
			</tr>
				<td></td>
				<td>
					<button class="btn btn-success btn-lg" type="submit">
						<i class="fa fa-save"></i> Selesai Belanja
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

<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
	<div class="flex-w flex-m w-full-sm">
		
	</div>

	<div class="size10 trans-0-4 m-t-10 m-b-10">
		<!-- Button -->
		
	</div>
</div>
</div>
</section>
