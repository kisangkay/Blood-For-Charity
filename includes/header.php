<?php
if(!isset($_SESSION["control"])) {
    include "templates/navGuest.php";
}
else {
    $user_role=$_SESSION["control"]["user_role"];


    if($user_role='Admin'){
        include "templates/navAdmin.php";
    }
    else{
        include "templates/navDonor.php";}
}
?>


<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="admin/css/bootstrap.css">

<link rel="icon" href="images/BFC.png" type="image/png" sizes="16x16">
<script src="admin/js/bootstrap.js" ></script>
<script src="admin/js/jquery.js" ></script>

<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style.css">-->




<!--    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">-->
<!--      <a class="m-1 navbar-brand p-2" href="index.php">Blood For Charity</a>-->
<!--      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">-->
<!--        <span class="navbar-toggler-icon"></span>-->
<!--      </button>-->
<!---->
<!--      <div class="collapse navbar-collapse" id="navbarsExampleDefault">-->
<!--	  <img src="images/BFC.png" type="image/png" alt="loading" height="60px" width="">-->
<!--        <ul class="navbar-nav mr-auto">-->
<!--          <li class="nav-item active">-->
<!--            <a class="nav-link" href="index.php">Home <span class="sr-only"></span></a>-->
<!--          </li>-->
<!--          <li class="nav-item">-->
<!--            <a class="nav-link" href="addstudent.php">Add Student</a>-->
<!--          </li>-->
<!--		   <li class="nav-item">-->
<!--            <a class="nav-link" href="donateform.php">Become A Donor</a>-->
<!--          </li>-->
<!--		   <li class="nav-item">-->
<!--            <a class="nav-link" href="login.php">Login</a>-->
<!--          </li>-->
<!--          <li class="nav-item">-->
<!--            <a class="nav-link" href="logout.php">Logout</a>-->
<!--          </li>-->
<!--          <li class="nav-item">-->
<!--            <a class="nav-link" href="#"></a>-->
<!--          </li>-->
<!--          -->
<!--              <!--  <li class="nav-item active">-->
<!--                    <a class="nav-link" href="data_process/signOut.php">Sign Out</a>-->
<!--                </li>-->-->
<!--          -->
<!--        </ul>-->
<!--      -->
<!--      </div>-->
<!---->
<!--    </nav>-->
