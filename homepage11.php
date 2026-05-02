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
            padding-top: 0 !important;
            background: url(https://images.stockcake.com/public/3/0/b/30b611d8-ff74-4d5c-aedf-78972c953265_large/hands-holding-seeds-stockcake.jpg) no-repeat center center/cover;
        }

        /* Overlay effect */
        .overlay {
            min-height: 100vh;
            width: 100%;
            background: rgba(0, 0, 0, 0.6);
            padding-top: 80px;
        }

        /* Center Content */
        .content {
            text-align: center;
            color: white;
            padding-top: 20vh;
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
            text-decoration: none;
            display: inline-block;
        }

        .btn:hover {
            background: #27ae60;
        }
    </style>
</head>
<body>

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
