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
    $expertise_area = htmlspecialchars($row['expertise_area']);
    $description = htmlspecialchars($row['description']);

    if (isset($_POST['advertise'])) {
        $expertise_area = $_POST['expertise_area'];
        $description = $_POST['description'];

        $update_query = "UPDATE reg SET expertise_area = '$expertise_area', description = '$description' WHERE login_id = '$userid'";
        mysqli_query($conn, $update_query);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main menu</title>
</head>
<body>
    <h2>Welcome, <?php echo $identity;?> <?php echo $nick_name; ?>!</h2>
    <p><strong>Email:</strong> <?php echo $email; ?></p>
    <p><strong>Age:</strong> <?php echo $age; ?></p>
    <p><strong>Gender:</strong> <?php echo $gender; ?></p>
    <img src="images/<?php echo $profile_image; ?>" alt="Profile Image" width="100" height="100">
    <?php if ($identity == 'Tutor'): ?>
        <h3>Fill in your personal information</h3>
        <form action="" method="post">
            <label>Expertise Area:</label><br>
            <input type="text" name="expertise_area" placeholder="Please enter your expertise area" 
            value="<?php echo $expertise_area; ?>"  ><br>
            <label>Description:</label><br>
            <textarea name="description" rows="4" cols="50" placeholder="Please enter your description"
            ><?php echo $description; ?></textarea>
            <button type="submit" name="advertise">Update</button>
        </form>
    <?php endif; ?>
    <br>
    <a href="tutor_list.php">Tutor List</a> <br>
    <a href="logout.php">Logout</a>
</body>
</html>
