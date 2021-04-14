
<?php

//session_start();
    require_once "includes/db_connect.php";


include 'templates/header.php';
//if(!isset($_SESSION["control"])) {
//    include "templates/navGuest.php";
//}
//else
//    $user_role=$_SESSION["control"]["user_role"];
//    {
//    if($user_role='Admin'){
//        include "templates/navAdmin.php";
//    }
//    else {
//        include "templates/navDonor.php";
//    }
//}
?>



        <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron"  style="padding-top: 70px;">
        <div class="container">
          <h1 class="display-3">About Us!</h1>
        </div>
      </div>

      <div class="container">
        <!-- Example row of columns -->
        <div class="row">
          <div class="col-md-12">
            <h2>Our Mission</h2>
            <p>We are empowered with the mission to save lives by reaching out to voluntary donors to assist victims in need of a second chance</p>
            <p><a class="" href="#" role="button"></a></p>

            <h2>Our Vision</h2>
            <p>Our vision is to be the hope and a pillar or testimonies to victims who have had their lives saved courtesy of our incredible blood donors</p>
            <p><a class="" href="#" role="button"></a></p>

            <h2>Our Values</h2>
            <p>We are a respective entity with a team of dedicated and self driven individuals who are constantly devoting their time to be part of the life saving chain in our society everyday</p>
            <p><a class="" href="#" role="button"></a></p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <h2>History</h2>
            <p>Blood for Charity was started in 2020 with the aim of providing an online medium to be able to be a source of good hope to needy victims.<BR>
            We began with a team of 4 members in partnership with the ST Mary's hospital as our blood donation and storage center with the relevant facilities.</p>
            <p><a class="" href="#" role="button"></a></p>
          </div>
          <div class="col-md-4">
            <h2>Our Services</h2>
            <p>We provide a platform for voluntary blood donors to be reached through the internet and fit in a specific appointment day to donate blood to patients in need.</p>
            <p><a class="" href="#" role="button"></a></p>
          </div>

        </div>

        <hr />

        <hr />

      </div> <!-- /container -->
<?php
	include "templates/footer.php";
?>