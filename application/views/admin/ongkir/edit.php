<?php 
// Notif error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form Open
echo form_open(base_url('admin/ongkir/edit/'.$ongkir->id_ongkir),' class="form-horizontal"');
 ?>



  <div class="form-group">
      <label  class="col-sm-2 control-label">Nama Kota</label>
      <div class="col-md-5">
        <input type="text" name="nama_kota" class="form-control" placeholder="Nama Kota" value="<?= $ongkir->kota; ?>" required>
      </div>
    </div>
    <div class="form-group">
      <label  class="col-sm-2 control-label">Ongkos Kirim</label>
      <div class="col-md-5">
        <input type="number" name="ongkos_kirim" class="form-control"  placeholder="ongkos_kirim" value="<?= $ongkir->ongkos_kirim; ?>" required>
      </div>
    </div>
    
     <div class="form-group">
      <label  class="col-sm-2 control-label"></label>
      <div class="col-md-5">
       <button class="btn btn-success btn-lg" type="submit" name="submit">
       	<i class="fa fa-save"></i> Simpan</button>
       	<button class="btn btn-info btn-lg" type="reset" name="reset">
       	<i class="fa fa-times"></i> Riset</button>
      </div>
    </div>



 <? echo form_close(); ?>