<!-- PROJECT LOGO -->
<p align="center">
  <h3 align="center">JERSIPEDIA (https://jersipedia.ferdirns.com)</h3>
</p>

<!-- ABOUT -->
## About 
A simple online shop integrated with api raja ongkir (https://rajaongkir.com/)

## Built With

### Framework

* [Laravel](https://laravel.com)
* [Bootstrap](https://getbootstrap.com)

### Library

* [JQuery](https://jquery.com)

### Api

* [RajaOngkir](https://rajaongkir.com)

### Package

* [maatwebsite/excel](https://github.com/Maatwebsite/Laravel-Excel)
* [spatie/image](https://github.com/spatie/image)
* [laravel/ui](https://github.com/laravel/ui)

<!-- OVERVIEW -->
## Overview
<img src="/public/images/ss/ss1.png">
<img src="/public/images/ss/ss2.png">
<img src="/public/images/ss/ss3.png">
<img src="/public/images/ss/ss4.png">
<img src="/public/images/ss/ss5.png">
<img src="/public/images/ss/ss6.png">
<img src="/public/images/ss/ss7.png">
<img src="/public/images/ss/ss8.png">
<img src="/public/images/ss/ss9.png">
<img src="/public/images/ss/ss10.png">


<!-- GETTING STARTED -->
## Getting Started

### Installation

* Clone the repo, then enter the project directory with terminal
```sh
composer install
```
```sh
cp .env.example .env
```
```sh
php artisan key:generate
```
* Create new database, then change the .env
```sh
php artisan migrate
```
* Dummy data 
```sh
php artisan db:seed --class=LeagueSeeder
```
```sh
php artisan db:seed --class=JerseySeeder
```
```sh
php artisan db:seed --class=UserSeeder
```
* Run
```sh
php artisan serve
```

