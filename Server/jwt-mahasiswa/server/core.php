<?php
date_default_timezone_set('Asia/Jakarta');
 
// Buat RSA Key 1024 bit atau 2048 bit di Linux/FreeBSD 
// $ openssl genrsa 1024
// $ openssl genrsa 2048
$key = '';

$issued_at = time();
$expiration_time = $issued_at+(60*60); // valid selama 1 jam
$issuer = "RestApiAuthJWT";
?>