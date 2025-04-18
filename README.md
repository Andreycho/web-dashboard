# Customizable Web Dashboard

A simple 3x3 grid-based web dashboard built with Laravel and HTML, CSS, JavaScript. Each cell contains a configurable button that can be assigned a link, a title, and a color. Unconfigured cells show a "+" button for quick setup.

## Tech Stack

- PHP/ Laravel
- HTML / CSS / JavaScript (no frameworks)
- Vite (for future use — not required now)

## Features

- 9 grid cells (3x3 layout)
- Each button links to a custom URL
- Configurable button, color and title
- Gray “add” button for unconfigured cells
- Data storage in MySQL database

## Project Setup

### 1. Clone the repository
```bash
git clone https://github.com/Andreycho/web-dashboard.git

cd web-dashboard
```

### 2. Install dependencies
```bash
composer install
npm install
```

### 3. Setup your environment
Create your environment file by copying the example:
```bash
cp .env.example .env
```
Then generate the Laravel app key:
```bash
php artisan key:generate
```

### 4. Add your database credentials
Edit the .env file and update the following lines with your own MySQL settings:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=web-dashboard
DB_USERNAME=root
DB_PASSWORD=your_password
```
Make sure the database `web-dashboard` exists, or create it using MySQL CLI, phpMyAdmin, or any GUI tool.

### 5. Run migrations and seed the 9 dashboard cells
```bash
php artisan migrate:fresh --seed
```

### 6. Start the Laravel server
```bash
php artisan serve
```
The application will be available at:
```
http://127.0.0.1:8000
```

## Routes used
| Route             | Method | Description                        |
|-------------------|--------|------------------------------------|
| `/`               | GET    | Displays the 3x3 dashboard grid    |
| `/configure/{id}` | GET    | Shows the form to configure a cell |
| `/configure/{id}` | POST   | Submits the cell configuration     |

`{id}` is the ID of the specific dashboard cell (from 1 to 9).