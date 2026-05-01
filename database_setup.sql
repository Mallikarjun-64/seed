-- Create the database
CREATE DATABASE IF NOT EXISTS seed_inventory;
USE seed_inventory;

-- Create users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create seeds table
CREATE TABLE IF NOT EXISTS seeds (
    id INT AUTO_INCREMENT PRIMARY KEY,
    seed_name VARCHAR(100) NOT NULL,
    category VARCHAR(50),
    quantity INT DEFAULT 0,
    price DECIMAL(10, 2) DEFAULT 0.00,
    supplier VARCHAR(100),
    added_date DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert a dummy user (for testing)
-- Note: In a real app, passwords should be hashed. Using plain text here to match the current app logic.
INSERT IGNORE INTO users (username, password) VALUES ('admin', 'admin123');

-- Insert some sample seeds
INSERT IGNORE INTO seeds (seed_name, category, quantity, price, supplier, added_date) VALUES 
('Tomato Seeds', 'Vegetable', 50, 10.50, 'AgroCorp', '2026-05-01'),
('Wheat Seeds', 'Cereal', 5, 25.00, 'GreenFields', '2026-05-01');
