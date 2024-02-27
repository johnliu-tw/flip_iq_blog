# Project: Mini Blog
This README provides a comprehensive guide to setting up and running the Mini Blog project. By following these instructions, you'll have the project up and running on your local machine for development and testing purposes.

## Prerequisites
Before you begin, ensure you have the following software installed on your system:

- PHP version **8.2.8**
- Composer version **2.2.7**
- Laravel version **10.45.1**

## Setup Instructions
Follow these steps to set up the project on your local environment:

### 1. Clone the Environment File
Copy the example environment file to create your own .env file:

```bash
cp .env.example .env
```

### 2. Configure the Database
Open your `.env` file in a text editor and set the correct database connection information:

```env
DB_DATABASE=blog_db
DB_USERNAME=your_username
DB_PASSWORD=your_password
```
Replace blog_db, your_username, and your_password with your actual database name, database username, and database password, respectively.

### 3. Install Dependencies
Run Composer to install the project dependencies:

```bash
composer install
```

### 4. Run Migrations
Execute the Laravel migrations to create the database schema:

```bash
php artisan migrate
```

### 5. Generate Key
Execute the laravel application key generate command:
```bash
php artisan key:generate
```

### 6. Start the Server
Finally, launch the Laravel development server:

```bash
php artisan serve
```

This command will start a local web server. Access the project at http://localhost:8000 in your web browser.

## Design Architecture and Rationale
This section outlines the key architectural decisions made during the development of the Blog project and the reasons behind these choices.

### 1. Blade Templating Engine
Choice: The project utilizes Laravel's Blade templating engine for rendering HTML.
Rationale: Blade allows for seamless integration of Laravel's built-in CSRF protection mechanisms, facilitating secure form submissions and enhancing overall application security.
### 2. Static Assets Management
Choice: Static stylesheets and JavaScript files are placed directly in the public directory.
Rationale: This approach simplifies the management of static assets, ensuring they are easily accessible and efficiently served to the client, leveraging Laravel's built-in support for serving public assets.
### 3. User Experience Enhancement
Choice: jQuery UI's dialog feature is employed to enhance user interaction.
Rationale: By utilizing jQuery UI dialogs, the project offers a more engaging and intuitive user interface, providing modal interaction capabilities that improve the overall user experience.
### 4. Backend Framework
Choice: Laravel is chosen as the backend framework.
Rationale: Laravel offers a comprehensive and integrated solution for web development, combining elegance, simplicity, and robust features like routing, and ORM, making it an ideal choice for this project.
### 5. Database Interaction
Choice: Eloquent ORM is used for database interactions over the Query Builder.
Rationale: Eloquent ORM provides an active record implementation, simplifying data operations and queries. Its object-oriented approach makes it more intuitive and user-friendly, facilitating easier database interactions and development efficiency.
### 6. Database Software
Choice: MySQL is used as the database software.
Rationale: MySQL is a widely supported and popular choice within the PHP ecosystem, offering reliability, performance, and extensive documentation. Its compatibility with Laravel and prevalence in PHP projects make it a natural choice for this project.

