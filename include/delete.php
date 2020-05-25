<?php
    require_once("db.php");
    global $connecDB;
    $SearchQueryParameter = @$_GET["id"];
    if(isset($_POST["sub"])){
        if(!empty($_POST["decision"])){
            $sql = "DELETE FROM `emp_record` WHERE `ID`=$SearchQueryParameter";
            $Execute = $connecDB->query($sql);
            if($Execute){
                echo "<script>window.open('view.php?id=data is updated successfully', '_self');</script>";
            }else{
                echo "Something is wrong";
            }
        }else{
            echo "You didn't mark any decision";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
    <link rel="stylesheet" href="../css/delete.style.css">
</head>
<body>
    
    <form action="delete.php?id=<?php echo $SearchQueryParameter; ?>" method="post">
    <fieldset>
        <legend>Decision Form</legend>
        <label for="dec">Do you want to delete the row?</label><br>
        Yes<input type="radio" name="decision" value="yes" id="dec">&ensp; 
        No <input type="radio" name="decision" value="no" id="dec"><br><br> 
        <input type="submit" name="sub" value="submit">
    </fieldset>
    </form>
    
</body>
</html>



























