# Webshop V1

This webshop is designed for internal usage. Internal Orders who will be
collected at one point and made into external orders. It keeps track of
who ordered what and the state of each order. Internal users can be assigned 
a budget from which they may order.

It is developed for a specific purpose but
there are some configurations possible.

It is not designed to be a public webshop. It has no understanding of
inventory nor any payment methods.

## installation

based on [Laravel 11](https://laravel.com/), so you'll need 
* PHP8.2+
* MariaDB / MySQL or SQlite Database (Designed with MariaDB in mind)
* a webserver with extensions, e.g. Apache2 with ...

For installing purposes, you'll also need (can be removed after the installation)
* composer
* node.js and NPM

### Setup
1. ``git clone`` the repository
2. ``composer update`` and ``npm install`` all required dependencies
4. ``cp .env.example .env`` clone the example ``.env``-File and edit the values
   (Name, Path, Database and E-Mail-Connection)
5. ``php artisan key:generate`` to generate the applications encryption key
6. ``php artisan migrate --seed`` migrate the database and seed it with
all the basic data. If you want some example-data run ``php artisan db:seed --class=DemoSeeder``
after the initial migration

There are some assets bundled via vite. So either run ``npm run build`` to build all
assets or ``npm run dev`` to spin up the vite server. Latter is not recommended for
production.

If your developing / testing the application you can use laravels dev-server by issuing ``php artisan serve``
It will spin up a webserver listening on port ``localhost:8000``. If you want to connect
to it from another device, you can start the server with ``php artisan serve --host=0.0.0.0`` so it 
will listen on all interfaces and IP-Addresses.

If you want to use it in production point your webserver (e.g. Apache2) to the directory ``/public`` and 
enable rewrites. A basic example configuration for Apache can be found in the file ``.apache.conf.example``



## Plugins / Extension

* Based on Laravel 11
* spatie/laravel-permissions, updated to use UUIDs
* laravel breeze (Authentication framework)
* Template based on https://github.com/PixelRocket-Shop/alpine-html-bootstrap 
