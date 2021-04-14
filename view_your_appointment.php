
<?php

    require_once "includes/db_connect.php";

	include "templates/header.php";
if(!isset($_SESSION["control"])) {
    include "templates/navGuest.php";
}
else {
    include "templates/navDonor.php";
}
?>
    <link rel="stylesheet" href="admin/css/icons_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <main role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="container"  style="padding-top: 70px;">
        <div class="container">
            <h2 class="display-5" style="text-align: center">Your Booked <a style="color: yellow">Appointment</a> for Blood Donation</h2>
            <hr>
        </div>
      </div>

      <div class="container">
        <!-- Example row of columns -->
        <div class="row">
<?php
if (isset($_GET["appointmentID"])){
	$appointmentID = $_GET["appointmentID"];

//    $user_fullname=$_SESSION["control"]["fullName"];
    $userId=$_SESSION["control"]["userId"];


	
//    $select_booking = "SELECT * FROM appointments LEFT JOIN users ON (users.`userId` = appointments.`appointmentbookerID`) WHERE appointmentbookerID = '$user_fullname' LIMIT 1";
    $select_booking = "SELECT * FROM appointments  WHERE appointment_booker_id = '$userId' LIMIT 1";

	$booking_result = $conn->query($select_booking);

	
    if ($booking_result->num_rows > 0){ //Verifying if at least one row (num_rows or in other words number_of_rows is greater than (>) zero ) was found as a result of the select query above.

        $booking_row = $booking_result->fetch_assoc();
        $bookerID=$booking_row["appointmentbookerID"];
        //$select_booking_specific = "SELECT * FROM appointments LEFT JOIN users ON (users.`userId` = appointments.`appointmentbookerID`) WHERE appointmentbookerID = '$bookerID' LIMIT 1";
?>
        <div class="row">
          <div class="">
            <h2>Donation Branch :-<?php print $booking_row["donationcenter"]; ?></h2>

<!--           <h6>Published on: --><?php //print date("jS F Y", $booking_row["appointment_publication_date"]); ?><!-- by --><?php //print $booking_row["fullName"]; ?><!--</h6>-->
           <h6>Published on: <?php print date("jS F Y", $booking_row["appointment_publication_date"]); ?> by <?php print $user_fullname; ?></h6>

		     <p><?php print $booking_row["donormessage"]; ?></p>

          </div>
            <a class="btn btn-success"  href = "mailto:admin@bloodforcharity.com?subject = Requesting Change of Blood Donation Appointment Feedback&body = Hello, I would like to request a change to my Blood Donation Appointment">Request Change<a/>

        </div>
<?php
}else{
        header("Location: ./");
		exit();
}
}else{
//    $user_fullname=$_SESSION["control"]["fullName"];
    $userId=$_SESSION["control"]["userId"];
    //echo $userId;


//    $select_booking = "SELECT * FROM appointments LEFT JOIN users ON (users.`userId` = appointments.`appointmentbookerID`)";
    $select_booking = "SELECT * FROM appointments  WHERE appointment_booker_id = '$userId' LIMIT 1";


    $booking_result = $conn->query($select_booking);
	
	
    if ($booking_result->num_rows > 0){ //Verifying if at least one row (num_rows or in other words number_of_rows is greater than (>) zero ) was found as a result of the select query above.
        
        while($booking_row = $booking_result->fetch_assoc()){
			

        ?>

            <div class="col-md-12">
                <!--                <h2 style="text-align: center">Being A Contributor</h2>-->
                <p style="text-align: center;">During the day of your appointment, prepare yourself by drinking plenty of fluids and wearing comfortable clothes with sleeves that you can easily roll up above your elbow.
                    <br>
                    Make sure you have a list of all the prescription and over-the-counter medications you’re taking, as well as the proper forms of ID.

                    How often can you donate blood? If you donate whole blood, you need to wait 56 days between donations -- possibly longer,
                    depending on the policy of your blood bank.</p>
                <!--                <p><a class="btn btn-secondary" href="#" role="button">Read More &raquo;</a></p>-->
            </div>

                <div class="container">
                    <table style="color: white" class="table table-bordered table-striped m-5">
                        <thead>
                        <tr>
                            <th>Donation Branch :-&nbsp</th>
                            <th>Booked on:-</th>
                            <th>Appointment Date: </th>
                            <th>Message</th>
                            <th>Change</th>
<!--                            <th style="text-align: center">Request Change</th>-->
                            <th style="text-align: center">Request Cancellation</th>
                            <th style="text-align: center">Cancellation Requested</th>

                        </tr>
                        </thead>
                        <tbody>
                        <style>
                            td{
                                color: white;
                            }
                        </style>

                        <?php
                        $booking_result = $conn->query($select_booking);

                        while ($booking_row=mysqli_fetch_array($booking_result)){
                            echo "<tr>";
                            echo "<td>". $booking_row["donationcenter"];
                            echo "<td>". $booking_row["appointment_publication_date"]; ?> by <?php print $booking_row["appointmentbookerID"];"</td>";
                            echo "<td>".$booking_row['appointment_date']."</td>";
                            echo "<td>".$booking_row['donormessage']."</td>";


                            $donation_ID=$booking_row['appointmentID'];




                            echo "<td><a href='data_process/edit.php?id=".$booking_row['appointment_booker_id']."'><span class='fa fa-pencil' style='padding-left: 22px'>";
//                            echo "<td><a href='data_process/_delete.php?id=".$booking_row['appointmentID']."'><span class='fa fa-trash'>";

                            //echo "<td><a href='mailto:admin@bloodforcharity.com?subject = Requesting Cancellation of My Blood Donation Appointment = Hello, I would like to request a cancellation of my blood donation appointment from your
//website Blood For Charity. My Appointment ID is $donation_ID'><span class='fa fa-trash'>";
                            
                            
                            
//                            echo "<td><a href='mailto:admin@bloodforcharity.com?subject=Requesting a change of My Blood Donation Appointment&body=Hello, I would like to request a change of my blood donation appointment from your
//website Blood For Charity to..... My Appointment ID is $donation_ID'><span class='fa fa-calendar-minus-o' style='padding-left: 26px'>";
//                            echo "<td><a href='mailto:admin@bloodforcharity.com?subject=Requesting Cancellation of My Blood Donation Appointment&body=Hello, I would like to request a cancellation of my blood donation appointment from your
//website Blood For Charity. My Appointment ID is $donation_ID'><span class='fa fa-trash' style='padding-left: 72px'>";
                            echo "<td><a href='data_process/request_cancellation.php?id=".$booking_row['appointment_booker_id']."'><span class='fa fa-trash' style='padding-left: 52px'>";

                            $userId=$_SESSION["control"]["userId"];

                            $status = "SELECT requested_cancellation FROM appointments  WHERE appointment_booker_id = '$userId' LIMIT 1";

                            $status_result = $conn->query($status);

                            while ($answer=mysqli_fetch_array($status_result)){
                            $cancellation_status=$answer["requested_cancellation"];

                            }

                            if ($cancellation_status=='1'){
                               echo "<td style='color: greenyellow'><a style='padding-left: 55px'>Yes</a></td>";
                           }
                            else {
                                echo "<td style='color: greenyellow'><a style='padding-left: 55px'>No</a></td>";
                            }


                        }?>
                        </tbody>
                    </table>
                </div>


<!--                  <div class="col-md-4">-->
<!--            <h3 >Donation Branch :-&nbsp--><?php //print $booking_row["donationcenter"]; ?><!--</h3>-->
<!--           -->
<!--           <h6>Booked on: --><?php //print date("jS F Y", $booking_row["appointment_publication_date"]); ?><!-- by --><?php //print $booking_row["appointmentbookerID"]; ?><!--</h6>-->
<!---->
<!--           <h6>Appointment Date: --><?php
//
//               $select_appointment_date = "SELECT appointment_date FROM appointments  WHERE appointmentbookerID = '$user_fullname' LIMIT 1";
//              // $appointment_result = $conn->query($select_appointment_date);
////
////               while ($row = $select_appointment_date->fetch_assoc()) {
////                   echo $row['appointment_date']."<br>";
////               }
//               $result=mysqli_query($conn,$select_appointment_date);
//
//               while ($row=mysqli_fetch_array($result)){
//                   echo "<tr>";
//                   echo "<td>".$row['appointment_date']."</td>";
//
////                   echo "<td><a href='processes/view.php?id=".$row['id']."'><span class='fa fa-eye'>";
////                   echo "<td><a href='processes/edit.php?id=".$row['id']."'><span class='fa fa-pencil'>";
////                   echo "<td><a href='processes/_delete.php?id=".$row['id']."'><span class='fa fa-trash'>";
//
//
//               }
//
//
//               //echo "<h5> $row></h5>";
//
//               //DateTime::createFromFormat('Y-m-d H:i:s', $row['appointment_date']);
//               //print date("jS F Y", $booking_row["appointment_date"]);
//
//           ?><!--</h6>-->
<!---->
<!--   --><?php //
//			$max_words = 20; //initializing the number of words (20) to be printed as a brief story before the viewer reads more
//			$art_fullText = addslashes($booking_row["donormessage"]); //adding slashes in case of php encounters quotation marks
//
//			$shown_string = implode(' ', array_slice(str_word_count(addslashes($art_fullText), 2), 0, $max_words)) . ' ... ' ; //converting the full text into an array storing all words, then slicing the array at the maximum number of words determined by $max_words
//			?>
<!--            -->
<!--			<p>--><?php //print $shown_string; //Print the sliced array ?><!--</p>-->
<!---->
<!---->
<!--		-->
<!--            <p><a class="btn btn-info" href="view_your_appointment.php?appointmentID=--><?php //print $booking_row["appointmentID"]; ?><!--" role="button">Edit Your Appointment</a></p>-->
<!--            <p><a class="btn btn-info" href="view_your_appointment.php?appointmentID=--><?php //print $booking_row["appointmentID"]; ?><!--" role="button">Request Cancellation</a></p>-->
<!--        </div>-->
        <?php
        }         
    }else{
        ?>
        <br></br>
        <?php
        echo "<h6 style='text-align: center;'>You currently don't have any appointment.</h6>";
        ?>
            <br></br>
            <br></br>
        <a href="book_appointment.php" class="btn btn-success">Book an Appointment</a>
        <?php
    }

}	
?>
        </div>

        <hr />
        <hr />

      </div> <!-- /container -->
<?php
	include "templates/footer.php";
?>