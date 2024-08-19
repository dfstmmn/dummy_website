<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id']) || !isset($_SESSION['username'])) {
    // Redirect to login page if not logged in
    header("Location: index.html");
    exit();
}

// Get the session variables
$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles/dashboard.css"> 
    <link rel="stylesheet" href="styles/db-responsive.css"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arimo:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="nav-bar">
        <!-- Sidebar -->
        <ul class="sidebar">
            <li onclick=hideSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="21px" viewBox="0 -960 960 960" width="28px" fill="#000000"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg></a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">News</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">Sign in</a></li>
        </ul>
        <!-- navbar -->
        <ul>
            <li><a href="#" class="logo">Dummy</a></li>
            <li class="hideOnMobile"><a href="#">Services</a></li>
            <li class="hideOnMobile"><a href="#">About us</a></li>
            <li class="hideOnMobile"><a href="#">News</a></li>
            <li class="hideOnMobile"><a href="#">Contact</a></li>
            <li class="hideOnMobile"><a href="#" class="nav-button">Sign in</a></li>
            <li onclick=showSidebar() class="burger"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg></a></li>
        </ul>
    </nav>
    <!-- image -->
    <div class="img-container">
        <img src="assets/mypage/header.jpg" alt="Header Image">
        <div class="overlay">
            <span class="sign-in-text"><strong>Dashboard</strong></span>
        </div>
    </div>
    <!-- form body -->
    <div class="parent">
        <!-- container form -->
        <div class="container">
            <!-- Display "Login Succeed" -->
            <div id="success" class="success">
                <p>Login Succeed</p>
            </div>
            <!-- Uncomment the paragraph line to see the info of the logged user -->
             <!-- <div class="userinfo">
                <p>ID: <?php echo htmlspecialchars($user_id); ?></p>
                <p>Username: <?php echo htmlspecialchars($username); ?></p>
             </div> -->
            <!-- Button -->
            <div class="lower-container">
                <input type="submit" value="Sign out" id="signOutButton" class="sign-out-button">
            </div>
        </div>
    </div>
    <!-- footer -->
    <footer>
        <ul>
            <li>Dummy</li>
            <li>(C) Dummy.</li>
        </ul>
    </footer>
<script src="dashboard.js"></script>
</body>
</html>
