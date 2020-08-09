<?php
    include 'db.php';
    //Recciving the id value send by the index.php file in a variable called $id.
    $id = $_GET['id'];
    $sql = "DELETE FROM names where id = $id";
    $result = mysqli_query($conn,$sql);
    if($result)
    {
        header('location:index.php');
    }
    else
    {
        echo "ERROR: ".$sql."<br>".mysqli_error($conn);
    }

?>