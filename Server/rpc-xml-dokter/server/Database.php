<?php
error_reporting(1);

class Database
{
  private $host = "192.168.194.242";
  private $dbname = "uts";
  private $user = "root";
  private $password = "QuadgramDB21";
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

  public function tampil_data($id_dokter)
  {
    $query = $this->conn->prepare("SELECT id_dokter, nama_dokter, telepon, email, alamat, jenis_kelamin FROM dokter WHERE id_dokter=?");
    $query->execute(array($id_dokter));
    // fetch single data
    $data = $query->fetch(PDO::FETCH_ASSOC);
    return $data;
    $query->closeCursor();
    unset($id_dokter, $data);
  }

  public function tampil_semua_data()
  {
    $query = $this->conn->prepare("SELECT id_dokter, nama_dokter, telepon, email, alamat, jenis_kelamin FROM dokter ORDER BY id_dokter");
    $query->execute();
    // fetch all data
    $data = $query->fetchAll(PDO::FETCH_ASSOC);
    return $data;
    $query->closeCursor();
    unset($data);
  }

  public function tambah_data($data)
  {
    $query = $this->conn->prepare("INSERT IGNORE INTO dokter (id_dokter, nama_dokter, telepon, email, alamat, jenis_kelamin) VALUES (?,?,?,?,?,?)");
    $query->execute(array($data['id_dokter'], $data['nama_dokter'], $data['telepon'], $data['email'], $data['alamat'], $data['jenis_kelamin']));
    $query->closeCursor();
    unset($data);
  }

  public function ubah_data($data)
  {
    $query = $this->conn->prepare("UPDATE dokter SET nama_dokter=?, telepon=?, email=?, alamat=?, jenis_kelamin=? WHERE id_dokter=?");
    $query->execute(array($data['nama_dokter'], $data['telepon'], $data['email'], $data['alamat'], $data['jenis_kelamin'], $data['id_dokter']));
    $query->closeCursor();
    unset($data);
  }

  public function hapus_data($id_dokter)
  {
    $query = $this->conn->prepare("DELETE FROM dokter WHERE id_dokter=?");
    $query->execute(array($id_dokter));
    $query->closeCursor();
    unset($id_dokter);
  }
}
