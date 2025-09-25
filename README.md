## Panduan Instalasi

##Cara Instalasi Laravel di Laptop setelah Clone

1. Install composer-dependency pake `composer install` jika belum menginstall
2. Copy file `.env.example` di root folder terus ganti jadi `.env`. Setting sesuai dengan environment yang digunakan
5. Setting database, sesuaikan nama databasenya dengan yang ada di `.env`
7. Migrasikan database, `php artisan migrate`
8. Jalankan seeder `php artisan db:seed`
9. Jalankan project nya `php artisan serve`

## Role
1. Pengelola, memiliki akses untuk melakukan perubahan status persebaran donasi, laporan keuangan (pemasukan dan pengeluaran), dan melakukan perubahan status pendaftaran volunteer.
2. Masyarakat Umum, memiliki akses untuk melakukan donasi dan melihat status persebaran donasi secara realtime.
3. Mahasiswa, memiliki akses untuk melakukan donasi dan melihat status persebaran donasi secara realtime, memiliki akses untuk melakukan pendaftaran volunteer dan juga melihat status pendaftaran secara real time. 


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
