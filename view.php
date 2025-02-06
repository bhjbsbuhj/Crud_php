<?php
include 'config.php';

// Get the ID from the URL parameter
$id = $_GET['id'];

// Fetch user details from the database
$result = $conn->query("SELECT * FROM users WHERE id = $id");
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View User</title>
    <link rel="stylesheet" type="text/css" href="interface.css">
</head>
<body>

<div class="container">
    <h1>User Details</h1>
    <table>
        <tr>
            <th>ID</th>
            <td><?php echo $row['id']; ?></td>
        </tr>
        <tr>
            <th>Name</th>
            <td><?php echo $row['name']; ?></td>
        </tr>
        <tr>
            <th>Gender</th>
            <td><?php echo $row['gender']; ?></td>
        </tr>
        <tr>
            <th>DOB</th>
            <td><?php echo $row['dob']; ?></td>
        </tr>
        <tr>
            <th>Address</th>
            <td><?php echo $row['address']; ?></td>
        </tr>
        <tr>
            <th>Hobbies</th>
            <td><?php echo $row['hobbies']; ?></td>
        </tr>
        <tr>
            <th>Display Pic</th>
            <td><img src="<?php echo $row['display_pic']; ?>" width="100"></td>
        </tr>
    </table>
    <div class="center-button">
        <a href="index.php" class="btn">Back to Users List</a>
    </div>
</div>

</body>
</html>
