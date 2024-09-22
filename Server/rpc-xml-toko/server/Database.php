<?php
error_reporting(1);

class Database
{
  private $host = "192.168.56.2";
  private $dbname = "toko";
  private $user = "root";
  private $password = "";
  private $port = "3306";
  private $conn;

  // function that gets loaded when the class is instantiated
  public function __construct() // Change to __construct
  {
    try {
      // connect to the database
      $this->conn = new PDO("mysql:host=$this->host;port=$this->port;dbname=$this->dbname;charset=utf8", $this->user, $this->password);
    } catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
  }

  public function tampil_data($id_barang)
  {
    $query = $this->conn->prepare("SELECT id_barang, nama_barang FROM barang WHERE id_barang=?");
    $query->execute(array($id_barang));
    // fetch single data
    $data = $query->fetch(PDO::FETCH_ASSOC);
    return $data;
    $query->closeCursor();
    unset($id_barang, $data);
  }

  public function tampil_semua_data()
  {
    $query = $this->conn->prepare("SELECT id_barang, nama_barang FROM barang ORDER BY id_barang");
    $query->execute();
    // fetch all data
    $data = $query->fetchAll(PDO::FETCH_ASSOC);
    return $data;
    $query->closeCursor();
    unset($data);
  }

  public function tambah_data($data)
  {
    $query = $this->conn->prepare("INSERT IGNORE INTO barang (id_barang, nama_barang) VALUES (?,?)");
    $query->execute(array($data['id_barang'], $data['nama_barang']));
    $query->closeCursor();
    unset($data);
  }

  public function ubah_data($data)
  {
    $query = $this->conn->prepare("UPDATE barang SET nama_barang=? WHERE id_barang=?");
    $query->execute(array($data['nama_barang'], $data['id_barang']));
    $query->closeCursor();
    unset($data);
  }

  public function hapus_data($id_barang)
  {
    $query = $this->conn->prepare("DELETE FROM barang WHERE id_barang=?");
    $query->execute(array($id_barang));
    $query->closeCursor();
    unset($id_barang);
  }
}
