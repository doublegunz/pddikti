<div class="konten">
  <div align="right">
    <a href="<?php echo site_url('dokumen/create'); ?>" class="tambah">Unggah Dokumen Baru</a>
  </div>
  <!-- start: Data Dokumen -->
  <h1>Data Dokumen</h1>

  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="myform">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Dokumen</th>
    </tr>
    <?php foreach ($documents as $document) : ?>
      <tr>
        <td><?php echo $document['id']; ?></td>
        <td><?php echo $document['nama_dokumen']; ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
  <?php
  echo $this->pagination->create_links();
  echo "<br>";
  ?>
</div>
<!-- end: Data Dokumen -->