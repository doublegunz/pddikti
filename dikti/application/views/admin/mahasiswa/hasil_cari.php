<div class="konten">
	<div align="right">
		<form method="POST" action="<?php echo base_url();?>index.php/admin_controller/cari" class="myform">
		<input type="text" required name="cari"><input type="submit" value="search" name="search">
		<a href="<?php echo base_url(); ?>index.php/admin_controller/tambah_data" class="tambah">Tambah Data</a>
		<a href="<?php echo base_url(); ?>index.php/admin_controller/tampil_mahasiswa" class="tambah">Data Mahasiswa</a>
		</form>
    </div>
	 <!-- start: Hasil Pencarian Data Mahasiswa -->
	<h1>Hasil Pencarian Data Mahasiswa</h1>
	<?php 
		if($hasil_pencarian != NULL)
		{?>
			 <table width="100%" border="0" cellspacing="0" cellpadding="0" class="myform">
				<tr>
				<th scope="col">NPM</th>
				<th scope="col">Nama</th>
				<th scope="col">View</th>
				<th scope="col">Edit</th>
				<th scope="col">Delete</th>
				<th scope="col">Print</th>
				</tr>
				<?php foreach($hasil_pencarian as $list) { ?>
				<tr>
				<td>
				<a href="<?php echo base_url(); ?>index.php/admin_controller/details/<?php echo $list['npm'] ?>">
				<?php echo $list['npm']; ?></a></td>
				<td><?php echo $list['nama_mahasiswa']; ?></td>
				<td>
					<a href="<?php echo base_url(); ?>index.php/admin_controller/details/<?php echo $list['npm'] ?>" class="tambah">
						View
					</a>
				</td>
				<td>
					<a href="<?php echo base_url(); ?>index.php/admin_controller/edit_data_mahasiswa/<?php echo $list['npm']; ?>" class="tambah">
						Edit
					</a>
				</td>
				<td>
					<a href="<?php echo base_url() ?>index.php/admin_controller/konfirmasi_delete/<?php echo $list['npm'] ?>" class="delete">
						Delete
					</a>
				</td>
				<td>
					<a href="<?php echo base_url(); ?>index.php/admin_controller/print_data_mahasiswa" class="tambah" target="_blank">
						Print
					</a>
				</td>
			  </tr>
			  <?php } ?>
			</table>
	<?php 
			echo $this->pagination->create_links();
			echo "<br>";
		 
		}
		else
		{ ?>
			<div class="warning">
			<p align ="center">Data Tidak ditemukan</p>
			</div>
			
	<?php 
		}
		?>
	
   
</div>
<!-- end: Hasil Pencarian Data Mahasiswa -->