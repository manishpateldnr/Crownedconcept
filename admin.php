<!-- admin.php -->
<?php
session_start();

// Check if the user is not logged in, redirect to the login page
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// If logout is requested, destroy the session and redirect to the login page
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:   #e6e6ff;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-top: 50px;
        }

        nav {
            background-color: #66a3ff;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
        
            transition: background-color 0.3s;
        }

        nav ul li a:hover {
            background-color:  #40bf40;
        }
    </style>
</head>
<body>
    <h1>Welcome to the Admin Panel, <?php echo $_SESSION['username']; ?>!</h1>

    <nav>
        <ul>
            <li><a href="fetchdata.php">Show Database</a></li>
            <li><a href="admin.php?logout=true">Logout</a></li>
        </ul>
    </nav>

    <!-- Other content of your admin page goes here -->

</body>
</html>
