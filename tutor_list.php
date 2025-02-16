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

    // Retrieve all tutors from the database
    $result = mysqli_query($conn, "SELECT * FROM reg WHERE identity = 'Tutor'");

    if (!$result) {
        echo "Error retrieving tutors: " . mysqli_error($conn);
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Tutors</title>
</head>
<body>
    <h2>List of Tutors</h2>
    <table border="2">
    <tr>
            <th>Tutor Name</th>
            <th>Details</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['nick_name']); ?></td>
            <td><a href="detail.php?id=<?php echo htmlspecialchars($row['login_id']); ?>">View</a></td>
        </tr>
        <tr>
            <td colspan="2">
                <strong>Expertise Area:</strong> <?php echo htmlspecialchars($row['expertise_area']); ?><br>
                <strong>Description:</strong> <?php echo htmlspecialchars($row['description']); ?>
            </td>
        </tr>
        <?php endwhile; ?>
    </table> 
    <br> <br>
    <a href="login.php">Return to main menu</a> <br>
    <a href="logout.php">Logout</a>
</body>
</html>