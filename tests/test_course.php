<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h4>Test Course</h4>
    <?php
    require("../php/course_ds.php");

    
    $course_obj = new course_ds($conn);

    
    $key = 1;
    $singleResult = $course_obj->selectSingle($key);
    $allResult= $course_obj->selectAll($sel_list);
    

    if ($singleResult) {
        echo "Course ID:" . $singleResult[0];
        echo "Department ID:" . $singleResult[1];
        echo "Course Title:" . $singleResult[2];
    } else {
        echo "No record found for the given key.";
    }

    // if ($allResult) {
    //     // Output or process the result as needed
    //     // echo $result;
    //     echo print_r($allResult);
    // } else {
    //     echo "No record found for the given key.";
    // }




    ?>

</body>

</html>