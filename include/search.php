<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEARCH</title>
    <link rel="stylesheet" href="../css/search.style.css">
</head>
<body>
    <form action="search.php" method="post">
    <fieldset>
    <legend>SEARCH FORM</legend>
    <label for="sr">Search</label><br>
    <input type="number" name="search" id="sr"><br><br>
    <input type="submit" value="submit" name="sub">
    </fieldset>
    </form>
    <?php 
require_once("db.php");
global $connecDB;

if(isset($_POST["sub"])){

    if(!empty($_POST["search"])){
        $SearchId = $_POST["search"];
        $sql = "SELECT `emp_name`, `ssn`, `department`, `salary`, `comment` 
        FROM `emp_record` WHERE `ID` = $SearchId";
        $stmt = $connecDB->query($sql);
        $data = $stmt->fetch();
        $empnm = $data["emp_name"];
        $ssn = $data["ssn"];
        $dep = $data["department"];
        $sal = $data["salary"];
        $cmnt = $data["comment"];
    ?>
<table border="1" align="center" width=1000>
    <tr>
        <th>Parameter</th>
        <th>Data</th>
    </tr>
    <tr>
        <td>Employee Name</td>
        <td><?php echo $empnm; ?></td>
    </tr>
    <tr>
        <td>Social Serial Number</td>
        <td><?php echo $ssn; ?></td>
    </tr>
    <tr>
        <td>Department</td>
        <td><?php echo $dep; ?></td>
    </tr>
    <tr>
        <td>Salary</td>
        <td><?php echo $sal; ?></td>
    </tr>
    <tr>
        <td>Comment</td>
        <td><?php echo $cmnt; ?></td>
    </tr>
    </table>
    <?php
    }else{
        echo "Search box is blank";
    }
}
?>
    
</body>
</html>