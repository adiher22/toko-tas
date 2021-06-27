<div class="page-header">
	<h3>Hanya untuk satu kali pencarian, jika ingin mencari lagi harus refresh terlebih dahulu</h3>
</div>

<?php 
  echo validation_errors('<div class="alert alert-warning">','</div>');
   // Form Open
      echo form_open(base_url('admin/laporan'));
 ?>
  <div class="form-group">
  <label>Dari Tanggal</label>
  <input type="date" name="dari" value="<?php echo set_value('dari'); ?>" class="form-control">
 </div>
 <div class="form-group">
  <label>Sampai Tanggal</label>
  <input type="date" name="sampai" value="<?php echo set_value('sampai'); ?>" class="form-control">
 </div>
 <div class="form-group"> 
  <input type="submit" value="CARI" name="cari" class="btn btn-sm btn-primary">
 </div>
<?php form_close(); ?>