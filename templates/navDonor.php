<!---->
<!--<link rel="stylesheet" href="./admin/css/bootstrap.css">-->
<!--<link rel="icon" href="./admin/images/BFC.png" type="image/png" sizes="16x16">-->
<!--<script src="./admin/js/bootstrap.js" ></script>-->
<!--<script src="./admin/js/jquery.js" ></script>-->

<!--<nav  class="navbar navbar-expand-md navbar-dark fixed-top bg-secondary">-->
<nav  class=" navbar-expand-md navbar-dark fixed-top bg-secondary" style="padding: 5px">
    <!--<nav  class=" collapse">-->
    <!--<nav  class=" navbar navbar-expand-md navbar-dark fixed-top bg-secondary"  id="navbarToggleExternalContent">-->
    <a class="navbar-brand" href="#"></a>

    <!--      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">-->
    <!--        <span class="navbar-toggler-icon"></span>-->
    <!--      </button>-->

    <div class="collapse navbar-collapse" style="padding-left: 15px" id="navbarToggleExternalContent">
        <ul class="navbar-nav mr-auto" style="padding-top: 5px;">
            <img src="./admin/images/BFC.png" type="image/png" style="width: 48px; height: 52px" " alt="">

          <li class="nav-item active">
            <a class="nav-link" href="./" style="padding-top: 14px; font-size: 13px">Home <span class="sr-only"></span></a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="view_your_appointment.php" style="padding-top: 14px;font-size: 13px">View Your Appontments</a>
          </li>


            <?php
            $conn=mysqli_connect("localhost","root","", "bloodforcharity");

            $fullnamefetch= $_SESSION["control"]["fullName"];
            $donorId =$fullnamefetch;

                //The  query below will look a matching userName from the users' tables. "LIMIT 1" means we just need to pick ONLY ONE row. Select all (*) records matching the condition in the WHERE close but pick only the first matching record.
                $spot_donation_entry = "SELECT * FROM appointments WHERE appointmentbookerID = '$donorId' LIMIT 1";

                /*****
                After database connection using new mysqli method, database connection object is returned. A query ($spot_username) is passed to connection object's query method. This function returns a result set. Here we call it user results or $user_res
                 *****/
                $donation_result = $conn->query($spot_donation_entry);

                if ($donation_result->num_rows > 0){


                }else{
                    ?>
            <li class="nav-item">
                <a class="nav-link" href="book_appointment.php" style="padding-top: 14px;font-size: 13px">Donate</a>
            </li>

            <?php

            }
            ?>







            <li class="nav-item">
                <a class="nav-link" href="about.php" style="padding-top: 14px;font-size: 13px">About Us</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="view_art.php" style="padding-top: 14px;font-size: 13px">Blog</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="contact.php" style="padding-top: 14px;font-size: 13px">Contact Us</a>
            </li>
            <?php
                if(isset($_SESSION["control"])){
            ?>


                    <li class="nav-item active">
                        <a class="bi bi-box-arrow-in-right nav-link " style="font-size: 13px;padding-top: 14px"  href="data_process/signout.php">&nbsp;Log Out</a>


                    </li>
            <?php
                }
            ?>


            <?php
            if(!isset($_SESSION["control"])){
                ?>  <!-- Modal -->
                <!-- Button trigger modal -->
                <li class="nav-item active"> <a style="font-size: 11px; padding-top: 16px;" href="" type="" class="nav-link" data-bs-toggle="modal" data-bs-target="#loginmodal">
                        Login
                    </a>



                    <div style="color: black" class="modal fade" id="loginmodal" tabindex="-1" aria-labelledby="loginmodal" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="loginmodal"></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body" style="display: flex; justify-content: center; text-align: center">

                                    <!-- Modal Beginning -->
                                    <div class="col-md-6" style="">
                                        <h2>Sign In</h2>
                                        <form method = "POST" action = "index.php" autocomplete = "off" accept-charset="UTF-8">
                                            <div class="form-group">
                                                <label for="username">UserName</label>
                                                <input placeholder="Enter your UserName" class="form-control form-control-md" name="uName" type="text" id="username" required autofocus />
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input placeholder="Enter your Password" class="form-control form-control-md" name="pWord" type="password" id="password" required />
                                            </div>
                                            <div class="form-group">
                                                <input style="margin-top: 5px;" class="btn btn-primary" type="submit" name="sign_in"  value="Sign In">
                                            </div>
                                        </form>
                                    </div>

                                    <!-- Modal Ending-->



                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </li>




                <!--Register------------------------------------------------------------------------------->


                <!-- Button trigger modal -->
                <li class="nav-item active"> <a style="font-size: 11px; padding-top: 16px;" href="" type="" class="nav-link" data-bs-toggle="modal" data-bs-target="#registermodal">
                        Register
                    </a>
                    <div style="color: black" class="modal fade" id="registermodal" tabindex="-1" aria-labelledby="registermodal" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="registermodal"></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body" style="display: flex; justify-content: center; text-align: center">

                                    <!-- Modal Beginning -->
                                    <div class="col-md-6" style="">
                                        <h2>Register</h2>
                                        <form method = "POST" action = "data_process/processes.php" autocomplete = "off" accept-charset="UTF-8">
                                            <div class="form-group">
                                                <label for="fullName">Full Name</label>
                                                <input placeholder="Enter your Full Name" class="form-control form-control-md" name="fullName" type="text" id="fullName" required />
                                            </div>
                                            <!--<div class="form-group">
                                                <label for="userRole">User Role</label>

                                                <select class="form-control form-control-md" name="userRole" value="Donor"  id="userRole" required>
                                                 <option value = "Donor"> Donor </option>
                                                    <option value = "Admin" > Admin </option>
                                                       <option value = "Author" > Author </option>
                                                       <option value = "Editor" > Editor </option>

                                                </select>
                                            </div>-->

                                            <div class="form-group">
                                                <label for="email">Email Address</label>
                                                <input placeholder="Enter your email" class="form-control form-control-md" name="email_address" type="email" id="email" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="username">UserName</label>
                                                <input placeholder="Enter your UserName" class="form-control form-control-md" name="username" type="text" id="username" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input placeholder="Enter your Password" class="form-control form-control-md" name="password" type="password" id="password" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="ConfPass">Confirm your Password</label>
                                                <input placeholder="Confirm your Password" class="form-control form-control-md" name="ConfPass" type="password" id="ConfPass" required />
                                            </div>
                                            <div class="form-group">
                                                <input style="margin-top: 5px;" class="btn btn-primary" type="submit" name="sign_up"  value="Sign Up">
                                            </div>
                                        </form>

                                    </div>

                                    <!-- Modal Ending-->



                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </li>


            <?php
            }
            ?>


            <form class="form-inline my-2 my-lg-0 " style="padding-left: 560px;padding-top: 14px">
                <div class = "text-white mr-sm-2" >
                    <h5>

                        <?php
                        if(isset($_SESSION["control"])){
                            $session_name=$_SESSION["control"]["fullName"];
                            print "<p style='font-size: 14px;'>Hello $session_name</p>";
                        }
                        ?>
                    </h5>
                </div>
            </form>
        </ul>

      </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    </nav>