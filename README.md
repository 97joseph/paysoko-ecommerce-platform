# Paysoko Website
![Screenshot (6)](https://github.com/user-attachments/assets/7e3f7ac2-2ebb-4937-bd0a-287f86b25c73)


# Full-stack Developer Assessment Task

## Project Overview
This is a full-stack application built with Laravel 8 that enables users to:

1. Add and remove items from the cart (using Redis for cart storage).
2. Place an order (with orders stored in MySQL/PostgreSQL).
3. View past orders.

The project has been dockerized for ease of setup and deployment. It includes a REST API with proper error handling, tests for key features, and optional frontend styling for enhanced user experience.

---

## Features

### Backend
- **Cart Functionality**: Uses Redis to manage cart items efficiently.
- **Order Management**: Orders are stored in a relational database (MySQL or PostgreSQL).
- **API**: Provides robust endpoints with proper error handling and clear HTTP status codes.
- **Testing**: Includes comprehensive tests for all core features.

### Frontend
- **Styling**: Applied to improve navigation and user experience.
- **Frameworks**: Optional use of React or Vue.js for the frontend.

### Deployment
- Fully dockerized for easy setup and deployment.
- Version-controlled with GitHub/GitLab.
- CI/CD pipelines implemented for testing and deployment using GitHub Actions.
- Deployed to DigitalOcean with SSH as the authorization method.

### Optional Features
- User authentication-Implemented User and Admin Sessions Authentication
- Payment processing - Missing 
- Additional enhancements to improve the application- Created printable order receipts and  admin together with user dashboards


# E-Commerce System Features

## Overview
This project is an e-commerce platform with features tailored for user, guest, and admin roles. Below is a detailed list of the features implemented.

---

### Key Features

- **User, Guest, and Admin Sessions**
  - Users and admins can browse, add items to their cart, and complete checkout.
  - Guests can only view products without adding them to a cart or checking out.

- **User Authentication**
  - Secure login and registration functionality for new system users.

- **Shopping Cart and Checkout**
  - Users can select multiple items, add them to the cart, and proceed to checkout.
  - Automatic PDF receipt generation upon successful checkout.

- **Product Management**
  - Product categories and catalogs are seeded into the system for testing and demonstration.
  - Admins can add or delete products and categories through the admin dashboard.

- **Dashboards**
  - **Admin Dashboard**: Provides reports, product management, and category management tools.
  - **User Dashboard**: Allows users to view their profiles and track their orders.

- **Pre-Seeded Test Users**
  - Two roles (Admin and User) are pre-seeded for testing purposes.
  - Credentials can be found in the `DatabaseSeeder.php` file.

---

### Getting Started

1. Clone the repository:
   ```bash
   git clone <repository-url>
   cd <repository-folder>



## How to Run the Application Locally

### Prerequisites
- Docker and Docker Compose installed.
- Redis and MySQL/PostgreSQL configured within the Docker environment.
- PHP (if running outside Docker).

### Setup Steps
1. Clone the repository:
   ```bash
   git clone <repository-url>
   cd <repository-folder>
   ```

2. Start the Docker containers:
   ```bash
   docker-compose up -d
   ```

3. Install dependencies:
   ```bash
   docker-compose exec app composer install
   ```

4. Configure the environment:
   - Copy `.env.example` to `.env`:
     ```bash
     cp .env.example .env
     ```
   - Update the `.env` file with database and Redis details.

5. Run database migrations and seeders:
   ```bash
   docker-compose exec app php artisan migrate:fresh --seed
   ```

6. Create symbolic links for storage:
   ```bash
   docker-compose exec app php artisan storage:link
   ```

7. Start the application:
   - Access the application at `http://localhost`.

---

## Testing
To run tests for the application:
```bash
docker-compose exec app php artisan test
```

---

## CI/CD Pipeline and Deployment

### CI/CD Steps
1. Push changes to the repository (GitHub/GitLab).
2. GitHub Actions pipeline triggers automatically to:
   - Run tests.
   - Build Docker images.
   - Deploy to DigitalOcean.

### Deployment Steps
1. Connect to the DigitalOcean droplet via SSH.
2. Pull the latest Docker image from your container registry.
3. Run the updated containers using `docker-compose`.

---

## Commands Summary

### Docker Commands
- Start containers: `docker-compose up -d`
- Stop containers: `docker-compose down`
- Install dependencies: `docker-compose exec app composer install`
- Run migrations and seeders: `docker-compose exec app php artisan migrate:fresh --seed`
- Create storage link: `docker-compose exec app php artisan storage:link`
- Run tests: `docker-compose exec app php artisan test`

---

## Documentation
Ensure the following documentation is available:
- User guide for the application.
- CI/CD setup and configuration details.
- Deployment scripts and troubleshooting guide.

---

## Contribution
Feel free to fork the repository and create pull requests with improvements or bug fixes.




