<!DOCTYPE html>
<html>
<head>
    <title>Seed Inventory Management System</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            height: 100vh;
            background: url(https://images.stockcake.com/public/3/0/b/30b611d8-ff74-4d5c-aedf-78972c953265_large/hands-holding-seeds-stockcake.jpg) no-repeat center center/cover;
        }

        /* Overlay effect */
        .overlay {
            height: 100%;
            width: 100%;
            background: rgba(0, 0, 0, 0.6);
        }

        /* Navbar */
        .navbar {
            display: flex;
            justify-content: space-between;
            padding: 15px 50px;
            background: rgba(0, 0, 0, 0.7);
        }

        .navbar h1 {
            color: #2ecc71;
        }

        .navbar ul {
            list-style: none;
            display: flex;
        }

        .navbar ul li {
            margin-left: 20px;
        }

        .navbar ul li a {
            color: white;
            text-decoration: none;
            font-size: 18px;
        }

        .navbar ul li a:hover {
            color: #2ecc71;
        }

        /* Center Content */
        .content {
            text-align: center;
            color: white;
            position: relative;
            top: 35%;
        }

        .content h2 {
            font-size: 45px;
            margin-bottom: 20px;
        }

        .content p {
            font-size: 20px;
            margin-bottom: 30px;
        }

        .btn {
            padding: 12px 25px;
            background: #2ecc71;
            color: white;
            border: none;
            font-size: 18px;
            cursor: pointer;
            border-radius: 5px;
        }

        .btn:hover {
            background: #27ae60;
        }
    </style>
</head>

<?php session_start(); include 'navbar.php'; ?>
<div class="overlay">

    <!-- Main Content -->
    <div class="content">
        <h2>Seed Inventory Management System</h2>
        <p>Manage, Track and Organize Different Varieties of Seeds Efficiently</p>

        <a href="seeds1.php">
            <button class="btn">Explore Seeds</button>
        </a>
    </div>

</div>

</body>
</html>