
# Task Management Application

This application is a Task Management System built using Laravel. It allows users to manage tasks with various features like task priority, status updates, due dates, and role-based access control. The system also includes a responsive design with search and filter capabilities.

## Features

1. **Role-Based Access Control (RBAC)**:
   - **Admin**: Can view, edit, and delete all tasks.
   - **Customer**: Can view, create, edit, and delete only their own tasks. Cannot access the admin dashboard.

2. **Task Management**:
   - Create, view, edit, and delete tasks.
   - Set task priority (High, Medium, Low).
   - Set task status (Pending, Completed).
   - Add due dates to tasks.
   - Search and filter tasks by title and user.

3. **Dashboard**:
   - Summarize tasks (total tasks, pending, completed).
   - Filter tasks by user.
   - View all tasks with user details.

4. **UI/UX Enhancements**:
   - Responsive design using Bootstrap.
   - Display task status and priority with badges.

5. **Pagination**:
   - Paginate tasks for easier navigation.

## Getting Started

### Prerequisites

Before you begin, ensure you have met the following requirements:

- **Software**:
  - XAMPP (for local development)
  - Composer
  - Node.js and npm
  - Laravel >= 8.0

- **System Requirements**:
  - PHP >= 7.4
  - A database (MySQL)

### Installation

1. **Set Up XAMPP**:

   Download and install XAMPP from [Apache Friends](https://www.apachefriends.org/index.html). Start the Apache and MySQL services from the XAMPP Control Panel.

2. **Clone the Repository**:

   ```bash
   git clone https://github.com/your-username/task-management-app.git
   cd task-management-app
   ```

3. **Install Dependencies**:

   ```bash
   composer install
   npm install
   npm run dev
   ```

4. **Environment Setup**:

   Copy the `.env.example` file to `.env` and configure your environment settings.

   ```bash
   cp .env.example .env
   ```

   Update the `.env` file with your database details:

   ```ini
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=task_management
   DB_USERNAME=root
   DB_PASSWORD=your_password
   ```

   > **Note**: Replace `your_password` with your MySQL root password. If no password is set for the MySQL root user, leave it blank.

5. **Create the Database**:

   Open your browser and go to `http://localhost/phpmyadmin`. Create a new database named `task_management`.

6. **Migrate the Database**:

   Run the migrations to set up the database tables.

   ```bash
   php artisan migrate
   ```

7. **Seed the Database**:

   Optionally, seed the database with default roles and an admin user:

   ```bash
   php artisan db:seed
   ```

8. **Running the Application**:

   Start the local development server:

   ```bash
   php artisan serve
   ```

   Your application should now be running at `http://localhost:8000`.

### Configuration

1. **Setting Up Roles**:

   Add roles (admin, customer) to your users. You can do this manually through the database or by using a seeder.

### Application Structure

- **Models**: Define your data structure and relationships.
  - `Task.php`
  - `User.php` (with role management)

- **Controllers**: Handle the request logic.
  - `TaskController.php`
  - `HomeController.php`

- **Views**: Blade templates for your application UI.
  - `resources/views/tasks` (index, create, edit, show)
  - `resources/views/dashboard.blade.php`

- **Migrations**: Database table definitions and relationships.
  - `2023_06_12_000000_create_tasks_table.php`
  - `2023_06_12_000001_add_user_id_to_tasks_table.php`
  - `2023_06_12_000002_add_role_to_users_table.php`

### Key Functionalities

1. **User Authentication**:
   - Register, login, and manage sessions.
   - Redirect users to their respective dashboards based on their roles.

2. **Task CRUD Operations**:
   - Create new tasks with title, description, status, priority, and due date.
   - View a list of tasks with filtering and search capabilities.
   - Edit existing tasks.
   - Delete tasks with confirmation.
   - Display tasks with badges indicating their status and priority.

3. **Role-Based Access**:
   - Admins have full control over all tasks.
   - Customers can only manage their own tasks.
   - Only admins can access the dashboard route.

4. **Dashboard Summary**:
   - Display total, pending, and completed tasks.
   - Include filters to view tasks by user.

5. **Responsive Design**:
   - Use Bootstrap to ensure the application is mobile-friendly and accessible on various devices.

### License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

### Acknowledgements

- Laravel Framework
- Bootstrap for responsive design
