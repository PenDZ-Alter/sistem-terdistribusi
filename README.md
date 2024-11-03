# sistem-terdistribusi
Ini merupakan data data dari mata kuliah Sistem Terdistribusi & Keamanan UIN Malang

## Getting Started
Pada folder `Server` dan `Client`,
Copy dan Replace semua data ke dalam folder `htdocs`. <br>
Khusus untuk server, jalankan perintah berikut : 
```bash
cd ~ && sudo apt install curl gnupg2 -y && sudo curl -s https://getcomposer.org/installer | /opt/lampp/bin/php && sudo ln -s /opt/lampp/bin/php /usr/local/bin/php && sudo mv composer.phar /usr/local/bin/composer && cd ~/htdocs && composer install
```
Jangan lupa untuk memasukan password user debian/linux anda.

khusus untuk client (yang menggunakan docker) : <br>
Installasi _images_ xampp pada docker : <br>
Jalankan perintah berikut : 
```bash
docker pull tomsik68/xampp:<versi_xampp>
```

**PENTING!!** Sebelum melanjutkan perintah selanjutnya, coba lihat pada bagian file `Dockerfile` : 
```bash
# Start from tomsik68/xampp
FROM tomsik68/xampp:<versi_xampp>
```
Ubah `versi_xampp` tersebut sama dengan perintah sebelumnya

Contoh penggunaan : 
```bash
docker pull tomsik68/xampp:7
```
Pada file `Dockerfile`, ubah pada baris berikut : 
```bash
# Start from tomsik68/xampp
FROM tomsik68/xampp:7
```

kemudian, jalankan perintah berikut : 
```bash
docker build -t <nama-build> .
docker run --name <nama-container> -p 8080:80 -p 3307:3306 -p 2222:22 -d -v <linker-htdocs-folder>:/www <nama-build>
```
Replace `nama-build` dan `nama-container` sesuai yang anda inginkan! dan, copy path pada folder yang anda inginkan untuk menyambungkan antara folder `/www` pada folder windows/OS utama kalian

Contoh penggunaan : 
```bash
docker build -t xamppbuild .
docker run --name xampp7 -p 8080:80 -p 3307:3306 -p 2222:22 -d -v D:\htdocs:/www xamppbuild
```

## NOTES!
Ada beberapa hal yang perlu di perhatikan!
1. Sesuaikan alamat IP, Password, User, port pada file `.env` atau `.env.example` (Hal ini berlaku pada server dan client)
    ```env
    HOST= # IP Address or Host
    USER= # User from your SQL
    PASS= # Pass from your SQL
    PORT= # Port of your SQL (Empty for default to 3306)
    ```
    **WARNING!!** Jangan lupa untuk mengganti nama `.env.example` ke `.env`. Jalankan perintah berikut setelah mengisi data pada file `.env.example`: 
    ```bash
    cd ~/htdocs && mv .env.example .env
    ```
    

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
      Masukan password user linux anda dan kemudian jalankan perintah ssl sebelumnya!
    
    - Copy RSA Key ke Debian Server pada folder `jwt-toko` dan `jwt-mahasiswa` file `core.php` dan pada variabel `$key`
3. Abaikan error dan jangan ubah kode apapun pada file `nusoap.php` pada visual studio code
4. Untuk branch ini, support untuk PHP 7.1.x+
    - Terkhusus untuk PHP 8.x, support semua tipe kecuali **RPC-XML**. Anda harus menginstall plugin **RPC-XML** terlebih dahulu.
    - Terkhusus untuk PHP 7.0.x, 5.x dan versi sebelumnya, versi ini tidak di dukung oleh dotenv karena pada branch ini menggunakan composer package `vlucas/phpdotenv`.


## IMPORTANT NOTES
Jangan lupa untuk menyesuaikan link url anda pada `Client` sesuai dengan alamat IP atau host dari `Server`!! url pada kode tersebut hanyalah contoh penggunaan ke server.