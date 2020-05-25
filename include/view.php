<?php 
    require_once("db.php"); 
    global $connecDB;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1" align="center" width="1000">
        <caption>View Form Data</caption>
        <tr>
            <th>ID</th>
            <th>Employee Name</th>
            <th>Social Serial Number</th>
            <th>Department</th>
            <th>Salary</th>
            <th>Comment</th>
            <th colspan="2">Modification</th>
        </tr>
        <tr>
        <?php 
            $sql = "SELECT * FROM `emp_record` WHERE 1";
            $stmt = $connecDB->query($sql);

            while($data = $stmt->fetch()){
                $id = $data["ID"];
                $empnm = $data["emp_name"];
                $ssn = $data["ssn"];
                $dep = $data["department"];
                $sal = $data["salary"];
                $cmnt = $data["comment"];
        ?>
            <td><?php echo $id; ?></td>
            <td><?php echo $empnm; ?></td>
            <td><?php echo $ssn; ?></td>
            <td><?php echo $dep; ?></td>
            <td><?php echo $sal; ?></td>
            <td><?php echo $cmnt; ?></td>
            <td><a href="update.php?id=<?php echo $id; ?>">Update</a></td>
            <td><a href="delete.php?id=<?php echo $id; ?>">Delete</a></td>
            </tr>
            <?php } ?> 

    </table>
</body>
</html>