<p>
	<a href="<?= base_url('admin/user/tambah'); ?>" class="btn btn-success btn-lg">
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
			<th>NAMA</th>
			<th>EMAIL</th>
			<th>USERNAME</th>
			<th>LEVEL</th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach ($user as $user) { ?>
			
		
		<tr>
			<td><?= $no++; ?></td>
			<td><?= $user->nama; ?></td>
			<td><?= $user->email; ?></td>
			<td><?= $user->username; ?></td>
			<td><?= $user->akses_level; ?></td>
			<td>
				<?php if($this->session->userdata('username')!=$user->username) { ?>
				
				<?php }elseif($user->akses_level=='User') { ?>
				<a href="<?= base_url('admin/user/edit/'.$user->id_user); ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
				<a href="<?= base_url('admin/user/delete/'.$user->id_user); ?>" class="btn btn-danger btn-xs" <?php echo 'disabled'; ?> onclick="return confirm('Yakin ingin menghapus data ini ?')"><i class="fa fa-trash-o"></i> Hapus</a>
				<?php }else{ ?>
				<a href="<?= base_url('admin/user/edit/'.$user->id_user); ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
				<a href="<?= base_url('admin/user/delete/'.$user->id_user); ?>" class="btn btn-danger btn-xs" <?php echo 'disabled'; ?> onclick="return confirm('Yakin ingin menghapus data ini ?')"><i class="fa fa-trash-o"></i> Hapus</a>		
				<?php } ?>	
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>