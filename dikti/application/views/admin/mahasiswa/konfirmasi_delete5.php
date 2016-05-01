<div class="konten">
	<div align="right">
		<form method="POST" action="<?php echo base_url();?>index.php/admin_controller/cari" class="myform">
		<input type="text" required name="cari"><input type="submit" value="search" name="search">
		<a href="<?php echo base_url(); ?>index.php/admin_controller/tambah_data" class="tambah">Tambah Data</a>
		<a href="<?php echo base_url(); ?>index.php/admin_controller/tampil_mahasiswa" class="tambah">Daftar Mahasiswa</a>
		</form>
    </div>
	 <!-- start: Konfirmasi Delete Data Akademik Mahasiswa -->
	<h1>Konfirmasi Delete Data Akademik Mahasiswa</h1>
	<div class="warning">
	<p>Anda yakin ingin menghapus data Akademik dari mahasiswa dengan NPM <?php echo $npm; ?>?</p>
		<a href="<?php echo base_url(); ?>index.php/admin_controller/delete_data_akademik/<?php echo $npm; ?>" class="delete">YA</a>
		<a href="<?php echo base_url(); ?>index.php/admin_controller/tampil_akademik_lampiran" class="tambah">TIDAK</a>
	</div>
</div>
<!-- end: Konfirmasi Delete Data Akademik Mahasiswa -->