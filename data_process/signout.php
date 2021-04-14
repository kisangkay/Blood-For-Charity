<?php
	session_start();
    
	 if(isset($_SESSION["control"])){


         $session = $_SESSION["control"];
         
         unset($_SESSION["control"]);
         session_destroy();
         
		header("Location: ../");
		exit();
	 }
	 else {
	     echo "You are not signed in yet";
     }
	 ?>