# Cochi CRM

Micro CRM

version 1.2.1

### SET UP

-   Requirements (Already covered with Docker deployment)
    1.  Apache/2.4.27 or greater.
    2.  MySQL 5.7 or greater.
    3.  PHP/7.2.24 or greater.
-   App Configuration

    1. Add host `microcrm.localhost`,
       see [Edit hosts](https://dinahosting.com/ayuda/como-modificar-el-fichero-hosts).
    2. Create `.env` file from `example.env` and set it.
    3. Give Folder permissions:
        ```
        sudo chown -R $USER:www-data storage;
          chmod -R 775 storage;
          sudo chown -R $USER:www-data bootstrap/cache;
          chmod -R 775 bootstrap/cache;
        ```
    4. Import database from `database/updates/*.sql` into `microcrm` DB
       with `root` user, at `localhost` host, `33063` port.
    5. Set `APP_KEY=base64:L086fuWzGdD7jlnsm4dFwwpyXX8qI7+bt5Wc4BAb4uU=` at `.env`.
    6. Run `composer install`.
    7. Run `php artisan storage:link`.
    8. Run `php artisan migrate`.

-   Load Fake Data (For Development and testing)
    1. Copy and merge content from `fake-data/public` to `storage/app/public`.
    2. Import database from `fake-data/*.sql` into `root_cochi` DB
       with `root` user, at `localhost` host, `33063` port.
-   App Settings
    Example:
    ```
    php artisan create-admin-user --user=admin@adlnetworks.com
    ```
-   Browse at [microcrm.localhost](http://microcrm.localhost).

-   Voyager Back Office at [microcrm.localhost/admin](http://microcrm.localhost/admin).

### How Use Swagger In Laravel

-   requeriments

1. You have to have an App whit Laravel.
2. you have to have a DB and use Artisan migrate or have tables in your DB
3. you can check in composer.json if you have l5-swagger install if you don't have it, you can install with de command composer require "darkaonline/l5-swagger:5.8." or check the documentation in its repository [GitHub] (https://github.com/DarkaOnLine/L5-Swagger)
4. if you dont have the view use the command php artisan vendor:publish --provider and check the view with the command php artisan route:list
5. turn on the server with php artisan serve
6. if everything is okey you can check the result in the new view in api/documentation

### CONTRIBUTION: Guidelines & Documentation

-   Database Key Fields, tables and or values:

    1.  `users.email`: Users email.

-   Git :
    [Gitflow](http://nvie.com/posts/a-successful-git-branching-model).
-   Back End:
    [Laravel 7.x](https://laravel.com/docs/7.x),
    [Laravel Voyager](https://docs.laravelvoyager.com).
-   Front End:
    [Bootstrap 4](https://getbootstrap.com/docs/4.0/getting-started/introduction),

---

2020 [Uriel Benítez](https://github.com/UrielBm).
