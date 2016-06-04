<div class="konten">
		<div align="right">
			<a href="<?php echo base_url(); ?>index.php/admin_controller/details/<?php echo $data_mahasiswa['npm']; ?>" class="tambah">Detail Mahasiswa</a>
			<a href="<?php echo base_url(); ?>index.php/admin_controller/orangtua_mahasiswa" class="tambah">Orang Tua</a>
			<a href="<?php echo base_url(); ?>index.php/admin_controller/wali_mahasiswa" class="tambah">Wali</a>
			<a href="<?php echo base_url(); ?>index.php/admin_controller/data_akademik" class="tambah">Data Akademik</a>
			<a href="<?php echo base_url(); ?>index.php/admin_controller/lampiran" class="tambah">Lampiran</a>
		</div>
<!-- start: Form Data Akademik -->
	<h1>Form Data Akademik Mahasiswa</h1>
	<p>*Diisi setelah mahasiswa lulus.</p>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="myform">
	<?php echo form_open('admin_controller/tambah_data_akademik'); ?>
	<!-- start: Data Akademik -->
	<tr>
		<td><label for="program_studi">Program Studi</label>
			<select name="program_studi" value="<?php echo set_value('program_studi'); ?>">
				<option>-Pilih Program Studi- </option>
				<option value="Teknik Informatika"  >Teknik Informatika</option>
				<option value="Teknik Sipil" >Teknik Sipil</option>
				<option value="Teknik Kimia"  >Teknik Kimia</option>
				<option  value="Teknik Mesin" >Teknik Mesin</option>
				<option value="Teknik Industri" >Teknik Industri</option>
				<option value="Pendidikan Olahraga" >Pendidikan Olahraga</option>
				<option value="Pendidikan Bahasa Inggris" >Pendidikan Bahasa Inggris</option>
				<option value="Pendidikan Kewarganegaraan" >Pendidikan Kewarganegaraan</option>
				<option value="Administrasi Bisnis" >Administrasi Bisnis</option>
				<option value="Hukum" >Hukum</option>
				<option value="Akuntansi" >Akuntansi</option>
				<option value="lainnya" >lainnya</option>
			</select>
			<?php echo form_error('program_studi'); ?>
		</td>
    </tr>
	<tr>
	    <td><label for="kelas">Kelas</label>
			<input type="radio" name="kelas" value="reguler" checked>Reguler
			&nbsp;&nbsp;
			<input type="radio" name="kelas" value="karyawan" >Karyawan
			<?php echo form_error('kelas'); ?>
		</td>
		 <td><label for="dosen_wali">Dosen Wali</label>
			<input name="dosen_wali" type="text"     value="<?php echo set_value('dosen_wali'); ?>" size="40">
			<?php echo form_error('dosen_wali'); ?>
		</td>
	    
	</tr>
	<tr>
		<td><label for="tanggal_awal_kuliah">Tanggal Awal Kuliah<em>(format: YYYY-MM-DD)</em></label>
			<input type="text" name="tanggal_awal_kuliah"  placeholder="Contoh penulisan: 1992-02-29" value="<?php echo set_value('tanggal_awal_kuliah'); ?>" size="40">
			<?php echo form_error('tanggal_awal_kuliah'); ?>
		</td>
		<td><label for="tanggal_sidang_skripsi">*Tanggal Sidang Skripsi<em>(format: YYYY-MM-DD)</em></label>
			<input type="text" name="tanggal_sidang_skripsi"   placeholder="Contoh penulisan: 1992-02-29"  value="<?php echo set_value('tanggal_sidang_skripsi'); ?>" size="40">
			<?php echo form_error('tanggal_sidang_skripsi'); ?>
		</td>
	    
    </tr>
	<tr>
		<td><label for="prestasi_akademik">Prestasi Akademik</label>
			<textarea name="prestasi_akademik" rows="5" cols="50">
			</textarea>
			<?php echo form_error('prestasi_akademik'); ?>
		</td>
	    <td><label for="prestasi_non_akademik">Prestasi Non Akademik</label>
			<textarea name="prestasi_non_akademik" rows="5" cols="50">
			</textarea>
			<?php echo form_error('prestasi_non_akademik'); ?>
		</td>
	</tr>
    </p>
	<tr>
	    <td><label for="ipk">*IPK</label>
			<input type="text" name="ipk1" value="<?php echo set_value('ipk1'); ?>" size="1" maxlength="1">&nbsp;&nbsp;<strong>.</strong>&nbsp;&nbsp;
			<input type="text" name="ipk2" value="<?php echo set_value('ipk2'); ?>" size="1" maxlength="2">
			<?php echo form_error('ipk1'); ?><?php echo form_error('ipk2'); ?>
		</td>
	</tr>
	<tr>
		<td><label for="asal_sekolah_sebelum_kuliah">Asal Sekolah</label>
			<input type="text" name="asal_sekolah_sebelum_kuliah"    value="<?php echo set_value('asal_sekolah_sebelum_kuliah'); ?>" size="40">
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
			<input type="submit" name="submit" id="submit" value="Isi Data">
			<input type="reset" name="Reset" id="Reset" value="Reset">
			<a href="javascript: history.back();" class="tambah">Kembali </a>
		</td>
	  </tr>
	  <?php echo form_close(); ?>
  </table>
  <!-- end: Form akademik -->
	<p>&nbsp;</p>
</div>