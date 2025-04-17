<?php
    require 'database.php';
    if (isset($_POST['submit'])) {
        $userid = $_POST['userid'];
        $password = $_POST['password'];

        // Use prepared statements to prevent SQL Injection (milestone 2/3)
        $stmt = $conn->prepare("SELECT * FROM reg WHERE login_id = ?");
        $stmt->bind_param("s", $userid);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($row) {
            // Verify the entered password with the hashed password in the database(milestone 2/3)
            if (password_verify($password, $row['password'])) {
                // set htmlspecialchars to prevent XSS (milestone 2/3)
                setcookie("userid", htmlspecialchars($userid, ENT_QUOTES, 'UTF-8'), time() + (86400 * 30), "/");
                setcookie("nick_name", htmlspecialchars($row['nick_name'], ENT_QUOTES, 'UTF-8'), time() + (86400 * 30), "/");
                echo
                "<script>
                    alert('Login successful');
                    window.location.href = 'login.php';
                </script>";
            } else {
                echo
                "<script>
                    alert('Incorrect password');
                </script>";
            }
        } else {
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
        <input type="text" name="userid" required><br>
        <label>Password:</label><br>
        <input type="password" name="password" required><br>
        <button type="submit" name="submit">Login</button>
        <a href="reg.php">Registration</a>
    </form>
</body>
</html>
