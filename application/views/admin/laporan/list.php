<div class="page-header">
 <h3>Hanya untuk satu kali pencarian, jika ingin mencari lagi harus refresh terlebih dahulu</h3>
</div>

<?php 
  echo validation_errors('<div class="alert alert-warning">','</div>');
   // Form Open
      echo form_open(base_url('admin/laporan'));
 ?>
  <div class="form-group">
  <label>Dari Tanggal</label>
  <input type="date" name="dari" value="<?php echo set_value('dari'); ?>" class="form-control">
 </div>
 <div class="form-group">
  <label>Sampai Tanggal</label>
  <input type="date" name="sampai" value="<?php echo set_value('sampai'); ?>" class="form-control">
 </div>
 <div class="form-group"> 
  <input type="submit" value="CARI" name="cari" class="btn btn-sm btn-primary">
 </div>
<?php form_close(); ?>

  <div class="btn-group pull-right">
      <a href="<?php echo base_url().'admin/laporan/pdf/?dari='.set_value('dari').'&sampai='.set_value('sampai') ?>" class="btn btn-info" target="_blank"><i class="fa fa-print"></i> PDF</a>
  </div>
  <div class="btn-group pull-right">
      <a href="<?php echo base_url().'admin/laporan/cetak/?dari='.set_value('dari').'&sampai='.set_value('sampai') ?>" class="btn btn-success" target="_blank"><i class="fa fa-print"></i> Cetak</a>
  </div>

  <table class="table table-bordered" width="100%" id="example1">
    <tr class="bg-info">
       <th>NO</th>
	   <th>NAMA PELANGGAN</th>
		<th>ALAMAT</th>
		<th>TELEPON</th>
		<th>KODE</th>
		<th>TANGGAL TRANSAKSI</th>
		<th>JUMLAH ITEM</th>
		<th>TANGGAL BAYAR</th>
		<th>TANGGAL POST</th>
		<th>JUMLAH TOTAL</th>
    </tr>
    <?php
 
   $i=1; $pendapatan=0; 
   foreach($laporan->result() as $data) { 
	 $pendapatan += $data->jumlah_transaksi ?>
			<tr>
				<td><?php echo $i++; ?></td>
				<td><?php echo $data->nama_pelanggan ?>
				</td>
				<td><?php echo $data->alamat ?></td>
				<td><?php echo $data->telepon ?></td>
				<td><?php echo $data->kode_transaksi ?></td>
				<td><?php echo date('d-m-Y',strtotime($data->tanggal_transaksi))?></td>
				<td><?php echo $data->total_item ?></td>
				<td><?php echo $data->tanggal_bayar ?></td>
				<td><?php echo $data->tanggal_post ?></td>
				<td><?php echo number_format($data->jumlah_transaksi) ?></td>
				<?php } ?>
			</tr>
			<tr>
            <td colspan="9" style="text-align:center"><b>Pendapatan</b></td>
             <td>
                   <b>
                       <span style="float:right">Rp.<?=number_format($pendapatan, 0,',','.');?>,-</span>
                   </b>
                 </td>
           </tr>
	</div>
</div>
</table>
</body>
</html>