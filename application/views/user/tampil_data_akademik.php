<div class="konten">
	<div align="right">
		<?php 
		if($data_akademik != NULL)
		{ ?>
			<a href="<?php echo base_url(); ?>index.php/user_controller/edit_data_akademik" class="tambah">Edit Data</a>
		<?php 
		}
		else
		{ ?> 
		<a href="<?php echo base_url(); ?>index.php/user_controller/tambah_data_akademik" class="tambah">Isi Data Akademik</a> 
		<?php } ?>
		<a href="<?php echo base_url(); ?>index.php/user_controller/print_data_mahasiswa" class="tambah" target="_blank">Print</a>
	</div>
<!-- start: Data Akademik Mahasiswa -->
	<h1>Data Akademik Mahasiswa</h1>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="myform">
	<!-- start: Data Akademik Mahasiswa -->
	<tr>
		<td><label for="nama_mahasiswa">NPM</label></td>
	    <td><?php echo $data_mahasiswa['npm']; ?></td>
    </tr>
	<tr>
		<td><label for="nama_mahasiswa">Nama Mahasiswa</label></td>
	    <td><?php echo $data_mahasiswa['nama_mahasiswa']; ?></td>
    </tr>
	<tr>
	    <td><label for="program_studi">Program Studi</label></td>
	    <td><?php echo $data_akademik['program_studi']; ?></td>
		<td>&nbsp;</td>
	    <td><label for="kelas">Kelas</label></td>
		<td><?php echo $data_akademik['kelas']; ?></td>
      </td>
	</tr>
	<tr>
		<td><label for="dosen_wali">Dosen Wali</label></td>
	    <td><?php echo $data_akademik['dosen_wali']; ?></td>
    </tr>
	<tr>
	    <td><label for="tanggal_awal_kuliah">Tanggal Awal Kuliah</label></td>
	    <td><?php echo $data_akademik['tanggal_awal_kuliah']; ?></td>
		<td>&nbsp;</td>
	    <td><label for="tanggal_sidang_skripsi">Tanggal Sidang Skripsi</label></td>
		<td><?php if ($data_akademik['tanggal_sidang_skripsi'] == '0000-00-00')
					{
						echo 'Belum Skripsi';
					}
					else
					{
						echo $data_akademik['tanggal_sidang_skripsi'];
					}
			?>
		</td>
    </tr>
	<tr>
		<td><label for="waktu_tempuh_menyelesaikan_kuliah">Waktu Tempuh Menyelesaikan Kuliah</label></td>
		<td><?php if ( ($data_akademik['waktu_tempuh_menyelesaikan_kuliah_dalam_tahun'] == 0) 
						AND ($data_akademik['waktu_tempuh_menyelesaikan_kuliah_dalam_bulan'] == 0) 
						AND	($data_akademik['waktu_tempuh_menyelesaikan_kuliah_dalam_hari'] == 0))
						{
							echo '-';
						}
					else
					{
						echo "Dalam tahun:       ".$data_akademik['waktu_tempuh_menyelesaikan_kuliah_dalam_tahun']." tahun <br> Dalam bulan:       ".$data_akademik['waktu_tempuh_menyelesaikan_kuliah_dalam_bulan'].
						" bulan <br> Dalam hari:       ".$data_akademik['waktu_tempuh_menyelesaikan_kuliah_dalam_hari']." hari";
					}
			?>
		</td>
	</tr>
	<tr>
		<td><label for="prestasi_akademik">Prestasi Akademik</label></td>
		<td><?php echo $data_akademik['prestasi_akademik'];?></td>
		<td>&nbsp;</td>
		<td><label for="prestasi_non_akademik">Prestasi Non Akademik</label></td>
		<td><?php echo $data_akademik['prestasi_non_akademik'];?></td>
	</tr>
	<tr>
		<td><label for="ipk">IPK</label></td>
		<td><?php 
				if ($data_akademik['ipk'] == 000)
				{
					echo '-';
				}
				else
				{
					$ipk = $data_akademik['ipk']/100;
					$jumlahdesimal = "2";
					$pemisahdesimal = ".";
					$pemisahribuan =" ";
					echo number_format($ipk,$jumlahdesimal,$pemisahdesimal,$pemisahribuan);
				}
			?>
		</td>
    </tr>
	<tr>
		<td><label for="asal_sekolah_sebelum_kuliah">Asal Sekolah</label></td>
		<td><?php echo $data_akademik['asal_sekolah_sebelum_kuliah'];?></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
  </table>
  <!-- end: Data Akademik Mahasiswa -->
	<p>&nbsp;</p>
	
	<div align="right">
		<?php 
		if($data_akademik != NULL)
		{ ?>
			<a href="<?php echo base_url(); ?>index.php/user_controller/edit_data_akademik" class="tambah">Edit Data</a>
		<?php 
		}
		else
		{ ?> 
		<a href="<?php echo base_url(); ?>index.php/user_controller/tambah_data_akademik" class="tambah">Isi Data Akademik</a> 
		<?php } ?>
		<a href="<?php echo base_url(); ?>index.php/user_controller/print_data_mahasiswa" class="tambah" target="_blank">Print</a>
	</div>
</div>