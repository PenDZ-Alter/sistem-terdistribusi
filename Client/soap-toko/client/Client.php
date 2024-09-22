<?php
error_reporting(1);

class Client
{
  private $options, $api;

  public function __construct($uri, $location)
  {
    $this->options = array('location' => $location, 'uri' => $uri);
    $this->api = new SoapClient(NULL, $this->options);

    // Remove variables from memory
    unset($uri, $location);
  }

  public function filter($data)
  {
    $data = preg_replace('/[^a-zA-Z0-9]/', '', $data);
    return $data;
    unset($data);
  }

  public function tampil_semua_data()
  {
    $data = $this->api->tampil_semua_data();
    return $data;
    unset($data);
  }

  public function tampil_data($id_barang)
  {
    $id_barang = $this->filter($id_barang);
    $data = $this->api->tampil_data($id_barang);
    return $data;
    unset($data, $id_barang);
  }

  public function tambah_data($data)
  {
    $data = $this->api->tambah_data($data);
    unset($data);
  }

  public function ubah_data($data)
  {
    $data = $this->api->ubah_data($data);
    unset($data);
  }

  public function hapus_data($id_barang)
  {
    $this->api->hapus_data($id_barang);
    unset($id_barang);
  }

  public function __destruct()
  {
    unset($this -> options, $this -> api);
  }
}

// URI and Location Server
$uri = 'http://192.168.56.2/';
$location = $uri . '/soap-toko/server/server.php';

// Create new object
$abc = new Client($uri, $location);
?>