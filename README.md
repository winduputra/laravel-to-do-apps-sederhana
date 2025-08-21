# Laravel Todo Manager

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel Todo Manager

A powerful yet simple task management application built with Laravel, featuring advanced search, categorization, sorting, and deadline management capabilities. This project demonstrates the implementation of CRUD operations with additional features to enhance productivity and task organization.

## 🌟 Features

- **📝 Task Management**: Create, read, update, and delete tasks with ease
- **🔍 Advanced Search**: Find tasks by title or description
- **🏷️ Categorization**: Organize tasks with predefined categories (Work, Personal, Education, Other)
- **⏱️ Deadline Management**: Set and track task deadlines with visual indicators for overdue tasks
- **🔄 Dynamic Sorting**: Sort tasks by title, category, deadline, or creation date
- **🔎 Smart Filtering**: Filter tasks by category or completion status
- **📱 Responsive Design**: Fully responsive interface built with Bootstrap

## 🚀 Installation

### Prerequisites
- PHP 8.1 or higher
- Composer
- MySQL or compatible database
- Node.js and NPM (for asset compilation)

### Setup Instructions

1. **Clone the repository**
   ```bash
   git clone https://github.com/winduputra/laravel-to-do-apps-sederhana.git
   cd laravel-to-do-apps-sederhana
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Configure environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configure database**
   - Edit `.env` file and set your database credentials
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

5. **Run migrations**
   ```bash
   php artisan migrate
   ```

6. **Start the development server**
   ```bash
   php artisan serve
   ```

7. **Access the application**
   - Open your browser and navigate to `http://127.0.0.1:8000`

## 🛠️ Technologies Used

- **Laravel**: PHP framework for robust backend development
- **Bootstrap**: Frontend framework for responsive design
- **MySQL**: Database for data storage
- **JavaScript**: For enhanced interactivity

## 🔧 Usage

1. **Creating a Task**
   - Click on "Create New Task" button
   - Fill in the task details including title, description, category, and deadline
   - Click "Save" to create the task

2. **Managing Tasks**
   - View all tasks on the home page
   - Use search bar to find specific tasks
   - Filter tasks by category or completion status
   - Sort tasks by clicking on column headers
   - Edit or delete tasks using action buttons

3. **Task Details**
   - Click on a task title to view detailed information
   - Mark tasks as completed from the detail view or list view

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📄 License

This project is licensed under the [MIT license](https://opensource.org/licenses/MIT).

## 📬 Contact

Windu Putra - [GitHub](https://github.com/winduputra)

Project Link: [https://github.com/winduputra/laravel-to-do-apps-sederhana](https://github.com/winduputra/laravel-to-do-apps-sederhana)

---

<p align="center">
  <i>Developed with ❤️ using Laravel and Bootstrap</i>
</p>
