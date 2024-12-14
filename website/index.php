<?php
session_start();
require_once 'Database.php';
require_once 'user.php';

$user = new User($mysqli);

// Check if the user is logged in
$loggedIn = $user->isLoggedIn();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Explore360 - Adventure Gear & Attractions</title>
    <link rel="icon" href="img/123.ico" type="image/x-icon" />
    <link rel="stylesheet" href="style.css" />
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    /></body>
    
</head>
<body>
<div class="n1">
    <header>
        <div class="logo">
            <a href="index.php" style="text-decoration: none; color: white" title="Homepage">
                <img src="img/logom.jpg" alt="Explore360 Logo" class="logo-img" width="200" height="100" />
            </a>
        </div>
        <nav>
            <ul class="nav-menu">
                <li><a href="aboutus.html">About Us</a></li>
                <li><a href="contactus.html">Contact Us</a></li>
                <?php if ($loggedIn): ?>
                    <li><a href="#">Welcome, <?php echo htmlspecialchars($_SESSION['fullname']); ?>!</a></li>
                    <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="login.php" title="Login to your account"
              ><span class="material-icons">login</span></a
            ></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <div class="hero">
        <h1>Welcome to Explore360!</h1>
        <p class="p-welcome">Your adventure starts here. Gear up for the best outdoor experiences.</p>
    </div>

    <!-- Featured Collections Section -->
    <div class="featured-collections">
        <div class="collection">
            <h3>Outdoor Gear</h3>
            <p>Find all your adventure essentials here.</p>
            <a href="gearstore.html" class="shop-now-btn">Shop Now</a>
        </div>

        <div class="collection">
            <h3>Top Attractions</h3>
            <p>Discover the best tourist spots in South Africa.</p>
            <a href="tourist-attraction.html" class="shop-now-btn">View</a>
        </div>
    </div>

    <footer>
        <p>&copy; 2023 Explore360. All rights reserved.</p>
        <div class="contact-info">
            <p>Address: 123 Adventure Lane, Johannesburg, South Africa</p>
            <p>Phone: +27 10 123 4567</p>
        </div>
        <div class="social-media">
            <a href="#">Facebook</a>
            <a href="#">Instagram</a>
            <a href="#">Twitter</a>
        </div>
    </footer>

    <script src="app.js"></script>
    </div>
</body>
</html>
