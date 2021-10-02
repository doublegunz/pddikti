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
<title>Halaman Login</title>
<link href="<?php echo base_url('assets/css/style-admin.css'); ?>" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.ico');?>" />
</head>

<body>
<div id="login">
<h1>Halaman Login</h1>


<form name="form1" method="POST" action="<?php echo site_url('login/cek_login');?>">
<p align=center>Silakan masukkan NPM dan password anda untuk login</p>
  <p>
    <input type="text" name="username" id="username" placeholder="NPM">
  </p>
  <p>
    <input type="password" name="password" id="password" placeholder="********">
  </p>
  <p>
    <input type="submit" name="submit" id="submit" value="Login">
	 <p><a href="<?php echo site_url('login/lupa_password'); ?>">Lupa password?</a> | <a href="<?php echo site_url('register'); ?>">Daftar PDPT</a></p>
    <a href="<?php echo site_url('home'); ?>"><span class="tambah">Back to home
    </span></a></p>
</form>
<footer>&copy; 2015-<?php echo date("Y")?> Gun Gun Priatna </footer>
</div>
</body>
</html>