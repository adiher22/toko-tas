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
echo form_open_multipart(base_url('admin/produk/edit/'.$produk->id_produk),' class="form-horizontal"');
 ?>


<div class="form-group form-group-lg">
      <label  class="col-sm-2 control-label">Id Produk</label>
      <div class="col-md-5">
        <input type="text" name="id_produk" class="form-control" placeholder="Id Produk" value="<?= $produk->id_produk; ?>" readonly>
      </div>
    </div>
  <div class="form-group form-group-lg">
      <label  class="col-sm-2 control-label">Nama Produk</label>
      <div class="col-md-5">
        <input type="text" name="nama_produk" class="form-control" placeholder="Nama Produk" value="<?= $produk->nama_produk; ?>" required>
      </div>
    </div>
    <div class="form-group">
      <label  class="col-sm-2 control-label">Kode Produk</label>
      <div class="col-md-5">
        <input type="text" name="kode_produk" class="form-control"  placeholder="Kode Produk" value="<?= $produk->kode_produk; ?>" required>
      </div>
    </div>
    <div class="form-group">
      <label  class="col-sm-2 control-label">Kategori Produk</label>
      <div class="col-md-5">
        <select name="id_kategori" class="form-control">
          <?php foreach($kategori as $kategori) { ?>
          <option value="<?= $kategori->id_kategori; ?>" <?php if($produk->id_kategori==$kategori->id_kategori) { echo "selected"; } ?>>
          <?= $kategori->nama_kategori; ?></option>
          <?php } ?>
        </select>
      </div>
    </div>
     <div class="form-group">
      <label  class="col-sm-2 control-label">Harga Produk</label>
      <div class="col-md-5">
        <input type="number" name="harga" class="form-control"  placeholder="Harga Produk" value="<?= $produk->harga; ?>" required>
      </div>
    </div>
     <div class="form-group">
      <label  class="col-sm-2 control-label">Stok Produk</label>
      <div class="col-md-5">
        <input type="number" name="stok" class="form-control"  placeholder="Stok Produk" value="<?= $produk->stok; ?>" required>
      </div>
    </div>
     <div class="form-group">
      <label  class="col-sm-2 control-label">Berat</label>
      <div class="col-md-5">
        <input type="text" name="berat" class="form-control"  placeholder="Berat" value="<?= $produk->berat; ?>" required>
      </div>
    </div>
     <div class="form-group">
      <label  class="col-sm-2 control-label">Ukuran</label>
      <div class="col-md-5">
        <input type="text" name="ukuran" class="form-control"  placeholder="Ukuran" value="<?= $produk->ukuran; ?>" required>
      </div>
    </div>
      <div class="form-group">
      <label  class="col-sm-2 control-label">Keterangan</label>
      <div class="col-md-10">
        <textarea name="keterangan" class="form-control" placeholder="Keterangan" id="editor"><?=     $produk->keterangan; ?></textarea>
      </div>
    </div>
    <div class="form-group">
      <label  class="col-sm-2 control-label">Keywords</label>
      <div class="col-md-10">
        <textarea name="keywords" class="form-control" placeholder="keywords"><?php echo $produk->keywords ?></textarea>
      </div>
    </div>
      <div class="form-group">
      <label  class="col-sm-2 control-label">Upload Gambar Produk</label>
      <div class="col-md-10">
        <input type="file" name="gambar" class="form-control">
      </div>
    </div>
     <div class="form-group">
      <label  class="col-sm-2 control-label">Status Produk</label>
      <div class="col-md-10">
       <select name="status_produk" class="form-control">
         <option value="Publish">Publikasikan</option>
         <option value="Draft" <?php if($produk->status_produk=="Draft") { echo "selected"; } ?>>Simpan Sebagai Draft</option>
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