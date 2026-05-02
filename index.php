<?php
session_start();
include 'db_connect.php';
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

/* BACKGROUND CONTROL */
$bg = "";

if($page=="home"){
    $bg = "https://images.stockcake.com/public/3/0/b/30b611d8-ff74-4d5c-aedf-78972c953265_large/hands-holding-seeds-stockcake.jpg";
}
elseif($page=="login"){
    $bg = "https://www.taropumps.com/media/2538/type-of-seeds-2.jpg";
}
elseif($page=="register"){
    $bg = "https://images.unsplash.com/photo-1501004318641-b39e6451bec6";
}
elseif($page=="about"){
    $bg = "https://images.stockcake.com/public/3/0/b/30b611d8-ff74-4d5c-aedf-78972c953265_large/hands-holding-seeds-stockcake.jpg";
}
elseif($page=="contact"){
    $bg = "https://5.imimg.com/data5/SELLER/Default/2025/8/539974394/BS/RX/HW/100641319/hybrid-vegetable-seeds-500x500.png";
}
elseif($page=="add"){
    $bg = "https://cdn.alboompro.com/653b7d2dc71f6f0001259741_654df93e415c4c0001b6b979/original_size/vegetable-seed.jpg?v=1";
}
elseif($page=="explore"){
    $bg = "https://content.jdmagicbox.com/v2/comp/beed/z1/9999p2442.2442.130730143059.z3z1/catalogue/uttam-agro-agencies-beed-seed-retailers-fx5se.jpg";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Seed Inventory Management System</title>

<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:Arial;}

body{
    min-height:100vh;
    padding-top: 0 !important;
    background:url('<?php echo $bg; ?>') no-repeat center/cover;
    background-attachment: fixed;
}

/* Overlay */
.overlay{
    min-height:100vh;
    background:rgba(0,0,0,0.6);
    padding-top: 80px;
}


/* HOME */
.content{
    text-align:center;
    color:white;
    margin-top:200px;
}
.content h2{font-size:45px;}
.content p{font-size:20px;margin:20px 0;}

.btn{
    padding:12px 25px;
    background:#2ecc71;
    color:white;
    border:none;
    border-radius:5px;
    cursor:pointer;
}
.btn:hover{background:#27ae60;}

/* FORM */
.form{
    width:320px;
    margin:100px auto;
    background:white;
    padding:20px;
    border-radius:10px;
    text-align:center;
}

input{
    width:100%;
    padding:10px;
    margin:10px 0;
}

/* PASSWORD FIELD */
.pass{
    position:relative;
}
.pass input{
    padding-right:35px;
}
.eye{
    position:absolute;
    right:10px;
    top:50%;
    transform:translateY(-50%);
    cursor:pointer;
}

/* TABLE */
table{
    width:90%;
    margin:30px auto;
    background:white;
    border-collapse:collapse;
}
th,td{padding:10px;border:1px solid #ccc;text-align:center;}
th{background:#27ae60;color:white;}

.box{
    background:white;
    padding:20px;
    width:80%;
    margin:20px auto;
    border-radius:10px;
}
</style>
</head>

<body>

<?php include 'navbar.php'; ?>
<div class="overlay">

<?php
// HOME
if($page=="home"){
?>
<div class="content">
<h2>Seed Inventory Management System</h2>
<p>Manage, Track and Organize Seeds Efficiently</p>

<a href="index.php?page=explore">
<button class="btn">Explore Seeds</button>
</a>
</div>
<?php
}

// LOGIN (UPDATED 👁)
elseif($page=="login"){
?>
<div class="form">
<h2>Login</h2>

<form method="POST">
<input type="text" name="username" placeholder="Username" required>

<div class="pass">
<input type="password" id="password" name="password" placeholder="Password" required>
<span class="eye" onclick="togglePassword()">👁</span>
</div>

<button name="login">Login</button>
</form>

<script>
function togglePassword(){
    var p = document.getElementById("password");
    if(p.type === "password"){
        p.type = "text";
    } else {
        p.type = "password";
    }
}
</script>

<?php
if(isset($_POST['login'])){
    $u = $_POST['username'];
    $p = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username=? AND password=?");
    $stmt->bind_param("ss", $u, $p);
    $stmt->execute();
    $res = $stmt->get_result();

    if($res->num_rows > 0){
        $_SESSION['user'] = $u;
        echo "<p style='color:green;'>Login Successful</p>";
    } else {
        echo "<p style='color:red;'>Invalid Login</p>";
    }
    $stmt->close();
}
?>
</div>
<?php
}

// REGISTER
elseif($page=="register"){
?>
<div class="form" style="background:rgba(255,255,255,0.95);">
<h2>Create Account</h2>

<?php
if(isset($_POST['register'])){
    $e = $_POST['email'];
    $u = $_POST['username'];
    $p = $_POST['password'];
    $cp = $_POST['confirm_password'];

    if($p !== $cp){
        echo "<p style='color:red;'>Passwords do not match!</p>";
    } else {
        $stmt = $conn->prepare("SELECT id FROM users WHERE username=? OR email=?");
        $stmt->bind_param("ss", $u, $e);
        $stmt->execute();
        if($stmt->get_result()->num_rows > 0){
            echo "<p style='color:red;'>Username or Email already exists!</p>";
        } else {
            $stmt = $conn->prepare("INSERT INTO users (email, username, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $e, $u, $p);
            if($stmt->execute()){
                echo "<p style='color:green;'>Registration successful! <a href='index.php?page=login'>Login now</a></p>";
            } else {
                echo "<p style='color:red;'>Error during registration.</p>";
            }
        }
    }
}
?>

<form method="POST">
<input type="email" name="email" placeholder="Email Address" required>
<input type="text" name="username" placeholder="Username" required>
<input type="password" name="password" placeholder="Password" required>
<input type="password" name="confirm_password" placeholder="Confirm Password" required>
<button class="btn" name="register">Register</button>
</form>
</div>
<?php
}

// ABOUT
elseif($page=="about"){
?>

<style>
.container {
    width: 80%;
    margin: auto;
    padding: 20px;
}

.container h1 {
    text-align: center;
    color: #2ecc71;
    margin-bottom: 20px;
}

.section {
    background: #ffffff;
    padding: 20px;
    margin-bottom: 20px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px #ccc;
}

.section h2 {
    color: #27ae60;
    margin-bottom: 10px;
}

.section p {
    line-height: 1.6;
}

.section ul {
    margin-left: 20px;
}

.section li {
    margin-bottom: 5px;
}
</style>

<div class="container">

    <h1>About Seed Inventory Management System</h1>

    <div class="section">
        <h2>Introduction</h2>
        <p>
            The Seed Inventory Management System is a web-based application designed to manage and organize 
            different varieties of seeds efficiently. It helps in maintaining records of seed stock, 
            tracking availability, and managing inventory in an easy and systematic way.
        </p>
    </div>

    <div class="section">
        <h2>Objective</h2>
        <p>
            The main objective of this system is to reduce manual work and provide a simple and effective 
            way to manage seed inventory. It helps users to store, update, and retrieve seed information easily.
        </p>
    </div>

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

    <div class="section">
        <h2>Advantages</h2>
        <ul>
            <li>Reduces manual work</li>
            <li>Saves time and effort</li>
            <li>Improves accuracy</li>
            <li>Easy to use and maintain</li>
        </ul>
    </div>

    <div class="section">
        <h2>Technology Used</h2>
        <ul>
            <li>Frontend: HTML, CSS</li>
            <li>Backend: PHP</li>
            <li>Database: MySQL</li>
        </ul>
    </div>

    <div class="section">
        <h2>Team Members</h2>
        <ul>
            <li>Shrushti Chikkorde</li>
            <li>Neekita Patil</li>
            <li>Anjali Kabadgi</li>
        </ul>
    </div>

</div>

<?php
}

// CONTACT
elseif($page=="contact"){
?>

<style>
.contact-header {
    background: linear-gradient(90deg, #5f63f2, #7f53ac);
    color: white;
    padding: 20px;
    text-align: center;
}

.contact-container {
    padding: 40px;
    display: flex;
    flex-wrap: wrap;
    gap: 30px;
    justify-content: center;
}

.contact-card {
    background: white;
    width: 280px;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    transition: 0.3s;
    text-align: center;
}

.contact-card:hover {
    transform: translateY(-8px);
}

.contact-card img {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    margin-bottom: 10px;
}

.contact-card h3 {
    margin: 5px 0;
}

.contact-card p {
    color: #555;
}
</style>

<div class="contact-header">
    <h1>📞 SEED INVENTORY MANAGEMENT SYSTEM</h1>
</div>

<div class="contact-container">

    <div class="contact-card">
        <img src="sara.jpg">
        <h3>Shrushti Chikkorde</h3>
        <p>Email: chikkordeshrushti@gmail.com</p>
        <p>Phone: 9000000001</p>
    </div>

    <div class="contact-card">
        <img src="bha.png">
        <h3>Neekita Patil</h3>
        <p>Email: neekitapatil@gmail.com</p>
        <p>Phone: 9000000008</p>
    </div>

    <div class="contact-card">
        <img src="ruchi.png">
        <h3>Anjali Kabadagi</h3>
        <p>Email: anjalikabadagi@gmail.com</p>
        <p>Phone: 9000000003</p>
    </div>

</div>

<?php
}
// ADD
elseif($page=="add"){
    if (!isset($_SESSION['user'])) {
        header("Location: index.php?page=login");
        exit();
    }
?>
<div class="form">
<form method="POST">
<input name="seed_name" placeholder="Seed Name">
<input name="quantity" placeholder="Quantity">
<input name="price" placeholder="Price">
<button class="btn" name="add">Add</button>
</form>

<?php
if(isset($_POST['add'])){
    $name = $_POST['seed_name'];
    $qty = $_POST['quantity'];
    $price = $_POST['price'];

    $stmt = $conn->prepare("INSERT INTO seeds (seed_name, quantity, price) VALUES (?, ?, ?)");
    $stmt->bind_param("sid", $name, $qty, $price);
    
    if($stmt->execute()){
        echo "<p style='color:green;'>Added!</p>";
    } else {
        echo "<p style='color:red;'>Error adding seed.</p>";
    }
    $stmt->close();
}
?>
</div>
<?php
}

// EXPLORE
elseif($page=="explore"){
    if (!isset($_SESSION['user'])) {
        header("Location: index.php?page=login");
        exit();
    }
?>
<h2 style="text-align:center;color:white;">Seed List</h2>

<table>
<tr><th>ID</th><th>Name</th><th>Qty</th><th>Price</th></tr>

<?php
$res = mysqli_query($conn, "SELECT * FROM seeds");
if (mysqli_num_rows($res) > 0) {
    while($row = mysqli_fetch_assoc($res)){
        echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['seed_name']}</td>
        <td>{$row['quantity']}</td>
        <td>{$row['price']}</td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='4'>No seeds found.</td></tr>";
}
?>
</table>
<?php
}
?>

</div>
</body>
</html>