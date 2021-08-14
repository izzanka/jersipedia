<!-- PROJECT LOGO -->
<p align="center">
  <h3 align="center">JERSIPEDIA</h3>
</p>

<!-- TABLE OF CONTENTS -->
<details open="open">
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## About The Project

JERSIPEDIA is a simple jerseys online shop that integrated with api raja ongkir

### Built With

* [Bootstrap](https://getbootstrap.com)
* [JQuery](https://jquery.com)
* [Laravel](https://laravel.com)
* [RajaOngkir](https://rajaongkir.com)



<!-- GETTING STARTED -->
## Getting Started

### Prerequisites

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
```sh
php artisan migrate
```

<!-- USAGE EXAMPLES -->
## Usage
<img src="public/images/ss/ss1.png" alt="ss1">
<img src="public/images/ss/ss2.png" alt="ss2">
<img src="public/images/ss/ss3.png" alt="ss3">
<img src="public/images/ss/ss4.png" alt="ss4">
<img src="public/images/ss/ss5.png" alt="ss5">
<img src="public/images/ss/ss6.png" alt="ss6">
