# sistem-terdistribusi
Ini merupakan data data dari mata kuliah Sistem Terdistribusi & Keamanan UIN Malang

## NOTES!
Ada beberapa hal yang perlu di perhatikan!
1. Sesuaikan alamat IP, Password database, User Database, port, dll
2. Khusus pada bagian JWT, buatlah SSL Key dengan cara berikut
    - Beralih ke Debian Server
    - Jalankan Perintah Berikut
      ```bash
      openssl genrsa 2048
      ```
      Jika terdapat error, gunakan perintah berikut : 
      ```bash
      sudo apt-get update && sudo apt-get upgrade -y && sudo apt-get install openssl -y
      ```
      Masukan password dan kemudian jalankan perintah ssl sebelumnya!
    
    - Copy RSA Key ke Debian Server pada folder `jwt-toko` file `core.php` dan pada variabel `$key`
3. Abaikan error pada file `nusoap.php` pada visual studio code
4. Untuk branch ini, support untuk PHP 5.x, 7.x
    - Terkhusus untuk PHP 8.x, support semua tipe kecuali RPC-XML. Anda harus menginstallnya terlebih dahulu.