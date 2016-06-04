<div class="konten">
	<!-- Start: banner -->
    <div class="slider"><img src="<?php echo base_url(); ?>assets/images/banner.png"></div>
    <marquee>Selamat Datang di Pangkalan Data Pendidikan Tinggi Universitas Swasta Tangerang.
	</marquee>        
  </div>
	<!-- End: banner -->
	
	<!-- Start: Berita Terbaru -->
  <div class="clearfix"></div>
    <div class="konten">
      <div class="posting">
        <h3>Berita terbaru</h3>
        <?php foreach($berita as $list) { ?>
        <div class="ringkasan">
          <h3><a href="<?php echo base_url() ?>index.php/home/read/<?php echo $list['slug']; ?>"><?php echo $list['judul']; ?></a></h3>
		  <p>Written by: <?php echo $list['nama']; ?> | Posted on <?php echo $list['tanggal']; ?></p>
			<?php
				echo "<br>".strip_tags(substr($list['isi'],0,200))."<b>"." ........";
			?>
			<br><p align=right><a href="<?php echo base_url() ?>index.php/home/read/<?php echo $list['slug']; ?>" >&nbsp;Read more</a></b></p><br>
           <?php /* echo $list['ringkasan']; */ ?> 
        </div>
		<?php } 
			echo $this->pagination->create_links();
			echo "<br>";
		?> 
      </div>
	  <!-- End: Berita Terbaru -->
	  <div class="anggota">
          <h3>Informasi</h3>
		  <p>Silakan klik tombol login untuk masuk ke dalam sistem. Bagi yang belum terdaftar, silakan klik tombol Daftar untuk mendaftar.</p>
		  <p>
			<a href="<?php echo base_url(); ?>index.php/login" class="tambah">Login</a>
			<a href="<?php echo base_url(); ?>index.php/home/pendaftaran" class="tambah">Daftar</a> 
		  </p>
      </div>
	 
    </div>