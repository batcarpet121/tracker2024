<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
</head>
<body>
    <h1>User Information</h1>

    <?php
    require("db_utils.php");
    $conn = db_connect();

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $user_id = 1;

    $stmt = $conn->prepare("SELECT * FROM tracker_user WHERE user_id = ?");
    $stmt->bind_param("i", $user_id); 
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<h2>User Information</h2>";
        echo "<table border='1'>";
        echo "<tr><th>User ID</th><th>Role ID</th><th>Username</th><th>Password</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["user_id"] . "</td>";
            echo "<td>" . $row["role_id"] . "</td>";
            echo "<td>" . $row["username"] . "</td>";
            echo "<td>" . $row["password"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No user found with the provided ID.";
    }

    $stmt->close();
    $conn->close();
    ?>
</body>
</html>