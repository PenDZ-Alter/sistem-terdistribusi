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
  $id_barang = $data[0]['id_barang'];
  $nama_barang = $data[0]['nama_barang'];

  if ($aksi == 'tambah') {
    $data2 = array(
      'id_barang' => $id_barang,
      'nama_barang'=> $nama_barang
    );
    $abc -> tambah_data($data2);
  } else if ($aksi == 'ubah') {
    $data2 = array(
      'id_barang'=> $id_barang,
      'nama_barang'=> $nama_barang
    );
    $abc -> ubah_data($data2);
  } else if ($aksi == 'hapus') {
    $abc -> hapus_data($id_barang);
  }

  unset($postdata, $data, $data2, $id_barang, $nama_barang, $aksi);
} else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  if (($_GET['aksi'] == 'tampil') and (isset($_GET['id_barang']))) {
    $id_barang = filter($_GET['id_barang']);
    $data = $abc -> tampil_data($id_barang);
    $xml = xmlrpc_encode($data);
    echo $xml;
  } else {
    $data = $abc -> tampil_semua_data();
    $xml = xmlrpc_encode($data);
    echo $xml;
  }

  unset($xml, $query, $id_barang, $data);
}