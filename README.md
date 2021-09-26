# PDDIKTI WEB APP
PDDIKTI WEB APP adalah Aplikasi web Pangkalan Data Pendidikan Tinggi (PDDIKTI) untuk salah satu Universitas Swasta di kota Tangerang. Aplikasi ini dikembangkan untuk memenuhi tugas UAS Semester 3 Mata Kuliah Pemrograman Web 2. PDDIKTI WEB APP dibuat menggunakan Framework CodeIgniter v.3, sesuai dengan spesifikasi project yang tertera dalam tugas UAS Mata Kuliah Pemrograman Web 2. Fungsi aplikasi ini adalah untuk pengelolaan data mahasiswa untuk PDDIKTI di salah satu universitas ternama di kota tangerang.

## Getting Started
Aplikasi ini dapat diinstall dengan spesikasi berikut ini:
#### Spesifikasi minimum server
1. PHP >= 5.5
2. MySQLi
3. HTTP Server, misal NginX or Apache.

#### Installasi
1. Clone repo ini: `git clone https://github.com/doublegunz/pddikti.git`
2. Buat database baru dengan nama `dbpdpt10`.
3. Import file `dbpdpt10.sql` yang ada dalam folder `database/` ke database `dbpdpt10`.
4. Set credentials database di file `application/config/database.php`
5. Terakhir buka url di browser, yaitu [http://localhost/pddikti/](http://localhost/pddikti/).

## License
PDDIKTI WEB APP free dan open-source di bawah [MIT license](https://github.com/doublegunz/pddikti/blob/master/LICENSE.md).
