<?php
require '/opt/lampp/htdocs/vendor/autoload.php'; // adjust path as needed

// Load .env file from /www
$dotenv = Dotenv\Dotenv::createImmutable('/www');
$dotenv->load();