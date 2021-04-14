
<?php
	session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);
    	
	require_once "includes/session_control.php";
	require_once "includes/db_connect.php";

	include "templates/header.php";
	include "templates/navDonor.php";



            $conn=mysqli_connect("localhost","root","", "bloodforcharity");

            $fullnamefetch= $_SESSION["control"]["fullName"];
            $user_role=$_SESSION["control"]["user_role"];

            $donorId =$fullnamefetch;

                //The  query below will look a matching userName from the users' tables. "LIMIT 1" means we just need to pick ONLY ONE row. Select all (*) records matching the condition in the WHERE close but pick only the first matching record.
                $spot_donation_entry = "SELECT * FROM appointments WHERE appointmentbookerID = '$donorId' LIMIT 1";

                $donation_result = $conn->query($spot_donation_entry);

                if (($donation_result->num_rows > 0)){
                    ?>
                    <script> location.replace("view_your_appointment.php"); </script>
                    <div class='alert alert-danger' role='alert'>You Already Have an Existing Appointment</div>
<?php
                }
                elseif ( ($user_role=='Admin')){
                    ?>
                    <script> location.replace("admin.php"); </script>
                    <div class='alert alert-danger' role='alert'>You Already Have an Existing Appointment</div>

                    <?php
                }
                else{



if (isset($_POST["Submit"])){

   // $donorId = ( $_POST["donorID"]);
    $donationcenter = ( $_POST["donationcenter"]);
    $donormessage = ( $_POST["donormessage"]);
    $appointment_booker_id = $_SESSION["control"]["userId"];

    $fullnamefetch= $_SESSION["control"]["fullName"];
     $donorId =$fullnamefetch;

    $edate = ($_POST["edate"]);
    $appointment_booking_date = date("YY-MM-DD");


    //Since the publication field is not mandatory, we need to verify if it contains any data upon submission, ELSE the publication time is set as NOW using time() on line 15
    //if(isset($_POST["appointment_publication_date"])){
     //   $pub_date = ( $_POST["appointment_publication_date"]);
        //Converting the into date into an UNIX_DATETIME()
      //  $date = new DateTime($pub_date);
      //  $appointment_booking_date = strtotime( $date->format('Y-m-d H:i:s') );
   // }else{
    //    $appointment_booking_date = time();
   // }


//     $article_photo = ( $_POST["user_image"]);
//    $los_image = $_FILES['user_image']['name'];
//    $temp_name = $_FILES['user_image']['tmp_name'];
//    move_uploaded_file($temp_name,"images/$los_image");





    $appointment_insert= "INSERT INTO appointments(appointment_booker_id,appointmentbookerID, donationcenter, donormessage,appointment_date, appointment_publication_date)
 VALUES ('$appointment_booker_id','$donorId', '$donationcenter', '$donormessage','$edate', current_date )";


    //$run_los = mysqli_query($conn,$appointment_insert);
    //header("Location:view_appointments.php");

    if($conn->query($appointment_insert) === TRUE){
        ?>
        <script>
            window.alert("Thank You! Appointment Booked Successfully!")
            location.replace("view_your_appointment.php");
        </script>

        <?php
        //header("Location:view_appointments.php");
        //exit();
    }else{
        print "Failed: " . $conn->error;
    }

}

                }








?>

<main role="main" style="color: white">



      <div class="container" style="padding-top: 20px">
        <!-- Example row of columns -->

          <br>
          <br>
          <br>

      <div class="row">
       
        <div class="row">
          <div class="col-md-8" >
            <h2>Book A Donation Appointment</h2>
<form method = "POST" action = "book_appointment.php" autocomplete = "off" accept-charset="UTF-8">
    <div class="form-group">


<!--        <div class="form-group">-->
<!--            <label for="appointment_booker_id">Booker ID</label>-->
<!--            --><?php //$appointment_booker_id = $_SESSION["control"]["userId"]; ?>
<!--            <input placeholder="" class="form-control form-control-md" name="appointment_booker_id" type="text" id="appointment_booker_id" disabled value="--><?php //echo $appointment_booker_id ?><!--"/>-->
<!--        </div>-->


<!--        <input placeholder="Enter your Author" class="form-control form-control-md" type="text" id="" disabled value = "Your ID&nbsp;--><?php //print $_SESSION["control"]["userId"]; ?><!--" />-->
		<label for="donorID">You Full Name</label>
    <!-- 
    The input below will just display the current user's full name in a disabled input field. A way to show the person submitting data the author in cation
    -->        
        <input placeholder="" class="form-control form-control-md" type="text" id="donorID" disabled value = "<?php print $_SESSION["control"]["fullName"]; ?>" />
    <!-- 
    The input below will capture a hidden value of the current user's ID (primary key). The trick is, this ID will be submitted together with the rest of the new article's information. The ID will be as well inserted in the article table as a reference to the users' table to identify the author.
    -->
		<input name="article_authorId" type="hidden" id="donorID" value = "<?php print $_SESSION["control"]["userId"]; ?>" />
	</div>

    <div class="form-group">
        <label for="donorEmail">You Email Address</label>
        <!--
        The input below will just display the current user's full name in a disabled input field. A way to show the person submitting data the author in cation
        -->
        <input placeholder="" class="form-control form-control-md" type="text" id="donorEmail" disabled value = "<?php print $_SESSION["control"]["email"]; ?>" />
        <!--
        The input below will capture a hidden value of the current user's ID (primary key). The trick is, this ID will be submitted together with the rest of the new article's information. The ID will be as well inserted in the article table as a reference to the users' table to identify the author.
        -->
        <input name="article_authorId" type="hidden" id="donorEmail" value = "<?php print $_SESSION["control"]["userId"]; ?>" />
    </div>




    <div class="form-group">
        <label for="phonenumber">Phone Number</label>
        <input placeholder="Enter your Phone Number" class="form-control form-control-md" name="phonenumber" type="tel" id="article_title" required />
    </div>



    <div class="form-group">
        <label for="donationcenter">Donation Center</label>
        <span class="">
            <select name="donationcenter" class="form-control form-control-md" aria-required="true" aria-invalid="false"><option value="Donation Center">Select Your Donation Center</option><option value="Bomet">Bomet</option><option value="Bungoma">Bungoma</option><option value="Busia">Busia</option><option value="Eldoret">Eldoret</option><option value="Embu">Embu</option><option value="Garissa">Garissa</option><option value="Kericho">Kericho</option><option value="Kisii">Kisii</option><option value="Kisumu">Kisumu</option><option value="Kitale">Kitale</option><option value="Kitui">Kitui</option><option value="Kwale">Kwale</option><option value="Lamu">Lamu</option><option value="Lodwar">Lodwar</option><option value="Machakos">Machakos</option><option value="Malindi">Malindi</option><option value="Meru">Meru</option><option value="Migori">Migori</option><option value="Mombasa">Mombasa</option><option value="Nairobi">Nairobi</option><option value="Naivasha">Naivasha</option><option value="Nakuru">Nakuru</option><option value="Nandi">Nandi</option><option value="Narok">Narok</option><option value="Nyeri">Nyeri</option><option value="Thika">Thika</option><option value="Vihiga">Vihiga</option><option value="Voi">Voi</option><option value="Wajir">Wajir</option>
            </select>
        </span>
    </div>


    <div class="form-group" style="color: white">
        <label for="article_full_text">Your Message</label>
        <textarea placeholder="Share Your Message" class="form-control form-control-md" name="donormessage" id="article_full_text" required style="height:170px;width: 500px" ></textarea>
    </div>
    <br>



    <h3 style="color: white">Choose Your Appointment Date</h3>
    <h6>Choose your preferred time. Working Hours is &nbsp;<a style="color: blueviolet">0800-1600</a>
    <br>
    <div class="">
        <label style="color: white">
            <div class="form-label">
                <div style="overflow:hidden;">
                    <div class="form-group">
                        <div class="row">
                            <div class="">
                                <input type="datetime-local" id="edate"  value="" required name="edate" class="form-control "  placeholder="Time">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </label>
    </div>



   <!-- <div class="form-group">
		<label for="article_photo">Article Photo</label>
		<input placeholder="Upload Article Photo" class="form-control form-control-md" name="article_photo" type="file" id="article_photo" />
	</div>-->

  <!--  <div class="form-group">

        <label for="" class="control-label col-md-3">
            User Image
        </label>
    </div>
    <input type="file" name="user_image" class="form-control" required>-->


    <!--<div class="col-md-6">

        <input type="submit" name="submit" value="Submit" class="btn btn-primary form-control">

    </div>-->



  <!--  <div class="form-group">
		<label for="article_publication_date">Publication Date</label>
		<input placeholder="Enter your Article Title" class="form-control form-control-md" name="article_publication_date" type="date" id="article_publication_date" />
	</div>-->
    <div class="form-group">
		<input class="btn btn-primary" style="margin-top: 5px" type="submit" name="Submit"  value="Submit">
	</div>
</form>
          </div>
          <div class="col-md-4" style="margin-top: 70px">
            <h2>Our Working Days</h2>
            <p>Thank your for choosing to donate blood.<br>
            You are welcome to book an appointment on any week day, but between (0800-1600 hours)</p>
<!--            <p   style="margin-top: 7px"><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>-->
          </div>
        </div>
     
	</div>
      </div> <!-- /container -->







<?php
	include "templates/footer.php";
?>
