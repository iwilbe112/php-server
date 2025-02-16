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

    if (!isset($_GET['id'])) {
        echo "No tutor ID provided.";
        exit();
    }

    $userid = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM reg WHERE login_id = '$userid'");

    if (!$result) {
        echo "Error retrieving tutor details: " . mysqli_error($conn);
        exit();
    }

    $row = mysqli_fetch_assoc($result);

    if (!$row) {
        echo "Tutor not found.";
        exit();
    }

    $nick_name = htmlspecialchars($row['nick_name']);
    $email = htmlspecialchars($row['email']);
    $age = htmlspecialchars($row['age']);
    $gender = htmlspecialchars($row['gender']);
    $profile_image = htmlspecialchars($row['profile_image']);
    $expertise_area = htmlspecialchars($row['expertise_area']);
    $description = htmlspecialchars($row['description']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutor Details</title>
</head>
<body>
    <h2>Tutor Details</h2>
    <p><strong>Nick Name:</strong> <?php echo $nick_name; ?></p>
    <p><strong>Email:</strong> <?php echo $email; ?></p>
    <p><strong>Age:</strong> <?php echo $age; ?></p>
    <p><strong>Gender:</strong> <?php echo $gender; ?></p>
    <p><strong> Subject: </strong> <?php echo $expertise_area; ?> </p>
    <p><strong> Description: </strong> <?php echo $description; ?> </p>
    <img src="images/<?php echo $profile_image; ?>" alt="Profile Image" width="100" height="100">
    <br>
    <br>
    <a href="tutor_list.php">Back to List</a> <br>
    <a href="logout.php">Logout</a>
</body>
</html>