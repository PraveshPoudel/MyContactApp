<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<meta http-equiv="X-UA-Compatible" content="ie=edge"> -->
    <link rel="stylesheet" href="feel.css">
    <title>Pravesh Contact Application</title>
</head>
<body>
    <h1> Pravesh Contact Application. </h1>
    
    <!-- Creating the form and transfering the field's data to the 'adddata.php' file. -->
    <form action="adddata.php" method="post">
        <div class="main">
            <label for="fname">Name: </label>
            <input type="text" name="fname" id="fname" required>
            <br><br>
            <label for="contact">Phone No: </label>
            <input type="number" name="contact" id="contact" required>
            <br><br>
            <input type="submit" value="Save">
        </div>
    </form>
    <hr>

    <!-- Displaying all the contents of databse in the table of the webpage. -->
    <h2> List of User Contacts. </h2>
    <table>
        <tr>
            <!-- This(<th>) is table heading. -->
            <th>ID</th>
            <th>Name</th>
            <th>PhoneNumber</th>
            <th>Actions</th>
        </tr>

        <?php
            include 'db.php';
            $sql = "SELECT * FROM names";
            $result = mysqli_query($conn, $sql);
            if($result)
            {
                // All the values is stored in the $result variable which is stored by the execution of the mysql querey. The mysqli_fetch_assoc fentch the value in the $result variable as an assosiative array and store it in a assciative array variable called $row.
                // Until it fentch all the valuse inside the $result variable and store it in a variable called $row, the loop continous.
                while($row = mysqli_fetch_assoc($result))
                {
                    //The above mysqli_query($conn, select *from names) returns all the values including all rows and column. It had been properly stored in a associative arrray such that id value is stored in the id, name is stored in the name and phone is stored as a phone. Same name as it is in database table. Therefore, we have to write the same name while calling the associative arrays.
                    $id = $row['id'];
                    $name = $row['name'];
                    $contact = $row['phone'];
                    //Below the PHP fle is closed and again started just to insert the HTML elements. These HTMl elements is added for inserting the table data i.e. id's, names's and contacts's which is derived from the database.
                    ?>
                    
                    <tr>
                        <td><?php echo $id ?> </td>
                        <td><?php echo $name ?> </td>
                        <td><?php echo $contact ?> </td>
                        <td>
                            <!-- Passing the value of id to the edit.php file. -->
                            <a href="edit.php?id=<?php echo $id?>">Update</a>
                            <!-- Passing the value of id to the delete.php file. The Id value is already obtain from the database, stored in the result, then in assosiative array row and then again in variable $id form the associative array. Before, we have used that id value stored in $id variable to print/display the data but now we are using it to delete the data.-->
                            <a href="delete.php?id=<?php echo $id?>">Delete</a>
                        </td>
                    </tr>


                    <?php //It is then started here.
                }

            }
            else
            {
                echo "Error: ".$sql."<br>".mysqli_error($conn);
            }
        ?>

    </table>

</body>
</html>