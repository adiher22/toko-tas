<p>
	<a href="<?= base_url('admin/ongkir/tambah'); ?>" class="btn btn-success btn-lg">
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
			<th>NAMA KOTA</th>
			<th>ONGKOS KIRIM</th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach ($ongkir as $ongkir) { ?>
			
		
		<tr>
			<td><?= $no++; ?></td>
			<td><?= $ongkir->kota; ?></td>
			<td><?= $ongkir->ongkos_kirim; ?></td>
			<td>
				<a href="<?= base_url('admin/ongkir/edit/'.$ongkir->id_ongkir); ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
				<a href="<?= base_url('admin/ongkir/delete/'.$ongkir->id_ongkir); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus data ini ?')"><i class="fa fa-trash-o"></i> Hapus</a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>