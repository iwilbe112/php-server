<?php
    require 'database.php';

    if(!isset($_COOKIE['userid']) || !isset($_COOKIE['nick_name'])) {
        echo
        "<script>
            alert('Please login first');
            window.location.href = 'index.php';
        </script>";
        exit();
    }

    $userid = $_COOKIE['userid'];
    $result = mysqli_query($conn, "SELECT * FROM reg WHERE login_id = '$userid'");
    $row = mysqli_fetch_assoc($result);
    $nick_name = htmlspecialchars($row['nick_name']);
    $email = htmlspecialchars($row['email']);
    $age = htmlspecialchars($row['age']);
    $gender = htmlspecialchars($row['gender']);
    $identity = htmlspecialchars($row['identity']);
    $profile_image = htmlspecialchars($row['profile_image']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Welcome, <?php echo $identity;?> <?php echo $nick_name; ?>!</h2>
    <p><strong>Email:</strong> <?php echo $email; ?></p>
    <p><strong>Age:</strong> <?php echo $age; ?></p>
    <p><strong>Gender:</strong> <?php echo $gender; ?></p>
    <img src="images/<?php echo $profile_image; ?>" alt="Profile Image" width="100" height="100">
    <br>
    <a href="logout.php">Logout</a>
</body>
</html>
