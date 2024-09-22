<?php
header("Content-Type:text/xml; charset=UTF-8");

// Request dari Client ke Server
if (
  ($_SERVER['REQUEST_METHOD'] == 'POST') AND 
  ($_GET['user'] == 'pengguna') AND
  ($_GET['password'] == 'pin')
) {
  $postdata = file_get_contents("php://input");
  $data = xmlrpc_decode($postdata);
} else {
  $data = array("nim"=>"19451244", "nama"=>"Anton", "kota"=>"Malang");
}

// Response dari Server ke Client
$response = xmlrpc_encode($data);
echo ($response);

?>