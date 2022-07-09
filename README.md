# Software Construction - Project Bakery 

| Name | Matric |
| -------- | -------- |
| NUR ATIQAH BINTI MOHD FUA’AD | B19EC0032 |
| CALEB ONG JIAN JIE | B19EC0008 |
| ISAAC TAN YU HAO | B19EC0010 |
| KANG CHU NING | B19EC0011 |
| LIOW ZHI HAO | B19EC0013 |
| AMIR IMRAN BIN AMIRUDDIN | A18CS0028 |

<br>

## Command Line

Clone the REPO to your machine

Install neccessary plugins 
```php
composer install
```

Create a local database with the name bakery_management_system and migrate the tables 

```php
php artisan migrate --seed
```

If Laragon is install in the machine, put it in the www folder, 

Else, use this command to serve the application 

```php
php artisan serve
```

It will serve the project http://127.0.0.1:8000