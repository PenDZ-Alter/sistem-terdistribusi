# sistem-terdistribusi
Ini merupakan data data dari mata kuliah Sistem Terdistribusi & Keamanan UIN Malang

## NOTES untuk Server
Copy dan Replace semua data ke dalam folder `htdocs`.
Kemudian, jalankan perintah berikut : 
```bash
cd ~ && sudo curl -s https://getcomposer.org/installer | /opt/lampp/bin/php && sudo ln -s /opt/lampp/bin/php /usr/local/bin/php && sudo mv composer.phar /usr/local/bin/composer && cd /opt/lampp/lampp && composer install
```
Jangan lupa untuk memasukan password user debian/linux anda.

## NOTES!
Ada beberapa hal yang perlu di perhatikan!
1. Sesuaikan alamat IP, Password database, User Database, port pada file `.env` atau `.env.example`
    ```env
    HOST= # IP Address or Host of Server
    USER= # User from your SQL
    PASS= # Pass from your SQL
    PORT= # Port of your SQL (Empty for default to 3306)
    ```
    WARNING!! Jangan lupa untuk mengganti nama `.env.example` ke `.env`. Jalankan perintah berikut setelah mengisi data pada file `.env.example`: 
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
      Masukan password dan kemudian jalankan perintah ssl sebelumnya!
    
    - Copy RSA Key ke Debian Server pada folder `jwt-toko` file `core.php` dan pada variabel `$key`
3. Abaikan error pada file `nusoap.php` pada visual studio code
4. Untuk branch ini, support untuk PHP 7.x
    - Terkhusus untuk PHP 8.x, support semua tipe kecuali RPC-XML. Anda harus menginstallnya terlebih dahulu.
    - Terkhusus untuk PHP 5.x dan versi sebelumnya, versi ini tidak di dukung oleh dotenv karena pada branch ini menggunakan composer package `vlucas/phpdotenv`.