<div class="konten">
<!-- start: Form Tambah Data Orang Tua -->
	<h1>Form Tambah Data Orang Tua Mahasiswa</h1>
	<p>Silakan lengkapi data Orang Tua anda.:</p>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="myform">
	<?php echo form_open('user_controller/tambah_data_orangtua'); ?>
	<!-- start: Data Ayah -->
	<tr>
		<td><label for="nama_ayah">Nama Ayah</label>
	    <input name="nama_ayah" type="text"    value="<?php echo set_value('nama_ayah'); ?>"  size="70" autofocus placeholder="Bagian ini wajib anda isi.">
		<?php echo form_error('nama_ayah'); ?>
		</td>
    </tr>
	<tr>
	    <td><label for="tempat_lahir">Tempat Lahir</label>
	    <input name="tempat_lahir" type="text"     value="<?php echo set_value('tempat_lahir'); ?>" size="70" placeholder="Bagian ini wajib anda isi.">
		<?php echo form_error('tempat_lahir'); ?>
		</td>
	    <td><label for="tanggal_lahir">Tanggal Lahir <em>(format: YYYY-MM-DD)</em></label>
		<input type="text" name="tanggal_lahir"    value="<?php echo set_value('tanggal_lahir'); ?>" size="40" placeholder="Wajib diisi... Contoh penulisan: 1992-02-29">
		<?php echo form_error('tanggal_lahir'); ?>
      </td>
	</tr>
	<tr>
	    <td><label for="pendidikan">Pendidikan Terakhir</label>
			<select name="pendidikan" value="<?php echo set_value('pendidikan'); ?>" >
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
	    <input name="penghasilan_per_bulan" type="text"      value="<?php echo set_value('penghasilan_per_bulan'); ?>" size="70" >
		<?php echo form_error('penghasilan_per_bulan'); ?>
		</td>
	</tr>
	<tr>
		<td><label for="alamat_rumah">Alamat Rumah</label>
		<input name="alamat_rumah" type="text"     value="<?php echo set_value('alamat_rumah'); ?>" size="70" placeholder="Bagian ini wajib anda isi.">
		<?php echo form_error('alamat_rumah'); ?>
		</td>
    </tr>
	<tr>
	   <td><label for="alamat_desa">Desa</label>
	   <input name="alamat_desa" type="text"  value="<?php echo set_value('alamat_desa'); ?>" size="70" placeholder="Bagian ini wajib anda isi.">
		<?php echo form_error('alamat_desa'); ?>
		</td>
	    <td><label for="alamat_kelurahan">Kelurahan</label>
		<input name="alamat_kelurahan" type="text"      value="<?php echo set_value('alamat_kelurahan'); ?>" size="70" placeholder="Bagian ini wajib anda isi.">
		<?php echo form_error('alamat_kelurahan'); ?>
		</td>
	</tr>
    </p>
	<tr>
		<td><label for="alamat_kecamatan">Kecamatan</label>
		<input name="alamat_kecamatan" type="text"      value="<?php echo set_value('alamat_kecamatan'); ?>" size="70" placeholder="Bagian ini wajib anda isi.">
		<?php echo form_error('alamat_kecamatan'); ?>
		</td>
    </tr>
	<tr>
		<td><label for="alamat_kabupaten">Kota / Kabupaten</label>
		<input name="alamat_kabupaten" type="text"      value="<?php echo set_value('alamat_kabupaten'); ?>" size="70" placeholder="Bagian ini wajib anda isi."> 
		<?php echo form_error('alamat_kabupaten'); ?>
		</td>
	    <td><label for="kode_pos">Kode Pos</label>
		<input name="kode_pos" type="text"      value="<?php echo set_value('kode_pos'); ?>" size="40">
		<?php echo form_error('kode_pos'); ?>
		</td>
	</tr>
	<tr>
		<td><label for="telepon_rumah">Telepon Rumah</label>
		<input name="telepon_rumah" type="text"      value="<?php echo set_value('telepon_rumah'); ?>" size="70">
		<?php echo form_error('telepon_rumah'); ?>
		</td>
	    <td><label for="telepon_genggam">HP</label>
		<input name="telepon_genggam" type="text"      value="<?php echo set_value('telepon_genggam'); ?>" size="40">
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
			&nbsp;
		</td>
	</tr>
	<!-- start: Data Ibu -->
	<tr>
		<td><label for="nama_ibu">Nama Ibu</label>
	    <input name="nama_ibu" type="text"     value="<?php echo set_value('nama_ibu'); ?>"  size="70" placeholder="Bagian ini wajib anda isi.">
		<?php echo form_error('nama_ibu'); ?>
		</td>
    </tr>
	<tr>
	    <td><label for="tempat_lahir2">Tempat Lahir</label>
	    <input name="tempat_lahir2" type="text"      value="<?php echo set_value('tempat_lahir2'); ?>" size="70" placeholder="Bagian ini wajib anda isi.">
		<?php echo form_error('tempat_lahir2'); ?>
		</td>
	    <td><label for="tanggal_lahir">Tanggal Lahir <em>(format: YYYY-MM-DD)</em></label>
		<input type="text" name="tanggal_lahir2"     value="<?php echo set_value('tanggal_lahir2'); ?>" size="40" placeholder="Wajib diisi... Contoh penulisan: 1992-02-29">
		<?php echo form_error('tanggal_lahir2'); ?>
      </td>
	</tr>
	<tr>
	    <td><label for="pendidikan2">Pendidikan Terakhir</label>
			<select name="pendidikan2" value="<?php echo set_value('pendidikan2'); ?>">
				<option>-Pilih Pendidikan- </option>
				<option value="SD">SD</option>
				<option value="SMP">SMP</option>
				<option value="SMA">SMA</option>
				<option  value="S1">S1</option>
				<option value="S2">S2</option>
				<option value="S3" >S3</option>
			</select>
		<?php echo form_error('pendidikan2'); ?>
		</td>
	    <td><label for="pekerjaan2">Pekerjaan</label>
			<select name="pekerjaan2" value="<?php echo set_value('pekerjaan2'); ?>">
				<option>-Pilih Pekerjaan- </option>
				<option value="buruh">Buruh</option>
				<option value="tani">Tani</option>
				<option value="pedagang" >Pedagang</option>
				<option  value="TNI">TNI</option>
				<option value="Polri">Polri</option>
				<option value="Guru">Guru</option>
				<option value="Dosen" >Dosen</option>
				<option value="PNS" >PNS</option>
				<option value="swasta" >swasta</option>
				<option value="lainnya">Lainnya</option>
			</select>
		<?php echo form_error('pekerjaan2'); ?>
		</td>
    </tr>
	<tr>
	    <td><label for="penghasilan_per_bulan2">Penghasilan Per Bulan</label>
	    <input name="penghasilan_per_bulan2" type="text"       value="<?php echo set_value('penghasilan_per_bulan2'); ?>" size="70">
		<?php echo form_error('penghasilan_per_bulan2'); ?>
		</td>
	</tr>
	<tr>
		<td><label for="alamat_rumah2">Alamat Rumah</label>
		<input name="alamat_rumah2" type="text"      value="<?php echo set_value('alamat_rumah2'); ?>" size="70" placeholder="Bagian ini wajib anda isi.">
		<?php echo form_error('alamat_rumah2'); ?>
		</td>
    </tr>
	<tr>
	   <td><label for="alamat_desa2">Desa</label>
	   <input name="alamat_desa2" type="text"      value="<?php echo set_value('alamat_desa2'); ?>" size="70" placeholder="Bagian ini wajib anda isi.">
		<?php echo form_error('alamat_desa2'); ?>
		</td>
	    <td><label for="alamat_kelurahan2">Kelurahan</label>
		<input name="alamat_kelurahan2" type="text"      value="<?php echo set_value('alamat_kelurahan2'); ?>" size="70" placeholder="Bagian ini wajib anda isi.">
		<?php echo form_error('alamat_kelurahan2'); ?>
		</td>
	</tr>
    </p>
	<tr>
		<td><label for="alamat_kecamatan2">Kecamatan</label>
		<input name="alamat_kecamatan2" type="text"      value="<?php echo set_value('alamat_kecamatan2'); ?>" size="70" placeholder="Bagian ini wajib anda isi.">
		<?php echo form_error('alamat_kecamatan2'); ?>
		</td>
    </tr>
	<tr>
		<td><label for="alamat_kabupaten2">Kota / Kabupaten</label>
		<input name="alamat_kabupaten2" type="text"      value="<?php echo set_value('alamat_kabupaten2'); ?>" size="70" placeholder="Bagian ini wajib anda isi.">
		<?php echo form_error('alamat_kabupaten2'); ?>
		</td>
	    <td><label for="kode_pos2">Kode Pos</label>
		<input name="kode_pos2" type="text"      value="<?php echo set_value('kode_pos2'); ?>" size="40">
		<?php echo form_error('kode_pos2'); ?>
		</td>
	</tr>
	<tr>
		<td><label for="telepon_rumah2">Telepon Rumah</label>
		<input name="telepon_rumah2" type="text"      value="<?php echo set_value('telepon_rumah2'); ?>" size="70">
		<?php echo form_error('telepon_rumah2'); ?>
		</td>
	    <td><label for="telepon_genggam2">HP</label>
		<input name="telepon_genggam2" type="text"      value="<?php echo set_value('telepon_genggam2'); ?>" size="40">
		<?php echo form_error('telepon_genggam2'); ?>
		</td>
	</tr>
	<!-- end: Data Ibu -->	
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
  <!-- end: Form Orang Tua -->
	<p>&nbsp;</p>
</div>