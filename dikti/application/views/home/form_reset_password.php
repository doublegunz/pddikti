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
<div id="login">

<!-- start: Reset Password -->
<h1>Form Reset Password</h1>
<form name="form1" method="POST" action="<?php echo base_url();?>index.php/login/reset_password">
	<p align=center>Silakan masukkan password baru anda.</p>
  <p>
    <input type="password" name="password" id="password" placeholder="Password Baru" required value="<?php echo set_value('password'); ?>">
	<?php echo form_error('password'); ?>
  </p>
  <p>
    <input type="password" name="passconf" id="passconf" placeholder="Konfirmasi Password Baru" required value="<?php echo set_value('passconf'); ?>">
	<?php echo form_error('passconf'); ?>
  </p>
  <p>
    <input type="submit" name="submit" id="submit" value="Reset">
	</p>
</form>
<!-- End: Reset Password -->

<footer>&copy; 2015-<?php echo date("Y")?> Gun Gun Priatna </footer>
</div>
</body>
</html>