<?php 
// Notif error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form Open
echo form_open(base_url('admin/rekening/edit/'.$rekening->id_rekening),' class="form-horizontal"');
 ?>



  <div class="form-group">
      <label  class="col-sm-2 control-label">Nama Bank</label>
      <div class="col-md-5">
        <input type="text" name="nama_bank" class="form-control" placeholder="Nama Bank" value="<?= $rekening->nama_bank; ?>" required>
      </div>
    </div>
    <div class="form-group">
      <label  class="col-sm-2 control-label">Nomor Rekening</label>
      <div class="col-md-5">
        <input type="number" name="nomor_rekening" class="form-control"  placeholder="Nomor Rekening" value="<?= $rekening->nomor_rekening; ?>" required>
      </div>
    </div>
    <div class="form-group">
      <label  class="col-sm-2 control-label">Nama Pemilik</label>
      <div class="col-md-5">
        <input type="text" name="nama_pemilik" class="form-control"  placeholder="Nama Pemilik Rekening" value="<?= $rekening->nama_pemilik; ?>" required>
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