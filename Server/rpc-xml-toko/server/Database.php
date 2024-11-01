<?php
error_reporting(E_ALL);
require_once "../../load_env.php";

class Database
{
  private $host;
  private $user;
  private $password;
  private $port;
  private $conn;

  private $dbname = "toko";

  // function that gets loaded when the class is instantiated
  public function __construct() // Change to __construct
  {
    $this->host = $_ENV['HOST'] ?? "localhost";
		$this->user = $_ENV['USER'] ?? "root";
		$this->password = $_ENV['PASS'] ?? "";
		$this->port = $_ENV['PORT'] ?? "3306";

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
