<div class="konten">
	<div align="right">
		<a href="<?php echo base_url(); ?>index.php/admin_controller/tambah_data" class="tambah">Tambah Data</a>
    </div>
	 <!-- start: Manajemen User -->
	<h1>Manajemen User</h1>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="myform">
  <tr>
    <th scope="col">Username</th>
    <th scope="col">Password</th>
	<th scope="col">Ubah Password</th>
	<th scope="col">Delete</th>
  </tr>
  <?php foreach($data_mahasiswa as $list) { ?>
  <tr>
    <td><?php echo $list['npm']; ?></td>
    <td>**********</td>
	<td>
		<a href="<?php echo base_url(); ?>index.php/admin_controller/ubah_pass/<?php echo $list['npm'] ?>" class="tambah">
			Ubah
		</a>
	</td>
	<td>
		<a href="<?php echo base_url() ?>index.php/admin_controller/konfirmasi_delete7/<?php echo $list['npm'] ?>" class="delete">
			Delete
		</a>
	</td>
  </tr>
  <?php } ?>
</table>
	<?php 
			echo $this->pagination->create_links();
			echo "<br>";
		?> 
</div>
<!-- end: Manajemen User -->