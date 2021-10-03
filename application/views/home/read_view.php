<div class="konten">
    <div class="posting">
        <h3><?php echo $berita['judul'] ?></h3>
        <div class="ringkasan"><?php echo $berita['isi'] ?></div>

    </div>
    <div class="anggota">
        <h3>Berita terbaru</h3>

        <ul>
            <?php foreach ($berita_terbaru as $list) : ?>
                <li>
                    <a href="<?php echo site_url('home/read/' . $list['slug']); ?>"><?php echo $list['judul']; ?></a>
                </li>
            <?php endforeach; ?>
        </ul>

    </div>
</div>