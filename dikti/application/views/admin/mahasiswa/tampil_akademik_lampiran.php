<div class="konten">
	<div align="right">
		<form method="POST" action="<?php echo base_url();?>index.php/admin_controller/cari" class="myform">
		<input type="text" required name="cari"><input type="submit" value="search" name="search">
		<a href="<?php echo base_url(); ?>index.php/admin_controller/tambah_data" class="tambah">Tambah Data</a>
		<a href="<?php echo base_url(); ?>index.php/admin_controller/tampil_mahasiswa" class="tambah">Daftar Mahasiswa</a>
		</form>
    </div>
	 <!-- start: Data Mahasiswa -->
	<h1>Data Mahasiswa</h1>
  
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="myform">
  <tr>
    <th scope="col">NPM</th>
    <th scope="col">Nama</th>
	<th scope="col">Data Akademik</th>
	<th scope="col">Lampiran</th>
	
  </tr>
  <?php foreach($data_mahasiswa as $list) { ?>
  <tr>
    <td>
	<a href="<?php echo base_url(); ?>index.php/admin_controller/details/<?php echo $list['npm'] ?>">
	<?php echo $list['npm']; ?></a></td>
    <td><?php echo $list['nama_mahasiswa']; ?></td>
	<td>
		<a href="<?php echo base_url(); ?>index.php/admin_controller/tampil_akademik/<?php echo $list['npm']; ?>" class="tambah">View</a> 
		<a href="<?php echo base_url(); ?>index.php/admin_controller/edit_akademik2/<?php echo $list['npm']; ?>" class="tambah">Edit</a> 
		<a href="<?php echo base_url(); ?>index.php/admin_controller/konfirmasi_delete5/<?php echo $list['npm']; ?>" class="delete">Delete</a>
	</td>
	<td>
		<a href="<?php echo base_url(); ?>index.php/admin_controller/tampil_lampiran/<?php echo $list['npm']; ?>" class="tambah">View</a> 
		<a href="<?php echo base_url(); ?>index.php/admin_controller/tampil_lampiran/<?php echo $list['npm']; ?>" class="tambah">Edit</a> 
		<a href="<?php echo base_url(); ?>index.php/admin_controller/konfirmasi_delete6/<?php echo $list['npm']; ?>" class="delete">Delete</a>
	</td>
  </tr>
  <?php } ?>
</table>
	<?php 
			echo $this->pagination->create_links();
			echo "<br>";
		?> 
</div>
<!-- end: Data Mahasiswa -->