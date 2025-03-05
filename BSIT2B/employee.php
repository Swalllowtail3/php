<?php

    include 'connection.php';

    $select_sql = "SELECT * FROM employee";
    $result = $conn->query($select_sql);
    //var_dump($result);

    //insert employee
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['insert'])){
            echo "HE";
            $firstname = $_POST['fname'];
            $lastname = $_POST['lname'];
            $department = $_POST['department'];
            $salary = $_POST['salary'];

            $insert_sql = "INSERT INTO employee (first_name, last_name, department, salary)
            VALUES ('$firstname', '$lastname', '$department', '$salary')";
            $conn->query($insert_sql);
            echo "New Employee Added!<br>";
            header("location: ". $_SERVER['PHP_SELF']);
            exit();
        }

        //delete employee
        if(isset($_POST['delete'])){
            $employeeID = $_POST['employeeID'];
            $delete_sql = "DELETE FROM employee WHERE employee_id = $employeeID";
            $conn->query($delete_sql);
            echo "Employee deleted!<br>";
            header("location: ". $_SERVER['PHP_SELF']);
            exit();
        }

        //update employee
        if(isset($_POST['update'])){
            $employeeID = $_POST['employeeID'];
            $newSalary = $_POST['salary'];
            $update_sql = "UPDATE employee SET salary = $newSalary WHERE employee_id = $employeeID";
            $conn->query($update_sql);
            echo "Employee salary updated!<br>";
            header("location: ". $_SERVER['PHP_SELF']);
            exit();
        }
    }
?>

<style>
    body{
        display: flex;
        flex-direction: column;
        align-items: center;
        font-family: Arial;
    }
    input{
        width: 200px;
        height: 30px;
        margin-bottom: 4px;
    }
    button{
        background-color: skyblue;
        border: none;
        padding: 6px;
        color: white;
        border-radius: 3px;
    }
    button:active{
        opacity: 0.5;
    }
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h2>Insert employee</h2>

    <form action="" method="POST">
        <input type="text" name="fname" placeholder="first name"><br>
        <input type="text" name="lname" placeholder="last name"><br>
        <input type="text" name="department" placeholder="department"><br>
        <input type="number" name="salary" placeholder="salary"><br>
        <button type="submit" name="insert">Submit</button>
        
    </form>
    <br>

    

    <h2>Employee</h2>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>first name</th>
            <th>last name</th>
            <th>Department</th>
            <th>salary</th>
            <th>Action</th>
        </tr>
        
            <?php
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        echo "<tr>
                            <td>{$row['employee_id']}</td>
                            <td>{$row['first_name']}</td>
                            <td>{$row['last_name']}</td>
                            <td>{$row['department']}</td>
                            <td>{$row['salary']}</td>
                            <td>
                                <form method='POST' style='display:inline;'>
                                    <input type='hidden' name='employeeID' value='{$row['employee_id']}'>
                                    <button type='submit' name='delete'>delete</button>
                                </form>

                                <form method='POST' style='display:inline;'>
                                    <input type='hidden' name='employeeID' value='{$row['employee_id']}'>
                                    <input type='number' name='salary' value='{$row['salary']}'>
                                    <button type='submit' name='update'>Update</button>
                                </form>
                            </td>
                            
                        </tr>";

                    }
                }
            ?>
       
    </table>
    
</body>
</html>