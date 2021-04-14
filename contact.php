
<?php

    require_once "includes/db_connect.php";

include "templates/header.php";
session_start();
//if(!isset($_SESSION["control"])) {
//    include "templates/navGuest.php";
//}
//else {
//    if($user_role='Admin'){
//        include "templates/navAdmin.php";
//    }
//    else {
//        include "templates/navDonor.php";
//    }
//}
?>
    <main role="main">


      <div class=""  style="padding-top: 70px;">
        <div class="container">
          <h1 class="display-3">Contact Us!</h1>
        </div>
      </div>

      <div class="container">
        <!-- Example row of columns -->
        <div class="row">
          <div class="col-md-8">
            <h2>Contact Us</h2>
<form method = "POST" action = "data_process/processes.php" autocomplete = "off" accept-charset="UTF-8">
    <div class="form-group">
		<label for="fullName">Full Name</label>
		<input placeholder="Enter your Full Name" disabled value = "<?php print $_SESSION["control"]["fullName"]; ?>" class="form-control form-control-md" name="fullName" type="text" id="fullName" required autofocus />
	</div>
    <div class="form-group">
		<label for="email">Email Address</label>
		<input placeholder="Enter your email" disabled value = "<?php print $_SESSION["control"]["email"]; ?>" class="form-control form-control-md" name="email_address" type="email" id="email" required />
	</div>
    <div class="form-group">
		<label for="subject">Subject</label>
		<input placeholder="Enter the subject" class="form-control form-control-md" name="subject" type="text" id="subject" required />
	</div>
    <div class="form-group">
		<label for="message">Message</label>
		<textarea placeholder="Enter the message" class="form-control form-control-md" name="textMessage" id="subject" required style="height:170px" ></textarea>
	</div>
	<div>
		<input class="btn btn-primary" style="margin-top: 5px" type="submit" name="send_message"  value="Send Message">
	</div>
</form>
          </div>
          <div class="col-md-4">
            <h2>Talk to us</h2>

    Phone: (+254) (0)703-00000<br />
    E-mail: <a href="mailto:admin@bloodforcharity.com">admin@bloodforcharity.com</a><br />
    <br /><br />
    <b>Headquarter:</b><br />
    Blood Donation for Charity, <br />
    Nairobi<br />
    55501 Nairobi,<br />
    Phone: (+254) (0)703-00000<br />
    <a href="mailto:admin@bloodforcharity.com">admin@bloodforcharity.com</a><br />


    <br /><br />

          </div>
        </div>

        <hr />

      </div> <!-- /container -->

    </main>
<?php
include 'templates/footer.php';
?>

  </body>
</html>
