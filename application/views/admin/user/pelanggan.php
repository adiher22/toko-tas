
<table class="table table-bordered" id="example1">
	
	<thead>
		<tr>
			<th>NO</th>
			<th>NAMA</th>
			<th>EMAIL</th>
			<th>TELEPON</th>
			<th>ALAMAT</th>
			<th>TANGGAL DAFTAR</th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach ($pelanggan as $pelanggan) { ?>
			
		
		<tr>
			<td><?= $no++; ?></td>
			<td><?= $pelanggan->nama_pelanggan; ?></td>
			<td><?= $pelanggan->email; ?></td>
			<td><?= $pelanggan->telepon; ?></td>
			<td><?= $pelanggan->alamat; ?></td>
			<td><?= $pelanggan->tanggal_daftar; ?></td>
			<td>
				<?php if($pelanggan->status_pelanggan=='Aktif') { ?>
				<a href="<?= base_url('admin/user/status/'.$pelanggan->id_pelanggan); ?>" class="btn btn-success btn-lg"> <?php echo $pelanggan->status_pelanggan ?></a>
				<?php } else { ?>
				<a href="<?= base_url('admin/user/status/'.$pelanggan->id_pelanggan); ?>" class="btn btn-danger btn-lg"> <?php echo $pelanggan->status_pelanggan ?></a>
				<?php } ?>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>