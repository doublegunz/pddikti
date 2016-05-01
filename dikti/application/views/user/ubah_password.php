<div class="konten">
<!-- start: Form Ubah Password -->
	<h1>Form Ubah Password</h1>
	<p>Silakan masukan password baru anda.</p>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="myform">
	<?php echo form_open('user_controller/ubah_pass'); ?>
	<!-- start: Ubah Password -->
	<tr>
	    <td>
	    <input name="pass_baru" type="password" value="<?php echo set_value('pass_baru'); ?>" size="40" placeholder="Password Baru">
		<input name="email" type="hidden" value="<?php echo $data_mahasiswa['email']; ?>">
		<?php echo form_error('pass_baru'); ?>
		</td>
	</tr>
	<tr>
	    <td>
		<input type="password" name="pass_conf" value="<?php echo set_value('pass_conf'); ?>" size="40" placeholder="Konfirmasi Password Baru">
		<?php echo form_error('pass_conf'); ?>
      </td>
	</tr>
	 <tr>
	    <td>
			<input type="submit" name="submit" id="submit" value="Ubah Password">
			<input type="reset" name="Reset" id="Reset" value="Reset">
			<a href="javascript: history.back();" class="tambah">Kembali </a>
		</td>
	  </tr>
	  <?php echo form_close(); ?>
  </table>
  <!-- end: Form Ubah Password -->
	<p>&nbsp;</p>
</div>