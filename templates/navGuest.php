<!---->
<!--<link rel="stylesheet" href="./admin/css/bootstrap.css">-->
<!--<link rel="icon" href="./admin/images/BFC.png" type="image/png" sizes="16x16">-->
<!--<script src="./admin/js/bootstrap.js" ></script>-->
<!--<script src="./admin/js/jquery.js" ></script>-->



<!--<nav class="navbar navbar-expand-lg navbar-light bg-light">-->
<!--    <div class="container-fluid">-->
<!--        <a class="navbar-brand" href="#">Navbar</a>-->
<!--        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">-->
<!--            <span class="navbar-toggler-icon"></span>-->
<!--        </button>-->
<!--        <div class="collapse navbar-collapse" id="navbarNav">-->
<!--            <ul class="navbar-nav">-->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link active" aria-current="page" href="#">Home</a>-->
<!--                </li>-->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link" href="#">Features</a>-->
<!--                </li>-->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link" href="#">Pricing</a>-->
<!--                </li>-->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>-->
<!--                </li>-->
<!--            </ul>-->
<!--        </div>-->
<!--    </div>-->
<!--</nav>-->




<link rel="icon" href="./admin/images/BFC.png" type="image/png" sizes="16x16">
<!--<div class="collapse" id="navbarToggleExternalContent">-->
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
            <a class="nav-link" href="./" style="padding-top: 12px; font-size: 14px">Home <span class="sr-only"></span></a>
          </li>


<!--                <a class="nav-link" href="book_appointment.php" style="padding-top: 12px;font-size: 14px">Donate Today</a>-->


                <?php

                if(!isset($_SESSION["control"])){
                    ?>
            <li class="nav-item"><a class="nav-link" href="login.php" style="padding-top: 12px;font-size: 14px">Donate Today</a>
                <?php
                    //exit();
                }
                else{
                    ?>
                    <li class="nav-item"><a class="nav-link" href="book_appointment.php" style="padding-top: 12px;font-size: 14px">Donate Today</a>
                <?php
                }
                ?>

            </li>

            <li class="nav-item">
                <a class="nav-link" href="view_art.php" style="padding-top: 12px;font-size: 14px">Blog</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="about.php" style="padding-top: 12px;font-size: 14px">About Us</a>
            </li>
            <?php
                if(isset($_SESSION["control"])){
            ?>
                <li class="nav-item active">
                    <a class="nav-link"  style="font-size: 12px" href="data_process/signout.php">Sign Out</a>
                </li>
            <?php
                }
            ?>


            <?php
            if(!isset($_SESSION["control"])){
                ?>  <!-- Modal -->
                <!-- Button trigger modal -->
                <li class="nav-item active">

                    <a   data-bs-toggle="modal"  data-bs-target="#loginmodal" class="bi bi-box-arrow-in-left nav-link " style="font-size: 14px;padding-top: 12px"
                         href="">&nbsp;Log In</a>


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
                                                <hr>
                                                <a href="mailto:admin@bloodforcharity.com?subject=Forgot Password&body=Hello, I would like to request a reset of my password. My registered Email is ">Forgot Password?</a>

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
                <li class="nav-item active"> <a style="font-size: 14px; padding-top: 12px;" href="" type="" class=" bi bi-door-open nav-link" data-bs-toggle="modal" data-bs-target="#registermodal">
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

<!--                                            <div class="form-group">-->
<!--                                                <label for="userRole">User Role</label>-->
<!---->
<!--                                                <select class="form-control form-control-md" name="userRole" value="Donor"  id="userRole" required>-->
<!--                                                 <option value = "Donor"> Donor </option>-->
<!--                                                    <option value = "Admin" > Admin </option>-->
<!--                                                       <option value = "Author" > Author </option>-->
<!--                                                       <option value = "Editor" > Editor </option>-->
<!---->
<!--                                                </select>-->
<!--                                            </div>-->

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



        </ul>
        <form class="form-inline my-2 my-lg-0">
			<div class = "text-white mr-sm-2">
				<h5>

					<?php
					if(isset($_SESSION["control"])){
						print "Hello " . $_SESSION["control"]["fullName"];
						 }
					?>
				</h5>
			</div>

        </form>
      </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
</nav>

