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
  <link href="<?php echo base_url('assets/css/style-admin.css'); ?>" rel="stylesheet" type="text/css">
  <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.ico'); ?>" />
</head>

<body>
  <!-- start: Lupa Password -->
  <div id="login">
    <h1>Form Lupa Password</h1>
    <form name="form1" method="POST" action="<?php echo site_url('login/cek_data'); ?>">
      <p align=center>Silakan masukkan NPM dan email anda untuk reset password</p>
      <p>
        <input type="text" name="username" id="username" placeholder="NPM">
      </p>
      <p>
        <input type="password" name="email" id="email" placeholder="Email">
      </p>
      <p>
        <input type="submit" name="submit" id="submit" value="Submit">
      <p><a href="<?php echo site_url('login'); ?>">Login</a> | <a href="<?php echo site_url('register'); ?>">Daftar PDPT</a></p>
      <a href="<?php echo site_url('home'); ?>"><span class="tambah">Back to home
        </span></a></p>
    </form>
    <!-- End: Lupa Password -->
    <footer>&copy; 2015-<?php echo date("Y") ?> Gun Gun Priatna </footer>
  </div>
</body>

</html>