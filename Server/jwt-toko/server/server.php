<?php
error_reporting(1);

include_once 'core.php';
include_once '../lib/php-jwt/src/BeforeValidException.php';
include_once '../lib/php-jwt/src/ExpiredException.php';
include_once '../lib/php-jwt/src/SignatureInvalidException.php';
include_once '../lib/php-jwt/src/JWT.php';
use \Firebase\JWT\JWT;

include_once "Database.php";
$abc = new DatabaseJWT();

if (isset($_SERVER['HTTP_ORIGIN'])) {
  header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
  header("Access-Control-Allow-Credentials: true");
  header("Access-Control-Max-Age: 86400");
}

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
  if (isset($_SERVER['HTTP_ACCESSS_CONTROL_REQUEST_METHOD']))
    header("Access-Control-Methods: GET, POST, OPTIONS");
  if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
    header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
  exit(0);
}

$postdata = file_get_contents('php://input');
$data = json_decode($postdata);

function filter($data)
{
  $data = preg_replace('/[^a-zA-Z0-9]/', '', $data);
  return $data;
  unset($data);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($data->id_pengguna) and isset($data->pin)) {
  $data2['id_pengguna'] = $data->id_pengguna;
  $data2['pin'] = $data->pin;

  // Cek login pengguna
  $data_login = $abc -> login($data2);
  if ($data_login) {
    // Generate JSON Web Token (JWT)
    $token = array(
      'iat' => $issued_at,
      'exp' => $expiration_time,
      'iss' => $issuer,
      'data' => array(
        'id_pengguna' => $data_login['id_pengguna'],
        'pin' => $data_login['pin']
      )
    );

    // Set response code
    http_response_code(200);
    // Generate JWT
    $jwt = JWT::encode($token, $key);
    echo json_encode(
      array(
        'message' => "Login Sukses!",
        'id_pengguna' => $data_login['id_pengguna'],
        'nama' => $data_login['nama'],
        'jwt' => $jwt
      )
    );
  } else {
    http_response_code(401);
    echo json_encode(array('message' => "Login Gagal!"));
  }
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $jwt = $data -> jwt;
  $aksi = $data -> aksi;
  $id_barang = $data -> id_barang;
  $nama_barang = $data -> nama_barang;

  try {
    // Decode JWT
    $decoded = JWT::decode($jwt, $key, array('HS256'));

    if ($aksi == 'tambah') {
      $data_item = array(
        'aksi' => $aksi,
        'id_barang' => $id_barang,
        'nama_barang' => $nama_barang
      );
  
      $abc -> tambah_data($data_item);
    } else if ($aksi == 'ubah') {
      $data_item = array(
        'aksi' => $aksi,
        'id_barang' => $id_barang,
        'nama_barang' => $nama_barang
      );
  
      $abc -> ubah_data($data_item);
    } else if ($aksi == 'hapus') {
      $data_item = array(
        'aksi' => $aksi,
        'id_barang' => $id_barang
      );

      $abc -> hapus_data($id_barang);
    }

    // Set response code
    http_response_code(200);
    echo json_encode($data_item);
  } catch (Exception $err) {
    http_response_code(401);
    echo json_encode(array(
      'message' => "Access Denied!"
    ));
  }
} else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $jwt = $_GET['jwt'];
  try {
    // Decode JWT
    $decoded = JWT::decode($jwt, $key, array('HS256'));

    if (($_GET['aksi'] == 'tampil') and (isset($_GET['id_barang']))) {
      $id_barang = filter($_GET['id_barang']);
      $data = $abc -> tampil_data($id_barang);
    } else {
      $data = $abc -> tampil_semua_data();
    }

    // Set response code
    http_response_code(200);
    echo json_encode($data);
  } catch (Exception $err) {
    http_response_code(401);
    echo json_encode(array(
      'message' => "Access Denied!"
    ));
  }
  
  unset($abc, $postdata, $data2, $id_barang, $data, $token, $key, $issued_at, $expiration_time, $issuer, $jwt, $decoded, $aksi, $nama_barang, $err, $data_item, $data_login);
}

?>