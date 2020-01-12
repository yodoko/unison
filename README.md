# unison
A shop selling clothes which respect the environement.

## Requirements
You will need at least PHP 7.3 if not 7.3.6 to run unison

Unison is a Symfony website.

## Installation
Few directions you will really need to respect in order to run this.
Every command in the following list needs to be be executed in the project root folder /unison (else it won't work) 
 - Install PHP 
 - Install composer
 - Install a SQL database
 - Install Symfony (You will need to run the code on their dev server for unison to be working)
 - You can Git clone this repo at http://github.com/yodoko/unison.git
 - Run the command: composer install in your terminal (in the project root folder)
 - Input your database details in the .env file in the DATABASE_URL see Symfony doc for more details.
 - Again in the .env file set the database name as unison 
 - Run the command: php bin/console make:migration in your terminal (in the project root folder)
 - If the previous command did not work see how to install the maker-bundle as a dev dependency in symfony doc. Then rerun the command.
 - Run the command: php bin/console doctrine:database:create 
 - Run the command: php bin/console make:migration in your terminal (in the project root folder)
 - Run php bin/console doctrine:migrations:migrate 
 - Insert the data in the unison.sql in your database
 - Finally run the command: symfony server:start

You can now launch your browser and type localhost:8000 to access unison.