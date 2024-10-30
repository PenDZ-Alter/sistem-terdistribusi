<?php
error_reporting(1);
header('Content-Type: text/xml; charset=UTF-8');

include "Database.php";

// Database Object
$abc = new Database();

// Function for filter
function filter($data)
{
  $data = preg_replace('/[^a-zA-Z0-9]/','', $data);
  return $data;
  unset($data);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $postdata = file_get_contents("php://input");
  $data = xmlrpc_decode($postdata);

  $aksi = $data[0]['aksi'];
  $id_dokter = $data[0]['id_dokter'];
  $nama_dokter = $data[0]['nama_dokter'];
  $telepon = $data[0]['telepon'];
  $email = $data[0]['email'];
  $alamat = $data[0]['alamat'];
  $jenis_kelamin = $data[0]['jenis_kelamin'];

  if ($aksi == 'tambah') {
    $data2 = array(
      'id_dokter' => $id_dokter,
      'nama_dokter'=> $nama_dokter,
      'telepon'=> $telepon,
      'email'=> $email,
      'alamat'=> $alamat,
      'jenis_kelamin'=> $jenis_kelamin
    );
    $abc -> tambah_data($data2);
  } else if ($aksi == 'ubah') {
    $data2 = array(
      'id_dokter'=> $id_dokter,
      'nama_dokter'=> $nama_dokter,
      'telepon'=> $telepon,
      'email'=> $email,
      'alamat'=> $alamat,
      'jenis_kelamin'=> $jenis_kelamin
    );
    $abc -> ubah_data($data2);
  } else if ($aksi == 'hapus') {
    $abc -> hapus_data($id_dokter);
  }

  unset($postdata, $data, $data2, $id_dokter, $nama_dokter, $aksi);
} else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  if (($_GET['aksi'] == 'tampil') and (isset($_GET['id_dokter']))) {
    $id_dokter = filter($_GET['id_dokter']);
    $data = $abc -> tampil_data($id_dokter);
    $xml = xmlrpc_encode($data);
    echo $xml;
  } else {
    $data = $abc -> tampil_semua_data();
    $xml = xmlrpc_encode($data);
    echo $xml;
  }

  unset($xml, $query, $id_dokter, $data);
}