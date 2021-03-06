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
<link href="<?php echo base_url(); ?>assets/SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url(); ?>assets/SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<!--end: assets -->
</head>

<body>
<div id="wrapper">

<!-- start: header -->
<header>
		<div class="akun">
			<a href="#"><img src="<?php echo base_url(); ?>assets/images/pdpt.png" width="16" height="16"> 
				Pangkalan Data Pendidikan Tinggi
			</a>
		</div>
		
		<div class="home">
			<a>
				Selamat datang, <?php echo $this->session->userdata('username'); ?>
			</a>
		</div>
</header>
<!-- end: header -->

<!-- start: MenuBar -->
<nav>
    <ul id="MenuBar1" class="MenuBarHorizontal">
		<li><a href="<?php echo base_url(); ?>index.php/admin_controller">Dashboard</a></li>
		<li><a href="#" class="MenuBarItemSubmenu dropdown-menu">Data Mahasiswa</a>
			<ul>
				<li><a href="<?php echo base_url(); ?>index.php/admin_controller/tampil_mahasiswa">Daftar Mahasiswa</a></li>
				<li><a href="<?php echo base_url(); ?>index.php/admin_controller/tampil_orangtua_wali">Orang Tua/Wali</a></li>
				<li><a href="<?php echo base_url(); ?>index.php/admin_controller/tampil_akademik_lampiran">Akademik/Lampiran&nbsp;</a></li>
			</ul>
        </li>
        <li><a href="#" class="MenuBarItemSubmenu">Data Front-Page</a>
			<ul>
				<li><a href="<?php echo base_url(); ?>index.php/admin_controller/tampil_berita">Data berita</a></li>
				<li><a href="<?php echo base_url(); ?>index.php/dokumen/index">Dokumen</a></li>
			</ul>
        </li>
		<li><a href="<?php echo base_url(); ?>index.php/admin_controller/manajemen_user">Manajemen User</a></li>
		<div align="right">
			<a href="<?php echo base_url(); ?>index.php/admin_controller/logout" >
				Logout
			</a>
		</div>
	</ul>
</nav>
<script type="text/javascript">
	var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"<?php echo base_url(); ?>assets/SpryAssets/SpryMenuBarDownHover.gif", imgRight:"<?php echo base_url(); ?>assets/SpryAssets/SpryMenuBarRightHover.gif"});
</script> 
<!-- end: MenuBar -->
