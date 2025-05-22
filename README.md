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
  - step: "Install PHP and Composer dependencies"
    commands:
      - "composer install"

  - step: "Install frontend dependencies"
    commands:
      - "npm install"
      - "npm run dev"

  - step: "Create environment configuration"
    commands:
      - "cp .env.example .env"
      - "php artisan key:generate"

  - step: "Configure database in .env file"
    note: "Update DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, and DB_PASSWORD according to your local setup"

  - step: "Run migrations"
    commands:
      - "php artisan migrate"

  - step: "Start the Laravel development server"
    commands:
      - "php artisan serve"
    note: "The application will be available at http://localhost:8000"
