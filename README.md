# 💇‍♀️ Beauty Salon Management System (Laravel)

This is a web-based Beauty Salon Management System developed using **Laravel** as part of a bachelor project. The application facilitates streamlined operations for parlour owners and customers, with role-based access managed by a super admin.

---

## ✨ Features

### 👤 User Roles & Access

- **Customer**: Can browse parlours and book appointments.
- **Parlour Owner (Admin)**: Registers initially as a customer. Must be verified and promoted by the Super Admin.
- **Super Admin**: Oversees user verification, role assignments, and has access to the full user list.

### 🧾 Registration & Role Management

- Parlour owners register as customers.
- Super Admin verifies and promotes them to Admin (parlour owner).
- Fully authenticated user access.

### 🏪 Parlour Management (Admin)

- Add parlour details (with form validation).
- Add, enable, or disable services dynamically.
- View appointments received by their parlour only.

### 📅 Appointment Booking (Customer)

- Register and login as customer.
- Explore parlours and available services.
- Book appointments for future dates (validated).
- View their own appointment requests and status.

### 📋 Appointment Handling (Admin)

- View pending appointment requests.
- Confirm or cancel appointments.
- Access customer contact details and associated services.

### 🛡️ Authentication & Security

- Role-based access control (RBAC).
- Authenticated route protection.
- Each admin only accesses their own parlour data.

---

## 🛠️ Tech Stack

- **Backend**: Laravel (PHP)
- **Frontend**: Blade Templates, HTML, CSS
- **Database**: MySQL
- **Authentication**: Laravel Auth
- **Validation**: Laravel Request Validation

---

## 🚀 How to Run the Project

1. Clone the repository:
   ```bash
   git clone https://github.com/borichab/beauty-salon.git
   cd beauty-salon
setup_instructions:
  - step: "Move Laravel project to XAMPP/WAMP server directory"
    instructions:
      - "Copy or clone your Laravel project into the 'htdocs' folder (XAMPP) or 'www' folder (WAMP)."
      - "Example (XAMPP on Windows): C:/xampp/htdocs/beauty-salon-laravel"

  - step: "Start XAMPP/WAMP"
    instructions:
      - "Open the XAMPP/WAMP Control Panel"
      - "Start the Apache and MySQL modules"

  - step: "Install PHP and Composer dependencies"
    commands:
      - "composer install"
    note: "Run this from the Laravel project root directory"

  - step: "Install frontend dependencies"
    commands:
      - "npm install"
      - "npm run dev"
    note: "Requires Node.js and npm installed"

  - step: "Create environment configuration"
    commands:
      - "cp .env.example .env"
      - "php artisan key:generate"

  - step: "Configure environment variables"
    instructions:
      - "Open .env file"
      - "Update DB_HOST, DB_DATABASE, DB_USERNAME, and DB_PASSWORD to match your local MySQL (XAMPP/WAMP) settings"
      - "Example:"
      - "  DB_HOST=127.0.0.1"
      - "  DB_PORT=3306"
      - "  DB_DATABASE=salon_db"
      - "  DB_USERNAME=root"
      - "  DB_PASSWORD="

  - step: "Create and migrate the database"
    commands:
      - "php artisan migrate"
    note: "Ensure the database (e.g., salon_db) is created in phpMyAdmin or MySQL before running this"

  - step: "Set folder permissions (if needed)"
    instructions:
      - "Ensure 'storage' and 'bootstrap/cache' folders are writable"
    note: "Use 'chmod -R 775 storage bootstrap/cache' on Linux/Mac if needed"

  - step: "Access the project"
    url: "http://localhost/beauty-salon-laravel/public"
    note: "You must use '/public' in the URL unless you've configured a virtual host"

  - step: "Optional - Set up virtual host (for cleaner URL)"
    instructions:
      - "Edit Apache config to map a domain (e.g., salon.test) to Laravel's /public folder"
      - "Update your hosts file: 127.0.0.1 salon.test"
      - "Restart Apache after making changes"
