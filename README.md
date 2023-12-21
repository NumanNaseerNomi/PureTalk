# PureTalk

## Introduction

Welcome to the PureTalk! This README provides instructions on how to set up the project on your machine. Follow the steps below to get started.

### Prerequisites

Before you begin, make sure you have the following installed on your system:

- [Composer](https://getcomposer.org/)
- [Node.js and npm](https://nodejs.org/)
- [PHP](https://www.php.net/)
- [MySQL](https://www.mysql.com/)

## Installation

- Clone the repository to your machine:

   ```bash
   git clone https://github.com/iLaibaHabib/PureTalk.git

- Navigate to the project directory:

   ```bash
   cd PureTalk

- Install Composer dependencies:

   ```bash
   composer install

- Install npm dependencies:

   ```bash
   npm install

- Copy the .env.example file to .env:

   ```bash
   cp .env.example .env

- Generate the application key:

   ```bash
   php artisan key:generate

- Configure the database connection in the .env file. Set the DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, and DB_PASSWORD variables according to your environment.

- Run migrations to create the database tables:

   ```bash
   php artisan migrate

- Seed the database (optional):

   ```bash
   php artisan db:seed

## Running the Application

- Compile assets with npm run dev:

   ```bash
   npm run dev

- To start the Laravel development server, run:

   ```bash
   php artisan serve

## Default User

After completing the installation, a default user is created with the following credentials:

- Email: admin@admin.com
- Password: admin@admin.com

Visit http://localhost:8000 in your web browser to access the PureTalk application.

That's it! You've successfully set up PureTalks on your machine. If you encounter any issues, please refer to the Laravel documentation or the project's issue tracker.
