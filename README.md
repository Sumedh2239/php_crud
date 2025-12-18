# PHP CRUD Application

A simple PHP-based CRUD (Create, Read, Update, Delete) application for managing products with a web interface.

## Features

- **Create**: Add new products with name, price, and category.
- **Read**: View a list of all products in a table.
- **Update**: Edit existing product details.
- **Delete**: Remove products with confirmation.
- **Visualization**: Chart displaying product count by category.

## Prerequisites

- **XAMPP** (or equivalent web server with PHP and MySQL support).
- **PHP** 7.4 or higher.
- **MySQL** 5.7 or higher.
- A web browser.

## Installation and Setup

1. **Download/Clone the Project**:
   - Place the project folder in your web server's document root (e.g., `c:\xampp\htdocs\php-crud` for XAMPP).

2. **Start XAMPP**:
   - Open XAMPP Control Panel.
   - Start the **Apache** and **MySQL** modules.

3. **Set Up the Database**:
   - Open `http://localhost/phpmyadmin` in your browser.
   - Create a new database named `php_crud`.
   - Create the `products` table using this SQL:
     ```sql
     CREATE TABLE products (
         id INT AUTO_INCREMENT PRIMARY KEY,
         name VARCHAR(255) NOT NULL,
         price DECIMAL(10, 2) NOT NULL,
         category VARCHAR(255) NOT NULL
     );
     ```
   - (Optional) Insert sample data if desired.

4. **Configure Database Connection**:
   - Ensure [config/db.php](config/db.php) has the correct MySQL credentials (default: host `localhost`, user `root`, password empty, database `php_crud`).

## How to Run

- Open your browser and navigate to: `http://localhost/php-crud/public/`
- The main page ([index.php](public/index.php)) will load, showing the product list and add form.
- Add products using the form at the top.
- Edit or delete products using the buttons in the table.
- The chart at the bottom visualizes products by category (requires Chart.js; see notes below).

## Project Structure

```
php-crud/
├── assets/
│   └── style.css          # Custom CSS styles
├── config/
│   └── db.php             # Database connection configuration
├── public/
│   ├── index.php          # Main page with product list and add form
│   ├── create.php         # Handles adding new products
│   ├── edit.php           # Edit product page
│   ├── delete.php         # Handles deleting products
│   └── chart-data.php     # JSON endpoint for chart data
└── database.sql           # (Empty) Placeholder for database schema
```

## Technologies Used

- **Backend**: PHP with PDO for database interactions.
- **Frontend**: HTML, Bootstrap 5 for styling, Chart.js for visualization.
- **Database**: MySQL.

## Notes

- **Chart Functionality**: The chart in [index.php](public/index.php) requires Chart.js. If not working, add this script tag to the `<head>` in [index.php](public/index.php):
  ```html
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  ```
  And ensure JavaScript initializes the chart using data from `chart-data.php`.
- **Security**: Basic input validation is implemented; consider adding more (e.g., CSRF protection) for production use.
- **Customization**: Modify [assets/style.css](assets/style.css) for custom styling.
- **Troubleshooting**: If you see "Database Connection Failed", verify MySQL is running and credentials are correct.

## License

This project is for educational purposes. Feel free to modify and use as needed.</content>
<parameter name="filePath">c:\xampp\htdocs\php-crud\README.md