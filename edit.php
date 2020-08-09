<!DOCTYPE html>
<html lang="en">
<!-- This file is made only for editing the value and sending the edited value to the 'update.php' file. This file doesnot update the value but it helps editing. -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<meta http-equiv="X-UA-Compatible" content="ie=edge"> -->
    <link rel="stylesheet" href="feel.css">
    <title>Pravesh Contact Application</title>
</head>
<body>
    <h1> Pravesh Contact Application. </h1>
    <h2> Update Contacts. </h2>
    <?php
        include 'db.php';
        //Recciving the id value send by the index.php file in a variable called $id.
        $id = $_GET['id'];
        //This Query is generated in order to display the name and contanct number of that particurlar id that the user wants to update.  It displays the name and contact numbr on the text and number feild respectively.
        $sql = "SELECT * FROM names where id = $id";
        $result = mysqli_query($conn, $sql);
        if($result)
        {
            //Here the mysqli_fetch_assoc() is not inside the while loop because there is only one value inside the $result variable that the user wants to update at a time.  Although it has only one value it is to be store as assosiative array because it contains different values fo id, name and contact.
            $row = mysqli_fetch_assoc($result);
            $contactName = $row['name'];
            $contactPhone = $row['phone'];

        }
        else
        {
            echo "Error: ".$sql."<br>".mysqli_error($conn);
        }

    ?>

    <!-- Creating the form to enter the updated value and to transfer the field's data to the 'update.php' file. -->
    <form action="update.php" method="post">
        <div class="main">
            <label for="fname">Name: </label>
            <input type="text" name="fname" id="fname" value = "<?php global $contactName; echo $contactName?>" required> <!-- Here the default value inside the text feild is the current contanct name of that partucular contact id that the user wants to update.-->
            <br><br>
            <label for="contact">Phone No: </label>
            <input type="number" name="contact" id="contact" value = "<?php global $contactPhone; echo $contactPhone?>" required> <!-- Here the default value inside the text feild is the current contanct number of that partucular contact id that the user wants to update.-->
            <br><br>
            <input type="hidden" name="id" id="id" value="<?php global $id; echo $id?>" required> <!-- A Hidden input type is made which is not shown in the webpage. It is made in order to store the 'id' of that contanct name and number that the user wants to update. This 'id' is sent by the index.php file and in this file it is already stored above in a $id varable. This is passed into the update.php file as action = "update.php" so that the query can be generated to update the value of that partucular id.  -->
            <input type="submit" value="Update">
        </div>
    </form>

    
</body>
</html>