<div class="konten">
	<!-- start: Form Pendaftaran PDPT -->
	<h1>Formulir Pendaftaran PDPT</h1>
	<p>Silakan isi formulir dibawah ini:</p>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="myform">
		<?php echo form_open('register'); ?>
		<tr>
			<td><label for="npm">NPM</label>
				<input name="npm" type="text" value="<?php echo set_value('npm'); ?>" size="40" autofocus placeholder="Bagian ini wajib anda isi." required>
				<?php echo form_error('npm'); ?>
			</td>
			<td><label for="nama_mahasiswa">Nama Mahasiswa</label>
				<input name="nama_mahasiswa" type="text" value="<?php echo set_value('nama_mahasiswa'); ?>" size="40" placeholder="Bagian ini wajib anda isi." required>
				<?php echo form_error('nama_mahasiswa'); ?>
			</td>
		</tr>
		<tr>
			<td><label for="tempat_lahir">Tempat Lahir</label>
				<input name="tempat_lahir" type="text" value="<?php echo set_value('tempat_lahir'); ?>" size="40" placeholder="Bagian ini wajib anda isi." required>
				<?php echo form_error('tempat_lahir'); ?>
			</td>
			<td><label for="tanggal_lahir">Tanggal Lahir <em>(format: YYYY-MM-DD)</em></label>
				<input type="text" name="tanggal_lahir" value="<?php echo set_value('tanggal_lahir'); ?>" size="40" placeholder="Wajib diisi... Contoh penulisan: 1992-02-29" required>
				<?php echo form_error('tanggal_lahir'); ?>
			</td>
		</tr>
		<tr>
			<td><label for="jenis_kelamin">Jenis Kelamin</label>
				<input type="radio" name="jenis_kelamin" value="L" checked>Laki-Laki
				&nbsp;&nbsp;
				<input type="radio" name="jenis_kelamin" value="P">Perempuan
			</td>
			<td><label for="agama">Agama</label>
				<select name="agama" value="<?php echo set_value('agama'); ?>" required>
					<option>-Pilih Agama- </option>
					<option value="Islam">Islam</option>
					<option value="Hindu">Hindu</option>
					<option value="Budha">Budha</option>
					<option value="Katolik">Katolik</option>
					<option value="Protestan">Protestan</option>
				</select>
				<?php echo form_error('agama'); ?>
			</td>
		</tr>
		<tr>
			<td><label for="nomor_ktp">Nomor KTP</label>
				<input name="nomor_ktp" type="text" value="<?php echo set_value('nomor_ktp'); ?>" size="40" placeholder="Bagian ini wajib anda isi." required>
				<?php echo form_error('nomor_ktp'); ?>
			</td>
		</tr>
		<tr>
			<td><label for="alamat_rumah">Alamat Rumah</label>
				<input name="alamat_rumah" type="text" value="<?php echo set_value('alamat_rumah'); ?>" size="40" placeholder="Bagian ini wajib anda isi." required>
				<?php echo form_error('alamat_rumah'); ?>
			</td>
		</tr>
		<tr>
			<td><label for="alamat_desa">Desa</label>
				<input name="alamat_desa" type="text" value="<?php echo set_value('alamat_desa'); ?>" size="40" placeholder="Bagian ini wajib anda isi." required>
				<?php echo form_error('alamat_desa'); ?>
			</td>
			<td><label for="alamat_kelurahan">Kelurahan</label>
				<input name="alamat_kelurahan" type="text" value="<?php echo set_value('alamat_kelurahan'); ?>" size="40" placeholder="Bagian ini wajib anda isi." required>
				<?php echo form_error('alamat_kelurahan'); ?>
			</td>
		</tr>
		</p>
		<tr>
			<td><label for="alamat_kecamatan">Kecamatan</label>
				<input name="alamat_kecamatan" type="text" value="<?php echo set_value('alamat_kecamatan'); ?>" size="40" placeholder="Bagian ini wajib anda isi." required>
				<?php echo form_error('alamat_kecamatan'); ?>
			</td>
		</tr>
		<tr>
			<td><label for="alamat_kabupaten">Kota / Kabupaten</label>
				<input name="alamat_kabupaten" type="text" value="<?php echo set_value('alamat_kabupaten'); ?>" size="40" placeholder="Bagian ini wajib anda isi." required>
				<?php echo form_error('alamat_kabupaten'); ?>
			</td>
			<td><label for="kode_pos">Kode Pos</label>
				<input name="kode_pos" type="text" value="<?php echo set_value('kode_pos'); ?>" size="40" required>
				<?php echo form_error('kode_pos'); ?>
			</td>
		</tr>
		<tr>
			<td><label for="telepon_rumah">Telepon Rumah</label>
				<input name="telepon_rumah" type="text" value="<?php echo set_value('telepon_rumah'); ?>" size="40" required>
				<?php echo form_error('telepon_rumah'); ?>
			</td>
			<td><label for="telepon_genggam">HP</label>
				<input name="telepon_genggam" type="text" value="<?php echo set_value('telepon_genggam'); ?>" size="40" required>
				<?php echo form_error('telepon_genggam'); ?>
			</td>
		</tr>
		<tr>
			<td><label for="email">Alamat Email</label>
				<input name="email" type="text" value="<?php echo set_value('email'); ?>" size="40" placeholder="Bagian ini wajib anda isi." required>
				<?php echo form_error('email'); ?>
			</td>
		</tr>
		<tr>
			<td><label for="nama_penerima_kps">Penerima KPS</label>
				<input name="nama_penerima_kps" type="text" value="<?php echo set_value('nama_penerima_kps'); ?>" size="40">
				<?php echo form_error('nama_penerima_kps'); ?>
			</td>
			<td><label for="nomor_penerima_kps">No KPS</label>
				<input name="nomor_penerima_kps" type="text" value="<?php echo set_value('nomor_penerima_kps'); ?>" size="40">
				<?php echo form_error('nomor_penerima_kps'); ?>
			</td>
		</tr>
		<tr>
			<td><label for="tipe_tempat_tinggal">Tipe Tempat Tinggal</label>
				<select name="tipe_tempat_tinggal" value="<?php echo set_value('tipe_tempat_tinggal'); ?>">
					<option>-Pilih Tipe Tempat Tinggal- </option>
					<option value="rumah orang tua">Rumah Orang Tua</option>
					<option value="kost">Kost</option>
					<option value="wali">Wali</option>
					<option value="asrama">Asrama</option>
					<option value="lainnya">Lainnya</option>
				</select>
			</td>
		</tr>
		<tr>
			<td><label for="password">Password</label>
				<input name="password" type="password" value="<?php echo set_value('password'); ?>" size="40" placeholder="Bagian ini wajib anda isi." required>
				<?php echo form_error('password'); ?>
			</td>
			<td><label for="passconf">Konfirmasi Password</label>
				<input name="passconf" type="password" value="<?php echo set_value('passconf'); ?>" size="40" placeholder="Bagian ini wajib anda isi." required>
				<?php echo form_error('passconf'); ?>
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" name="submit" id="submit" value="Submit">
				<input type="reset" name="submit2" id="submit2" value="Reset">
			</td>
		</tr>
		<?php echo form_close(); ?>
	</table>
	<!-- end: Form Mahasiswa -->
	<p>&nbsp;</p>
</div>