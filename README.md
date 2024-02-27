# Project: Blog
## Prerequisite
1. PHP 8.2.8
2. Composer 2.2.7
3. Laravel 10.45.1

## Setup
1. `cp .env.example .env`
2. Set up the correct environment variables for your database in `.env``:
```
DB_DATABASE=flip_iq
DB_USERNAME=root
DB_PASSWORD=password
```
3. `composer install`
4. `php artisan migrate`
5. `php artisan serve`