# 🛞 Online Bulkitan

Online Bulkitan is a multi-tenant vulcanizing shop management and online booking platform built with Laravel. It allows customers to find vulcanizing shops, book tire repair services, and track their service requests online.

The platform is designed to support multiple vulcanizing shops (tenants) using a single system while keeping each shop's customers, bookings, services, staff, and business data logically separated.

---

## 📌 Overview

Getting a flat tire can be inconvenient, especially when a customer does not know which nearby vulcanizing shop is available.

Online Bulkitan provides a digital solution where customers can:
* Find available vulcanizing shops
* View available tire repair services
* Book a repair appointment
* Provide information about their flat tire
* Select their preferred schedule
* Monitor booking status
* Receive updates about their repair request

Meanwhile, vulcanizing shop owners can manage their own shop through a dedicated tenant environment.

---

## 🎯 Project Goals

The main objectives of Online Bulkitan are to:
* Digitize traditional vulcanizing shop operations.
* Allow customers to book tire repair services online.
* Support multiple vulcanizing shops within one platform.
* Separate tenant/shop data securely.
* Help shop owners manage bookings and services.
* Reduce customer waiting time.
* Provide customers with better visibility of their repair requests.
* Create a scalable foundation for future features such as payments, maps, notifications, and mobile applications.

---

## 🏢 Multi-Tenant Architecture

Online Bulkitan follows a multi-tenant architecture. A single application can serve multiple vulcanizing shops.

```text
                    ONLINE BULKITAN
                          │
              ┌───────────┴───────────┐
              │       Platform        │
              │       Admin           │
              └───────────┬───────────┘
                          │
       ┌──────────────────┼──────────────────┐
       │                  │                  │
       ▼                  ▼                  ▼
  Vulcanizing         Vulcanizing       Vulcanizing
     Shop A              Shop B             Shop C
     Tenant              Tenant             Tenant
       │                  │                  │
       ▼                  ▼                  ▼
 Customers            Customers          Customers
 Bookings             Bookings           Bookings
 Services             Services           Services
 Staff                Staff              Staff

```

Each vulcanizing shop operates within its own tenant context.

For example:

```text
Shop A
├── Customers
├── Services
├── Bookings
├── Staff
└── Transactions

Shop B
├── Customers
├── Services
├── Bookings
├── Staff
└── Transactions
```

Shop A should not be able to access Shop B's business data.

# 🚀 Installation

### 1. Clone the repository
```bash
git clone https://github.com/your-username/online-bulkitan.git
cd online-bulkitan
```

### 2. Install PHP dependencies
```bash
composer install
```

### 3. Install frontend dependencies
```bash
npm install
```

### 4. Create the environment file
```bash
cp .env.example .env
```
*For Windows:*
```bash
copy .env.example .env
```

### 5. Generate the application key
```bash
php artisan key:generate
```

### 6. Configure the database
Update your `.env` file:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=online_bulkitan
DB_USERNAME=root
DB_PASSWORD=
```

### 7. Run migrations
```bash
php artisan migrate
```
If the project includes seeders:
```bash
php artisan db:seed
```
*Or:*
```bash
php artisan migrate --seed
```

### 8. Build frontend assets
```bash
npm run build
```
*For development:*
```bash
npm run dev
```

### 9. Start the Laravel server
```bash
php artisan serve
```
The application will normally be available at: `http://127.0.0.1:8000`