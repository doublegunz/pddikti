<div class="konten">
	<h1>Manajemen berita</h1>
    
    <div align="right">
    	<a href="<?php echo base_url(); ?>index.php/admin_controller/tambah" class="tambah">Tambah berita</a>
    </div>
    
    <p>Daftar berita</p>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="myform">
  <tr>
    <th scope="col">Judul</th>
    <th scope="col">Status</th>
    <th scope="col">Penulis</th>
    <th scope="col">Tanggal</th>
	<th scope="col">&nbsp;</th>
    <th scope="col">&nbsp;</th>
	<th scope="col">&nbsp;</th>
  </tr>
  <?php foreach($berita as $list) { ?>
  <tr>
    <td>
	<a href="<?php echo base_url(); ?>index.php/home/read/<?php echo $list['slug'] ?>" target="_blank">
	<?php echo $list['judul']; ?></a></td>
    <td><?php echo $list['status_berita']; ?></td>
    <td><?php echo $list['nama']; ?></td>
    <td><?php echo $list['tanggal']; ?></td>
	<td>
		<?php if($list['status_berita']=='Draft'){ ?>
		<a href="<?php echo base_url(); ?>index.php/admin_controller/publish/<?php echo $list['id_berita']; ?>" class="tambah">Publish</a>
		<?php }else{  } ?>
	</td>
	<td><a href="<?php echo base_url(); ?>index.php/admin_controller/edit/<?php echo $list['id_berita']; ?>" class="tambah">EDIT</a></td>
    <td><a href="<?php echo base_url() ?>index.php/admin_controller/delete/<?php echo $list['id_berita'] ?>" class="delete">DELETE</a></td>
  </tr>
  <?php } ?>
</table>
	<?php 
			echo $this->pagination->create_links();
			echo "<br>";
		?> 
</div>