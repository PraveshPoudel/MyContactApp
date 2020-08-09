<?php
    include 'db.php';

    //Recciving the id value send by the edit.php file in a variable called $id.
    $id = $_POST['id'];
    $contactName = $_POST['fname'];
    $contactPhone = $_POST['contact'];

    //Generating the SQL Query inorder to update the details of that particular id which is sent by edit.php file. The new $contactName and $contactPhone are obtained from the edit.php form.
    $sql = "UPDATE names SET name='$contactName', phone = $contactPhone where id = $id";
    $result = mysqli_query($conn, $sql);
    
    if($result)
    {
        header('location:index.php');
    }
    else
    {
        echo "Error: ".$sql."<br>".mysqli_error($conn);
    }
?>