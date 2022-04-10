<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Bitfinansal - Laravel Real-Time Location Tracking System

Kurulum:

- $ composer update
- $ docker-compose up -d
- $ php artisan php artisan queue:work // Data pushlamak icin
- Hepsi ayağa kalktıktan sonra database migrate için browser localip:8000/testdata 3 defa refresh yaptıktan sonra önce migrate ardından test datası ekleyip çalışmaya başlıyor.
- Browser'dan ana uygulama "local_ip:8000" giriliyor.

- Not:Data gelmemesi halinde "localip:8000/testdata" yeni data eklenebilir. Pushlanmaması halinde "localip:8000/location"

## Kullanılan Docker Imageleri

-  Laravel(Ana uygulama)
-  Laravel(Websocket)
-  Redis // localhost:8001 sayfasından görülebilir
-  Mysql


## Kullanılan Paketler

- Laravel/ui vue
- Laravel Echo
- Laravel Websocket //Pusher
- Predis
- Pusher Js

## Örnek Resim
<img src="ekran.png" width="400">


Mertcan Yiğit


