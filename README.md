# MicroCRM

Micro CRM

version 1.2

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
    1. Browse [/admin/settings](http://cochi-crm.localhost/admin/settings).
-   Create Admin User
    Create Admin User:
    ```
    php artisan create-admin-user --user={email-here}
    ```
    Example:
    ```
    php artisan create-admin-user --user=admin@adlnetworks.com
    ```
-   Browse at [microcrm.localhost](http://microcrm.localhost).

-   Voyager Back Office at [microcrm.localhost/admin](http://microcrm.localhost/admin).

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
