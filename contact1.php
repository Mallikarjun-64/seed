<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Contact Us - Seed Inventory System</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            height: 100vh;
            background: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQfkeRupWVdyL9zC5NIKGTuL9Mn4c7IWe9jSA&s') no-repeat center center/cover;
        }

        /* Overlay */
        .overlay {
            background: rgba(0, 0, 0, 0.6);
            min-height: 100vh;
            padding: 30px;
        }

        .container {
            width: 80%;
            margin: auto;
        }

        h2 {
            text-align: center;
            color: #2ecc71;
            margin-bottom: 25px;
        }

        .contact-info {
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
        }

        .member {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 8px;
            background: #f9f9f9;
        }

        .member h3 {
            color: #27ae60;
            margin-bottom: 10px;
        }

        p {
            margin: 5px 0;
        }
    </style>
</head>
<?php include 'navbar.php'; ?>
<body>

<div class="overlay">

    <div class="container">

        <h2>Contact Information</h2>

        <div class="contact-info">

            <div class="member">
                
                <p><strong>Name:</strong>Shrushti Chikkorde</p>
                <p><strong>Address:</strong>Gokak</p>
                <p><strong>Email:</strong>shrushtichikkorde@gmail.com</p>
                <p><strong>Phone:</strong> 9876543210</p>
            </div>

            <div class="member">
                
                <p><strong>Name:</strong>Neekita Patil</p>
                <p><strong>Address:</strong>Gokak</p>
                <p><strong>Email:</strong>neekitapatil12@gmail.com</p>
                <p><strong>Phone:</strong> 9876543211</p>
            </div>

            <div class="member">
               
                <p><strong>Name:</strong>Anjali Kabadgi</p>
                <p><strong>Address:</strong>Gokak</p>
                <p><strong>Email:</strong>anjalikabadgi@gmail.com</p>
                <p><strong>Phone:</strong> 9876543212</p>
            </div>

        </div>

    </div>

</div>

</body>
</html>