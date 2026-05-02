<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>About - Seed Inventory Management System</title>

    <style>
        body {
            min-height: 100vh;
            margin: 0;
            padding-top: 0 !important;
            font-family: Arial, sans-serif;
            background: url('https://images.stockcake.com/public/3/0/b/30b611d8-ff74-4d5c-aedf-78972c953265_large/hands-holding-seeds-stockcake.jpg') no-repeat center center/cover;
            background-attachment: fixed;
        }

        .overlay {
            min-height: 100vh;
            background: rgba(0, 0, 0, 0.6);
            padding-top: 80px;
        }

        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #2ecc71;
            margin-bottom: 20px;
        }

        .section {
            background: rgba(255, 255, 255, 0.95);
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0,0,0,0.2);
        }

        h2 {
            color: #27ae60;
            margin-bottom: 10px;
        }

        p {
            line-height: 1.6;
        }

        ul {
            margin-left: 20px;
        }

        li {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
<?php include 'navbar.php'; ?>

<div class="overlay">
    <div class="container">
        <h1>About Seed Inventory Management System</h1>
        <!-- Content remains the same -->

    <!-- Introduction -->
    <div class="section">
        <h2>Introduction</h2>
        <p>
            The Seed Inventory Management System is a web-based application designed to manage and organize 
            different varieties of seeds efficiently. It helps in maintaining records of seed stock, 
            tracking availability, and managing inventory in an easy and systematic way.
        </p>
    </div>

    <!-- Objective -->
    <div class="section">
        <h2>Objective</h2>
        <p>
            The main objective of this system is to reduce manual work and provide a simple and effective 
            way to manage seed inventory. It helps users to store, update, and retrieve seed information easily.
        </p>
    </div>

    <!-- Features -->
    <div class="section">
        <h2>Features</h2>
        <ul>
            <li>Add and manage seed details</li>
            <li>Track available stock</li>
            <li>Update and delete seed records</li>
            <li>View all seeds in a structured format</li>
            <li>Simple and user-friendly interface</li>
        </ul>
    </div>

    <!-- Advantages -->
    <div class="section">
        <h2>Advantages</h2>
        <ul>
            <li>Reduces manual work</li>
            <li>Saves time and effort</li>
            <li>Improves accuracy</li>
            <li>Easy to use and maintain</li>
        </ul>
    </div>

    <!-- Technology -->
    <div class="section">
        <h2>Technology Used</h2>
        <ul>
            <li>Frontend: HTML, CSS</li>
            <li>Backend: PHP</li>
            <li>Database: MySQL</li>
        </ul>
    </div>

    <!-- Team -->
    <div class="section">
        <h2>Team Members</h2>
        <ul>
            <li>Shrushti Chikkorde</li>
            <li>Neekita Patil</li>
            <li>Anjali Kabadgi</li>
        </ul>
    </div>

</div>

</div>

</body>
</html>