# About TrainADVANCED
TrainADVANCED is a web application built by Joshua Stocks (u1757754) for Assignment 2 of the module Advanced Web Programming (CHT2520).

# Set up
To set up and run TrainADVANCED do as follows:
- Clone this repo using the following command: `git clone git@github.com:advanced-web/advanced-application-J-Stocks.git`. Or download the files from this repo as a .zip and extract them.
- Install the project dependencies using [composer](https://getcomposer.org/): `composer install`
- Create the .env file: `cp .env.example .env`
- Set up a database, [MariaDB](https://mariadb.org/) via [XAMPP](https://www.apachefriends.org/index.html) is recommended.
- Add the connection details for the database to the .env file, all the properties prefixed with "DB_" are required.
- Set up OAuth on [GitHub](https://docs.github.com/en/free-pro-team@latest/developers/apps/creating-an-oauth-app) then add the client id and secret to the .env file, all the properties prefixed with "GITHUB_" are required.
- Link your local storage to the app storage using `php artisan storage:link` and ensure that the "APP_URL" property in the .env file is either left blank if running from localhost.
- Seed the database: `php artisan migrate:fresh --seed`
- Install and build the [npm](https://www.npmjs.com/get-npm) packages: `npm install && npm run dev`
- Generate an App Key: `php artisan key:generate`
- Start the webserver: `php artisan serve`

# Tools
This app was built using the following tools:
- [Laravel 8](https://laravel.com/)
- [Laravel Jetstream](https://jetstream.laravel.com/1.x/introduction.html)
- [Laravel Socialite](https://laravel.com/docs/8.x/socialite)
