<?php

session_start();
if(!isset($_SESSION['username'])){
    echo "You are logged out";
    header('location:logins.php');
}


?>
<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .logout-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .logout-button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <h1>Welcome to the home page......</h1>
    <h2>Hello this is <?php echo $_SESSION['username']; ?></h2>
    <h2>Web Developer</h2>
    <div class="logout-container">
        <a href="logout.php" class="logout-button">Logout</a>
    </div>
</body>
</html>
