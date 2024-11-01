<?php
require_once "../../load_env.php";

class database
{	private $host;	
	private $dbname="serviceserver";	
	private $conn;

	// koneksi ke database mysql
	private $driver="mysql";
	private $user;
	private $password;
	private $port;
	
	/*
	// koneksi ke database postgresql
	private $driver="pgsql";
	private $user;
	private $password;
	private $port="5432";
	*/
	
	// function yang pertama kali di-load saat class dipanggil
	public function __construct()
	{	
		$this->host = $_ENV['HOST'] ?? "localhost";
		$this->user = $_ENV['USER'] ?? "root";
		$this->password = $_ENV['PASS'] ?? "";
		$this->port = $_ENV['PORT'] ?? "3306";

		// koneksi database
		try
		{	if ($this->driver == 'mysql')
			{	$this->conn = new PDO("mysql:host=$this->host;port=$this->port;dbname=$this->dbname;charset=utf8",$this->user,$this->password);	
			} elseif ($this->driver == 'pgsql')
			{	$this->conn = new PDO("pgsql:host=$this->host;port=$this->port;dbname=$this->dbname;user=$this->user;password=$this->password");	
			}	
		} catch (PDOException $e)
		{	echo "Koneksi gagal";			
		}
	}	

	public function tampil_semua_data()
	{	$query = $this->conn->prepare("SELECT nim, nama, alamat, telepon FROM mahasiswa ORDER BY nim");
		$query->execute();	
		// mengambil banyak data dengan fetchAll
		$data = $query->fetchAll(PDO::FETCH_ASSOC);		
		// mengembalikan data	
		return $data;	
		// hapus variable dari memory	
		$query->closeCursor();
		unset($data);
		// atau dapat menggunakan
		// $query = null;		
		// $data = null;	
	}

	public function tampil_data($nim)
	{	$query = $this->conn->prepare("SELECT nim, nama, alamat, telepon FROM mahasiswa WHERE nim=?");
		$query->execute(array($nim));	
		// mengambil satu data dengan fetch	
		$data = $query->fetch(PDO::FETCH_ASSOC);
		return $data;
		$query->closeCursor();
		unset($nim,$data);
	}
	
	public function tambah_data($data)
	{	$query = $this->conn->prepare("INSERT IGNORE INTO mahasiswa (nim,nama,alamat,telepon) VALUES (?,?,?,?)");
		$query->execute(array($data['nim'],$data['nama'],$data['alamat'],$data['telepon']));	
		$query->closeCursor(); 
		unset($data);
	}

	public function ubah_data($data)
	{	$query = $this->conn->prepare("UPDATE mahasiswa SET nama=?,alamat=?,telepon=? WHERE nim=?");
		$query->execute(array($data['nama'],$data['alamat'],$data['telepon'],$data['nim']));	
		$query->closeCursor(); 
		unset($data);
	}

	public function hapus_data($nim)
	{	$query = $this->conn->prepare("DELETE FROM mahasiswa WHERE nim=?");
		$query->execute(array($nim));	
		$query->closeCursor(); 
		unset($nim);
	}
}
?>
