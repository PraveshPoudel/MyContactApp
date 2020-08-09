<?php
    //This is our default hostname, username, password. Here our database name is 'contact'
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "contact";

    //Creating the database connection.
    $conn = mysqli_connect($host, $user, $pass, $dbname);

    //Checking the connection.
    if(!$conn)
    {
        die("Connection Failed: ".mysqli_connect_error());
    }

?>