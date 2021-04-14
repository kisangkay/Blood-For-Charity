<?php
//session_start();
    require_once "includes/db_connect.php";


//    include "templates/navGuest.php";

include "templates/header.php";


//if(!isset($_SESSION["control"])) {
//    include "templates/navGuest.php";
//}
//else {
//    $user_role=$_SESSION["control"]["user_role"];
//    if($user_role='Admin'){
//        include "templates/navAdmin.php";
//    }
//    else {
//        include "templates/navDonor.php";
//    }
//}
?>

<main role="main">

    <style>
        body{
            padding-top: 55px;
            background-color: #191f24;
            color: white;
        }

    </style>

        <!--        <link href="css/style.css" rel="stylesheet" />-->
      <!-- Main jumbotron for a primary marketing message or call to action -->

    <!--<script>
        var option=
            {
                animation:true;
                delay:1000
            };
        function wrong(){
            var toastHTMLElement = document.getElementById("wrong");
            var toastElement = new bootsrap.Toast(toastHTMLElement,option);
            toastElement.show();
        }

    </script>-->




<div class="container p-3">
    <div id="caro1" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#caro1" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#caro1" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#caro1" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="admin/images/carousel/cr1.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5 style="color: black; -webkit-text-stroke: 2px black">Be A Contributor</h5>
                    <p  style="color: white; -webkit-text-stroke: 2px black">Volunteer Donations are the Biggest Source of Blood Donations</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="admin/images/carousel/cr2.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Who Can Donate Blood?</h5>
                    <p> if you are in good health, weigh at least 50 Kgs and are 17 years or older.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="admin/images/carousel/cr3.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Is It Safe To Donate Blood</h5>
                    <p>Blood donation is safe. New, sterile disposable equipment is used for each donor, so there's no risk of contracting a bloodborne infection by donating blood.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#caro1" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#caro1" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

    <div class="container" style="padding-top: 70px;padding-bottom: 5px">
        <div class="container" >
            <h2 class="" style="text-align: center;color: white">Being A Contributor</h2>

<!--            <div class="container" style="text-align: center">-->
<!--                <div class="row">-->
<!--                    <div class="col-sm" >-->
<!--                        One of three columns-->
<!--                        <img class="d-block w-50" style=""  src="admin/images/carousel/wd2.jpg" alt="">-->
<!---->
<!--                    </div>-->
<!--                    <div class="col-sm">-->
<!---->
<!--                        One of three columns-->
<!--                        <img class="d-block w-50" style=""  src="admin/images/carousel/wd2.jpg" alt="">-->
<!--                    </div>-->
<!--                    <div class="col-sm">-->
<!--                        One of three columns-->
<!--                        <img class="d-block w-50" style=""  src="admin/images/carousel/wd2.jpg" alt="">-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->


            <!-- <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
             <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>-->
        </div>
    </div>



    <br>
    <br>

      <div class="container">

        <!-- Example row of columns -->
        <div class="row">
            <div class="col-md-12">
<!--                <h2 style="text-align: center">Being A Contributor</h2>-->
                <p>During the day of your appointment, prepare yourself by drinking plenty of fluids and wearing comfortable clothes with sleeves that you can easily roll up above your elbow.
                    <br>
                    Make sure you have a list of all the prescription and over-the-counter medications you’re taking, as well as the proper forms of ID.

                    How often can you donate blood? If you donate whole blood, you need to wait 56 days between donations -- possibly longer,
                    depending on the policy of your blood bank.</p>
<!--                <p><a class="btn btn-secondary" href="#" role="button">Read More &raquo;</a></p>-->
            </div>
          <div class="">

            <h2></h2>


              <?php
              require('data_process/connection_no_notice.php');

              if (isset($_POST["sign_in"])){
                  //In this particular sign in process we need to verify a userName and password.
                  $username_entered = mysqli_real_escape_string($conn, $_POST["uName"]);
                  $password_entered = mysqli_real_escape_string($conn, $_POST["pWord"]);

                  //The  query below will look a matching userName from the users' tables. "LIMIT 1" means we just need to pick ONLY ONE row. Select all (*) records matching the condition in the WHERE close but pick only the first matching record.
                  $spot_username = "SELECT * FROM users WHERE username = '$username_entered' LIMIT 1";


                  $user_res = $conn->query($spot_username);

                  if ($user_res->num_rows > 0){ //Verifying if at least one row (num_rows or in other words number_of_rows is greater than (>) zero ) was found as a result of the select query above.

                      /***
                      This method returns a single row of result
                     **********/

                      $_SESSION["control"] = $user_res->fetch_assoc();

                      $password_stored = $_SESSION["control"]["password"];
//For comparing the user entered password with the stored hash there is also a new function:
                      if(password_verify($password_entered, $password_stored)){
                          /*
                          The password_verify function is designed to mitigate timing attacks and will work with other hash formats, not just Blowfish. It replaces the method above of having to apply crypt to the entered password ourselves for verification.
                          */

                          $spot_role="SELECT `user_role` FROM `users` WHERE username ='$username_entered' LIMIT 1";
                          $role_result =$conn->query($spot_role);
                          //$donor_variable='Donor';


                          $role_stored = $_SESSION["control"]["user_role"];

                          if($role_stored!='Donor'){
                              ?>
                              <script> location.replace("admin.php"); </script>
                              <?php
                              //header("Location: admin.php");
                              exit();
                          }
                          else{

                              ?>
                              <script> location.replace("view_your_appointment.php"); </script>
                              <?php
                              //header("Location: admin.php");
                              exit();

                          }






                      }else{

                          unset($_SESSION["control"]);
                          session_destroy();

                          //header("Location: ");
                          echo "<div class='alert alert-danger' role='alert'>Incorrect Password PLease Try Again</div>";
//                          echo '<div class="alert alert-danger" style=" position: -webkit-sticky;
//  position: sticky;
//  top: 0;
//  color: white;
//  padding: 5px;
//  background-color: #ff0014;
//  border: 3px solid #636664; " role="alert">Incorrect Password Please Try Again</div>';

                              ?>
                          <script>
                              window.alert("Incorrect Password PLease Try Again")
                          </script>

                          <?php
                          //header("Location: admin.php");
                          exit();

                      }
                  }else{
                      //header("Location: ");
                      echo '<div class="alert alert-danger" role="alert">User Not Found</div>';
                          ?>
                      <script>
                          window.alert("User Not Found Please Check your Username")
                      </script>

                      <?php

                      exit();
                  }

              }
              ?>

          </div>


		  
<!--          <div class="col-md-4">-->
<!--            <h2>Being a contributor</h2>-->
<!--            <p>Being a contributor to blood donation...</p>-->
<!--            <p><a class="btn btn-secondary" href="#" role="button">Read More &raquo;</a></p>-->
<!--          </div>-->
<!--            <div class="col-md-4">-->
<!--                <h2>Being a contributor</h2>-->
<!--                <p>Being a contributor to blood donation...</p>-->
<!--                <p><a class="btn btn-secondary" href="#" role="button">Read More &raquo;</a></p>-->
<!--            </div>-->
<!--            <div class="col-md-4">-->
<!--                <h2>Being a contributor</h2>-->
<!--                <p>Being a contributor to blood donation...</p>-->
<!--                <p><a class="btn btn-secondary" href="#" role="button">Read More &raquo;</a></p>-->
<!--            </div>-->

        </div>

        <hr>

      </div> <!-- /container -->

    <!--------------------------------------------------------------------------------->
    <!-- HERE IS THE Blog Article-->

    <div class="container">
        <!-- Example row of columns -->
        <div class="row">
            <?php

            if (isset($_GET["articleId"])){
                $articleId = $_GET["articleId"];

//    $select_art = "SELECT * FROM articles LEFT JOIN users ON (users.`userId` = articles.`article_authorId`) WHERE articleId = '$articleId' LIMIT 1";
                $select_art = "SELECT * FROM articles LEFT JOIN users ON (users.`userId` = articles.`article_authorId`) WHERE articleId = '$articleId' LIMIT 1";

                $art_res = $conn->query($select_art);

                if ($art_res->num_rows > 0){ //Verifying if at least one row (num_rows or in other words number_of_rows is greater than (>) zero ) was found as a result of the select query above.

                    $art_row = $art_res->fetch_assoc();
                    ?>
                    <div class="row">
                        <div class="col-md-8">
                            <h2><?php print $art_row["article_title"]; ?></h2>

                            <h6>Published on: <?php print date("jS F Y", $art_row["article_publication_date"]); ?> by <?php print $art_row["fullName"]; ?></h6>

                            <p><?php print $art_row["article_full_text"]; ?></p>

                        </div>
<!--                        <div class="col-md-4">-->
<!--                            <h2>Heading</h2>-->
<!--                            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>-->
<!--                            <p><a class="btn btn-success" href="#" role="button">View details &raquo;</a></p>-->
<!--                        </div>-->
                    </div>
                    <?php
                }else{
                    header("Location: ./");
                    exit();
                }
            }else{


                $select_art = "SELECT * FROM articles LEFT JOIN users ON (users.`userId` = articles.`article_authorId`)";

                $art_res = $conn->query($select_art);


                if ($art_res->num_rows > 0){ //Verifying if at least one row (num_rows or in other words number_of_rows is greater than (>) zero ) was found as a result of the select query above.

                    while($art_row = $art_res->fetch_assoc()){


                        ?>
                        <div class="col-md-4">
                            <h2><?php print $art_row["article_title"]; ?></h2>

                            <h6>Published on: <?php print date("jS F Y", $art_row["article_publication_date"]); ?> by <?php print $art_row["fullName"]; ?></h6>

                            <?php
                            $max_words = 20;
                            $art_fullText = addslashes($art_row["article_full_text"]);

                            $shown_string = implode(' ', array_slice(str_word_count(addslashes($art_fullText), 2), 0, $max_words)) . ' ... ' ; //converting the full text into an array storing all words, then slicing the array at the maximum number of words determined by $max_words
                            ?>

                            <p><?php print $shown_string; //Print the sliced array ?></p>

                            <p><a class="btn btn-success" href="view_art.php?articleId=<?php print $art_row["articleId"]; ?>" role="button">Read more</a></p>
                        </div>
                        <?php
                    }
                }else{
                    echo 'No data';
                }

            }
            ?>
        </div>

        <hr />
        <hr />

    </div> <!-- /container -->
    <!-------------------------------------------------->

</main>


<?php
	include "templates/footer.php";
?>
