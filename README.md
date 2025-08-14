# Laravel App

A brief description of your Laravel application goes here.

## Installation

Follow these steps to get the project up and running locally:

1. **Clone the repository**

   ```bash
   git clone https://github.com/JohnCarlo29/livewire-exam.git
   ```

2. **Checkout the development branch**

   ```bash
   git checkout development
   ```

3. **Install dependencies**

   ```bash
   composer install
   npm install
   npm run dev
   ```

4. **Set up environment file**
   Copy `.env.example` to `.env` and update database and other configuration values:

   ```bash
   cp .env.example .env
   ```

5. **Run migrations and seeders**

   ```bash
   php artisan migrate --seed
   ```

6. **Start the development server**

   ```bash
   php artisan serve
   ```

7. **Browse the app**
   Open your browser and navigate to [http://localhost:8000](http://localhost:8000)

## Requirements

* PHP >= 8.x
* Composer
* Node.js & npm
* MySQL or any supported database

## Environment Setup

* Ensure your `.env` file contains correct database credentials, app URL, and other configurations.
* Generate application key:

  ```bash
  php artisan key:generate
  ```

## Front-end Assets

* During development:

  ```bash
  npm run dev
  ```
* For production build:

  ```bash
  npm run build
  ```
  ```bash
  php artisan config:cache
  php artisan route:cache
  ```
