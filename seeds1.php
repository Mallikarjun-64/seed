<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
include 'db_connect.php';
// Insert Seed Data
if(isset($_POST['submit'])){
    $seed_name = $_POST['seed_name'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $supplier = $_POST['supplier'];
    $date = $_POST['added_date'];

    $stmt = $conn->prepare("INSERT INTO seeds (seed_name, category, quantity, price, supplier, added_date) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssisss", $seed_name, $category, $quantity, $price, $supplier, $date);

    if($stmt->execute()){
        echo "<script>alert('Seed Added Successfully');</script>";
    } else {
        echo "<script>alert('Error adding seed');</script>";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Seeds Section</title>
    <style>
        body {
            font-family: Arial;
            background: #eafaf1;

            /* ✅ Added background image */
            background-image: url('https://static.vecteezy.com/system/resources/thumbnails/004/850/867/small_2x/collage-various-beans-mix-peas-agriculture-of-natural-healthy-food-for-cooking-ingredients-box-of-different-whole-grains-beans-and-legumes-seeds-lentils-and-nuts-colorful-snack-texture-background-free-photo.JPG');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .container {
            width: 85%;
            margin: auto;
        }

        h2 {
            text-align: center;
            color: #1e8449;
            margin-top: 20px;
        }

        .form-box {
            background: white;
            padding: 20px;
            margin: 20px 0;
            border-radius: 10px;
            box-shadow: 0px 0px 10px #ccc;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 6px 0;
        }

        button {
            background: #27ae60;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background: #1e8449;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #aaa;
        }

        th {
            background: #27ae60;
            color: white;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        .low-stock {
            color: red;
            font-weight: bold;
        }

        .ok-stock {
            color: green;
            font-weight: bold;
        }
    </style>
</head>
<?php include 'navbar.php'; ?>
<body>

<div class="container">

    

    <!-- FORM -->
    <div class="form-box">
        <form method="POST">

            <label>Seed Name</label>
            <input type="text" name="seed_name" required>

            <label>Category</label>
            <input type="text" name="category" required>

            <label>Quantity</label>
            <input type="number" name="quantity" required>

            <label>Price (per kg/packet)</label>
            <input type="number" step="0.01" name="price" required>

            <label>Supplier Name</label>
            <input type="text" name="supplier">

            <label>Added Date</label>
            <input type="date" name="added_date" required>

            <button type="submit" name="submit">Add Seed</button>
        </form>
    </div>

    <!-- TABLE -->
    <table>
        <tr>
            <th>ID</th>
            <th>Seed Name</th>
            <th>Category</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Supplier</th>
            <th>Date</th>
            <th>Stock Status</th>
        </tr>

        <?php
        $result = $conn->query("SELECT * FROM seeds ORDER BY id DESC");

        if ($result && $result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                $status = ($row['quantity'] <= 10) ? "Low Stock" : "OK";
                $class = ($row['quantity'] <= 10) ? "low-stock" : "ok-stock";
        ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['seed_name']; ?></td>
            <td><?php echo $row['category']; ?></td>
            <td><?php echo $row['quantity']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td><?php echo $row['supplier']; ?></td>
            <td><?php echo $row['added_date']; ?></td>
            <td class="<?php echo $class; ?>">
                <?php echo $status; ?>
            </td>
        </tr>
        <?php 
            }
        } else {
            echo "<tr><td colspan='8'>No seeds found.</td></tr>";
        }
        ?>

    </table>

</div>

</body>
</html>