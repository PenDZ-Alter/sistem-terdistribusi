<?php
date_default_timezone_set('Asia/Jakarta');
 
// Buat RSA Key 1024 bit atau 2048 bit di Linux/FreeBSD 
// $ openssl genrsa 1024
// $ openssl genrsa 2048
$key = "MIIEvAIBADANBgkqhkiG9w0BAQEFAASCBKYwggSiAgEAAoIBAQC0qdsfybPDgNmn
Ic1XqwysmEQoNgl4b8//Vf3yFN01ipF/U5+8ihgUNrBekvmtzIC3FcXOJcRKIKf9
A+5N6dNbPFBhrU943quwvxs91LW8GzHVM7g/mQFhV1n5W5GCt/xdH23NHjMrcWbz
k2H87aNnEjL551Onip2HGJdrUY2wRI8w1yeC+ID5G74crdTqTfH6NVf9guGqjjje
x6ccbkYZ7LueNL9n+9NNrw/sGhmLJz8E1zBHdCHjDK7HKuq1KC72eq5EJ0wmN3Ak
Agw+ABz/9cI67SXF9aeY9r1mR52zJJE5K85CZSXrnn8bIWY0T07AyZj0wxCANX9t
tfOfVREBAgMBAAECggEATC7kTD9OIr8PCT9jy/hBW/bJpvtCexsLZuzoLVFHBvDr
8fldfq/s/3kgXoEz8GowTQRNaWTbpTaoIDWsJAbaLbr9WnMu9BVR6TJtVmGAUVZW
aUVqCMeIoXeoZVKLxce4D7zVHI4DneowM76Or422Phyaim9WA2yciP+BuqulSBKr
cZ4G85qZ1CfS+UjeeKbvvYCAWVsItWr7qd3VZfgHhgocrjNsMjZ/3uchb1Uqma8G
QVVNpABhkkUQQU95u9P+cu8Mf94Qdru5g9BG8hsyj2gyx6Ryc9nv2BodEI8e8BZW
QXzvL4u9XeorpN6TBuc5mk4wY58nVdY9RqNWOWJ0EQKBgQDj1DPhRsFNjnhf9+2/
GzCphxyfzggEt+kYmFY9awhfw16qvO8HYUm7MjeCH+uh2gMbIAvaNzOsfjBEHgnR
wqf4eiq7qANTUU9SjmAd47Bo2StEwLwOM5Sp4Uq2ws0D8sBqgWcNb3BPJ8AfZuJT
NWCg2Y8ZSvxpzkp2K9Uoj9hXCwKBgQDLAKiH11e4X+ocNz3FibNrKhAIKnvFMU4B
EY3p3I08gSagH9qmcqS8Wcyy5ujmo7/8d0T0Oy15CaYcRXV56/ami04QMDfUU7Ni
/UDmgzK41UkeESdA65ljhUL4Mz5IY+UTC1SyxsagDzOxV0vuvoNeaP2O8wjDeeET
vDjJT/QPowKBgDY85ITzBT3jdwDR00W1wWX6hnP85qfI6LM0QQOqIXo61qSrCfSl
0pnAILrXwo7rieXBQVEX5zNfbzooNIo9XyOmYdn+65vANbQftP4ooGy1lrltcNeo
q/Gtcs4Dni8ccXZpjBEEwKX3fqN7KNJKWNCyOoD4+xJtTAjJ8psPc591AoGAN/gd
fx5zNAVV0aO1Z0I48oHtW6MC7vJSFF9XpjPFyPm+wYUmzp9rJfcIRgb+DaD2LNBh
dYjfV7C+WKsZ4ZyaK37a7gGtUuAk5FT40NU5ZdaAS0blcLPEXbj/JtlSAblxDhgg
qQ2+86BdWza7W76xD5WY2xHMx8BRuxQ4/+AIZUsCgYArYQa8WlcWIuLWTsc3cj87
H6a69dqxUin47kNZx95xwEA1BKRJSpe654xjr7/hpaQ9RIYU7AJQKkMv0MNFDytD
Dr4b8m6A7DW4Lme4IBJjOR9RDZ9sDJMe7Rw1WFrtKZhQZ5B7cZ/MTk9XPQfVefs+
HiJtd20T1Tj4YUAG6AglSQ==";

$issued_at = time();
$expiration_time = $issued_at+(60*60); // valid selama 1 jam
$issuer = "RestApiAuthJWT";
?>