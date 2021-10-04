<div class="konten">
<!-- start: Data Dokumen -->
	<h1>Data Dokumen</h1>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="myform">
	<!-- start: Data Lampiran -->
	<?php echo form_open_multipart('dokumen/upload'); ?>
	<tr>
		<td><label for="nama_dokumen">Nama Dokumen</label>
			<input type="text" name="nama_dokumen" required size="40">
		</td>
	</tr>
	<tr>
		<td><label for="dokumen">Dokumen</label>
			<input type="file" name="dokumen" required> <br>&nbsp;Tipe file doc atau docx
		</td>
	</tr>
	<tr>
		<td><input type="submit" name="submit" id="submit" value="Unggah Dokumen"></td>
			<?php echo form_close(); ?>		
    </tr>
  </table>
  <!-- end: Data Dokumen -->
	<p>&nbsp;</p>
</div>