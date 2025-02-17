<?php
    require 'database.php';
    if (isset($_POST['submit'])) {
        $userid = $_POST['userid'];
        $nick_name = $_POST['nick_name'];
        $email = $_POST['email'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $password = $_POST['password'];
        $file_name = $_FILES['profile_image']['name'];
        $file_tmp = $_FILES['profile_image']['tmp_name'];
        $folder = "images/".$file_name;
        $identity = $_POST['identity'];
        $expertise_area = NULL;
        $description = NULL;


        if(move_uploaded_file($file_tmp, $folder)) {
            echo
            "<script>
                alert('Image uploaded successfully');
            </script>";
        }
        else {
            echo
            "<script>
                alert('Image upload failed');
            </script>";
        }   

        $duplicate = "SELECT * FROM reg WHERE login_id = '$userid' OR email = '$email'";
        if (mysqli_num_rows(mysqli_query($conn, $duplicate)) > 0) {
            echo
            "<script>
                alert('Please enter again !');
            </script>";
        }
        else {
            $query = "INSERT INTO reg VALUES ('$userid', '$nick_name', '$email', '$age', '$gender', '$password', 
            '$file_name', '$identity',  '$expertise_area', '$description')";
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
    <form name="regform" action="" method="post" enctype="multipart/form-data">
        <label>Userid:</label><br>
        <input type="text"  name="userid" KOd ><br>
        <label>Nick name:</label><br>
        <input type="text"  name="nick_name" required><br>
        <label>Email:</label><br>
        <input type="email"  name="email" required><br>
        <label>Age:</label><br>
        <input type="number"  name="age" required><br>
        <label>Gender:</label><br>
        <select name="gender" required>
            <option value="">Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select><br><br>
        <label>Profile Image:</label><br>   
        <input type="file" name="profile_image" required><br><br>
        <label>Register as:</label><br>
        <select name="identity" required>
            <option value="">Select identity</option>
            <option value="Student">Student</option>
            <option value="Tutor">Tutor</option>
        </select><br><br>
        <label>Password:</label><br>
        <input type="password"  name="password" required><br><br>
        <button type="submit" name="submit">Register</button>

    </form>
    

    <a href="Index.php">Return to main menu </a>
</body>
</html>
