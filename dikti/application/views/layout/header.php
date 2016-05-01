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
<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css">

<link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.ico');?>" />
<!--end: assets -->
</head>

<body>
<div id="wrapper">
 <header>
    	<div id="logo"><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/pdpt.png" width="400" height="400"></a></div>
        <div id="nama"><span class="nama">PDPT</span><br>
        <span class="aipni">Pangkalan Data Pendidikan Tinggi</span>
		</div>
  </header>

<nav>
  	<ul>
    	<li><a href="<?php echo base_url(); ?>">Beranda</a></li>
        <li><a href="<?php echo base_url(); ?>index.php/home/pendaftaran">Pendaftaran</a></li>
		<li><a href="<?php echo base_url(); ?>index.php/home/pencarian">Pencarian Data</a></li>
        <li><a href="<?php echo site_url();?>/home/download">Download Dokumen</a></li>
		<li><a href="<?php echo site_url(); ?>/login">Login</a></li>
    </ul>
  </nav>