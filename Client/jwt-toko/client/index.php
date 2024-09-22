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
  <?php if ($_COOKIE['jwt']) { ?>
    <a href="?page=home">Home</a> | <a href="?page=tambah">Tambah Data</a> | <a href="?page=daftar-data">Data Server</a>
    | <a href="proses.php?aksi=logout" onclick="return confirm('Apakah Anda ingin Logout?');">Logout</a>
    <br />
    <?php echo '<strong>'.$_COOKIE['nama'].' ('.$_COOKIE['id_pengguna'].')</strong>'; ?>
  <?php } else { ?>
    <a href="?page=home">Home</a> | <a href="?page=login">Login</a>
  <?php } ?>
  <br /><br />

  <fieldset>
    <? if ($_GET['page'] == 'login' and !isset($_COOKIE['jwt'])) { ?>
    <legend>Login</legend>
    <form action="proses.php" method="POST" name="form">
      <input type="hidden" name="aksi" value="login" />
      <label>ID Pengguna</label>
      <input type="text" name="id_pengguna" />
      <br />
      <label>PIN</label>
      <input type="text" name="pin" />
      <br />
      <button type="submit" name="login">Login</button>
    </form>
    <? } else if ($_GET['page'] == 'tambah' and isset($_COOKIE['jwt'])) { ?>
    <legend>Tambah Data</legend>
    <form action="proses.php" method="POST" name="form">
      <input type="hidden" name="aksi" value="tambah" />
      <input type="hidden" name="jwt" value="<?= $_COOKIE['jwt']; ?>">
      <label>ID Barang</label>
      <input type="text" name="id_barang" />
      <br />
      <label>Nama Barang</label>
      <input type="text" name="nama_barang" />
      <br />
      <button type="submit" name="simpan">Simpan</button>
    </form>

    <? } else if ($_GET['page'] == 'ubah' and isset($_COOKIE['jwt'])) { 
      $data = array(
        "jwt" => $_COOKIE['jwt'],
        "id_barang" => $_GET['id_barang']
      );
      $r = $abc -> tampil_data($data);
    ?>
    <legend>Ubah Data</legend>
    <form action="proses.php" method="POST" name="form">
      <input type="hidden" name="aksi" value="ubah" />
      <input type="hidden" name="id_barang" value="<?= $r->id_barang; ?>" />
      <input type="hidden" name="jwt" value="<?= $_COOKIE['jwt']; ?>">
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
    } else if ($_GET['page'] == 'daftar-data' and isset($_COOKIE['jwt'])) {
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
        $data_array = $abc -> tampil_semua_data($_COOKIE['jwt']);
        foreach ($data_array as $r) {
      ?>
      <tr>
        <td><?= $no++; ?></td>
        <td><?= $r->id_barang; ?></td>
        <td><?= $r->nama_barang; ?></td>
        <td><a href="?page=ubah&id_barang=<?= $r->id_barang; ?>&jwt=<?= $_COOKIE['jwt']; ?>">Ubah</a></td>
        <td><a href="proses.php?aksi=hapus&id_barang=<?= $r->id_barang; ?>&jwt=<?= $_COOKIE['jwt']; ?>" onclick="return confirm('Apakah Anda ingin menghapus data ini?')">Hapus</a></td>
      </tr>
      <? } unset($data_array, $r, $no); ?>
    </table>
    <? } else { ?>
    <legend>Home</legend>
    Aplikasi sederhana ini menggunakan RESTful dengan format data JSON (JavaScript Object Notation) dan JWT (JSON Web Token)
    <? } ?>
  </fieldset>
</body>
</html>