
<table class="table table-bordered" id="example1">
	
	<thead>
		<tr>
			<th>NO</th>
			<th>NAMA LENGKAP</th>
			<th>NOMOR TELEPON</th>
			<th>EMAIL</th>
			<th>PESAN</th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach ($bukutamu as $bukutamu) { ?>
			
		
		<tr>
			<td><?= $no++; ?></td>
			<td><?= $bukutamu['nama_lengkap']; ?></td>
			<td><?= $bukutamu['telepon']; ?></td>
			<td><?= $bukutamu['email']; ?></td>
			<td><?= $bukutamu['pesan']; ?></td>
			<td>
				<a href="<?= base_url('admin/bukutamu/delete/'.$bukutamu['id_bukutamu']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus data ini ?')"><i class="fa fa-trash-o"></i> Hapus</a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>