<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title ?></title>
	<style type="text/css" media="print">
		body {
			font-family: Times New Roman;
			font-size: 12px;
		}
		.cetak {
			width: 19cm;
			height: 27cm;
			padding: 1cm;
		}
		table {
			border: solid thin #000;
			border-collapse: collapse;
		}
		td, th {
			padding: 3mm 6mm;
			text-align: left;
			vertical-align: top;
		}
		th {
			background-color: #F5F5F5;
			font-weight: bold;
		}
		h1 {
			text-align: center;
			font-size: 18px;
			text-transform: uppercase;
		}
	</style>
	<style type="text/css" media="screen">
		body {
			font-family: Times New Roman;
			font-size: 12px;
		}
		.cetak {
			width: 19cm;
			height: 27cm;
			padding: 1cm;
		}
		table {
			border: solid thin #000;
			border-collapse: collapse;
		}
		td, th {
			padding: 3mm 6mm;
			text-align: left;
			vertical-align: top;
		}
		th {
			background-color: #F5F5F5;
			font-weight: bold;
		}
		h1 {
			text-align: center;
			font-size: 18px;
			text-transform: uppercase;
		}
	</style>
</head>
<body  onload="print()">
   <div class="">
        <h1><?php echo $site->namaweb ?></h1>
   </div>
 <h3>Laporan Transaksi</h3>
 <table>
  <tr>
   <td>Dari Tanggal</td>
   <td>:</td>
   <td><?php echo date($_GET['dari']); ?></td>
  </tr>
  <tr>
   <td>Sampai Tanggal</td>
   <td>:</td>
   <td><?php echo date($_GET['sampai']); ?></td>
  </tr>
 </table> 
<table class="table table-bordered" width="100%" id="example1">
    <tr>
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
   foreach ($laporan->result() as $data) { 
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
	</table>
	</div>
</body>
</html>