<div class="konten">
	<!-- start: Data Mahasiswa -->
	<h1>Data Mahasiswa</h1>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="myform">
		<tr>
			<td>
				<?php if ($data_foto == null) : ?>
					<img src="<?php echo base_url('assets/scan/default/mahasiswa.jpg'); ?>" width="160" height="160">
				<?php else : ?>
					<img src="<?php echo base_url('assets/scan/' . $data_foto['scan_foto']); ?>" width="160" height="160">
				<?php endif; ?>
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
			<td><?php echo ($data_mahasiswa['jenis_kelamin'] == 'L') ? 'Laki-Laki' : 'Perempuan'; ?></td>
			<td>&nbsp;</td>
			<td><label for="agama">Agama</label></td>
			<td><?php echo $data_mahasiswa['agama']; ?></td>
		</tr>
		<tr>
			<td><label for="nomor_ktp">Nomor KTP</label></td>
			<td><?php echo $data_mahasiswa['nomor_ktp']; ?></td>
		</tr>
		<tr>
			<td><label for="alamat_rumah">Alamat Rumah</label></td>
			<td><?php echo $data_mahasiswa['alamat_rumah']; ?></td>
		</tr>
		<tr>
			<td><label for="alamat_desa">Desa</label></td>
			<td><?php echo $data_mahasiswa['alamat_desa']; ?></td>
			<td>&nbsp;</td>
			<td><label for="alamat_kelurahan">Kelurahan</label></td>
			<td><?php echo $data_mahasiswa['alamat_kelurahan']; ?></td>
		</tr>
		</p>
		<tr>
			<td><label for="alamat_kecamatan">Kecamatan</label></td>
			<td><?php echo $data_mahasiswa['alamat_kecamatan']; ?></td>
		</tr>
		<tr>
			<td><label for="alamat_kabupaten">Kota / Kabupaten</label></td>
			<td><?php echo $data_mahasiswa['alamat_kabupaten']; ?></td>
			<td>&nbsp;</td>
			<td><label for="kode_pos">Kode Pos</label></td>
			<td><?php echo $data_mahasiswa['kode_pos']; ?></td>
		</tr>
	</table>
	<a href="<?php echo site_url('home/pencarian'); ?>" class="tambah">Kembali </a>
	<!-- end: Data Mahasiswa -->
</div>