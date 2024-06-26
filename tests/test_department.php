<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEST department Datastore</title>
</head>
<body>
    
<?php
    require '../php/department_ds.php';

    $testDepartment = new Department_ds();

    echo '<br><br><br>Select single test<br>';
    $departmentID = 1;
    $qryResult = $testDepartment->selectSingle($departmentID);   
    print_r($qryResult);
    if ($qryResult) {
        echo '<br>';
        echo "Department ID: " . $qryResult[0] . "<br>";
        echo "Department Name: " . $qryResult[1] . "<br>";
        echo "<br>";
    } else {
        echo "No record found for the given key.";
    }

    echo '<br><br><br>Select all empty test<br>';
    $departmentSelectMult = '';
    $qryResultMult = $testDepartment->selectAll($departmentSelectMult);
    print_r($qryResultMult);
    echo "<br>";
    if($qryResultMult){
        foreach($qryResultMult as $result){
            echo "Department ID: ". $result[0]. "<br>";
            echo "Department Name: ". $result[1]. "<br>";
            echo "<br>";
        }        
        
    } else {
        echo "No Records found";
    }

    echo '<br><br><br>Select all test<br>';
    $departmentSelectField = 'dept_id, 0';
    $includedFields = array_flip(explode(", ", $departmentSelectField));

    $qryResultMult = $testDepartment->selectAll($departmentSelectField);
    print_r($qryResultMult);

    

    if($qryResultMult){
        echo "<br>";
        foreach($qryResultMult as $result){
            if(isset($includedFields['dept_id'])){
                echo 'Department ID: ' . $result[0] . '<br>';
            }
            if(isset($includedFields['dept_name'])){
                echo 'Department ID: ' . $result[1] . '<br>';
            }
            echo '<br>';
        }        
        
    } else {
        echo "No Records found";
    }


    // echo '<br><br><br>Insert test Brandons way<br>';
    // $newDept = 'AaronsDepartment';
    // $deptInsert = $testDepartment->insert($newDept);

    // echo '<br><br><br>Insert test<br>';
    // $deptInsert = array(    
    // 'dept_name' => 'Aarons Dept 2');
    // $testDepartment->insert($deptInsert);


    // echo '<br><br><br>Update test<br>';
    // $deptUpdate = array(
    // 'dept_id' => 4,
    // 'dept_name' => 'New test');
    // $testDepartment->update($deptUpdate);
    
    // echo '<br><br><br>Delete test<br>';
    // $delDept = 4;
    // $testDepartment->delete($delDept);

    
?>

</body>
</html>