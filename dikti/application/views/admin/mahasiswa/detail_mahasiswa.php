<div class="konten">
	<div align="right">
			<a href="<?php echo base_url(); ?>index.php/admin_controller/details/<?php echo $data_mahasiswa['npm']; ?>" class="tambah">Detail Mahasiswa</a>
			<a href="<?php echo base_url(); ?>index.php/admin_controller/orangtua_mahasiswa" class="tambah">Orang Tua</a>
			<a href="<?php echo base_url(); ?>index.php/admin_controller/wali_mahasiswa" class="tambah">Wali</a>
			<a href="<?php echo base_url(); ?>index.php/admin_controller/data_akademik" class="tambah">Data Akademik</a>
			<a href="<?php echo base_url(); ?>index.php/admin_controller/lampiran" class="tambah">Lampiran</a>
		</div>
<!-- start: Data Mahasiswa -->
	<h1>Data Mahasiswa</h1>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="myform">
	<tr>
		<?php if($data_foto == NULL)
			{
				?><td><img src="<?php echo base_url(); ?>assets/scan/default/mahasiswa.jpg" width="160" height="160">
				<?php echo form_open_multipart('admin_controller/unggah_foto'); ?>
				<input type="file" required name="foto">&nbsp;Tipe file jpg <br>
				<input name="npm" type="hidden"  value="<?php echo $data_mahasiswa['npm']; ?>" size="70" >
				<input type="submit" name="submit" id="submit" value="Unggah Foto"></td>
				 <?php echo form_close(); 
			}
			else
			{
				?><td><img src="<?php echo base_url(); ?>assets/scan/<?php echo $data_foto['scan_foto'];?>" width="160" height="160"></td><?php
			}
			
		?>
    </tr>
	<tr>
	<td><label for="nama_mahasiswa">NPM</label></td>
	    <td><?php echo $data_mahasiswa['npm']; ?></td>
	</tr>
	<tr>
		<td><label for="nama_mahasiswa">Nama Mahasiswa</label></td>
	    <td><?php echo $data_mahasiswa['nama_mahasiswa']; ?></td>
    </tr>
	<tr>
	    <td><label for="tempat_lahir">Tempat Lahir</label></td>
	    <td><?php echo $data_mahasiswa['tempat_lahir']; ?></td>
		<td>&nbsp;</td>
	    <td><label for="tanggal_lahir">Tanggal Lahir</label></td>
		<td><?php echo $data_mahasiswa['tanggal_lahir']; ?></td>
      </td>
	</tr>
	<tr>
	    <td><label for="jenis_kelamin">Jenis Kelamin</label></td>
	    <td><?php if ($data_mahasiswa['jenis_kelamin'] == 'L'){ echo 'Laki-Laki';}
			elseif($data_mahasiswa['jenis_kelamin'] == 'P') { echo 'Perempuan';};?></td>
		<td>&nbsp;</td>
	    <td><label for="agama">Agama</label></td>
		 <td><?php echo $data_mahasiswa['agama'];?></td>
    </tr>
	<tr>
	    <td><label for="nomor_ktp">Nomor KTP</label></td>
		<td><?php echo $data_mahasiswa['nomor_ktp'];?></td>
	</tr>
	<tr>
		<td><label for="alamat_rumah">Alamat Rumah</label></td>
		<td><?php echo $data_mahasiswa['alamat_rumah'];?></td>
    </tr>
	<tr>
		<td><label for="alamat_desa">Desa</label></td>
		<td><?php echo $data_mahasiswa['alamat_desa'];?></td>
		<td>&nbsp;</td>
	    <td><label for="alamat_kelurahan">Kelurahan</label></td>
		<td><?php echo $data_mahasiswa['alamat_kelurahan'];?></td>
	</tr>
    </p>
	<tr>
		<td><label for="alamat_kecamatan">Kecamatan</label></td>
		<td><?php echo $data_mahasiswa['alamat_kecamatan'];?></td>
    </tr>
	<tr>
		<td><label for="alamat_kabupaten">Kota / Kabupaten</label></td>
		<td><?php echo $data_mahasiswa['alamat_kabupaten'];?></td>
		<td>&nbsp;</td>
	    <td><label for="kode_pos">Kode Pos</label></td>
		<td><?php echo $data_mahasiswa['kode_pos'];?></td>
	</tr>
	<tr>
		<td><label for="telepon_rumah">Telepon Rumah</label></td>
		<td><?php echo $data_mahasiswa['telepon_rumah'];?></td>
		<td>&nbsp;</td>
	    <td><label for="telepon_genggam">HP</label></td>
		<td><?php echo $data_mahasiswa['telepon_genggam'];?></td>
	</tr>
	<tr>
		<td><label for="email">Alamat Email</label></td>
		<td><?php echo $data_mahasiswa['email'];?></td>
	</tr>
	<tr>
		<td><label for="nama_penerima_kps">Penerima KPS</label></td>
		<td><?php echo $data_mahasiswa['nama_penerima_kps'];?></td>
		<td>&nbsp;</td>
	    <td><label for="nomor_penerima_kps">No KPS</label></td>
		<td><?php echo $data_mahasiswa['nomor_penerima_kps'];?></td>
	</tr>
	<tr>
		<td><label for="tipe_tempat_tinggal">Tipe Tempat Tinggal</label></td>
		<td><?php echo $data_mahasiswa['tipe_tempat_tinggal'];?></td>
	</tr>
  </table>
  <!-- end: Data Mahasiswa -->
	<p>&nbsp;</p>
	<a href="<?php echo base_url(); ?>index.php/admin_controller/edit_data_mahasiswa/<?php echo $data_mahasiswa['npm']; ?>" class="tambah">Edit</a>
	<a href="<?php echo base_url(); ?>index.php/admin_controller/tampil_mahasiswa" class="tambah">Kembali ke Daftar Mahasiswa</a>
	<a href="<?php echo base_url(); ?>index.php/admin_controller/print_data_mahasiswa" class="tambah" target="_blank">Print</a>
</div>