# 🌱 Seed Inventory Management System

A web-based application to **manage, track, and organize** different varieties of seeds efficiently. Built with PHP, MySQL, HTML, and CSS — designed to run on XAMPP.

---

## 📋 Table of Contents

- [About](#about)
- [Features](#features)
- [Tech Stack](#tech-stack)
- [Project Structure](#project-structure)
- [Database Schema](#database-schema)
- [Prerequisites](#prerequisites)
- [Installation & Setup](#installation--setup)
- [Default Credentials](#default-credentials)
- [Screenshots / Pages](#screenshots--pages)
- [Team Members](#team-members)
- [License](#license)

---

## About

The Seed Inventory Management System helps agricultural businesses and individuals maintain organized records of seed stock — including names, categories, quantities, prices, suppliers, and dates. It replaces manual record-keeping with a simple, browser-based interface.

### 🌟 Recent Updates (UI/UX Polish)
- **Unified Aesthetic:** Standardized background overlays and spacing across all pages for a professional, seamless experience.
- **Navbar Optimization:** Fixed menu item overflow to ensure all navigation links remain visible on smaller viewports.
- **Improved About/Add Pages:** Integrated themed backgrounds and polished card layouts for better visual engagement.

---

## Features

| Feature | Description |
|---|---|
| **User Registration** | Create accounts with email, username, and password |
| **User Login** | Session-based authentication with password visibility toggle (👁) |
| **Add Seeds** | Add new seed entries (name, quantity, price) — *login required* |
| **Explore Seeds** | View all seeds in a detailed table with category, supplier, date, and **stock status alerts** (Low Stock / OK) — *login required* |
| **About Page** | Project introduction, objectives, advantages, and technology info |
| **Contact Page** | Team member contact cards with names, emails, and phone numbers |
| **Standardized UI** | Consistent premium aesthetic with **dark overlays**, seed-themed background images, and glassmorphism-inspired cards across all pages |
| **Responsive Navbar** | Fixed navigation bar with optimized spacing to ensure all links (including "Contact") are visible; adapts based on login state |
| **Session Protection** | Protected pages (`addseed1.php`, `seeds1.php`, `explore_seeds.php`) redirect unauthenticated users to login |

---

## Tech Stack

| Layer | Technology |
|---|---|
| **Frontend** | HTML5, CSS3, JavaScript |
| **Backend** | PHP (procedural + prepared statements) |
| **Database** | MySQL |
| **Server** | XAMPP (Apache + MySQL) |

---

## Project Structure

```
seed_inventory/
│
├── index.php              # Single-page app (SPA-style) — routes via ?page= parameter
│                           #   home, login, register, about, contact, add, explore
│
├── homepage11.php          # Standalone homepage with hero section
├── login.php               # Standalone login page with password toggle
├── register.php            # Standalone registration page (email, username, password)
├── logout.php              # Destroys session and redirects to homepage
│
├── addseed1.php            # Add seed form (name, quantity, price) — protected
├── seeds1.php              # Full seed management: add form + inventory table with
│                           #   category, supplier, date, stock status — protected
├── explore_seeds.php       # Read-only seed inventory list — protected
│
├── aboutsection.php        # About page (introduction, objectives, features, team)
├── contact1.php            # Contact page with team member details
│
├── navbar.php              # Shared navigation bar component (included in all pages)
├── db_connect.php          # MySQL database connection (mysqli)
├── database_setup.sql      # SQL schema: creates database, tables, and sample data
│
└── README.md               # This file
```

---

## Database Schema

### Database: `seed_inventory`

#### `users` table

| Column | Type | Notes |
|---|---|---|
| `id` | INT (PK, AUTO_INCREMENT) | |
| `username` | VARCHAR(50) | UNIQUE, NOT NULL |
| `email` | VARCHAR(100) | UNIQUE, NOT NULL |
| `password` | VARCHAR(255) | NOT NULL (stored as plain text) |
| `created_at` | TIMESTAMP | DEFAULT CURRENT_TIMESTAMP |

#### `seeds` table

| Column | Type | Notes |
|---|---|---|
| `id` | INT (PK, AUTO_INCREMENT) | |
| `seed_name` | VARCHAR(100) | NOT NULL |
| `category` | VARCHAR(50) | |
| `quantity` | INT | DEFAULT 0 |
| `price` | DECIMAL(10,2) | DEFAULT 0.00 |
| `supplier` | VARCHAR(100) | |
| `added_date` | DATE | |
| `created_at` | TIMESTAMP | DEFAULT CURRENT_TIMESTAMP |

---

## Prerequisites

- [XAMPP](https://www.apachefriends.org/) (Apache + MySQL)
- A modern web browser

---

## Installation & Setup

1. **Clone or copy** this project into your XAMPP `htdocs` directory:
   ```
   C:\xampp\htdocs\seed_inventory\
   ```

2. **Start XAMPP** — launch both **Apache** and **MySQL** from the XAMPP Control Panel.

3. **Create the database** — open [phpMyAdmin](http://localhost/phpmyadmin) and either:
   - Import `database_setup.sql` via the **Import** tab, or
   - Open the SQL tab and paste the contents of `database_setup.sql`, then click **Go**.

4. **Open the application** in your browser:
   ```
   http://localhost/seed_inventory/homepage11.php
   ```

---

## Default Credentials

A test user is inserted by the setup script:

| Username | Password |
|---|---|
| `admin` | `admin123` |

> ⚠️ **Note:** Passwords are stored in plain text in this version. For production use, implement password hashing with `password_hash()` and `password_verify()`.

---

## Screenshots / Pages

| Page | URL |
|---|---|
| **Homepage** | `homepage11.php` |
| **Login** | `login.php` |
| **Register** | `register.php` |
| **Add Seed** | `addseed1.php` *(requires login)* |
| **Explore Seeds** | `seeds1.php` *(requires login)* |
| **Seed List** | `explore_seeds.php` *(requires login)* |
| **About** | `aboutsection.php` |
| **Contact** | `contact1.php` |
| **SPA Mode** | `index.php?page=home` (also: `login`, `register`, `about`, `contact`, `add`, `explore`) |

---

## Team Members

- **Shrushti Chikkorde**
- **Neekita Patil**
- **Anjali Kabadgi**

---

## License

This project is developed for educational purposes.