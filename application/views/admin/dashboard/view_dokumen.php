<div class="konten">
	<div align="right">
		<a href="<?php echo base_url(); ?>index.php/dokumen/tambah_dokumen" class="tambah">Unggah Dokumen Baru</a>
	</div>
	 <!-- start: Data Dokumen -->
	<h1>Data Dokumen</h1>
  
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="myform">
  <tr>
    <th scope="col">No</th>
    <th scope="col">Nama Dokumen</th>
  </tr>
  <?php foreach($data_dokumen as $list) { ?>
  <tr>
    <td><?php echo $list['id']; ?></td>
    <td><?php echo $list['nama_dokumen']; ?></td>
  </tr>
  <?php } ?>
</table>
	<?php 
			echo $this->pagination->create_links();
			echo "<br>";
		?> 
</div>
<!-- end: Data Dokumen -->