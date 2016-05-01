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
<title>Halaman Lupa Password</title>
<link href="<?php echo base_url(); ?>assets/css/style-admin.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.ico');?>" />
</head>

<body>
<!-- start: Reset password Berhasil -->
<div id="login">
<h2 align="center">Password anda berhasil diubah!</h2>
	<p align="center">
		<?php echo anchor('home/index','Kembali ke halaman depan..'); ?> 
		atau klik <?php echo anchor('login/index','login'); ?> untuk coba login.
	</p>
<!-- end: Reset password Berhasil -->
</div>
</body>
</html>
