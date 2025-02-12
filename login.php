<?php
    if(!isset($_COOKIE['userid']) || !isset($_COOKIE['nick_name'])) {
        echo
        "<script>
            alert('Please login first');
            window.location.href = 'index.php';
        </script>";
        exit();
    }
    // User is logged in, proceed with the page
    echo "Welcome, " . htmlspecialchars($_COOKIE['nick_name']) . "!";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <br>
    <a href="logout.php">Logout</a>
</body>
</html>
