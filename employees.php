<?php
$host = "localhost";
$user = "php_app";
$password = "1234";
$database = "sql_hr";
$conn = new mysqli($host,$user,$password,$database);
if($conn->connect_error){
    die("Conection failed: " . $conn->connect_error);
}
echo "conected";
$sql = "e.employee_id,
    e.first_name  ,
    e.last_name  ,
    m.first_name ,
 from employees e
 join employees m
	on e.reports_to = m.employee_id;";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employess</title>
</head>
<body>
    <h1>Employees</h1>
    <?php
        if($result->num_rows>0){
            echo "<ul>";
            while($row = $result->fetch_assoc()){
                //print_r($row);
                echo "<li>Employee ID: " . $row["employee_id"] . $row[first_name] "</li>";
            }
            echo "</ul>";
        }else {
            echo "No employees found";
        }
    ?>
    
</body>
</html>