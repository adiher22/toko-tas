<table class="table table-bordered" width="100%" id="example1">
		<caption></caption>
		<thead>
			<tr class="bg-info">
				<th>NO</th>
				<th>PELANGGAN</th>
				<th>KODE</th>
				<th>TANGGAL</th>
				<th>JUMLAH TOTAL</th>
				<th>JUMLAH ITEM</th>
				<th>STATUS</th>
				<th width="25%">ACTION</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=1; foreach($header_transaksi as $header_transaksi) { ?>
			<tr>
				<td><?php echo $i ?></td>
				<td><?php echo $header_transaksi->nama_pelanggan ?>
					<br><small>
					Telepon: <?php echo $header_transaksi->telepon ?>
					<br>Email: <?php echo $header_transaksi->email ?>
					<br>Alamat Kirim: <br> <?php echo nl2br($header_transaksi->alamat) ?>
				</small>
				</td>
				<td><?php echo $header_transaksi->kode_transaksi ?></td>
				<td><?php echo date('d-m-Y',strtotime($header_transaksi->tanggal_transaksi))?></td>
				<td><?php echo number_format($header_transaksi->jumlah_transaksi) ?></td>
				<td><?php echo $header_transaksi->total_item ?></td>
				<td><?php echo $header_transaksi->status_bayar ?></td>
				<td>
					<div class="btn-group">
					
						<a href="<?php echo base_url('admin/transaksi/detail/'.$header_transaksi->kode_transaksi) ?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> Detail</a>
						
						<a href="<?php echo base_url('admin/transaksi/cetak/'.$header_transaksi->kode_transaksi) ?>" target="_blank" class="btn btn-info btn-sm"><i class="fa fa-print"></i> Cetak</a>
						<?php if($header_transaksi->status_bayar=='Belum') { ?>
						
						<a href="<?php echo base_url('admin/transaksi/delete_transaksi/'.$header_transaksi->id_header) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus transaksi ini ?')"><i class="fa fa-trash-o"></i> Hapus</a>
						<?php } ?>
						<?php if($header_transaksi->status_bayar=='Konfirmasi'){ ?>
						
						<a href="<?php echo base_url('admin/transaksi/status_diproses/'.$header_transaksi->kode_transaksi) ?>" class="btn btn-primary btn-sm" <?php if ($header_transaksi->status_bayar=='Diproses') ?>><i class="fa fa-check"></i> Proses</a> 
						<?php } ?>
						<?php if($header_transaksi->status_bayar=='Diproses'){ ?>
						
						<a href="<?php echo base_url('admin/transaksi/status_dikirim/'.$header_transaksi->kode_transaksi) ?>" class="btn btn-primary btn-sm" <?php if ($header_transaksi->status_bayar=='Dikirim') ?>><i class="fa fa-paper-plane"></i> Kirim Barang</a> 
						<?php } ?>
						<?php if($header_transaksi->status_bayar=='Diterima'){ ?>
						
						<a href="<?php echo base_url('admin/transaksi/status_selesai/'.$header_transaksi->kode_transaksi) ?>" class="btn btn-primary btn-sm" <?php if ($header_transaksi->status_bayar=='Dikirim') echo 'disabled'; ?>><i class="fa fa-check-square-o"></i> Selesai</a> 
						<?php } ?>
					</div>
					<div class="clearfix"></div>
					<br>
					<div class="btn-group">
						<a href="<?php echo base_url('admin/transaksi/pdf/'.$header_transaksi->kode_transaksi) ?>" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-file-pdf-o"></i> Unduh PDF</a>
						
						<a href="<?php echo base_url('admin/transaksi/kirim/'.$header_transaksi->kode_transaksi) ?>" target="_blank" class="btn btn-info btn-sm"><i class="fa fa-print"></i> Cetak Pengiriman</a>
					</div>
				</td>
			</tr>
			<?php $i++; } ?>
		</tbody>
	</table>