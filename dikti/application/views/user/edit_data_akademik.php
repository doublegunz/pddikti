<div class="konten">
<!-- start: Form Edit Data Akademik -->
	<h1>Form Edit Data Akademik Mahasiswa</h1>
	<p>Silakan lengkapi data Akademik anda.</p>
	<p>*Diisi setelah lulus.</p>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="myform">
	<?php echo form_open('user_controller/edit_data_akademik'); ?>
	<!-- start: Data Akademik -->
	<tr>
		<td><label for="program_studi">Program Studi</label>
			<select name="program_studi">
				<option>-Pilih Program Studi- </option>
				<option value="Teknik Informatika"  <?php if ($data_akademik['program_studi'] == "Teknik Informatika"){ echo 'selected';}else{} ?>>Teknik Informatika</option>
				<option value="Teknik Sipil" <?php if ($data_akademik['program_studi'] == "Teknik Sipil"){ echo 'selected';}else{} ?>>Teknik Sipil</option>
				<option value="Teknik Kimia"  <?php if ($data_akademik['program_studi'] == "Teknik Kimia"){ echo 'selected';}else{} ?>>Teknik Kimia</option>
				<option  value="Teknik Mesin" <?php if ($data_akademik['program_studi'] == "Teknik Mesin"){ echo 'selected';}else{} ?>>Teknik Mesin</option>
				<option value="Teknik Industri" <?php if ($data_akademik['program_studi'] == "Teknik Industri"){ echo 'selected';}else{} ?>>Teknik Industri</option>
				<option value="Pendidikan Olahraga" <?php if ($data_akademik['program_studi'] == "Pendidikan Olahraga"){ echo 'selected';}else{} ?>>Pendidikan Olahraga</option>
				<option value="Pendidikan Bahasa Inggris" <?php if ($data_akademik['program_studi'] == "Pendidikan Bahasa Inggris"){ echo 'selected';}else{} ?>>Pendidikan Bahasa Inggris</option>
				<option value="Pendidikan Kewarganegaraan" <?php if ($data_akademik['program_studi'] == "Pendidikan Kewarganegaraan"){ echo 'selected';}else{} ?>>Pendidikan Kewarganegaraan</option>
				<option value="Administrasi Bisnis" <?php if ($data_akademik['program_studi'] == "Administrasi Bisnis"){ echo 'selected';}else{} ?>>Administrasi Bisnis</option>
				<option value="Hukum" <?php if ($data_akademik['program_studi'] == "Hukum"){ echo 'selected';}else{} ?>>Hukum</option>
				<option value="Akuntansi" <?php if ($data_akademik['program_studi'] == "Akuntansi"){ echo 'selected';}else{} ?> >Akuntansi</option>
				<option value="lainnya" <?php if ($data_akademik['program_studi'] == "lainnya"){ echo 'selected';}else{} ?>>lainnya</option>
			</select>
			<?php echo form_error('program_studi'); ?>
		</td>
    </tr>
	<tr>
	    <td><label for="kelas">Kelas</label>
			<input type="radio" name="kelas" value="reguler" <?php if ($data_akademik['kelas'] == "reguler"){ echo 'checked';}else{} ?>>Reguler
			&nbsp;&nbsp;
			<input type="radio" name="kelas" value="karyawan" <?php if ($data_akademik['kelas'] == "karyawan"){ echo 'checked';}else{} ?>>Karyawan
			<?php echo form_error('kelas'); ?>
		</td>
		 <td><label for="dosen_wali">Dosen Wali</label>
			<input name="dosen_wali" type="text"     value="<?php echo $data_akademik['dosen_wali']; ?>" size="70">
			<?php echo form_error('dosen_wali'); ?>
		</td>
	    
	</tr>
	<tr>
		<td><label for="tanggal_awal_kuliah">Tanggal Awal Kuliah<em>(format: YYYY-MM-DD)</em></label>
			<input type="text" name="tanggal_awal_kuliah"  placeholder="Contoh penulisan: 1992-02-29"  value="<?php echo $data_akademik['tanggal_awal_kuliah']; ?>">
			<?php echo form_error('tanggal_awal_kuliah'); ?>
		</td>
		<td><label for="tanggal_sidang_skripsi">*Tanggal Sidang Skripsi<em>(format: YYYY-MM-DD)</em></label>
			<input type="text" name="tanggal_sidang_skripsi"  placeholder="Contoh penulisan: 1992-02-29"  value="<?php echo $data_akademik['tanggal_sidang_skripsi']; ?>">
			<?php echo form_error('tanggal_sidang_skripsi'); ?>
		</td>
	    
    </tr>
	<tr>
		<td><label for="prestasi_akademik">Prestasi Akademik</label>
			<textarea name="prestasi_akademik" rows="5" cols="50"><?php echo $data_akademik['prestasi_akademik']; ?>
			</textarea>
			<?php echo form_error('prestasi_akademik'); ?>
		</td>
	    <td><label for="prestasi_non_akademik">Prestasi Non Akademik</label>
			<textarea name="prestasi_non_akademik" rows="5" cols="50"><?php echo $data_akademik['prestasi_non_akademik']; ?>
			</textarea>
			<?php echo form_error('prestasi_non_akademik'); ?>
		</td>
	</tr>
    </p>
	<tr>
	    <td><label for="ipk">*IPK</label>
			<?php $angka = $data_akademik['ipk']/100;
				$jumlahdesimal = "2";
				$pemisahdesimal = ".";
				$pemisahribuan =" ";
				$ipk = number_format($angka,$jumlahdesimal,$pemisahdesimal,$pemisahribuan);
				$gp=explode('.',$ipk);
			?>
			<input type="text" name="ipk1" value="<?php echo $gp['0']; ?>" size="1" maxlength="1">&nbsp;&nbsp;<strong>.</strong>&nbsp;&nbsp;
			<input type="text" name="ipk2" value="<?php echo $gp['1']; ?>" size="1" maxlength="2">
			<?php echo form_error('ipk1'); ?><?php echo form_error('ipk2'); ?>
		</td>
	</tr>
	<tr>
		<td><label for="asal_sekolah_sebelum_kuliah">Asal Sekolah</label>
			<input type="text" name="asal_sekolah_sebelum_kuliah"    value="<?php echo $data_akademik['asal_sekolah_sebelum_kuliah']; ?>" size="70">
			<?php echo form_error('asal_sekolah_sebelum_kuliah'); ?>
		</td>
	</tr>
	<!-- end: Data akademik -->
	<tr>
		<td>
			&nbsp;
		</td>
	</tr>
	 <tr>
	    <td>
			<input type="submit" name="submit" id="submit" value="Edit Data">
			<a href="javascript: history.back();" class="tambah">Kembali </a>
		</td>
	  </tr>
	  <?php echo form_close(); ?>
  </table>
  <!-- end: Form akademik -->
	<p>&nbsp;</p>
</div>