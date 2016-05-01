<div class="konten">
	<div align="right">
		<a href="<?php echo base_url(); ?>index.php/user_controller/print_data_mahasiswa" class="tambah" target="_blank">Print</a>
	</div>
<!-- start: Data Lampiran -->
	<h1>Data Lampiran</h1>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="myform">
	<!-- start: Data Lampiran -->
	<th scope="col">Pas Foto</th>
    <th scope="col">KK</th>
	<th scope="col">KTP</th>
	<th scope="col">KTM</th>
	<tr>
		<td>
		<?php if($data_foto == NULL)
			{
				?><img src="<?php echo base_url(); ?>assets/scan/default/mahasiswa.jpg" width="160" height="160"><br>
				<?php echo form_open_multipart('user_controller/unggah_foto'); ?>
				<input type="file" name="foto" required> <br>&nbsp;Tipe file jpg<br>
				<input name="npm" type="hidden"  value="<?php echo $data_mahasiswa['npm']; ?>" size="70" >
				<input type="submit" name="submit" id="submit" value="Unggah Foto">
				 <?php echo form_close(); 
			}
			else
			{
				?><img src="<?php echo base_url(); ?>assets/scan/<?php echo $data_foto['scan_foto'];?>" width="160" height="160"><br>
				<?php echo form_open_multipart('user_controller/edit_foto_mahasiswa'); ?>
				<input type="file" name="foto" required> <br>&nbsp;Tipe file jpg<br>
				<input name="npm" type="hidden"  value="<?php echo $data_mahasiswa['npm']; ?>" size="70" ><br>
				<input type="submit" name="submit" id="submit" value="Edit Foto">
				 <?php echo form_close(); 
			}
			
		?>
		</td>
		<td>
		<?php if($data_kk == NULL)
			{
				?><img src="<?php echo base_url(); ?>assets/scan/default/scan_kartu.jpg" width="160" height="160"><br>
				<?php echo form_open_multipart('user_controller/unggah_kk'); ?>
				<input type="file" name="foto" required> <br>&nbsp;Tipe file jpg<br>
				<input name="npm" type="hidden"  value="<?php echo $data_mahasiswa['npm']; ?>" size="70" ><br>
				<input type="submit" name="submit" id="submit" value="Unggah Foto">
				 <?php echo form_close(); 
			}
			else
			{
				?><img src="<?php echo base_url(); ?>assets/scan/<?php echo $data_kk['scan_kartu_keluarga'];?>" width="160" height="160"><br>
				<?php echo form_open_multipart('user_controller/edit_kk'); ?>
				<input type="file" name="foto" required> <br>&nbsp;Tipe file jpg<br>
				<input name="npm" type="hidden"  value="<?php echo $data_mahasiswa['npm']; ?>" size="70" ><br>
				<input type="submit" name="submit" id="submit" value="Edit Foto">
				 <?php echo form_close(); 
			}
			
		?>
		</td>
		<td>
		<?php if($data_ktp == NULL)
			{
				?><img src="<?php echo base_url(); ?>assets/scan/default/scan_kartu.jpg" width="160" height="160"><br>
				<?php echo form_open_multipart('user_controller/unggah_ktp'); ?>
				<input type="file" name="foto" required> <br>&nbsp;Tipe file jpg<br>
				<input name="npm" type="hidden"  value="<?php echo $data_mahasiswa['npm']; ?>" size="70" ><br>
				<input type="submit" name="submit" id="submit" value="Unggah Foto">
				 <?php echo form_close(); 
			}
			else
			{
				?><img src="<?php echo base_url(); ?>assets/scan/<?php echo $data_ktp['scan_ktp'];?>" width="160" height="160"><br>
				<?php echo form_open_multipart('user_controller/edit_ktp'); ?>
				<input type="file" name="foto" required> <br>&nbsp;Tipe file jpg<br>
				<input name="npm" type="hidden"  value="<?php echo $data_mahasiswa['npm']; ?>" size="70" ><br>
				<input type="submit" name="submit" id="submit" value="Edit Foto"><br>
				 <?php echo form_close(); 
			}
			
		?>
		</td>
		<td>
		<?php if($data_ktm == NULL)
			{
				?><img src="<?php echo base_url(); ?>assets/scan/default/scan_kartu.jpg" width="160" height="160"><br>
				<?php echo form_open_multipart('user_controller/unggah_ktm'); ?>
				<input type="file" name="foto" required> <br>&nbsp;Tipe file jpg<br>
				<input name="npm" type="hidden"  value="<?php echo $data_mahasiswa['npm']; ?>" size="70" ><br>
				<input type="submit" name="submit" id="submit" value="Unggah Foto"><br>
				 <?php echo form_close(); 
			}
			else
			{
				?><img src="<?php echo base_url(); ?>assets/scan/<?php echo $data_ktm['scan_ktm'];?>" width="160" height="160"><br>
				<?php echo form_open_multipart('user_controller/edit_ktm'); ?>
				<input type="file" name="foto" required> <br>&nbsp;Tipe file jpg<br>
				<input name="npm" type="hidden"  value="<?php echo $data_mahasiswa['npm']; ?>" size="70" ><br>
				<input type="submit" name="submit" id="submit" value="Edit Foto"><br>
				 <?php echo form_close(); 
			}
			
		?>
		</td>	
    </tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
  </table>
  <!-- end: Data Lampiran -->
	<p>&nbsp;</p>
	<div align="right">
		<a href="<?php echo base_url(); ?>index.php/user_controller/print_data_mahasiswa" class="tambah" target="_blank">Print</a>
	</div>
</div>