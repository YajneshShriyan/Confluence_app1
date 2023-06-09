<?php
    $SERVER = "localhost";
    $USERNAME = "root";
    $DATABASE = "confluence_app";
    $PASSWORD = "";

    $conn = mysqli_connect($SERVER, $USERNAME, $PASSWORD, $DATABASE);
    
    if(!$conn){
        die("Connection failed: ".mysqli_connect_error());
    }
?>