<?php
  error_reporting(1);
  include "RPCClient.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>RPC Client</title>
</head>
<body>
  <a href="?page=home">Home</a> | <a href="?page=tambah">Tambah Data</a> | <a href="?page=daftar-data">Data Server</a>
  <br /><br />

  <fieldset>
    <? if ($_GET['page'] == 'tambah') { ?>
    <legend>Tambah Data</legend>
    <form action="proses.php" method="POST" name="form">
      <input type="hidden" name="aksi" value="tambah" />
      <label>ID Dokter</label>
      <input type="text" name="id_dokter" />
      <br />
      <label>Nama Dokter</label>
      <input type="text" name="nama_dokter" />
      <br />
      <label>Nomor Telepon</label>
      <input type="text" name="telepon" />
      <br />
      <label>Email</label>
      <input type="text" name="email" />
      <br />
      <label>Alamat</label>
      <input type="text" name="alamat" />
      <br />
      <label>Jenis Kelamin</label>
      <select name="jenis_kelamin">
        <option value="Laki-Laki">Laki-Laki</option>
        <option value="Perempuan">Perempuan</option>
      </select>
      <br />
      <button type="submit" name="simpan">Simpan</button>
    </form>

    <? } else if ($_GET['page'] == 'ubah') { 
      $r = $abc -> tampil_data($_GET['id_dokter']);
    ?>
    <legend>Ubah Data</legend>
    <form action="proses.php" method="POST" name="form">
      <input type="hidden" name="aksi" value="ubah" />
      <input type="hidden" name="id_dokter" value="<?= $r['id_dokter'] ?>">
      <label>ID Dokter</label>
      <input type="text" value="<?= $r['id_dokter']; ?>">
      <br />
      <label>Nama Dokter</label>
      <input type="text" name="nama_dokter" value="<?= $r['nama_dokter']; ?>">
      <br />
      <label>Nomor Telepon</label>
      <input type="text" name="telepon" value="<?= $r['telepon']; ?>">
      <br />
      <label>Email</label>
      <input type="text" name="email" value="<?= $r['email']; ?>">
      <br />
      <label>Alamat</label>
      <input type="text" name="alamat" value="<?= $r['alamat']; ?>">
      <br />
      <label>Jenis Kelamin</label>
      <select name="jenis_kelamin">
        <option value="<?= $r['jenis_kelamin'] ?>"><?= $r['jenis_kelamin'] ?></option>
        <option value="Laki-Laki">Laki-Laki</option>
        <option value="Perempuan">Perempuan</option>
      </select>
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
        <th width="10%">ID Dokter</th>
        <th width="15%">Nama Dokter</th>
        <th width="15%">No. Telp</th>
        <th width="15%">Email</th>
        <th width="15%">Alamat</th>
        <th width="15%">Jenis Kelamin</th>
        <th width="10%" colspan="2">Aksi</th>
      </tr>
      <? 
        $no = 1;
        $data_array = $abc -> tampil_semua_data();
        foreach ($data_array as $r) {
      ?>
      <tr>
        <td><?= $no++; ?></td>
        <td><?= $r['id_dokter']; ?></td>
        <td><?= $r['nama_dokter']; ?></td>
        <td><?= $r['telepon']; ?></td>
        <td><?= $r['email']; ?></td>
        <td><?= $r['alamat']; ?></td>
        <td><?= $r['jenis_kelamin']; ?></td>
        <td><a href="?page=ubah&id_dokter=<?= $r['id_dokter'] ?>">Ubah</a></td>
        <td><a href="proses.php?aksi=hapus&id_dokter=<?= $r['id_dokter'] ?>" onclick="return confirm('Apakah Anda ingin menghapus data ini?')">Hapus</a></td>
      </tr>
      <? } unset($data_array, $r, $no); ?>
    </table>
    <? } else { ?>
    <legend>Home</legend>
    Aplikasi sederhana ini menggunakan RPC (Remote Procedure Call) dengan format data XML (Extensible Markup Language).
    <? } ?>
  </fieldset>
</body>
</html>