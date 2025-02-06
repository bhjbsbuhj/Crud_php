<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List</title>
    <link rel="stylesheet" type="text/css" href="interface.css">
</head>
<body>

<div class="container">
    <h1>Users List</h1>

    <?php include 'config.php'; ?>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Gender</th>
            <th>DOB</th>
            <th>Address</th>
            <th>Hobbies</th>
            <th>Display Pic</th>
            <th>Action</th>
        </tr>

        <?php
        $result = $conn->query("SELECT * FROM users");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['gender']}</td>
                <td>{$row['dob']}</td>
                <td>{$row['address']}</td>
                <td>{$row['hobbies']}</td>
                <td><img src='{$row['display_pic']}' width='50'></td>
                <td>
                    <a href='view.php?id={$row['id']}'>View</a> |
                    <a href='edit.php?id={$row['id']}'>Edit</a> |
                    <a href='#' onclick='confirmDelete({$row['id']})'>Delete</a>
                </td>
            </tr>";
        }
        ?>
    </table>

    <div class="center-button">
        <a href="add.php" class="btn">Add User</a>
    </div>


<script>
function confirmDelete(id) {
    if (confirm("Are you sure you want to delete this record?")) {
        window.location = "delete.php?id=" + id;
    }
}
</script>

</body>
</html>
