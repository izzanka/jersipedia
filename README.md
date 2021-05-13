## Preview
<p align="center">
    <img src="public/images/ss/ss1.png" alt="ss">
</p>

## Installation
Clone Project ini setelah selesai pada terminal masuk kedalam directory project

Ketikkan:

1. Composer Install
2. cp .env.example .env
3. php artisan key:generate
4. database yang namanya jpedia harus kosong (apus tablenya kalo ada / bikin baru)
5. php artisan migrate (Jangan lupa set up database) //nama dbnya jpedia
6. php artisan db:seed --class=LeagueSeeder
7. php artisan db:seed --class=JerseySeeder
8. php artisan db:seed --class=UserSeeder //untuk admin
9. php artisan serve
