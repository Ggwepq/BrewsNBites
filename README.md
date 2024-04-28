<p align="center"><a href="https://github.com/Ggwepq/BrewsNBites"><img src="https://github.com/Ggwepq/BrewsNBites/blob/master/public/logo/logo.png" width="300" alt="BrewsNBites Logo"></a></p>
<h2 align="center">BrewsNBites
    <h5><a href="https://drive.google.com/drive/folders/17vUbd_6jOOV59mbV9A3v0VVJblqdjN59">Progress Report</a></h5>
    <h5><a href="https://www.youtube.com/playlist?list=PLRQ1njZomKvE4XJQjdrYuyKMw6-0-6e6x">Project Tutorial</a></h5></h2>

***

## About BrewsNBites

BrewsNBites is a Ecommerce web application that sells coffee, desserts, and foods for the users. It uses Laravel as the main development framework with Vue.js & Inertia.js for the frontend. BrewsNBites takes inspiration for its product from a cafe site [Coffee Project](https://coffeeproject.com.ph/). We are very greatful for the Coffee Project website as it have many products which we take as an example for this project of ours. We custom made the logo for the site and for the products as well. Same goes with the website layout and design. We believe that just copying and watching from a tutorial won't give us most of the knowledge that's why we take it as a challenge to customized the website for our preference and for the theme of the project.

## Project Installation

Requires [NPM](https://nodejs.org/en), [Composer](https://getcomposer.org/download/), [XAMPP](https://www.apachefriends.org/download.html), and [GIT](https://git-scm.com/downloads).

1. Clone the repository into your local machine
2. Navigate to project root directory and install composer dependencies ```composer install```
3. Install also npm packages ```npm install```
4. Create a new .env file by copying the .env.example ```cp .env.example .env```
5. Generate APP_KEY in the .env file ```php artisan key:generate```
6. Setup database ```localhost/phpmyadmin``` and edit the .env file
7. Migrate models and tables to your database ```php artisan migrate```
8. Run the project by ```php artisan serve``` and ```npm run dev```

## Development Team
- [Ggwepq](https://github.com/Ggwepq)
- [CarlLatosa](https://github.com/Carllatosa)
- [Abodoo](https://www.facebook.com/jay.cabotaje.7)
- [Erica Salinas](https://www.facebook.com/ericasalinas912)
- [Dianne Cruz](https://www.facebook.com/Crzdeyyy)
- [Rysel Balboa](https://www.facebook.com/m28a1barrethttps://github.com/Carllatosa)

## Progress Report

| Date	|	Progress Description	|
|----------------|-------------------------------|
| March 29, 2024 | *``- Project Planning 	``*		 |
| April 4, 2024  | *``- Create new laravel project with vuejs and inertiajs. Setup admin authentication for admin login. Create admin dashboard with flowbite's ui library. Created a database schema for the ecommerce project. Setup database models and migrations. ``*
| April 5, 2024 | *``- First git commit``* |
| April 7, 2024 | *``- Created a product table for the admin. Show product list from database to product table list in the UI. Adding and editing products are implemented. Uploading and deleting multiple product images is supported.``*
| April 8, 2024 | *``- Feature of deleting products is implemented. Create a new homepage for guest and user. Login and register button can link to respective destination.``*
| April 9, 2024 | *``- Show products from the database in the homepage. Implement add to cart function. Display number of items stored in the cart.``*
| April 10, 2024 | *``- Create a UI for the cart items. Increase and decrease quantity. Total Price change changes based on the quantity and product added in the cart.``*
| April 12, 2024 | *``- Fix image issues and link redirections.``*
| April 21, 2024 | *``- Create a new page to view all list of products in the database.``*
| April 25, 2024 | *``- User can now filter products based on price range, category, and brands. Fixes some logout and add to cart issues.``*

***

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.


## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
