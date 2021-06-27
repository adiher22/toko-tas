<?php 
// Notif error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form Open
echo form_open(base_url('admin/kategori/edit/'.$kategori->id_kategori),' class="form-horizontal"');
 ?>

<input type="hidden" name="id_kategori" class="form-control" placeholder="Id Kategori" value="<?= $kode_otomatis; ?>" required>

  <div class="form-group">
      <label  class="col-sm-2 control-label">Nama Kategori</label>
      <div class="col-md-5">
        <input type="text" name="nama_kategori" class="form-control" placeholder="Nama Kategori" value="<?= $kategori->nama_kategori; ?>" required>
      </div>
    </div>
    <div class="form-group">
      <label  class="col-sm-2 control-label">Urutan</label>
      <div class="col-md-5">
        <input type="number" name="urutan" class="form-control"  placeholder="Urutan" value="<?= $kategori->urutan; ?>" required>
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