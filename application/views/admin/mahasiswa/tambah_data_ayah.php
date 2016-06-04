<div class="konten">
		<div align="right">
			<a href="<?php echo base_url(); ?>index.php/admin_controller/details/<?php echo $data_mahasiswa['npm']; ?>" class="tambah">Detail Mahasiswa</a>
			<a href="<?php echo base_url(); ?>index.php/admin_controller/orangtua_mahasiswa" class="tambah">Orang Tua</a>
			<a href="<?php echo base_url(); ?>index.php/admin_controller/wali_mahasiswa" class="tambah">Wali</a>
			<a href="<?php echo base_url(); ?>index.php/admin_controller/data_akademik" class="tambah">Data Akademik</a>
			<a href="<?php echo base_url(); ?>index.php/admin_controller/lampiran" class="tambah">Lampiran</a>
		</div>
<!-- start: Form Edit Data Ayah -->
	<h1>Form Tambah Data Ayah Mahasiswa</h1>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="myform">
	<?php echo form_open('admin_controller/tambah_data_ayah'); ?>
	<!-- start: Data Ayah -->
	<tr>
		<td><label for="nama_ayah">Nama Ayah</label>
	    <input name="nama_ayah" type="text" placeholder="Bagian ini wajib anda isi." value="<?php echo set_value('nama_ayah'); ?>"  size="70" autofocus>
		<input name="npm" type="hidden"  value="<?php echo $data_mahasiswa['npm']; ?>" size="70" >
		<?php echo form_error('nama_ayah'); ?>
		</td>
    </tr>
	<tr>
	    <td><label for="tempat_lahir">Tempat Lahir</label>
	    <input name="tempat_lahir" type="text"  placeholder="Bagian ini wajib anda isi."  value="<?php echo set_value('tempat_lahir'); ?>" size="70">
		<?php echo form_error('tempat_lahir'); ?>
		</td>
	    <td><label for="tanggal_lahir">Tanggal Lahir <em>(format: YYYY-MM-DD)</em></label>
		<input type="text" name="tanggal_lahir"    value="<?php echo set_value('tanggal_lahir'); ?>" size="70" placeholder="Wajib diisi... Contoh penulisan: 1992-02-29">
		<?php echo form_error('tanggal_lahir'); ?>
      </td>
	</tr>
	<tr>
	    <td><label for="pendidikan">Pendidikan Terakhir</label>
			<select name="pendidikan" value="<?php echo set_value('pendidikan'); ?>">
				<option>-Pilih Pendidikan- </option>
				<option value="SD"  >SD</option>
				<option value="SMP" >SMP</option>
				<option value="SMA"  >SMA</option>
				<option  value="S1" >S1</option>
				<option value="S2" >S2</option>
				<option value="S3" >S3</option>
			</select>
		<?php echo form_error('pendidikan'); ?>
		</td>
	    <td><label for="pekerjaan">Pekerjaan</label>
			<select name="pekerjaan" value="<?php echo set_value('pekerjaan'); ?>">
				<option>-Pilih Pekerjaan- </option>
				<option value="buruh">Buruh</option>
				<option value="tani">Tani</option>
				<option value="pedagang" >Pedagang</option>
				<option  value="TNI">TNI</option>
				<option value="Polri">Polri</option>
				<option value="Guru">Guru</option>
				<option value="Dosen" >Dosen</option>
				<option value="PNS" >PNS</option>
				<option value="swasta">swasta</option>
				<option value="lainnya">Lainnya</option>
			</select>
		<?php echo form_error('pekerjaan'); ?>
		</td>
    </tr>
	<tr>
	    <td><label for="penghasilan_per_bulan">Penghasilan Per Bulan</label>
	    <input name="penghasilan_per_bulan" type="text"  value="<?php echo set_value('penghasilan_per_bulan'); ?>" size="70">
		<?php echo form_error('penghasilan_per_bulan'); ?>
		</td>
	</tr>
	<tr>
		<td><label for="alamat_rumah">Alamat Rumah</label>
		<input name="alamat_rumah" type="text" placeholder="Bagian ini wajib anda isi." value="<?php echo set_value('alamat_rumah'); ?>" size="70">
		<?php echo form_error('alamat_rumah'); ?>
		</td>
    </tr>
	<tr>
	   <td><label for="alamat_desa">Desa</label>
	   <input name="alamat_desa" type="text" placeholder="Bagian ini wajib anda isi." value="<?php echo set_value('alamat_desa'); ?>" size="70">
		<?php echo form_error('alamat_desa'); ?>
		</td>
	    <td><label for="alamat_kelurahan">Kelurahan</label>
		<input name="alamat_kelurahan" type="text" placeholder="Bagian ini wajib anda isi." value="<?php echo set_value('alamat_kelurahan'); ?>" size="70">
		<?php echo form_error('alamat_kelurahan'); ?>
		</td>
	</tr>
    </p>
	<tr>
		<td><label for="alamat_kecamatan">Kecamatan</label>
		<input name="alamat_kecamatan" type="text" placeholder="Bagian ini wajib anda isi." value="<?php echo set_value('alamat_kecamatan'); ?>" size="70">
		<?php echo form_error('alamat_kecamatan'); ?>
		</td>
    </tr>
	<tr>
		<td><label for="alamat_kabupaten">Kota / Kabupaten</label>
		<input name="alamat_kabupaten" type="text" placeholder="Bagian ini wajib anda isi." value="<?php echo set_value('alamat_kabupaten'); ?>" size="70">
		<?php echo form_error('alamat_kabupaten'); ?>
		</td>
	    <td><label for="kode_pos">Kode Pos</label>
		<input name="kode_pos" type="text" placeholder="Bagian ini wajib anda isi." value="<?php echo set_value('kode_pos'); ?>" size="70">
		<?php echo form_error('kode_pos'); ?>
		</td>
	</tr>
	<tr>
		<td><label for="telepon_rumah">Telepon Rumah</label>
		<input name="telepon_rumah" type="text" value="<?php echo set_value('telepon_rumah'); ?>" size="70">
		<?php echo form_error('telepon_rumah'); ?>
		</td>
	    <td><label for="telepon_genggam">HP</label>
		<input name="telepon_genggam" type="text" value="<?php echo set_value('telepon_genggam'); ?>" size="70">
		<?php echo form_error('telepon_genggam'); ?>
		</td>
	</tr>
	<!-- end: Data Ayah -->
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
  <!-- end: Form Ayah -->
	<p>&nbsp;</p>
</div>