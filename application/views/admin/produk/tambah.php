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
echo form_open_multipart(base_url('admin/produk/tambah'),' class="form-horizontal"');
 ?>

 <div class="form-group form-group-lg">
      <label  class="col-sm-2 control-label">Id Produk</label>
      <div class="col-md-5">
        <input type="text" name="id_produk" class="form-control" placeholder="Id Produk" value="<?= $kode_otomatis; ?>" readonly>
      </div>
    </div>
  <div class="form-group form-group-lg">
      <label  class="col-sm-2 control-label">Nama Produk</label>
      <div class="col-md-5">
        <input type="text" name="nama_produk" class="form-control" placeholder="Nama Produk" value="<?= set_value('nama_produk'); ?>" required>
      </div>
    </div>
    <div class="form-group">
      <label  class="col-sm-2 control-label">Kode Produk</label>
      <div class="col-md-5">
        <input type="text" name="kode_produk" class="form-control"  placeholder="Kode Produk" value="<?= set_value('kode_produk'); ?>" required>
      </div>
    </div>
    <div class="form-group">
      <label  class="col-sm-2 control-label">Kategori Produk</label>
      <div class="col-md-5">
        <select name="id_kategori" class="form-control">
          <?php foreach($kategori as $k) { ?>
          <option value="<?= $k->id_kategori; ?>"><?= $k->nama_kategori; ?></option>
          <?php } ?>
        </select>
      </div>
    </div>
     <div class="form-group">
      <label  class="col-sm-2 control-label">Harga Produk</label>
      <div class="col-md-5">
        <input type="number" name="harga" class="form-control"  placeholder="Harga Produk" value="<?= set_value('harga'); ?>" required>
      </div>
    </div>
     <div class="form-group">
      <label  class="col-sm-2 control-label">Stok Produk</label>
      <div class="col-md-5">
        <input type="number" name="stok" class="form-control"  placeholder="Stok Produk" value="<?= set_value('stok'); ?>" required>
      </div>
    </div>
     <div class="form-group">
      <label  class="col-sm-2 control-label">Berat</label>
      <div class="col-md-5">
        <input type="text" name="berat" class="form-control"  placeholder="Berat" value="<?= set_value('berat'); ?>" required>
      </div>
    </div>
     <div class="form-group">
      <label  class="col-sm-2 control-label">Ukuran</label>
      <div class="col-md-5">
        <input type="text" name="ukuran" class="form-control"  placeholder="Ukuran" value="<?= set_value('ukuran'); ?>" required>
      </div>
    </div>
      <div class="form-group">
      <label  class="col-sm-2 control-label">Keterangan</label>
      <div class="col-md-10">
        <textarea name="keterangan" class="form-control" placeholder="Keterangan" id="editor"><?php echo set_value('keterangan') ?></textarea>
      </div>
    </div>
    <div class="form-group">
      <label  class="col-sm-2 control-label">Keywords</label>
      <div class="col-md-10">
        <textarea name="keywords" class="form-control" placeholder="keywords"><?php echo set_value('keywords') ?></textarea>
      </div>
    </div>
      <div class="form-group">
      <label  class="col-sm-2 control-label">Upload Gambar Produk</label>
      <div class="col-md-10">
        <input type="file" name="gambar" class="form-control" required>
      </div>
    </div>
     <div class="form-group">
      <label  class="col-sm-2 control-label">Status Produk</label>
      <div class="col-md-10">
       <select name="status_produk" class="form-control">
         <option value="Publish">Publikasikan</option>
         <option value="Draft">Simpan Sebagai Draft</option>
       </select>
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