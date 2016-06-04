<?php
	
	
	$agama = $data_mahasiswa['agama'];
	
	if ($agama == 'Islam') 
		{
		   $I = " selected";       
		   $H = "";
		   $B = "";
		   $K = "";
		   $P = "";
		} 
		else if ($agama == 'Budha') 
		{
		   $I = "";       
		   $H = "";
		   $B = " selected";   
		   $K = "";
		   $P = "";
		}
		else if ($agama == 'Hindu') 
		{
			$I = "";       
			$H = " selected";   
			$B = "";
			$K = "";
			$P = "";
		}
		else if ($agama == 'Katolik') 
		{
			$I = "";       
			$H = " ";   
			$B = "";
			$K = "selected";
			$P = "";
		}
		else
		{
			$I = "";       
			$H = " ";   
			$B = "";
			$K = "";
			$P = "selected";
		}
		
		$t = $data_mahasiswa['tipe_tempat_tinggal'];
	
	if ($t == 'rumah orang tua') 
		{
		   $r = " selected";       
		   $k = "";
		   $w = "";
		   $a = "";
		   $l = "";
		} 
		else if ($t == 'kost') 
		{
		   $r = "";   
		   $k = " selected"; 
		   $w = "";
		   $a = "";
		   $l = "";
		}
		else if ($t == 'wali') 
		{
			$r = "";    
			$k = "";
			$w = " selected"; 
			$a = "";
			$l = "";
		}
		else if ($t == 'asrama') 
		{
			$r = "";     
			$k = "";
			$w = "";
			$a = " selected"; 
			$l = "";
		}
		else
		{
			$r = ""; 
			$k = "";
			$w = "";
			$a = "";
			$l = " selected"; 
		}
			

?>


<div class="konten">
	<div align="right">
		<form method="POST" action="<?php echo base_url();?>index.php/admin_controller/cari" class="myform">
		<input type="text" required name="cari"><input type="submit" value="search" name="search">
		<a href="<?php echo base_url(); ?>index.php/admin_controller/tambah_data" class="tambah">Tambah Data</a>
		<a href="<?php echo base_url(); ?>index.php/admin_controller/tampil_mahasiswa" class="tambah">Daftar Mahasiswa</a>
		</form>
    </div>
<!-- start: Form Edit Data Mahasiswa -->
	<h1>Form Edit Data Mahasiswa</h1>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="myform">
	<?php echo form_open('admin_controller/edit_data'); ?>
	<tr>
		<td><label for="nama_mahasiswa">Nama Mahasiswa</label>
	    <input name="nama_mahasiswa" type="text" value="<?php echo $data_mahasiswa['nama_mahasiswa']; ?>"  size="70" autofocus placeholder="Bagian ini wajib anda isi.">
		<?php echo form_error('nama_mahasiswa'); ?>
		</td>
    </tr>
	<tr>
	    <td><label for="tempat_lahir">Tempat Lahir</label>
	    <input name="tempat_lahir" type="text" value="<?php echo $data_mahasiswa['tempat_lahir']; ?>" size="70" placeholder="Bagian ini wajib anda isi.">
		<?php echo form_error('tempat_lahir'); ?>
		</td>
	    <td><label for="tanggal_lahir">Tanggal Lahir <em>(format: YYYY-MM-DD)</em></label>
		<input type="text" name="tanggal_lahir"    value="<?php echo $data_mahasiswa['tanggal_lahir']; ?>" size="70" placeholder="Wajib diisi... Contoh penulisan: 1992-02-29">
		<?php echo form_error('tanggal_lahir'); ?>
      </td>
	</tr>
	<tr>
	    <td><label for="jenis_kelamin">Jenis Kelamin</label>
	    <input type="radio" name="jenis_kelamin" value="L" <?php if ($data_mahasiswa['jenis_kelamin'] == 'L'){echo "checked";}else{} ?>>Laki-Laki
		&nbsp;&nbsp;
		<input type="radio" name="jenis_kelamin" value="P" <?php if ($data_mahasiswa['jenis_kelamin'] == 'P'){echo "checked";}else{} ?>>Perempuan
		</td>
	    <td><label for="agama">Agama</label>
		<select name="agama" value="<?php echo set_value('agama'); ?>">
			<option>-Pilih Agama- </option>
			<option value="Islam"  <?php echo "$I"; ?>>Islam</option>
			<option value="Hindu"  <?php echo "$H"; ?> >Hindu</option>
			<option value="Budha"  <?php echo "$B"; ?> >Budha</option>
			<option  value="Katolik"  <?php echo "$K"; ?>>Katolik</option>
			<option value="Protestan"  <?php echo "$P"; ?>>Protestan</option>
        </select>
		<?php echo form_error('agama'); ?>
		</td>
    </tr>
	<tr>
	    <td><label for="nomor_ktp">Nomor KTP</label>
	    <input name="nomor_ktp" type="text"      value="<?php echo $data_mahasiswa['nomor_ktp']; ?>" size="70" placeholder="Bagian ini wajib anda isi.">
		<?php echo form_error('nomor_ktp'); ?>
		</td>
	</tr>
	<tr>
		<td><label for="alamat_rumah">Alamat Rumah</label>
		<input name="alamat_rumah" type="text"     value="<?php echo $data_mahasiswa['alamat_rumah']; ?>" size="70" placeholder="Bagian ini wajib anda isi.">
		<?php echo form_error('alamat_rumah'); ?>
		</td>
    </tr>
	<tr>
	   <td><label for="alamat_desa">Desa</label>
	   <input name="alamat_desa" type="text"     value="<?php echo $data_mahasiswa['alamat_desa']; ?>" size="70" placeholder="Bagian ini wajib anda isi.">
		<?php echo form_error('alamat_desa'); ?>
		</td>
	    <td><label for="alamat_kelurahan">Kelurahan</label>
		<input name="alamat_kelurahan" type="text"     value="<?php echo $data_mahasiswa['alamat_kelurahan']; ?>" size="70" placeholder="Bagian ini wajib anda isi.">
		<?php echo form_error('alamat_kelurahan'); ?>
		</td>
	</tr>
    </p>
	<tr>
		<td><label for="alamat_kecamatan">Kecamatan</label>
		<input name="alamat_kecamatan" type="text"     value="<?php echo $data_mahasiswa['alamat_kecamatan']; ?>" size="70" placeholder="Bagian ini wajib anda isi.">
		<?php echo form_error('alamat_kecamatan'); ?>
		</td>
    </tr>
	<tr>
		<td><label for="alamat_kabupaten">Kota / Kabupaten</label>
		<input name="alamat_kabupaten" type="text"     value="<?php echo $data_mahasiswa['alamat_kabupaten']; ?>" size="70" placeholder="Bagian ini wajib anda isi.">
		<?php echo form_error('alamat_kabupaten'); ?>
		</td>
	    <td><label for="kode_pos">Kode Pos</label>
		<input name="kode_pos" type="text"     value="<?php echo $data_mahasiswa['kode_pos']; ?>" size="70" placeholder="Bagian ini wajib anda isi.">
		<?php echo form_error('kode_pos'); ?>
		</td>
	</tr>
	<tr>
		<td><label for="telepon_rumah">Telepon Rumah</label>
		<input name="telepon_rumah" type="text"     value="<?php echo $data_mahasiswa['telepon_rumah']; ?>" size="70">
		<?php echo form_error('telepon_rumah'); ?>
		</td>
	    <td><label for="telepon_genggam">HP</label>
		<input name="telepon_genggam" type="text"     value="<?php echo $data_mahasiswa['telepon_genggam']; ?>" size="70">
		<?php echo form_error('telepon_genggam'); ?>
		</td>
	</tr>
	<tr>
		<td><label for="email">Alamat Email</label>
		<input name="email" type="email"     value="<?php echo $data_mahasiswa['email']; ?>" size="70" placeholder="Bagian ini wajib anda isi.">
		<?php echo form_error('email'); ?>
		</td>
	</tr>
	<tr>
		<td><label for="nama_penerima_kps">Penerima KPS</label>
		<input name="nama_penerima_kps" type="text"     value="<?php echo $data_mahasiswa['nama_penerima_kps']; ?>" size="70">
		<?php echo form_error('nama_penerima_kps'); ?>
		</td>
	    <td><label for="nomor_penerima_kps">No KPS</label>
		<input name="nomor_penerima_kps" type="text"     value="<?php echo $data_mahasiswa['nomor_penerima_kps']; ?>" size="70">
		<?php echo form_error('nomor_penerima_kps'); ?>
		</td>
	</tr>
	<tr>
		<td><label for="tipe_tempat_tinggal">Tipe Tempat Tinggal</label>
		<select name="tipe_tempat_tinggal" value="<?php echo set_value('tipe_tempat_tinggal'); ?>">
			<option>-Pilih Tipe Tempat Tinggal- </option>
			<option value="rumah orang tua"  <?php echo "$r"; ?>>Rumah Orang Tua</option>
			<option value="kost"  <?php echo "$k"; ?>>Kost</option>
			<option value="wali"  <?php echo "$w"; ?>>Wali</option>
			<option  value="asrama"  <?php echo "$a"; ?>>Asrama</option>
			<option value="lainnya"  <?php echo "$l"; ?>>Lainnya</option>
        </select>
		</td>
	</tr>
	 <tr>
	    <td>
			<input type="submit" name="submit" id="submit" value="Edit">
			<a href="javascript: history.back();" class="tambah">Kembali </a>
		</td>
	  </tr>
	  <?php echo form_close(); ?>
  </table>
  <!-- end: Form Mahasiswa -->
	<p>&nbsp;</p>
</div>