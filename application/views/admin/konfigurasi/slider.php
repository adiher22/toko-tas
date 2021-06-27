<?php 
// Error Upload
if(isset($error)) {
  echo '<p class="alert alert-warning">';
  echo $error;
  echo '</p>';
}
// Notif error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form Open
echo form_open_multipart(base_url('admin/konfigurasi/slider'),' class="form-horizontal"');
 ?>



  <div class="form-group form-group-lg">
      <label  class="col-sm-2 control-label">Judul Slider</label>
      <div class="col-md-8">
        <input type="text" name="judul_slider" class="form-control" placeholder="Judul Slider" value="<?= set_value('judul_slider'); ?>" required>
      </div>
    </div>
 <div class="form-group form-group-lg">
      <label  class="col-sm-2 control-label">Unggah Slider</label>
      <div class="col-md-3">
        <input type="file" name="gambar" class="form-control" placeholder="Gambar Slider" value="<?= set_value('gambar'); ?>" required>
      </div>
      <div class="col-md-5">
      	<button class="btn btn-success btn-lg" type="submit" name="submit">
       	<i class="fa fa-save"></i> Simpan dan Unggah Slider</button>
       	<button class="btn btn-info btn-lg" type="reset" name="reset">
       	<i class="fa fa-times"></i> Riset</button>
      </div>
    </div>

  <?php echo form_close(); ?>

  <?php 
// Notifikasi 
if($this->session->flashdata('sukses')) {

	echo '<p class="alert alert-success">';
	echo $this->session->flashdata('sukses');
	echo '</div>';

}
?>
<table class="table table-bordered" id="example1">
	<thead>
		<tr>
			<th width="20%">NO</th>
			<th>GAMBAR</th>
			<th>JUDUL</th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($slider as $slider) { ?>
		<tr>
			<td width="20%"><?= $no++; ?></td>
			<td>
				<img src="<?php echo base_url('assets/upload/image/thumbs/'.$slider->gambar);?>" class="img img-responsive img-thumbnail" width="80">
				
			</td>
			<td><?php echo $slider->judul_slider ?></td>
	
			<td>	
				<a href="<?php echo base_url('admin/konfigurasi/delete_slider/'.$slider->id_slider); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus gambar ini ?')"><i class="fa fa-trash-o"></i> Hapus</a>

				
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>