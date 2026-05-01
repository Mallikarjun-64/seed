<?php
session_start();
include 'db_connect.php';

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        $error = "Passwords do not match!";
    } else {
        // Check if username or email already exists
        $stmt = $conn->prepare("SELECT id FROM users WHERE username=? OR email=?");
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $res = $stmt->get_result();

        if ($res->num_rows > 0) {
            $error = "Username or Email already exists!";
        } else {
            // Insert new user
            // Note: Using plain text password as per current project logic, but hashing is recommended.
            $stmt = $conn->prepare("INSERT INTO users (email, username, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $email, $username, $password);
            
            if ($stmt->execute()) {
                $success = "Registration successful! <a href='login.php'>Login here</a>";
            } else {
                $error = "Something went wrong. Please try again.";
            }
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Seed Inventory - Register</title>

<style>
body{
  margin:0;
  font-family:Arial;
  background:url('https://www.taropumps.com/media/2538/type-of-seeds-2.jpg') center/cover no-repeat;
}

.container{
  height:100vh;
  width:100%;
  background:rgba(0,0,0,0.6);
  display:flex;
  justify-content:center;
  align-items:center;
}

.form{
  width:350px;
  text-align:center;
  background:rgba(255,255,255,0.95);
  padding:30px;
  border-radius:12px;
  box-shadow: 0 8px 32px rgba(0,0,0,0.3);
}

h2 {
    color: #27ae60;
    margin-bottom: 20px;
}

input{
  width:100%;
  padding:12px;
  margin:10px 0;
  box-sizing:border-box;
  border: 1px solid #ddd;
  border-radius: 6px;
}

button{
  width:100%;
  padding:12px;
  background:#27ae60;
  color:white;
  border:none;
  border-radius: 6px;
  cursor:pointer;
  font-size: 16px;
  font-weight: bold;
  margin-top: 10px;
}

button:hover {
    background: #219150;
}

.error { color: red; margin-bottom: 10px; font-size: 14px; }
.success { color: green; margin-bottom: 10px; font-size: 14px; }
.login-link { margin-top: 15px; font-size: 14px; }
.login-link a { color: #27ae60; text-decoration: none; font-weight: bold; }
</style>

</head>
<?php include 'navbar.php'; ?>
<body>

<div class="container">
  <div class="form">

    <h2>Create Account</h2>

    <?php 
    if($error) echo "<p class='error'>$error</p>"; 
    if($success) echo "<p class='success'>$success</p>"; 
    ?>

    <form method="POST">
      <input type="email" name="email" placeholder="Email Address" required>
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <input type="password" name="confirm_password" placeholder="Confirm Password" required>

      <button type="submit">Register</button>
    </form>

    <div class="login-link">
        Already have an account? <a href="login.php">Login</a>
    </div>

  </div>
</div>

</body>
</html>
