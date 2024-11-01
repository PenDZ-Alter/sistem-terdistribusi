<?php
  require_once 'vendor/autoload.php';

  use Dotenv\Dotenv;

  // Load the .env file
  try {
    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load();
  } catch (Exception $e) {
    echo 'Could not load environment file: ',  $e->getMessage();
    exit;
  }
?>