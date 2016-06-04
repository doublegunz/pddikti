<!doctype html>
<html>
<head>
<!-- start: META -->
	<meta charset="utf-8" />
	<!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta content="Tugas UAS" name="description" />
	<meta content="Gun Gun Priatna" name="author" />
<!-- end: META -->
<!-- start: title -->
<title><?php echo $title; ?></title>
<!-- end: title -->

<!--start: assets -->

<link href="<?php echo base_url(); ?>assets/images/pdpt.png" rel="shortcut icon">
<link href="<?php echo base_url(); ?>assets/css/style-admin.css" rel="stylesheet" type="text/css">
<!--end: assets -->
</head>

<body onload="window.print();">
<div id="wrapper">

<div class="konten">
 <!-- start: Daftar Mahasiswa -->
	<h1>Daftar Mahasiswa</h1>  
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="myform">
  <tr>
    <th scope="col">NPM</th>
    <th scope="col">Nama</th>
	<th scope="col">Tempat, Tanggal Lahir</th>
	<th scope="col">Jenis Kelamin</th>
    <th scope="col">Agama</th>
	<th scope="col">Alamat</th>
	<th scope="col">No HP</th>
  </tr>
  <?php foreach($data_mahasiswa as $list) { ?>
  <tr>
    <td><?php echo $list['npm']; ?></a></td>
    <td><?php echo $list['nama_mahasiswa']; ?></td>
	<td><?php echo $list['tempat_lahir'].", ".$list['tanggal_lahir']; ?></td>
	<td><?php if ($list['jenis_kelamin'] == 'L'){ echo 'Laki-Laki';}
			elseif($list['jenis_kelamin'] == 'P') { echo 'Perempuan';};?></td>
	<td><?php echo $list['agama']; ?></td>
	<td><?php echo $list['alamat_kabupaten']; ?></td>
	<td><?php echo $list['telepon_genggam']; ?></td>
	
  </tr>
  <?php } ?>
</table>
	<h3>Jumlah Mahasiswa : <?php echo $jumlah_mahasiswa; ?></h3>
<!-- end: Daftar Mahasiswa -->
</div>
</div>
</body>
</html>