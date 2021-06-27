<?php 
// Notifikasi 
if($this->session->flashdata('sukses')) {

  echo '<p class="alert alert-success">';
  echo $this->session->flashdata('sukses');
  echo '</div>';

}
?>

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
echo form_open_multipart(base_url('admin/konfigurasi/icon'),' class="form-horizontal"');
 ?>



  <div class="form-group form-group-lg">
      <label  class="col-sm-3 control-label">Nama Website</label>
      <div class="col-md-8">
        <input type="text" name="namaweb" class="form-control" placeholder="Nama Website" value="<?= $konfigurasi->namaweb; ?>" required>
      </div>
    </div>
    <div class="form-group">
      <label  class="col-sm-3 control-label">Upload Icon Baru</label>
      <div class="col-md-8">
        <input type="file" name="icon" class="form-control"  placeholder="Upload Icon Baru" value="<?= $konfigurasi->icon; ?>" required>
        Icon lama : <br>
        <img src="<?= base_url('assets/upload/image/'.$konfigurasi->icon); ?>" class="img img-responsive img-thumbnail" width="">
      </div>
    </div>
    <div class="form-group">
      <label  class="col-sm-3 control-label"></label>
      <div class="col-md-5">
       <button class="btn btn-success btn-lg" type="submit" name="submit">
       	<i class="fa fa-save"></i> Simpan</button>
       	<button class="btn btn-info btn-lg" type="reset" name="reset">
       	<i class="fa fa-times"></i> Riset</button>
      </div>
    </div>



 <? echo form_close(); ?>