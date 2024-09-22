<?php
error_reporting(1);
header('Content-Type: text/xml; charset=UTF-8');

include "Database.php";
$abc = new DatabaseREST();

function filter($data)
{
  $data = preg_replace('/[^a-zA-Z0-9]/', '', $data);
  return $data;
  unset($data);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $postdata = file_get_contents('php://input');
  $data = simplexml_load_string($postdata);
  $aksi = $data->barang->aksi;
  $id_barang = $data->barang->id_barang;
  $nama_barang = $data->barang->nama_barang;

  if ($aksi == 'tambah') {
    $data2 = array(
      'id_barang' => $id_barang,
      'nama_barang'=> $nama_barang
    );

    $abc -> tambah_data($data2);
  } else if ($aksi == 'ubah') {
    $data2 = array(
      'id_barang' => $id_barang,
      'nama_barang'=> $nama_barang
    );

    $abc -> ubah_data($data2);
  } else if ($aksi == 'hapus') {
    $abc -> hapus_data($id_barang);
  }

  unset($postdata, $data, $data2, $aksi, $id_barang, $nama_barang, $abc);
} else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  if (($_GET['aksi'] == 'tampil') and (isset($_GET['id_barang']))) {
    $id_barang = filter($_GET['id_barang']);
    $data = $abc -> tampil_data($id_barang);
    $xml = '
      <toko>
        <barang>
          <id_barang>'.$data['id_barang'].'</id_barang>
          <nama_barang>'.$data['nama_barang'].'</nama_barang>
        </barang>
      </toko>
    ';
    echo $xml;
  } else {
    $data = $abc -> tampil_semua_data();
    $xml = '<toko>';
      foreach ($data as $a) {
        $xml .= "<barang>";
          foreach ($a as $kolom => $value) {
            $xml .= "<$kolom>$value</$kolom>";
            // atau menggunakan $value diganti menjadi <![CDATA[$value]]>
          }
        $xml .= "</barang>";
      }
    $xml .= '</toko>';
    echo $xml;
  }
  
  unset($id_barang, $data, $xml);
}

?>