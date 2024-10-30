<?php
include "RPCClient.php";

if ($_POST['aksi'] == 'tambah') {
  $data = xmlrpc_encode_request('method', array(
    'aksi' => $_POST['aksi'],
    'id_dokter' => $_POST['id_dokter'],
    'nama_dokter' => $_POST['nama_dokter'],
    'telepon' => $_POST['telepon'],
    'email' => $_POST['email'],
    'alamat' => $_POST['alamat'],
    'jenis_kelamin' => $_POST['jenis_kelamin']
  ));

  $context = stream_context_create(array('http' => array(
    'method' => 'POST',
    'header' => 'Content-Type: text/xml; charset=UTF-8',
    'content' => $data
  )));

  $file = file_get_contents($url, false, $context);
  xmlrpc_decode($file);
  header('location: index.php?page=daftar-data');
  unset($data, $context, $url, $response);
} else if ($_POST['aksi'] == 'ubah') {
  $data = xmlrpc_encode_request('method', array(
    'aksi' => $_POST['aksi'],
    'id_dokter' => $_POST['id_dokter'],
    'nama_dokter' => $_POST['nama_dokter'],
    'telepon' => $_POST['telepon'],
    'email' => $_POST['email'],
    'alamat' => $_POST['alamat'],
    'jenis_kelamin' => $_POST['jenis_kelamin']
  ));

  $context = stream_context_create(array('http'=> array(
    'method' => 'POST',
    'header' => 'Content-Type: text/xml; charset=UTF-8',
    'content' => $data
  )));

  $file = file_get_contents($url, false, $context);
  xmlrpc_decode($file);
  header('location: index.php?page=daftar-data');
  unset($data, $context, $url, $response);
} else if ($_GET['aksi'] == 'hapus') {
  $data = xmlrpc_encode_request('method', array(
    'aksi' => $_GET['aksi'],
    'id_dokter' => $_GET['id_dokter']
  ));

  $context = stream_context_create(array('http'=> array(
    'method' => 'POST',
    'header' => 'Content-Type: text/xml; charset=UTF-8',
    'content' => $data
  )));

  $file = file_get_contents($url, false, $context);
  xmlrpc_decode($file);
  header('location: index.php?page=daftar-data');
  unset($data, $context, $url);
}