<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h4>Test DB conn</h4>
    <?php
    require("db_utils.php");
    $conn = db_connect();

    if ($conn->connect_error == null) {
        echo "success!";
    } else {
        echo "FAILED! " . $conn->connect_error;
    }

    phpinfo();



    ?>

</body>

</html>