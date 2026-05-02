<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
include("db_connect.php");

if (isset($_POST['submit'])) {
    $seed_name = $_POST['seed_name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    $stmt = $conn->prepare("INSERT INTO seeds (seed_name, quantity, price) VALUES (?, ?, ?)");
    $stmt->bind_param("sid", $seed_name, $quantity, $price);

    if ($stmt->execute()) {
        echo "<script>alert('Seed added successfully!');</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Seeds</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            padding-top: 0 !important;
            font-family: Arial, sans-serif;
            background: url('https://media.licdn.com/dms/image/v2/C5612AQHvumAKTUVbqg/article-cover_image-shrink_720_1280/article-cover_image-shrink_720_1280/0/1623501422702?e=2147483647&v=beta&t=d0mC8IFQmGbZp71FC_M2KkUydbsNM1ZAW6ZNPQtertc') no-repeat center center/cover;
            min-height: 100vh;
            background-attachment: fixed;
        }

        .overlay {
            min-height: 100vh;
            background: rgba(0, 0, 0, 0.6);
            padding-top: 80px;
            width: 100%;
        }

        .form-container {
            width: 350px;
            margin: 50px auto;
            padding: 30px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0px 0px 10px gray;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
        }

        input {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            padding: 10px 20px;
            background-color: green;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: darkgreen;
        }
    </style>
</head>
<body>
<?php include 'navbar.php'; ?>

<div class="overlay">
<div class="form-container">
    <h2>Add Seeds</h2>

    <form method="POST">
        <input type="text" name="seed_name" placeholder="Seed Name" required><br>
        <input type="number" name="quantity" placeholder="Quantity" required><br>
        <input type="number" name="price" placeholder="Price" required><br>

        <button type="submit" name="submit">Add Seed</button>
    </form>
</div>

</div>

</body>
</html>