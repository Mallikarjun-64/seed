<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
include "db_connect.php";

$sql = "SELECT * FROM seeds";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Seeds</title>

    <style>
        body {
            font-family: Arial;
            background: linear-gradient(to right, #dff9fb, #c7ecee);
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 50px auto;
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0px 0px 15px rgba(0,0,0,0.2);
        }

        h2 {
            text-align: center;
            color: #2c3e50;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th {
            background: #2c3e50;
            color: white;
            padding: 12px;
        }

        td {
            text-align: center;
            padding: 10px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #dff9fb;
        }

        .no-data {
            text-align: center;
            color: red;
            font-weight: bold;
            margin-top: 20px;
        }

        .btn {
            display: block;
            width: 150px;
            margin: 20px auto;
            text-align: center;
            padding: 10px;
            background: #27ae60;
            color: white;
            text-decoration: none;
            border-radius: 6px;
        }

        .btn:hover {
            background: #219150;
        }
    </style>
</head>
<?php include 'navbar.php'; ?>
<body>

<div class="container">

    <h2>Seed Inventory List</h2>

    <?php if ($result->num_rows > 0) { ?>

    <table>
        <tr>
            <th>ID</th>
            <th>Seed Name</th>
            <th>Quantity</th>
            <th>Price</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['seed_name']; ?></td>
            <td><?php echo $row['quantity']; ?></td>
            <td><?php echo $row['price']; ?></td>
        </tr>
        <?php } ?>

    </table>

    <?php } else { ?>
        <div class="no-data">No seeds found in inventory!</div>
    <?php } ?>

    <a class="btn" href="addseed1.php">Add New Seed</a>

</div>

</body>
</html>