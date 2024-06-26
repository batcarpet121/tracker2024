<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Add Course</title>
    <style>
        .addForm {
            padding: 10px 0;
            font-size: larger;
        }
        #sideBar p {
            font-size: larger;
        }

    </style>
</head>

<body>
    <header>
        <div id="title">
            <h1>Tracker2024</h1>
        </div>
        <div id="nav">
            <a href="../index.html">Home</a>
            <a href="../html/course_form.html">Course Form</a>
            <a href="../html/view.html">View</a>
        </div>
        <input id="SearchBar" type="text" placeholder="Search...">
    </header>

    <div class="container">
        <div id="sideBar">
            <h2>
                Deparments
            </h2>
            <p>
                <?php 
                    require("../php/department_ds.php");

                    $department = new Department_ds();

                    $departmentSelectMult = '';
                    $qryResultMult = $department->selectAll($departmentSelectMult);
                    if($qryResultMult){
                        foreach($qryResultMult as $result){
                            echo $result[0]. ". ". $result[1]. "<br>";
                        }
                    }
                ?>
            </p>
        </div>

        <div id="mainContent">
            <h2>
                Main Content
            </h2>
            <div class="formWrapper">
                <form action="" id="addDeptform" method="POST">
                    <div class="addForm">
                        <label for="Dept_Title">Enter Department Title:</label>
                        <input type="text" id="Dept_Title" name="Dept_Title" placeholder="Enter the Department Title" required>
                    </div>
                    <div class="SubmitButton">
                        <button type="submit">Add Department</button>
                    </div>
                </form>
                <?php 
                    if($_SERVER["REQUEST_METHOD"] == "POST"){
                        $title = $_POST['Dept_Title'];
                        
                        $inserting =$department->insert(['dept_name' => $title]);

                        if($inserting){
                            echo("Successful insert");
                        }
                        else{
                            echo $title;
                            echo("Failed insert");
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</body>

<footer>
    <p>This is footer content</p>
</footer>

<script>

    document.getElementById("addDeptForm").addEventListener("submit", function(event){
        event.preventDefault();
        
        
    });

</script>

</html>