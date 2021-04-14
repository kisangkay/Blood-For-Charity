<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
require ("connection_no_notice.php");

//$id=$fullname=$phonenumber=$email=$address="";
$id=trim($_GET['id']);
$select="SELECT * FROM appointments WHERE appointment_booker_id='$id';";
$answer=$conn->query($select);
$rows=$answer->fetch_assoc();
//

$new_name=$_SESSION["control"]["fullName"];


$donor_name= $rows["appointmentbookerID"];
$center_of_donation= $rows["donationcenter"];
$message_of_donor= $rows["donormessage"];
$date_of_appointment= $rows["appointment_date"];

//require('connection_no_notice.php');


	//if (isset($_POST["submit"]) and !empty (trim($_POST["donormessage"]))){
	if (isset($_POST["id"]) and !empty (trim($_POST["id"]))){
	//get hidden input


        $id=trim($_POST["id"]);
        $user_fullname=$_SESSION["control"]["fullName"];
	
		//$id=trim($_POST["fullName"]);
	//pick from updated values
	$updated_name=$_POST ['appointmentbookerID'];
	$updated_message=$_POST ['donormessage'];
	$updated_center=$_POST ['donationcenter'];
	$updated_date=$_POST ['edate'];


       // $select_message = "SELECT * FROM appointments  WHERE appointmentbookerID = '$user_fullname' LIMIT 1";
        //$message_result = $conn->query($select_message);



	//update query
	$sql="UPDATE appointments SET appointmentbookerID='$updated_name', donationcenter='$updated_center', appointment_date='$updated_date', donormessage = '$updated_message' WHERE appointment_booker_id='$id';";
	$sql2="UPDATE users SET fullName ='$updated_name' WHERE userId ='$id'";
	// $sql2 = "SELECT id,fullname,phone,email,gender,sports,sportslevel FROM studentsd WHERE id='$id';";

	$result =mysqli_query($conn,$sql);
	$result2 =mysqli_query($conn,$sql2);

	if ($result and $result2) {
		
//		echo "<div class='alert alert-success' role='alert'> Record Updated Successfully</div>";
?>

        <script>
            //window.postMessage("Record Updated Successfully");
            //location.replace("view_your_appointment.php")
        </script>


<?php
        		echo "<div class='alert alert-success' role='alert'> Record Updated Successfully</div>";

		}	
	else 
	{
		echo "Error executing query $sql".mysqli_error($conn);	
	}
	}

	else{
		//echo "Id Not Picked";
	}
	////////////////////////////////////////////////
/// -------------------------------------------------------------------------------------
	
	


if (isset($_GET["appointmentID"])){
	$appointmentID = $_GET["appointmentID"];

    $user_fullname=$_SESSION["control"]["fullName"];



//    $select_booking = "SELECT * FROM appointments LEFT JOIN users ON (users.`userId` = appointments.`appointmentbookerID`) WHERE appointmentbookerID = '$user_fullname' LIMIT 1";
    $select_booking = "SELECT * FROM appointments  WHERE appointmentbookerID = '$user_fullname' LIMIT 1";

	$booking_result = $conn->query($select_booking);


    if ($booking_result->num_rows > 0){ //Verifying if at least one row (num_rows or in other words number_of_rows is greater than (>) zero ) was found as a result of the select query above.

        $booking_row = $booking_result->fetch_assoc();
        $bookerID=$booking_row["appointmentbookerID"];
        //$select_booking_specific = "SELECT * FROM appointments LEFT JOIN users ON (users.`userId` = appointments.`appointmentbookerID`) WHERE appointmentbookerID = '$bookerID' LIMIT 1";
?>
        <div class="row">
          <div class="" >

<!--           <h6>Published on: --><?php //print date("jS F Y", $booking_row["appointment_publication_date"]); ?><!-- by --><?php //print $booking_row["fullName"]; ?><!--</h6>-->
           <h6 >Published on: <?php print date("jS F Y", $booking_row["appointment_publication_date"]); ?> by <?php print $user_fullname; ?></h6>

		     <p><?php print $booking_row["donormessage"]; ?></p>

          </div>

<?php
}else{
        header("Location: ./");
		exit();
}
}else{
    $user_fullname=$_SESSION["control"]["fullName"];

//    $select_booking = "SELECT * FROM appointments LEFT JOIN users ON (users.`userId` = appointments.`appointmentbookerID`)";
    $select_booking = "SELECT * FROM appointments  WHERE appointment_booker_id = '$id' LIMIT 1";

    $booking_result = $conn->query($select_booking);


    if ($booking_result->num_rows > 0){ //Verifying if at least one row (num_rows or in other words number_of_rows is greater than (>) zero ) was found as a result of the select query above.

        while($booking_row = $booking_result->fetch_assoc()){

        ?>
            <link rel="stylesheet" href="../admin/css/bootstrap.css">
            <link rel="icon" href="../admin/images/BFC.png" type="image/png" sizes="16x16">
<!--            <video autoplay muted loop id="myVideo">-->
<!--                <source src="../admin/videos/hearts.mp4" type="video/mp4">-->
<!--            </video>-->
                <div class="container" style="padding-top: 50px;">
                    <h2 class="bg bg-secondary" style="text-align: center; padding-top: 7px ;padding-bottom: 7px">Your Current Appointment</h2>
                    <table style="color: white" class="table table-bordered table-striped m-5">

                        <thead>
                        <tr>
                            <th>Donation Branch :-&nbsp</th>
                            <th>Booked on:-</th>
                            <th>Your Appointment Date: </th>
                            <th>Your Message</th>

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

                            $messo=$booking_row['donormessage'];

                            echo "<td>".$booking_row["donationcenter"];
                            echo "<td>".$booking_row["appointment_publication_date"]; ?> by <?php print $booking_row["appointmentbookerID"];"</td>";
                            echo "<td>".$booking_row['appointment_date']."</td>";
                            echo "<td>".$messo."</td>";




                        }?>
                        </tbody>
                    </table>
                </div>


<div class="container">

<div class="row text-center">
<h2>Update Your Details</h2>
    <h6>You may change your appointment date. Please note our working hours are :</h6> <h6 style="color:deepskyblue;"> (0800-1600 hours)</h6>
</div>
<div>
<form action="edit.php" method="post">
<div class="row">


    <div class="" >
        <h6>Your Name</h6>
        <label>
            <input  type="text"  class="form-control" name="appointmentbookerID" placeholder="" value="<?php echo $new_name ?>">
        </label>
    </div>

    <div class="form-group">
        <label for="donationcenter">Donation Center</label>
        <span class="">
            <select style="width: 270px" name="donationcenter" class="form-control form-control-md" aria-required="true" aria-invalid="false"><option value="Donation Center"><?php echo $center_of_donation ?><option value="Bomet">Bomet</option><option value="Bungoma">Bungoma</option><option value="Busia">Busia</option><option value="Eldoret">Eldoret</option><option value="Embu">Embu</option><option value="Garissa">Garissa</option><option value="Kericho">Kericho</option><option value="Kisii">Kisii</option><option value="Kisumu">Kisumu</option><option value="Kitale">Kitale</option><option value="Kitui">Kitui</option><option value="Kwale">Kwale</option><option value="Lamu">Lamu</option><option value="Lodwar">Lodwar</option><option value="Machakos">Machakos</option><option value="Malindi">Malindi</option><option value="Meru">Meru</option><option value="Migori">Migori</option><option value="Mombasa">Mombasa</option><option value="Nairobi">Nairobi</option><option value="Naivasha">Naivasha</option><option value="Nakuru">Nakuru</option><option value="Nandi">Nandi</option><option value="Narok">Narok</option><option value="Nyeri">Nyeri</option><option value="Thika">Thika</option><option value="Vihiga">Vihiga</option><option value="Voi">Voi</option><option value="Wajir">Wajir</option>
            </select>
        </span>
    </div>


<!--    <h3 style="color: white">Choose Your Appointment Date</h3>-->
    <h6 style="padding-top: 10px" >Choose your preferred time. Working Hours is &nbsp;<a style="color: blueviolet">(0800-1600)</a>

        <br>
        <div class="">
            <label style="color: white">
                <div class="form-label">
                    <div style="overflow:hidden;">
                        <div class="form-group">
                            <div class="row">
                                <div class="">
                                    <label style="margin-top: 8px"><?php echo $date_of_appointment ?>
                                    <input style="margin-top: 8px" type="datetime-local" id="edate"  value="" required name="edate" class="form-control "  placeholder="Time">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </label>
        </div>


<div class="" >
    <h3>Message</h3>
<label>
<input  type="text" style="width: 500px; height: 100px" class="form-control" name="donormessage" placeholder="" value="<?php echo $messo ?>">
</label>
</div>



</div>





</div>
<!--<input  type="hidden" name="appointmentID" value= " --><?php // echo $user_fullname //trim($_GET["fullName"]); ?><!-- ">-->
    <input  type="hidden" name="id" value= "<?php  echo trim($_GET["id"]); ?> ">
<div>
<input type="submit" name="submit" value="UPDATE" class="btn btn-danger">
<a href="../view_your_appointment.php" class="btn btn-outline-primary">BACK</a>
</div>
</form>


</div>



</div>

</body>
</html>
            <!--
	
	
	<?php
	// }

		
	// }	else

	// {
		// echo "No Existing Records";
	// }
}}}
?>




