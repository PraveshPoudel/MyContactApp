<?php
    //Here $_REQUEST variable can contain or accepts the contents of both $_GET, $_POST and $_COOKIE. Thefore we have to check the method sent by the HTML form is 'post' or not.
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $person_name = $_REQUEST["fname"];
        $person_contact = $_REQUEST["contact"];

        if(empty($person_name) && empty($person_contact))
        {
            echo "Invalid Input, Both Name and Phone number are empty. <br>";
        }
        elseif(empty($person_name))
        {
            echo "The Name feild is empty. Plese enter the name. <br>";
        }
        elseif(empty($person_contact))
        {
            echo "The Phone Number is empty. Please enter the phone number. <br>";
        }
        else
        {
            ////echo "welcome $person_name <br>";
            ////echo "Your contact number is $person_contact <br>";

            //Including the Database connection PHP file that connects to the database. That meeans after including this we can use everything inside the file db.php into this file.
            include 'db.php';

            //Preparing the query that inserts the user entered value into the databse.
            $sql = "INSERT INTO names(name,phone)VALUES('$person_name','$person_contact')";
            
            //Running the query first by checking the connection and then inserting the value.
            $result = mysqli_query($conn, $sql);

            //Checking whether the query executed or not. If yes then the result valule already true set vayeko huna parxa.
            if($result)
            {
                ////echo "New record Created Successfully.";
                header('Location:index.php'); //index the location of the webpage to the 'index.php'
            }
            else
            {
                echo "Error: ".$sql."<br>".mysqli_error($conn);
            }

        }

    }
    else
    {
        echo "Programming error, The method in HTML form is get. It is not secure. Please change it into post otherwise the program will not accept it. <br>";
    }

?>