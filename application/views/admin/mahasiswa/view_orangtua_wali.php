<div class="konten">
	<div align="right">
		<form method="POST" action="<?php echo base_url();?>index.php/admin_controller/cari" class="myform">
		<input type="text" required name="cari"><input type="submit" value="search" name="search">
		<a href="<?php echo base_url(); ?>index.php/admin_controller/tambah_data" class="tambah">Tambah Data</a>
		<a href="<?php echo base_url(); ?>index.php/admin_controller/tampil_mahasiswa" class="tambah">Daftar Mahasiswa</a>
		</form>
    </div>
	 <!-- start: Data Orang Tua / Wali Mahasiswa -->
	<h1>Data Orang Tua / Wali Mahasiswa</h1>
  
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="myform">
  <tr>
    <th scope="col">NPM</th>
    <th scope="col">Nama</th>
    <th scope="col">Data Ayah & Ibu</th>
	<th scope="col">Data Ayah</th>
	<th scope="col">Data Ibu</th>
	<th scope="col">Data Wali</th>
	
    
  </tr>
  <?php foreach($data_mahasiswa as $list) { ?>
  <tr>
    <td>
	<a href="<?php echo base_url(); ?>index.php/admin_controller/details/<?php echo $list['npm'] ?>">
	<?php echo $list['npm']; ?></a></td>
    <td><?php echo $list['nama_mahasiswa']; ?></td>
	<td>
		<a href="<?php echo base_url(); ?>index.php/admin_controller/orangtua_wali_tampil/<?php echo $list['npm']; ?>" class="tambah">View</a>
		<a href="<?php echo base_url(); ?>index.php/admin_controller/orangtua_wali_edit/<?php echo $list['npm']; ?>" class="tambah">EDIT</a> 
	</td>
	<td>
		<a href="<?php echo base_url() ?>index.php/admin_controller/konfirmasi_delete2/<?php echo $list['npm'] ?>" class="delete">DELETE</a>
	</td>
	<td>
		<a href="<?php echo base_url() ?>index.php/admin_controller/konfirmasi_delete3/<?php echo $list['npm'] ?>" class="delete">DELETE</a>
	</td>
	<td>
		<a href="<?php echo base_url(); ?>index.php/admin_controller/orangtua_wali_tampil2/<?php echo $list['npm']; ?>" class="tambah">View</a> 
		<a href="<?php echo base_url(); ?>index.php/admin_controller/orangtua_wali_edit2/<?php echo $list['npm']; ?>" class="tambah">EDIT</a> 
		<a href="<?php echo base_url() ?>index.php/admin_controller/konfirmasi_delete4/<?php echo $list['npm'] ?>" class="delete">DELETE</a>
	</td>
  </tr>
  <?php } ?>
</table>
	<?php 
			echo $this->pagination->create_links();
			echo "<br>";
		?> 
</div>
<!-- end: Data Orang Tua / Wali Mahasiswa -->