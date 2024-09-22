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
    
    - Copy RSA Key ke Debian Server pada folder `jwt-toko` file `core.php` dan pada variabel `$key`