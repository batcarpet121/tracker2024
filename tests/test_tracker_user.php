<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h4>Test Tracker User</h4>
    <?php 
    require("../utils/db_utils.php");
    $conn = db_connect();

    if ($conn->connect_error == null) {
        echo "success!";
    } else {
        echo "FAILED! " . $conn->connect_error;
    }
    echo"<br>";

    $result = $conn->query("SELECT * FROM tracker_user");
    
    echo "$result";
    
    $stmt->close();
    $conn->close();
    ?>
    ?>
</body>
</html>