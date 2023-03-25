# Microservices

## Reconstruct database

Go to the models folder and modify the `db_config.php` and `variables.php` file with your database credentials.

variables.php:

```php
define('LOCAL_SERVER', 'C:/laragon/www');
define('PROJECT_FOLDER', '/microservices-mvc');
define('SQL_FILE_PATH', ROOT_PATH . '/demo/microservices_db.sql');
```

db_config.php:

```php
define('DB_DATABASE', 'microservices_db');
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
```

## User Roles

When signing up, the user is assigned a role of 1 (user) by default.

Change the role value in the database to 0 to give the user admin access.

- Admin - 0 - Full Access
- Default - 1 - User Access
- Other - NULL && > 1 - No Access
