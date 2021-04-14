<?php
    //Importing Constants from constants.php
    require_once "constants.php";
    
    //Connection to the database
    $conn = new mysqli($server, $server_user, $user_pass, $db_name);

    //Verify the database Connection
    if($conn->connect_error){
        print "Connection Failed: <br /> " . $conn->connect_error;
    }else{
        // print "Connection Successful";
    }

?>