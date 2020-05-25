<?php 
    require_once("db.php");
    if(isset($_POST["sub"])){
        if(!empty($_POST["empname"]) && !empty($_POST["ssn"])){
            $emp = $_POST["empname"];
            $ssn = $_POST["ssn"];
            $dep = $_POST["dep"];
            $sal = $_POST["sal"];
            $cmnt = $_POST["cmnt"];

            global $connecDB;
            $sql = "INSERT INTO `emp_record`(`emp_name`, `ssn`, `department`, `salary`, `comment`) 
            VALUES (:empnamE, :SSN, :departmenT, :salarY, :commenT)";

            $stmt = $connecDB->prepare($sql);
            $stmt->bindValue(':empnamE', $emp);
            $stmt->bindValue('SSN', $ssn);
            $stmt->bindValue('departmenT', $dep);
            $stmt->bindValue(':salarY', $sal);
            $stmt->bindValue(':commenT', $cmnt);

            $Execute = $stmt->execute();
            if($Execute){
                echo "Informations have been inserted";
            }else{
                echo "Not added";
            }
        }else{
            echo "Atleast Employee name and Social Security Number is required";
        }
    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>