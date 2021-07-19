# To-Do App

This is a Laravel-based App where was developed the Back End with the APIs as the No- Framework Front End

Developed By Francesco Tufano

Caelum Dev Images and other resources are from my own entrepreneurship

## Deployed on the internet

The app is up and running on the internet...You can access the app [here](https://ensolvers.caelumdev.com/).

## Features

- Responsive Design
- Login with DB connection and session establishment
- Creations and Removal of Folders to group To-Dos as wished
- Creation, Modify and Delete of To-Dos

## Runtimes & Engines

- MySQL 5.6.43
- Laravel 8
- PHP 7.3
- jQuery 3.5.1
- Bootstrap 4


## Installation

Clone or get the files from the GitHub repository [here](https://github.com/ftufano/EnsolverToDo).

Install the dependencies and devDependencies and start the server. You will need to install Composer dependencies, you can do so on your CLI by typing...

```sh
composer install
```

Then access to the project through localhost URL, if you reach it, will ask to generate the app key.

Then you will need to create the database only on your DB gestor, after that you will need to run the migrations, for that, get back to the CLI and type...

```sh
php artisan migrate
```

You will need to manually create the DB user in order to access through to the app login, fill the following fields only

- name
- email
- password
- created_at (you can put today's date and hour)
- updated_at (same as created_at)

And that's it, you're ready to go

## Extras

Added EER Diagram made on MySQL Workbench reffering to DB Diagram.

