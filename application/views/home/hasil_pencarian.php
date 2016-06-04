<div class="konten">
<!-- start: Pencarian Data -->
	<h1>Pencarian Data</h1>
	<p>Silakan masukan kata kunci untuk melakukan pencarian data :</p>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="myform">
	<?php echo form_open('home/cari'); ?>
	<tr>
	    <td>
			<input name="cari" type="text"  value="<?php echo set_value('cari'); ?>" size="40" required>
			<?php echo form_error('cari'); ?><input type="submit" name="search" id="search" value="search">
		</td>
	  </tr>
	  <?php echo form_close(); ?>
  </table>
  <!-- end: Pencarian Data -->
	<p>&nbsp;</p>
</div>
<div class="konten">
	 <!-- start: Hasil Pencarian Data Mahasiswa -->
	<h1>Hasil Pencarian Data Mahasiswa</h1>
	<?php if($hasil_pencarian != NULL) { ?>
	Ditemukan  <strong><?php echo $jumlah_data; ?></strong> dari pencarian Anda melalui kata kunci: <?php echo $kata_kunci; ?>.&nbsp;
	Permintaan membutuhkan
	<b>{elapsed_time}</b>
	detik untuk selesai
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="myform">
  <tr>
    <th scope="col">NPM</th>
    <th scope="col">Nama</th>
  </tr>
  <?php foreach($hasil_pencarian as $list) { ?>
  <tr>
    <td>
	<a href="<?php echo base_url(); ?>index.php/home/details/<?php echo $list['npm'] ?>" target="_blank">
	<?php echo $list['npm']; ?></a></td>
    <td><?php echo $list['nama_mahasiswa']; ?></td>
  </tr>
  <?php } ?>
</table>
	<?php 
			echo $this->pagination->create_links();
			echo "<br>";
	}else{?> 
		<div class="warning">
			<p align ="center">Data Tidak ditemukan</p>
		</div>
	<?php } ?>
</div>
<!-- end: Hasil Pencarian Data Mahasiswa -->