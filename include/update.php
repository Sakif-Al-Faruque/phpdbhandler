<?php 
    require_once("db.php");
    global $connecDB;
    $SearchQueryParameter = $_GET["id"];

    if(isset($_POST["sub"])){
        if(!empty($_POST["empname"]) && !empty($_POST["ssn"])){
            $empnm = $_POST["empname"];
            $ssn = $_POST["ssn"];
            $dep = $_POST["dep"];
            $sal = $_POST["sal"];
            $cmnt = $_POST["cmnt"];

            $sql = "UPDATE `emp_record` 
            SET `emp_name`=:empnamE,`ssn`=:ssN,`department`=:departmenT,`salary`=:salarY,`comment`=:commenT 
            WHERE `ID`=$SearchQueryParameter";

            $stmt = $connecDB->prepare($sql);
            $stmt->bindValue(':empnamE', $empnm);
            $stmt->bindValue(':ssN', $ssn);
            $stmt->bindValue(':departmenT', $dep);
            $stmt->bindValue(':salarY', $sal);
            $stmt->bindValue(':commenT', $cmnt);

            $Execute = $stmt->execute();
            if($Execute){
                echo "<script>window.open('view.php?id=data is updated successfully', '_self');</script>";
            }else{
                echo "There is some error";
            }
        }else{
            echo "Atleast Employee name and Social Serial Number is required";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php 
        $sql = "SELECT `ID`, `emp_name`, `ssn`, `department`, `salary`, `comment` 
        FROM `emp_record` WHERE `ID`=$SearchQueryParameter";

        $qry = $connecDB->query($sql);
        $data = $qry->fetch();
        
        $empnm = $data["emp_name"];
        $ssn = $data["ssn"];
        $dep = $data["department"];
        $sal = $data["salary"];
        $cmnt = $data["comment"];
    ?>
    <form action="update.php?id=<?php echo $SearchQueryParameter; ?>" method="post">
    <fieldset>
    <legend>PHP FORM</legend>
    <span>Employee Name: </span><br>
    <input type="text" name="empname" value="<?php echo $empnm; ?>"><br><br>
    <span>Social Security Number: </span><br>
    <input type="number" name="ssn" value="<?php echo $ssn; ?>"><br><br>
    <span>Department: </span><br>
    <input type="text" name="dep" value="<?php echo $dep; ?>"><br><br>
    <span>Salary: </span><br>
    <input type="number" name="sal" value="<?php echo $sal; ?>"><br><br>
    <span>Comment: </span><br>
    <textarea name="cmnt" id="" cols="60" rows="10" value="<?php echo $cmnt; ?>"></textarea><br><br>
    <input type="submit" name="sub" value="Submit">
    </fieldset>
    </form>
    
</body>
</html>