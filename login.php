<?php
session_start();
include 'db_connect.php';

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $u = $_POST['username'];
    $p = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username=? AND password=?");
    $stmt->bind_param("ss", $u, $p);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows > 0) {
        $_SESSION['user'] = $u;
        header("Location: homepage11.php");
        exit();
    } else {
        $error = "Invalid username or password!";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Seed Inventory Login</title>

<style>
body{
  margin:0;
  font-family:Arial;
  background:url('https://www.taropumps.com/media/2538/type-of-seeds-2.jpg') center/cover no-repeat;
}

/* Full screen container */
.container{
  height:100vh;
  width:100%;
  background:rgba(0,0,0,0.6);

  display:flex;
  justify-content:center;
  align-items:center;
}

/* Inner login form */
.form{
  width:320px;
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

/* Inputs */
input{
  width:100%;
  padding:12px;
  margin:10px 0;
  box-sizing:border-box;
  border: 1px solid #ddd;
  border-radius: 6px;
}

/* Password box */
.pass{
  position:relative;
}

.pass input{
  padding-right:35px;
}

/* Eye icon */
.eye{
  position:absolute;
  right:10px;
  top:50%;
  transform:translateY(-50%);
  cursor:pointer;
  color: #666;
}

/* Button */
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

.error {
    color: red;
    margin-bottom: 10px;
    font-size: 14px;
}
</style>

</head>
<?php include 'navbar.php'; ?>
<body>

<div class="container">
  <div class="form">

    <h2>Login</h2>

    <?php if($error) echo "<p class='error'>$error</p>"; ?>

    <form method="POST">
      <input type="text" name="username" placeholder="Username" required>

      <div class="pass">
        <input type="password" id="p" name="password" placeholder="Password" required>
        <span class="eye" onclick="document.getElementById('p').type=document.getElementById('p').type==='password'?'text':'password'">👁</span>
      </div>

      <button type="submit">Login</button>
    </form>

  </div>
</div>

</body>
</html>
