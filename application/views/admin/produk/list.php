<p>
	<a href="<?= base_url('admin/produk/tambah'); ?>" class="btn btn-success btn-lg">
		<i class="fa fa-plus">Tambah Baru</i>
	</a>
</p>
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
			<th>NO</th>
			<th>GAMBAR</th>
			<th>NAMA</th>
			<th>KATEGORI</th>
			<th>HARGA</th>
			<th>STATUS</th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach ($produk as $produk) { ?>
			
		
		<tr>
			<td><?= $no++; ?></td>
			<td>
				<img src="<?= base_url('assets/upload/image/thumbs/'.$produk->gambar);?>" class="img img-responsive img-thumbnail" width="80">
				
			</td>
			<td><?= $produk->nama_produk; ?></td>
			<td><?= $produk->nama_kategori; ?></td>
			<td><?= 'Rp. '.number_format($produk->harga,'0',',','.'); ?></td>
			<td><?= $produk->status_produk; ?></td>
			<td>
				<a href="<?= base_url('admin/produk/gambar/'.$produk->id_produk); ?>" class="btn btn-primary btn-xs"><i class="fa fa-image"></i> Gambar (<?php echo $produk->total_gambar ?>)</a>

				<a href="<?= base_url('admin/produk/edit/'.$produk->id_produk); ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
				<?php include('delete.php'); ?>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>