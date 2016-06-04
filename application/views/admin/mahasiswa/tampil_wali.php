<div class="konten">
	<div align="right">
			<a href="<?php echo base_url(); ?>index.php/admin_controller/details/<?php echo $data_mahasiswa['npm']; ?>" class="tambah">Detail Mahasiswa</a>
			<a href="<?php echo base_url(); ?>index.php/admin_controller/orangtua_mahasiswa" class="tambah">Orang Tua</a>
			<a href="<?php echo base_url(); ?>index.php/admin_controller/wali_mahasiswa" class="tambah">Wali</a>
			<a href="<?php echo base_url(); ?>index.php/admin_controller/data_akademik" class="tambah">Data Akademik</a>
			<a href="<?php echo base_url(); ?>index.php/admin_controller/lampiran" class="tambah">Lampiran</a>
		</div>
<!-- start: Data Wali Mahasiswa -->
	<h1>Data Mahasiswa</h1>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="myform">
	<!-- start: Data Wali Mahasiswa -->
	<tr>
		<td><label for="nama_wali">Nama Wali</label></td>
	    <td><?php echo $data_wali['nama_wali']; ?></td>
    </tr>
	<tr>
	    <td><label for="tempat_lahir">Tempat Lahir</label></td>
	    <td><?php echo $data_wali['tempat_lahir']; ?></td>
		<td>&nbsp;</td>
	    <td><label for="tanggal_lahir">Tanggal Lahir</label></td>
		<td><?php echo $data_wali['tanggal_lahir']; ?></td>
      </td>
	</tr>
	<tr>
	    <td><label for="pendidikan">Pendidikan Terakhir</label></td>
	    <td><?php echo $data_wali['pendidikan']; ?></td>
		<td>&nbsp;</td>
	    <td><label for="pekerjaan">Pekerjaan</label></td>
		 <td><?php echo $data_wali['pekerjaan'];?></td>
    </tr>
	<tr>
		<td><label for="penghasilan_per_bulan">Penghasilan per bulan</label></td>
		 <td>
			<?php 
				if ($data_wali['penghasilan_per_bulan'] != NULL)
				{
					$angka = $data_wali['penghasilan_per_bulan'];
					$jumlahdesimal = "2";
					$pemisahdesimal = ",";
					$pemisahribuan =".";
					echo "Rp ". number_format($angka,$jumlahdesimal,$pemisahdesimal,$pemisahribuan);
				}
				else
				{
					echo "-";
				}
				
			?>
		</td>
	</tr>
	<tr>
		<td><label for="alamat_rumah">Alamat Rumah</label></td>
		<td><?php echo $data_wali['alamat_rumah'];?></td>
    </tr>
	<tr>
		<td><label for="alamat_desa">Desa</label></td>
		<td><?php echo $data_wali['alamat_desa'];?></td>
		<td>&nbsp;</td>
	    <td><label for="alamat_kelurahan">Kelurahan</label></td>
		<td><?php echo $data_wali['alamat_kelurahan'];?></td>
	</tr>
    </p>
	<tr>
		<td><label for="alamat_kecamatan">Kecamatan</label></td>
		<td><?php echo $data_wali['alamat_kecamatan'];?></td>
    </tr>
	<tr>
		<td><label for="alamat_kabupaten">Kota / Kabupaten</label></td>
		<td><?php echo $data_wali['alamat_kabupaten'];?></td>
		<td>&nbsp;</td>
	    <td><label for="kode_pos">Kode Pos</label></td>
		<td><?php echo $data_wali['kode_pos'];?></td>
	</tr>
	<tr>
		<td><label for="telepon_rumah">Telepon Rumah</label></td>
		<td><?php echo $data_wali['telepon_rumah'];?></td>
		<td>&nbsp;</td>
	    <td><label for="telepon_genggam">HP</label></td>
		<td><?php echo $data_wali['telepon_genggam'];?></td>
	</tr>
	<!-- end: Data Ayah -->
	<tr>
		<td>&nbsp;</td>
	</tr>
  </table>
  <!-- end: Data Wali Mahasiswa -->
	<p>&nbsp;</p>
	<?php 
		if($data_wali != NULL)
		{ ?>
			<a href="<?php echo base_url(); ?>index.php/admin_controller/edit_data_wali" class="tambah">Edit Data</a>
	<?php 
		}
		else
		{ ?> 
		<a href="<?php echo base_url(); ?>index.php/admin_controller/tambah_data_wali" class="tambah">Isi Data Wali</a> 
	<?php } ?>
	
	<a href="<?php echo base_url(); ?>index.php/admin_controller/tampil_mahasiswa" class="tambah">Kembali ke Daftar Mahasiswa</a>
</div>