<!doctype html>
<html>
<head>
<!-- start: META -->
	<meta charset="utf-8" />
	<!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta content="Tugas UAS" name="description" />
	<meta content="Gun Gun Priatna" name="author" />
<!-- end: META -->
<!-- start: title -->
<title><?php echo $title; ?></title>
<!-- end: title -->

<!--start: assets -->

<link href="<?php echo base_url(); ?>assets/images/pdpt.png" rel="shortcut icon">
<link href="<?php echo base_url(); ?>assets/css/style-admin.css" rel="stylesheet" type="text/css">
<!--end: assets -->
</head>

<body onload="window.print();">
<div id="wrapper">

<div class="konten">
<!-- start: Data Mahasiswa -->

	<h1>Data Mahasiswa</h1>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="myform">
	<tr>
		<td>
			<img src="<?php echo base_url(); ?>assets/scan/<?php echo $data_foto['scan_foto'];?>" width="160" height="160">
		</td>
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
	<tr>
		<td>&nbsp;</td>
	</tr>
  </table>
  <!-- end: Data Mahasiswa -->
  <h1>Data Orang Tua Mahasiswa</h1>
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
  <h1>Data Wali Mahasiswa</h1>
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
		<td><?php if ( ($data_akademik['waktu_tempuh_menyelesaikan_kuliah_dalam_tahun'] == NULL) 
						AND ($data_akademik['waktu_tempuh_menyelesaikan_kuliah_dalam_bulan'] == NULL) 
						AND	($data_akademik['waktu_tempuh_menyelesaikan_kuliah_dalam_hari'] == NULL))
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
	
	<h1>Data Lampiran</h1>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="myform">
	<!-- start: Data Lampiran -->
	<tr>
		<td><label for="nama_mahasiswa">Scan Kartu Keluarga</label>
		<img src="<?php echo base_url(); ?>assets/scan/<?php echo $data_kk['scan_kartu_keluarga'];?>" width="160" height="160"></td>	
		<td><label for="nama_mahasiswa">Scan KTP</label>
		<img src="<?php echo base_url(); ?>assets/scan/<?php echo $data_ktp['scan_ktp'];?>" width="160" height="160"></td>
	</tr>
	<tr>
		<td><label for="nama_mahasiswa">Scan KTM</label>
		<img src="<?php echo base_url(); ?>assets/scan/<?php echo $data_ktm['scan_ktm'];?>" width="160" height="160"></td>	
		<td>&nbsp;</td>
	</tr>
  </table>
  <!-- end: Data Lampiran -->
	<p>&nbsp;</p>
</div>
</div>
</body>
</html>