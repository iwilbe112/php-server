<?php
    require 'database.php';
    if (isset($_POST['submit'])) {
        $userid = $_POST['userid'];
        $password = $_POST['password'];
        $result = mysqli_query($conn, "SELECT * FROM reg WHERE login_id = '$userid' AND password = '$password'");
        $row = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) > 0) {
            setcookie("userid", $userid, time() + (86400 * 30), "/"); // 86400 = 1 day
            setcookie("nick_name", $row['nick_name'], time() + (86400 * 30), "/"); // 86400 = 1 day
            echo
               "<script>
                   alert('Login successful');
                   window.location.href = 'login.php';
                   </script>";
        }
        else {
            echo
            "<script>
                alert('User not found');
            </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="index.php" method="post">
        <label>userid:</label><br>
        <input type="text"  name="userid"><br>
        <label>Password:</label><br>
        <input type="password"  name="password"><br>
        <button type="submit" name="submit">Login</button>
        <a href="reg.php">Registration</a>
    </form>
</body>
</html>
