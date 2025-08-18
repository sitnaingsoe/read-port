<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    body{
        font-family: Arial, sans-serif;
    }
   
    nav {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background-color: #2c3e50;
        padding: 10px 20px;
        color: white;
        position: sticky;
        width: 100%;
        top: 0;
        
    }
    .logo {
        display: flex;
        align-items: center;
        font-size: 20px;
        font-weight: bold;
    }
    .logo i {
        margin-right: 8px;
        color: #f1c40f;
    }
    .nav-links {
        display: flex;
        list-style: none;
        position: relative;
    }
    .nav-links li {
        margin: 0 15px;
        position: relative;
        margin-left: 90px;
        text-align: center;
    }
    .nav-links a {
        color: white;
        text-decoration: none;
        font-size: 16px;
        padding: 8px;
        display: block;
    }
    .nav-links li:hover > a {
        background-color: #34495e;
        border-radius: 4px;
    }

    /* Dropdown Menu */
    .dropdown {
        display: none;
        position: absolute;
        top: 35px;
        
        background-color: #34495e;
        min-width: 150px;
        border-radius: 4px;
        overflow: hidden;
        z-index: 10;
    }
    .dropdown a {
        padding: 10px;
        font-size: 14px;
    }
    .dropdown a:hover {
        background-color: #2c3e50;
    }
    .nav-links li:hover .dropdown {
        display: block;
    }

    /* Sign In / Sign Up */
    .auth-buttons {
        margin-left: 20px;
    }
    .auth-buttons a {
        background-color: #f1c40f;
        color: #2c3e50;
        padding: 8px 15px;
        border-radius: 4px;
        text-decoration: none;
        font-weight: bold;
        transition: background 0.3s;
    }
    .auth-buttons a:hover {
        background-color: #d4ac0d;
    }
</style>
<body>
    <nav class="navbar">
    <!-- Logo -->
    <div class="logo">
        <i class="fa-solid fa-book-open"></i> ReadPort &nbsp; <i class="fa-solid fa-book-open"></i>
    </div>

    <!-- Nav Items -->
    <ul class="nav-links">
        <li><a href="home.html">Home</a></li>
        <li>
            <a href="#">Books ▾</a>
            <div class="dropdown">
                <a href="detailPage.php">Romance</a>
                <a href="#">Horror</a>
                <a href="#">Fiction</a>
                <a href="#">Comedy</a>
                <a href="#">Premium</a>
            </div>
        </li>
        <li><a href="#">Contact Us</a></li>
        <li><a href="#">About Us</a></li>
    </ul>

    <!-- Sign In / Sign Up -->
    <div class="auth-buttons">
        <a href="#">Sign In</a>
        <a href="#">Sign Up</a>
    </div>
</nav>


</body>
</html>