<?php
    require 'database.php';
    if (isset($_POST['submit'])) {
        $userid = $_POST['userid'];
        $nick_name = $_POST['nick_name'];
        $email = $_POST['email'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $password = $_POST['password'];
        $duplicate = "SELECT * FROM reg WHERE login_id = '$userid' OR email = '$email'";
        if (mysqli_num_rows(mysqli_query($conn, $duplicate)) > 0) {
            echo
            "<script>
                alert('Please enter again !');
            </script>";
        }
        else {
            $query = "INSERT INTO reg VALUES ('$userid', '$nick_name', '$email', '$age', '$gender', '$password')";
            mysqli_query($conn, $query);
            echo
            "<script>
                alert('Registration successful! Redirecting to login page');
                window.location.href = 'index.php';
            </script>";
            
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <h2>Registration</h2>
    <form name="regform" action="" method="post" >
        <label>Userid:</label><br>
        <input type="text"  name="userid" KOd ><br>
        <label>Nick name:</label><br>
        <input type="text"  name="nick_name" required><br>
        <label>Email:</label><br>
        <input type="text"  name="email" required><br>
        <label>Age:</label><br>
        <input type="text"  name="age" required><br>
        <label>Gender:</label><br>
        <input type="text"  name="gender" required><br>
        <label>Password:</label><br>
        <input type="password"  name="password" required><br>
        <button type="submit" name="submit">Register</button>

    </form>
    

    <a href="Index.php">Return to main menu </a>
</body>
</html>