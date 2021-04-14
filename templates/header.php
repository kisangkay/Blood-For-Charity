<link rel="icon" href="admin/images/BFC.png" type="image/png" sizes="16x16">
<?php
session_start();
if(!isset($_SESSION["control"])) {
    include "navGuest.php";
}
else {
    $user_role=$_SESSION["control"]["user_role"];


    if($user_role!='Admin'){
        include "navDonor.php";
    }
    else{
        include "navAdmin.php";}
}

?>
    <!doctype html>
<html lang="en">
  <head>

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="./admin/icons/font/bootstrap-icons.css">
      <link rel="stylesheet" href="./admin/icons/font/bootstrap-icons.json">
      <link rel="stylesheet" href="./admin/css/bootstrap.css">

      <link rel="icon" href="./admin/images/BFC.png" type="image/png" sizes="16x16">
      <script src="./admin/js/bootstrap.js" ></script>
      <script src="./admin/js/jquery.js" ></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Blood For Charity Foundation">
    <meta name="author" content="Stephen Kipkemboi">
   <title>Blood For Charity</title>


  </head>

  <body>

<!--  <video autoplay muted loop id="myVideo">-->
<!--      <source src="admin/videos/hearts.mp4" type="video/mp4">-->
<!--  </video>-->
