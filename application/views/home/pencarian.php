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