<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:


### Features : 
```
1) Laravel Custom registration function
2) Laravel Custom Login with email and password
3)There are two user types - A)Admin B)Accountant.

- Back-End
4) Admins are able to manage(Add, Delete, View, List) Product Category and Product.
5) Accountants are able to see only the List & view part of the Product & Product category.
- Front-End (For both guest & logged in user)
5) List all products on the frontend
6) Product detail in frontend
```

## Installation Process: 

1. Install via composer
```
composer install 
```

2. DataBase Configuration in `.env`
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_exam
DB_USERNAME=root
DB_PASSWORD=
```

3. Run Composer Script for Dump Database record creating...

```
composer run-fresh
```
- It will wiping and creating migrate database schema,
- Creating Admin User and Accountant user,
- Seeding data using DB Seeder.


### Admin Credentials

```
Use it for ADMIN: 
Email : admin@admin.com
Password: adminadmin

```



---

 > Thank you.