<?php
  error_reporting(1);
  include "Client.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>RESTful Client</title>
</head>
<body>
  <a href="?page=home">Home</a> | <a href="?page=tambah">Tambah Data</a> | <a href="?page=daftar-data">Data Server</a>
  <br /><br />

  <fieldset>
    <? if ($_GET['page'] == 'tambah') { ?>
    <legend>Tambah Data</legend>
    <form action="proses.php" method="POST" name="form">
      <input type="hidden" name="aksi" value="tambah" />
      <label>ID Barang</label>
      <input type="text" name="id_barang" />
      <br />
      <label>Nama Barang</label>
      <input type="text" name="nama_barang" />
      <br />
      <button type="submit" name="simpan">Simpan</button>
    </form>

    <? } else if ($_GET['page'] == 'ubah') { 
      $r = $abc -> tampil_data($_GET['id_barang']);
    ?>
    <legend>Ubah Data</legend>
    <form action="proses.php" method="POST" name="form">
      <input type="hidden" name="aksi" value="ubah" />
      <input type="hidden" name="id_barang" value="<?= $r->id_barang; ?>" />
      <label>ID Barang</label>
      <input type="text" value="<?= $r->id_barang; ?>" />
      <br />
      <label>Nama Barang</label>
      <input type="text" name="nama_barang" value="<?= $r->nama_barang; ?>" />
      <br />
      <button type="submit" name="ubah">Ubah</button>
    </form>
    <? 
    unset($r);
    } else if ($_GET['page'] == 'daftar-data') {
    ?>
    <legend>Daftar Data Server</legend>
    <table border="1">
      <tr>
        <th width="5%">No.</th>
        <th width="10%">ID Barang</th>
        <th width="75%">Nama</th>
        <th width="5%" colspan="2">Aksi</th>
      </tr>
      <? 
        $no = 1;
        $data_array = $abc -> tampil_semua_data();
        foreach ($data_array as $r) {
      ?>
      <tr>
        <td><?= $no++; ?></td>
        <td><?= $r->id_barang; ?></td>
        <td><?= $r->nama_barang; ?></td>
        <td><a href="?page=ubah&id_barang=<?= $r->id_barang; ?>">Ubah</a></td>
        <td><a href="proses.php?aksi=hapus&id_barang=<?= $r->id_barang; ?>" onclick="return confirm('Apakah Anda ingin menghapus data ini?')">Hapus</a></td>
      </tr>
      <? } unset($data_array, $r, $no); ?>
    </table>
    <? } else { ?>
    <legend>Home</legend>
    Aplikasi sederhana ini menggunakan RESTful dengan format data JSON (JavaScript Object Notation)
    <? } ?>
  </fieldset>
</body>
</html>