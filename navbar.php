<style>
    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px 25px;
        background: rgba(0, 0, 0, 0.9);
        width: 100%;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 1000;
        box-sizing: border-box;
    }

    .navbar h1 {
        color: #2ecc71;
        margin: 0;
        font-size: 22px;
        white-space: nowrap;
    }

    .navbar ul {
        list-style: none;
        display: flex;
        flex-wrap: wrap;
        margin: 0;
        padding: 0;
        align-items: center;
    }

    .navbar ul li {
        margin-left: 15px;
    }

    .navbar ul li a {
        color: white;
        text-decoration: none;
        font-size: 16px;
        transition: 0.3s;
        white-space: nowrap;
    }

    .navbar ul li a:hover {
        color: #2ecc71;
    }

    /* Padding for page content since navbar is fixed */
    body {
        padding-top: 60px;
    }
</style>

<div class="navbar">
    <a href="homepage11.php" style="text-decoration: none;"><h1>🌱 Seed Inventory</h1></a>
    <ul>
        <li><a href="homepage11.php">Home</a></li>
        <?php if (isset($_SESSION['user'])): ?>
            <li><a href="addseed1.php">Add Seed</a></li>
            <li><a href="seeds1.php">Explore</a></li>
            <li><a href="logout.php">Logout (<?php echo htmlspecialchars($_SESSION['user']); ?>)</a></li>
        <?php else: ?>
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
        <?php endif; ?>
        <li><a href="aboutsection.php">About</a></li>
        <li><a href="contact1.php">Contact</a></li>
    </ul>
</div>
