<?php
	
	//wali
	$pendidikan = $data_wali['pendidikan'];
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
		
		
	$t = $data_wali['pekerjaan'];
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
			

?>
		
	<div class="konten">
		<div align="right">
				<a href="<?php echo base_url(); ?>index.php/admin_controller/details/<?php echo $data_mahasiswa['npm']; ?>" class="tambah">Detail Mahasiswa</a>
				<a href="<?php echo base_url(); ?>index.php/admin_controller/orangtua_mahasiswa" class="tambah">Orang Tua</a>
				<a href="<?php echo base_url(); ?>index.php/admin_controller/wali_mahasiswa" class="tambah">Wali</a>
				<a href="<?php echo base_url(); ?>index.php/admin_controller/data_akademik" class="tambah">Data Akademik</a>
				<a href="<?php echo base_url(); ?>index.php/admin_controller/lampiran" class="tambah">Lampiran</a>
			</div>
	<!-- start: Form Edit Data Wali -->
		<h1>Form Edit Data Wali Mahasiswa</h1>
		<table width="100%" border="0" cellspacing="0" cellpadding="0" class="myform">
		<?php echo form_open('admin_controller/edit_wali'); ?>
		<!-- start: Data Wali -->
		<tr>
			<td><label for="nama_wali">Nama Wali</label>
			<input name="nama_wali" type="text"  value="<?php echo $data_wali['nama_wali']; ?>"  size="70" autofocus>
			<?php echo form_error('nama_ayah'); ?>
			</td>
		</tr>
		<tr>
			<td><label for="tempat_lahir">Tempat Lahir</label>
			<input name="tempat_lahir" type="text" value="<?php echo $data_wali['tempat_lahir']; ?>" size="70">
			<?php echo form_error('tempat_lahir'); ?>
			</td>
			 <td><label for="tanggal_lahir">Tanggal Lahir <em>(format: YYYY-MM-DD)</em></label>
			<input type="text" name="tanggal_lahir" placeholder="Contoh penulisan: 1992-02-29" value="<?php echo $data_wali['tanggal_lahir']; ?>" size="70">
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
			<input name="penghasilan_per_bulan" type="text" value="<?php echo $data_wali['penghasilan_per_bulan']; ?>" size="70">
			<?php echo form_error('penghasilan_per_bulan'); ?>
			</td>
		</tr>
		<tr>
			<td><label for="alamat_rumah">Alamat Rumah</label>
			<input name="alamat_rumah" type="text"  value="<?php echo $data_wali['alamat_rumah']; ?>" size="70">
			<?php echo form_error('alamat_rumah'); ?>
			</td>
		</tr>
		<tr>
		   <td><label for="alamat_desa">Desa</label>
		   <input name="alamat_desa" type="text" value="<?php echo $data_wali['alamat_desa']; ?>" size="70">
			<?php echo form_error('alamat_desa'); ?>
			</td>
			<td><label for="alamat_kelurahan">Kelurahan</label>
			<input name="alamat_kelurahan" type="text" value="<?php echo $data_wali['alamat_kelurahan']; ?>" size="70">
			<?php echo form_error('alamat_kelurahan'); ?>
			</td>
		</tr>
		</p>
		<tr>
			<td><label for="alamat_kecamatan">Kecamatan</label>
			<input name="alamat_kecamatan" type="text" value="<?php echo $data_wali['alamat_kecamatan']; ?>" size="70">
			<?php echo form_error('alamat_kecamatan'); ?>
			</td>
		</tr>
		<tr>
			<td><label for="alamat_kabupaten">Kota / Kabupaten</label>
			<input name="alamat_kabupaten" type="text" value="<?php echo $data_wali['alamat_kabupaten']; ?>" size="70">
			<?php echo form_error('alamat_kabupaten'); ?>
			</td>
			<td><label for="kode_pos">Kode Pos</label>
			<input name="kode_pos" type="text" value="<?php echo $data_wali['kode_pos']; ?>" size="70">
			<?php echo form_error('kode_pos'); ?>
			</td>
		</tr>
		<tr>
			<td><label for="telepon_rumah">Telepon Rumah</label>
			<input name="telepon_rumah" type="text" value="<?php echo $data_wali['telepon_rumah']; ?>" size="70">
			<?php echo form_error('telepon_rumah'); ?>
			</td>
			<td><label for="telepon_genggam">HP</label>
			<input name="telepon_genggam" type="text" value="<?php echo $data_wali['telepon_genggam']; ?>" size="70">
			<?php echo form_error('telepon_genggam'); ?>
			</td>
		</tr>
		<!-- end: Data Wali -->
		<tr>
			<td>
				&nbsp;
			</td>
		</tr>
		 <tr>
			<td>
				<input type="submit" name="submit" id="submit" value="Edit">
				<input type="reset" name="Reset" id="Reset" value="Reset">
				<a href="javascript: history.back();" class="tambah">Kembali </a>
			</td>
		  </tr>
		  <?php echo form_close(); ?>
	  </table>
	  <!-- end: Form Wali -->
		<p>&nbsp;</p>
	</div>