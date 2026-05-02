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
            min-height: 100vh;
            padding-top: 0 !important;
            background: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQfkeRupWVdyL9zC5NIKGTuL9Mn4c7IWe9jSA&s') no-repeat center center/cover;
            background-attachment: fixed;
        }

        /* Overlay */
        .overlay {
            background: rgba(0, 0, 0, 0.6);
            min-height: 100vh;
            padding: 30px;
            padding-top: 80px;
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
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }

        .member {
            background: rgba(255, 255, 255, 0.95);
            width: 280px;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            text-align: center;
            transition: transform 0.3s ease;
        }

        .member:hover {
            transform: translateY(-5px);
        }

        .member img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
            border: 3px solid #2ecc71;
        }

        .member h3 {
            color: #27ae60;
            margin-bottom: 10px;
            font-size: 22px;
        }

        .member p {
            margin: 5px 0;
            color: #444;
            font-size: 14px;
        }

        .member strong {
            color: #2c3e50;
        }
    </style>
</head>
<body>
<?php include 'navbar.php'; ?>

<div class="overlay">

    <div class="container">

        <h2>Team Members</h2>

        <div class="contact-info">

            <div class="member">
                <img src="shrusti.png" alt="Shrushti">
                <h3>Shrushti Chikkorde</h3>
                <p><strong>Address:</strong> Gokak</p>
                <p><strong>Email:</strong> chikkordeshrushti@gmail.com</p>
                <p><strong>Phone:</strong> 9876543210</p>
            </div>

              <div class="member">
                <img src="anjali.jpeg" alt="Anjali">
                <h3>Anjali Kabadagi</h3>
                <p><strong>Address:</strong> Gokak</p>
                <p><strong>Email:</strong> anjalikabadgi@gmail.com</p>
                <p><strong>Phone:</strong> 9876543212</p>
            </div>

            <div class="member">
                <img src="nikita.png" alt="Neekita">
                <h3>Neekita Patil</h3>
                <p><strong>Address:</strong> Gokak</p>
                <p><strong>Email:</strong> neekitapatil12@gmail.com</p>
                <p><strong>Phone:</strong> 9876543211</p>
            </div>

          

        </div>

    </div>

</div>

</body>
</html>