# KATH Online Booking Meeting Room System

## How to use


### Setup Project
- You should also have Composer and XAMPP(optional) installed
- Clone the repository with __git clone__
- Copy __.env.example__ file to __.env__ and edit database credentials there
- Run __composer install__
- Run __php artisan key:generate__
- Run __php artisan migrate__ 
- Run __php artisan serve__ (after enabling Apache and MySQL on XAMPP Control Panel)

### Import database
- Find in the project : __database/booking_meeting_room.sql__
- Import file __booking_meeting_room.sql__ in phpMyAdmin (or MySQL, etc...) 

### Install package to export data to Excel file

- Run __composer require maatwebsite/excel__
- Add to providers (in config/app.php):
__'providers' => [ /* * Package Service Providers... */ Maatwebsite\Excel\ExcelServiceProvider::class, ]__
- Add to aliases (in config/app.php):
__'aliases' => [ ... 'Excel' => Maatwebsite\Excel\Facades\Excel::class, ]__
- Run __php artisan vendor:publish__

### View the Project
- Launch the path that appears on the console screen: http://localhost:8000
- Login to Admin panel with default credentials admin@kath.vn - 12345678 or register a new account
