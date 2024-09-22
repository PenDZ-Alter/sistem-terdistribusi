<?php
date_default_timezone_set('Asia/Jakarta');

// OpenSSL RSA Key 2048
$key = '';

$issued_at = time();
$expiration_time = $issued_at + (60 * 60);
$issuer = "RestApiAuthJWT";

?>