## Preview
<p align="center">
    <img src="public/images/ss/ss1.png" alt="ss1"><br>
    <img src="public/images/ss/ss2.png" alt="ss2"><br>
    <img src="public/images/ss/ss3.png" alt="ss3"><br>
    <img src="public/images/ss/ss4.png" alt="ss4"><br>
    <img src="public/images/ss/ss5.png" alt="ss5"><br>
    <img src="public/images/ss/ss6.png" alt="ss6"><br>
</p>

## Installation
Clone Project ini setelah selesai pada terminal masuk kedalam directory project

Ketikkan:

1. Composer Install
2. cp .env.example .env
3. php artisan key:generate
4. membuat database dengan nama jpedia
5. php artisan migrate 
6. php artisan db:seed --class=LeagueSeeder // dummy data league
7. php artisan db:seed --class=JerseySeeder // dummy data jersey
8. php artisan db:seed --class=UserSeeder //untuk admin
9. php artisan serve
