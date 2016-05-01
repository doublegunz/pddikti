<div class="konten">
<!-- start: Pengaturan -->
	<h1>Pengaturan</h1>
	<p>Untuk mengubah password anda, silakan klik tombol 'Ubah'.</p>
	<table width="50" border="0" cellspacing="0" cellpadding="0" class="myform">
	<tr>
		<td>Username</td>
		<td>:</td>
		<td><?php echo $this->session->userdata('user'); ?></td>
	</tr>
	<tr>
		<td>Password</td>
		<td>:</td>
	    <td>*************</td>
	</tr>
	<tr>
		<td>
			<a href="<?php echo base_url(); ?>index.php/user_controller/ubah_pass" class="tambah">
				Ubah
			</a>
		</td>
	</tr>
  </table>
  <!-- end: Pengaturan -->
	<p>&nbsp;</p>
</div>