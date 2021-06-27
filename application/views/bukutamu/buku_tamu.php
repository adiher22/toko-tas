<div class="col-md-6 p-b-30">
				
<?php 
// Notif error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Notifikasi 
if($this->session->flashdata('sukses')) {

	echo '<p class="alert alert-success">';
	echo $this->session->flashdata('sukses');
	echo '</div>';

}
			// Form Open
			echo form_open(base_url('admin/bukutamu/tambah'),' class="form-horizontal"');
			 ?>
						<h4 class="m-text26 p-b-36 p-t-15">
							Tuliskan Kritik dan Saran Anda 
						</h4>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" pattern="[A-Za-z ]+" name="nama_lengkap" placeholder="Nama Lengkap">
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="number" name="telepon" placeholder="Nomor Telepon">
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="email" name="email" placeholder="Email Anda">
						</div>

						<textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="pesan" placeholder="Ketikan Kritik dan Saran"></textarea>

						<div class="w-size25">
							<!-- Button -->
							<button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
								Kirim
							</button>
						</div>
					<?php form_close(); ?>
				</div>
	<div class="clearfix"></div><hr>
<strong>Kritik dan Saran</strong><br><hr>
<marquee behavior="scroll" direction="up">
<div class="card" style="width: 18rem;">
	
	<?php foreach($bukutamu as $bukutamu) { ?>
  <div class="card-body">
    <h5 class="card-title"><?php echo $bukutamu['nama_lengkap']; ?></h5>
    <h6 class="card-subtitle mb-2 text-muted"></h6>
    <p class="card-text"><?php echo $bukutamu['pesan']; ?></p>

    <div class="clrearfix"></div>
  </div>
  <?php } ?>
</div>
</marquee>