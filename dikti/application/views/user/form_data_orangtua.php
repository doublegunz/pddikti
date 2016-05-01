<?php
	
	//Ayah
	$pendidikan = $data_ayah['pendidikan'];
	$SD = "";
	$SMP = "";
	$SMA = "";
	$S1 = ""; 
	$S2 = "";
	$S3 = "";

	if ($pendidikan == 'SD') 
		{
		   $SD = " selected";       
		   $SMP = "";
		   $SMA = "";
		   $S1 = "";
		   $S2 = "";
		   $S3 = "";
		} 
		else if ($pendidikan == 'SMP') 
		{
		  $SD =  "";     
		   $SMP = " selected";  
		   $SMA = "";
		   $S1 = "";
		   $S2 = "";
		   $S3 = "";
		}
		else if ($pendidikan == 'SMA') 
		{
			$SD = "";  
		   $SMP = "";
		   $SMA = " selected"; 
		   $S1 = "";
		   $S2 = "";
		   $S3 = "";
		}
		else if ($pendidikan == 'S1') 
		{
			$SD = "";
		   $SMP = "";
		   $SMA = "";
		   $S1 = " selected"; 
		   $S2 = "";
		   $S3 = "";
		}
		else if ($pendidikan == 'S2') 
		{
			$SD = ""; 
		   $SMP = "";
		   $SMA = "";
		   $S1 = "";
		   $S2 = " selected"; 
		   $S3 = "";
		}
		else if ($pendidikan == 'S3') 
		{
			$SD = "";
		   $SMP = "";
		   $SMA = "";
		   $S1 = "";
		   $S2 = "";
		   $S3 = " selected"; 
		}
		
		
	$t = $data_ayah['pekerjaan'];
		$buruh = "";       
		$tani = "";
		$pedagang = "";
		$TNI = "";
		$Polri = "";
		$Guru = "";
		$Dosen = "";
		$PNS = "";
		$swasta = "";
		$lainnya = "";
	
	if ($t == 'buruh') 
		{
			$buruh = " selected";       
			$tani = "";
			$pedagang = "";
			$TNI = "";
			$Polri = "";
			$Guru = "";
			$Dosen = "";
			$PNS = "";
			$swasta = "";
			$lainnya = "";
			
		} 
	if ($t == 'tani') 
		{
			$buruh =  "";      
			$tani = " selected"; 
			$pedagang = "";
			$TNI = "";
			$Polri = "";
			$Guru = "";
			$Dosen = "";
			$PNS = "";
			$swasta = "";
			$lainnya = "";
			
		} 
		if ($t == 'pedagang') 
		{
			$buruh =  "";      
			$tani = "";
			$pedagang = " selected"; 
			$TNI = "";
			$Polri = "";
			$Guru = "";
			$Dosen = "";
			$PNS = "";
			$swasta = "";
			$lainnya = "";
			
		} 
		if ($t == 'TNI') 
		{
			$buruh =  "";     
			$tani = "";
			$pedagang = "";
			$TNI = " selected"; 
			$Polri = "";
			$Guru = "";
			$Dosen = "";
			$PNS = "";
			$swasta = "";
			$lainnya = "";
			
		} 
		if ($t == 'Polri') 
		{
			$buruh =  "";    
			$tani = "";
			$pedagang = "";
			$TNI = "";
			$Polri = " selected"; 
			$Guru = "";
			$Dosen = "";
			$PNS = "";
			$swasta = "";
			$lainnya = "";
			
		} 
		if ($t == 'Guru') 
		{
			$buruh =  "";   
			$tani = "";
			$pedagang = "";
			$TNI = "";
			$Polri = "";
			$Guru = " selected"; 
			$Dosen = "";
			$PNS = "";
			$swasta = "";
			$lainnya = "";
			
		} 
		if ($t == 'Dosen') 
		{
			$buruh =  "";  
			$tani = "";
			$pedagang = "";
			$TNI = "";
			$Polri = "";
			$Guru = "";
			$Dosen = " selected"; 
			$PNS = "";
			$swasta = "";
			$lainnya = "";
			
		} 
		if ($t == 'PNS') 
		{
			$buruh =  "";
			$tani = "";
			$pedagang = "";
			$TNI = "";
			$Polri = "";
			$Guru = "";
			$Dosen = "";
			$PNS = " selected"; 
			$swasta = "";
			$lainnya = "";
			
		} 
		if ($t == 'swasta') 
		{
			$buruh =  "";   
			$tani = "";
			$pedagang = "";
			$TNI = "";
			$Polri = "";
			$Guru = "";
			$Dosen = "";
			$PNS = "";
			$swasta = " selected"; 
			$lainnya = "";
			
		} 
		if ($t == 'lainnya') 
		{
			$buruh =  "";
			$tani = "";
			$pedagang = "";
			$TNI = "";
			$Polri = "";
			$Guru = "";
			$Dosen = "";
			$PNS = "";
			$swasta = "";
			$lainnya = " selected"; 
			
		} 
	
		//ibu
		$p = $data_ibu['pendidikan'];
		$sd = "";
		$smp = "";
		$sma = "";
		$s1 = ""; 
		$s2 = "";
		$s3 = "";

	if ($p == 'SD') 
		{
			$sd = " selected"; 
			$smp = "";
			$sma = "";
			$s1 = ""; 
			$s2 = "";
			$s3 = "";
		} 
		else if ($p == 'SMP') 
		{
			$sd = "";
			$smp =" selected"; 
			$sma = "";
			$s1 = ""; 
			$s2 = "";
			$s3 = "";
		}
		else if ($p == 'SMA') 
		{
			$sd = "";
			$smp = "";
			$sma = " selected"; 
			$s1 = ""; 
			$s2 = "";
			$s3 = "";
		}
		else if ($p == 'S1') 
		{
			$sd = "";
			$smp = "";
			$sma = "";
			$s1 = " selected"; 
			$s2 = "";
			$s3 = "";
		}
		else if ($p == 'S2') 
		{
			$sd = "";
			$smp = "";
			$sma = "";
			$s1 = ""; 
			$s2 = " selected"; 
			$s3 = "";
		}
		else if ($p == 'S3') 
		{
			$sd = "";
			$smp = "";
			$sma = "";
			$s1 = ""; 
			$s2 = "";
			$s3 = " selected"; 
		}
		
		
	$pekerjaan = $data_ibu['pekerjaan'];
		$buruh1 = "";       
		$tani1 = "";
		$pedagang1 = "";
		$TNI1 = "";
		$Polri1 = "";
		$Guru1 = "";
		$Dosen1 = "";
		$PNS1 = "";
		$swasta1 = "";
		$lainnya1 = "";
	
	if ($pekerjaan == 'buruh') 
		{
			$buruh1 = " selected";   
			$tani1 = "";
			$pedagang1 = "";
			$TNI1 = "";
			$Polri1 = "";
			$Guru1 = "";
			$Dosen1 = "";
			$PNS1 = "";
			$swasta1 = "";
			$lainnya1 = "";
			
		} 
	if ($pekerjaan == 'tani') 
		{
			$buruh1 = "";       
			$tani1 = " selected"; 
			$pedagang1 = "";
			$TNI1 = "";
			$Polri1 = "";
			$Guru1 = "";
			$Dosen1 = "";
			$PNS1 = "";
			$swasta1 = "";
			$lainnya1 = "";
			
		} 
		if ($pekerjaan == 'pedagang') 
		{
			$buruh1 = "";       
			$tani1 = "";
			$pedagang1 = " selected"; 
			$TNI1 = "";
			$Polri1 = "";
			$Guru1 = "";
			$Dosen1 = "";
			$PNS1 = "";
			$swasta1 = "";
			$lainnya1 = "";
			
		} 
		if ($pekerjaan == 'TNI') 
		{
			$buruh1 = "";       
			$tani1 = "";
			$pedagang1 = "";
			$TNI1 = " selected"; 
			$Polri1 = "";
			$Guru1 = "";
			$Dosen1 = "";
			$PNS1 = "";
			$swasta1 = "";
			$lainnya1 = "";
			
		} 
		if ($pekerjaan == 'Polri') 
		{
			$buruh1 = "";       
			$tani1 = "";
			$pedagang1 = "";
			$TNI1 = "";
			$Polri1 = " selected"; 
			$Guru1 = "";
			$Dosen1 = "";
			$PNS1 = "";
			$swasta1 = "";
			$lainnya1 = "";
			
		} 
		if ($pekerjaan == 'Guru') 
		{
			$buruh1 = "";       
			$tani1 = "";
			$pedagang1 = "";
			$TNI1 = "";
			$Polri1 = "";
			$Guru1 = " selected"; 
			$Dosen1 = "";
			$PNS1 = "";
			$swasta1 = "";
			$lainnya1 = "";
			
		} 
		if ($pekerjaan == 'Dosen') 
		{
			$buruh1 = "";       
			$tani1 = "";
			$pedagang1 = "";
			$TNI1 = "";
			$Polri1 = "";
			$Guru1 = "";
			$Dosen1 = " selected"; 
			$PNS1 = "";
			$swasta1 = "";
			$lainnya1 = "";
			
		} 
		if ($pekerjaan == 'PNS') 
		{
			$buruh1 = "";       
			$tani1 = "";
			$pedagang1 = "";
			$TNI1 = "";
			$Polri1 = "";
			$Guru1 = "";
			$Dosen1 = "";
			$PNS1 = " selected"; 
			$swasta1 = "";
			$lainnya1 = "";
			
		} 
		if ($pekerjaan == 'swasta') 
		{
			$buruh1 = "";       
			$tani1 = "";
			$pedagang1 = "";
			$TNI1 = "";
			$Polri1 = "";
			$Guru1 = "";
			$Dosen1 = "";
			$PNS1 = "";
			$swasta1 = " selected"; 
			$lainnya1 = "";
			
		} 
		if ($pekerjaan == 'lainnya') 
		{
			$buruh1 = "";       
			$tani1 = "";
			$pedagang1 = "";
			$TNI1 = "";
			$Polri1 = "";
			$Guru1 = "";
			$Dosen1 = "";
			$PNS1 = "";
			$swasta1 = "";
			$lainnya1 = " selected"; 
			
		} 
			
?>


<div class="konten">
<!-- start: Form Edit Data Orang Tua -->
	<h1>Form Edit Data Orang Tua Mahasiswa</h1>
	<p>Silakan lengkapi data Orang Tua anda.:</p>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="myform">
	<?php echo form_open('user_controller/edit_data_orangtua'); ?>
	<!-- start: Data Ayah -->
	<tr>
		<td><label for="nama_ayah">Nama Ayah</label>
	    <input name="nama_ayah" type="text" placeholder="Bagian ini wajib anda isi." value="<?php echo $data_ayah['nama_ayah']; ?>"  size="70" autofocus>
		<?php echo form_error('nama_ayah'); ?>
		</td>
    </tr>
	<tr>
	    <td><label for="tempat_lahir">Tempat Lahir</label>
	    <input name="tempat_lahir" type="text"   placeholder="Bagian ini wajib anda isi."   value="<?php echo $data_ayah['tempat_lahir']; ?>" size="70">
		<?php echo form_error('tempat_lahir'); ?>
		</td>
	    <td><label for="tanggal_lahir">Tanggal Lahir <em>(format: YYYY-MM-DD)</em></label>
		<input type="text" name="tanggal_lahir"     value="<?php echo $data_ayah['tanggal_lahir']; ?>" placeholder="Wajib diisi... Contoh penulisan: 1992-02-29">
		<?php echo form_error('tanggal_lahir'); ?>
      </td>
	</tr>
	<tr>
	    <td><label for="pendidikan">Pendidikan Terakhir</label>
			<select name="pendidikan" value="<?php echo set_value('pendidikan'); ?>">
				<option>-Pilih Pendidikan- </option>
				<option value="SD"  <?php echo "$SD"; ?>>SD</option>
				<option value="SMP"  <?php echo "$SMP"; ?> >SMP</option>
				<option value="SMA"  <?php echo "$SMA"; ?> >SMA</option>
				<option  value="S1"  <?php echo "$S1"; ?>>S1</option>
				<option value="S2"  <?php echo "$S2"; ?>>S2</option>
				<option value="S3"  <?php echo "$S3"; ?>>S3</option>
			</select>
		<?php echo form_error('pendidikan'); ?>
		</td>
	    <td><label for="pekerjaan">Pekerjaan</label>
			<select name="pekerjaan" value="<?php echo set_value('pekerjaan'); ?>">
				<option>-Pilih Pekerjaan- </option>
				<option value="buruh"  <?php echo "$buruh"; ?>>Buruh</option>
				<option value="tani"  <?php echo "$tani"; ?> >Tani</option>
				<option value="pedagang"  <?php echo "$pedagang"; ?> >Pedagang</option>
				<option  value="TNI"  <?php echo "$TNI"; ?>>TNI</option>
				<option value="Polri"  <?php echo "$Polri"; ?>>Polri</option>
				<option value="Guru"  <?php echo "$Guru"; ?>>Guru</option>
				<option value="Dosen"  <?php echo "$Dosen"; ?>>Dosen</option>
				<option value="PNS"  <?php echo "$PNS"; ?>>PNS</option>
				<option value="swasta"  <?php echo "$swasta"; ?>>swasta</option>
				<option value="lainnya"  <?php echo "$lainnya"; ?>>Lainnya</option>
			</select>
		<?php echo form_error('pekerjaan'); ?>
		</td>
    </tr>
	<tr>
	    <td><label for="penghasilan_per_bulan">Penghasilan Per Bulan</label>
	    <input name="penghasilan_per_bulan" type="text"       value="<?php echo $data_ayah['penghasilan_per_bulan']; ?>" size="70">
		<?php echo form_error('penghasilan_per_bulan'); ?>
		</td>
	</tr>
	<tr>
		<td><label for="alamat_rumah">Alamat Rumah</label>
		<input name="alamat_rumah" type="text"   placeholder="Bagian ini wajib anda isi."   value="<?php echo $data_ayah['alamat_rumah']; ?>" size="70">
		<?php echo form_error('alamat_rumah'); ?>
		</td>
    </tr>
	<tr>
	   <td><label for="alamat_desa">Desa</label>
	   <input name="alamat_desa" type="text"  placeholder="Bagian ini wajib anda isi."    value="<?php echo $data_ayah['alamat_desa']; ?>" size="70">
		<?php echo form_error('alamat_desa'); ?>
		</td>
	    <td><label for="alamat_kelurahan">Kelurahan</label>
		<input name="alamat_kelurahan" type="text"   placeholder="Bagian ini wajib anda isi."   value="<?php echo $data_ayah['alamat_kelurahan']; ?>" size="70">
		<?php echo form_error('alamat_kelurahan'); ?>
		</td>
	</tr>
    </p>
	<tr>
		<td><label for="alamat_kecamatan">Kecamatan</label>
		<input name="alamat_kecamatan" type="text"   placeholder="Bagian ini wajib anda isi."   value="<?php echo $data_ayah['alamat_kecamatan']; ?>" size="70">
		<?php echo form_error('alamat_kecamatan'); ?>
		</td>
    </tr>
	<tr>
		<td><label for="alamat_kabupaten">Kota / Kabupaten</label>
		<input name="alamat_kabupaten" type="text"  placeholder="Bagian ini wajib anda isi."    value="<?php echo $data_ayah['alamat_kabupaten']; ?>" size="70">
		<?php echo form_error('alamat_kabupaten'); ?>
		</td>
	    <td><label for="kode_pos">Kode Pos</label>
		<input name="kode_pos" type="text"      value="<?php echo $data_ayah['kode_pos']; ?>" size="40">
		<?php echo form_error('kode_pos'); ?>
		</td>
	</tr>
	<tr>
		<td><label for="telepon_rumah">Telepon Rumah</label>
		<input name="telepon_rumah" type="text"      value="<?php echo $data_ayah['telepon_rumah']; ?>" size="70">
		<?php echo form_error('telepon_rumah'); ?>
		</td>
	    <td><label for="telepon_genggam">HP</label>
		<input name="telepon_genggam" type="text"      value="<?php echo $data_ayah['telepon_genggam']; ?>" size="40">
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
	    <input name="nama_ibu" type="text"  placeholder="Bagian ini wajib anda isi."   value="<?php echo $data_ibu['nama_ibu']; ?>"  size="70" autofocus>
		<?php echo form_error('nama_ibu'); ?>
		</td>
    </tr>
	<tr>
	    <td><label for="tempat_lahir2">Tempat Lahir</label>
	    <input name="tempat_lahir2" type="text"   placeholder="Bagian ini wajib anda isi."   value="<?php echo $data_ibu['tempat_lahir']; ?>" size="70">
		<?php echo form_error('tempat_lahir2'); ?>
		</td>
	    <td><label for="tanggal_lahir">Tanggal Lahir <em>(format: YYYY-MM-DD)</em></label>
		<input type="text" name="tanggal_lahir2"   placeholder="Bagian ini wajib anda isi."  value="<?php echo $data_ibu['tanggal_lahir']; ?>">
		<?php echo form_error('tanggal_lahir2'); ?>
      </td>
	</tr>
	<tr>
	    <td><label for="pendidikan2">Pendidikan Terakhir</label>
			<select name="pendidikan2" value="<?php echo set_value('pendidikan2'); ?>">
				<option>-Pilih Pendidikan- </option>
				<option value="SD"  <?php echo "$sd"; ?>>SD</option>
				<option value="SMP"  <?php echo "$smp"; ?> >SMP</option>
				<option value="SMA"  <?php echo "$sma"; ?> >SMA</option>
				<option  value="S1"  <?php echo "$s1"; ?>>S1</option>
				<option value="S2"  <?php echo "$s2"; ?>>S2</option>
				<option value="S3"  <?php echo "$s3"; ?>>S3</option>
			</select>
		<?php echo form_error('pendidikan2'); ?>
		</td>
	    <td><label for="pekerjaan2">Pekerjaan</label>
			<select name="pekerjaan2" value="<?php echo set_value('pekerjaan2'); ?>">
				<option>-Pilih Pekerjaan- </option>
				<option value="buruh"  <?php echo "$buruh1"; ?>>Buruh</option>
				<option value="tani"  <?php echo "$tani1"; ?> >Tani</option>
				<option value="pedagang"  <?php echo "$pedagang1"; ?> >Pedagang</option>
				<option  value="TNI"  <?php echo "$TNI1"; ?>>TNI</option>
				<option value="Polri"  <?php echo "$Polri1"; ?>>Polri</option>
				<option value="Guru"  <?php echo "$Guru1"; ?>>Guru</option>
				<option value="Dosen"  <?php echo "$Dosen1"; ?>>Dosen</option>
				<option value="PNS"  <?php echo "$PNS1"; ?>>PNS</option>
				<option value="swasta"  <?php echo "$swasta1"; ?>>swasta</option>
				<option value="lainnya"  <?php echo "$lainnya1"; ?>>Lainnya</option>
			</select>
		<?php echo form_error('pekerjaan2'); ?>
		</td>
    </tr>
	<tr>
	    <td><label for="penghasilan_per_bulan2">Penghasilan Per Bulan</label>
	    <input name="penghasilan_per_bulan2" type="text"       value="<?php echo $data_ibu['penghasilan_per_bulan']; ?>" size="70">
		<?php echo form_error('penghasilan_per_bulan2'); ?>
		</td>
	</tr>
	<tr>
		<td><label for="alamat_rumah2">Alamat Rumah</label>
		<input name="alamat_rumah2" type="text"  placeholder="Bagian ini wajib anda isi."    value="<?php echo $data_ibu['alamat_rumah']; ?>" size="70">
		<?php echo form_error('alamat_rumah2'); ?>
		</td>
    </tr>
	<tr>
	   <td><label for="alamat_desa2">Desa</label>
	   <input name="alamat_desa2" type="text"   placeholder="Bagian ini wajib anda isi."   value="<?php echo $data_ibu['alamat_desa']; ?>" size="70">
		<?php echo form_error('alamat_desa2'); ?>
		</td>
	    <td><label for="alamat_kelurahan2">Kelurahan</label>
		<input name="alamat_kelurahan2" type="text"   placeholder="Bagian ini wajib anda isi."   value="<?php echo $data_ibu['alamat_kelurahan']; ?>" size="70">
		<?php echo form_error('alamat_kelurahan2'); ?>
		</td>
	</tr>
    </p>
	<tr>
		<td><label for="alamat_kecamatan2">Kecamatan</label>
		<input name="alamat_kecamatan2" type="text"   placeholder="Bagian ini wajib anda isi."   value="<?php echo $data_ibu['alamat_kecamatan']; ?>" size="70">
		<?php echo form_error('alamat_kecamatan2'); ?>
		</td>
    </tr>
	<tr>
		<td><label for="alamat_kabupaten2">Kota / Kabupaten</label>
		<input name="alamat_kabupaten2" type="text"  placeholder="Bagian ini wajib anda isi."    value="<?php echo $data_ibu['alamat_kabupaten']; ?>" size="70">
		<?php echo form_error('alamat_kabupaten2'); ?>
		</td>
	    <td><label for="kode_pos2">Kode Pos</label>
		<input name="kode_pos2" type="text"      value="<?php echo $data_ibu['kode_pos']; ?>" size="40">
		<?php echo form_error('kode_pos2'); ?>
		</td>
	</tr>
	<tr>
		<td><label for="telepon_rumah2">Telepon Rumah</label>
		<input name="telepon_rumah2" type="text"      value="<?php echo $data_ibu['telepon_rumah']; ?>" size="70">
		<?php echo form_error('telepon_rumah2'); ?>
		</td>
	    <td><label for="telepon_genggam2">HP</label>
		<input name="telepon_genggam2" type="text"      value="<?php echo $data_ibu['telepon_genggam']; ?>" size="40">
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
			<input type="submit" name="submit" id="submit" value="Edit">
			<a href="javascript: history.back();" class="tambah">Kembali </a>
		</td>
	  </tr>
	  <?php echo form_close(); ?>
  </table>
  <!-- end: Form Orang Tua -->
	<p>&nbsp;</p>
</div>