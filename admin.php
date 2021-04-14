
<?php
	session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);
    	
	require_once "includes/session_control.php";
	require_once "includes/db_connect.php";

	include "templates/header.php";

$user_role=$_SESSION["control"]["user_role"];


if($user_role!='Admin'){
    ?>
    <script>
        location.replace("view_your_appointment.php");
    </script>
   <?php
}



?>

    <main role="main" style="margin-bottom: 350px; padding-bottom: 0px; padding-top: 30px">
        <link href="css/style.css" rel="stylesheet" />
      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="" style="margin-top: 50px;">
        <div class="container">
          <h1 class="display-3" style="text-align: center">Admin Control Panel</h1>
        </div>
      </div>
      <div class="container">
        <!-- Example row of columns -->

      <div class="row" style="text-align: center; padding-left: 0px; justify-items: center; position: initial">
       

            <div class="col-md-2">
                <a href="view_appointments.php" class="btn btn-sq-lg btn-primary">
                  <i class="fa fa-user fa-5x"></i><br/>
                  Manage Appointments
                </a>
            </div>

          <div class="col-md-2" style="text-align: center">
              <a href="add_article.php" class="btn btn-sq-lg btn-primary">
                  <i class="fa fa-user fa-5x"></i><br/>
                  &nbsp;   Add Blog Articles &nbsp;&nbsp;
              </a>
          </div>

            <div class="col-md-2">
            <a style="color:darkblue;" href="view_cancellation_requests.php" class="btn btn-sq-lg btn-warning">
                  <i class="fa fa-user fa-5x"></i><br/>
                    Requested Cancellations
                </a>
            </div>

          <div class="col-md-2">
              <a style="color:darkblue;" href="view_msg.php" class="btn btn-sq-lg btn-warning">
                  <i class="fa fa-user fa-5x"></i><br/>
                  View Contact Messages
              </a>
          </div>


            <div class="col-md-2">
                <a href="reset.php" class="btn btn-sq-lg btn-danger">
                  <i class="fa fa-user fa-5x"></i><br/>
                  System Default Factory
                </a>
            </div>
     
	</div>
      </div> <!-- /container --></main>
<?php
	include "templates/footer.php";
?>