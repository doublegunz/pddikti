<div class="konten">
	<div align="right">
			<a href="<?php echo base_url(); ?>index.php/admin_controller/details/<?php echo $data_mahasiswa['npm']; ?>" class="tambah">Detail Mahasiswa</a>
			<a href="<?php echo base_url(); ?>index.php/admin_controller/orangtua_mahasiswa" class="tambah">Orang Tua</a>
			<a href="<?php echo base_url(); ?>index.php/admin_controller/wali_mahasiswa" class="tambah">Wali</a>
			<a href="<?php echo base_url(); ?>index.php/admin_controller/data_akademik" class="tambah">Data Akademik</a>
			<a href="<?php echo base_url(); ?>index.php/admin_controller/lampiran" class="tambah">Lampiran</a>
		</div>
<!-- start: Data Orang Tua Mahasiswa -->
	<h1>Data Mahasiswa</h1>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="myform">
	<!-- start: Data Ayah Mahasiswa -->
	<tr>
		<td><label for="nama_ayah">Nama Ayah</label></td>
	    <td><?php echo $data_ayah['nama_ayah']; ?></td>
    </tr>
	<tr>
	    <td><label for="tempat_lahir">Tempat Lahir</label></td>
	    <td><?php echo $data_ayah['tempat_lahir']; ?></td>
		<td>&nbsp;</td>
	    <td><label for="tanggal_lahir">Tanggal Lahir</label></td>
		<td><?php echo $data_ayah['tanggal_lahir']; ?></td>
      </td>
	</tr>
	<tr>
	    <td><label for="pendidikan">Pendidikan Terakhir</label></td>
	    <td><?php echo $data_ayah['pendidikan']; ?></td>
		<td>&nbsp;</td>
	    <td><label for="pekerjaan">Pekerjaan</label></td>
		 <td><?php echo $data_ayah['pekerjaan'];?></td>
    </tr>
	<tr>
		<td><label for="penghasilan_per_bulan">Penghasilan per bulan</label></td>
		 <td>
			<?php 
				if ($data_ayah['penghasilan_per_bulan'] != NULL)
				{
					$angka = $data_ayah['penghasilan_per_bulan'];
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
		<td><?php echo $data_ayah['alamat_rumah'];?></td>
    </tr>
	<tr>
		<td><label for="alamat_desa">Desa</label></td>
		<td><?php echo $data_ayah['alamat_desa'];?></td>
		<td>&nbsp;</td>
	    <td><label for="alamat_kelurahan">Kelurahan</label></td>
		<td><?php echo $data_ayah['alamat_kelurahan'];?></td>
	</tr>
    </p>
	<tr>
		<td><label for="alamat_kecamatan">Kecamatan</label></td>
		<td><?php echo $data_ayah['alamat_kecamatan'];?></td>
    </tr>
	<tr>
		<td><label for="alamat_kabupaten">Kota / Kabupaten</label></td>
		<td><?php echo $data_ayah['alamat_kabupaten'];?></td>
		<td>&nbsp;</td>
	    <td><label for="kode_pos">Kode Pos</label></td>
		<td><?php echo $data_ayah['kode_pos'];?></td>
	</tr>
	<tr>
		<td><label for="telepon_rumah">Telepon Rumah</label></td>
		<td><?php echo $data_ayah['telepon_rumah'];?></td>
		<td>&nbsp;</td>
	    <td><label for="telepon_genggam">HP</label></td>
		<td><?php echo $data_ayah['telepon_genggam'];?></td>
	</tr>
	<!-- end: Data Ayah -->
	<tr>
		<td>&nbsp;</td>
	</tr>
	<!-- start: Data Ibu-->
	<tr>
		<td><label for="nama_ibu">Nama Ibu</label></td>
	    <td><?php echo $data_ibu['nama_ibu']; ?></td>
    </tr>
	<tr>
	    <td><label for="tempat_lahir">Tempat Lahir</label></td>
	    <td><?php echo $data_ibu['tempat_lahir']; ?></td>
		<td>&nbsp;</td>
	    <td><label for="tanggal_lahir">Tanggal Lahir</label></td>
		<td><?php echo $data_ibu['tanggal_lahir']; ?></td>
      </td>
	</tr>
	<tr>
	    <td><label for="pendidikan">Pendidikan Terakhir</label></td>
	    <td><?php echo $data_ibu['pendidikan']; ?></td>
		<td>&nbsp;</td>
	    <td><label for="pekerjaan">Pekerjaan</label></td>
		 <td><?php echo $data_ibu['pekerjaan'];?></td>
    </tr>
	<tr>
		<td><label for="penghasilan_per_bulan">Penghasilan per bulan</label></td>
		 <td>
			<?php 
				if ($data_ibu['penghasilan_per_bulan'] != NULL)
				{
					$angka = $data_ibu['penghasilan_per_bulan'];
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
		<td><?php echo $data_ibu['alamat_rumah'];?></td>
    </tr>
	<tr>
		<td><label for="alamat_desa">Desa</label></td>
		<td><?php echo $data_ibu['alamat_desa'];?></td>
		<td>&nbsp;</td>
	    <td><label for="alamat_kelurahan">Kelurahan</label></td>
		<td><?php echo $data_ibu['alamat_kelurahan'];?></td>
	</tr>
    </p>
	<tr>
		<td><label for="alamat_kecamatan">Kecamatan</label></td>
		<td><?php echo $data_ibu['alamat_kecamatan'];?></td>
    </tr>
	<tr>
		<td><label for="alamat_kabupaten">Kota / Kabupaten</label></td>
		<td><?php echo $data_ibu['alamat_kabupaten'];?></td>
		<td>&nbsp;</td>
	    <td><label for="kode_pos">Kode Pos</label></td>
		<td><?php echo $data_ibu['kode_pos'];?></td>
	</tr>
	<tr>
		<td><label for="telepon_rumah">Telepon Rumah</label></td>
		<td><?php echo $data_ibu['telepon_rumah'];?></td>
		<td>&nbsp;</td>
	    <td><label for="telepon_genggam">HP</label></td>
		<td><?php echo $data_ibu['telepon_genggam'];?></td>
	</tr>
	<!-- end: Data Ibu-->
  </table>
  <!-- end: Data Orang Tua Mahasiswa -->
	<p>&nbsp;</p>
	<?php 
		if(($data_ayah != NULL) AND ($data_ibu != NULL))
		{ ?>
			<a href="<?php echo base_url(); ?>index.php/admin_controller/edit_data_orangtua/<?php echo $data_mahasiswa['npm']; ?>" class="tambah">Edit Data</a>
	<?php 
		}
		else if(($data_ayah == NULL) AND ($data_ibu != NULL))
		{ ?>
			<a href="<?php echo base_url(); ?>index.php/admin_controller/edit_data_orangtua/<?php echo $data_mahasiswa['npm']; ?>" class="tambah">Edit Data</a>
			<a href="<?php echo base_url(); ?>index.php/admin_controller/tambah_data_ayah" class="tambah">Isi Data Ayah</a> 
	<?php }
		else if(($data_ayah != NULL) AND ($data_ibu == NULL))
		{ ?>
			<a href="<?php echo base_url(); ?>index.php/admin_controller/edit_data_orangtua/<?php echo $data_mahasiswa['npm']; ?>" class="tambah">Edit Data</a>
			<a href="<?php echo base_url(); ?>index.php/admin_controller/tambah_data_ibu" class="tambah">Isi Data Ibu</a> 
	<?php }
		else if(($data_ayah == NULL) AND ($data_ibu == NULL))
		{ ?>
			<a href="<?php echo base_url(); ?>index.php/admin_controller/tambah_data_orangtua" class="tambah">Isi Data Orang Tua</a> 
	<?php }
		else {}
	?>
	<a href="<?php echo base_url(); ?>index.php/admin_controller/tampil_mahasiswa" class="tambah">Kembali ke Daftar Mahasiswa</a>
</div>