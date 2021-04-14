
<?php

    require_once "includes/db_connect.php";

	include "templates/header.php";
//if(!isset($_SESSION["control"])) {
//    include "templates/navGuest.php";
//}
//else {
//    include "templates/navDonor.php";
//}
?>

<!--    <link rel="stylesheet" href="admin/css/icons_style.css">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <main role="main">


      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron"  style="padding-top: 70px;">
        <div class="container">
          <h2 class="display-5" style="text-align: center">Booked Appointments for Blood Donation</h2>
            <hr>
        </div>
      </div>

      <div class="container">
        <!-- Example row of columns -->
        <div class="row">
<?php
if (isset($_GET["appointmentID"])){
//	$appointmentID = $_GET["appointmentID"];
//
//    $select_booking = "SELECT * FROM appointments LEFT JOIN users ON (users.`userId` = appointments.`appointment_booker_id`) WHERE appointmentID = '$appointmentID' LIMIT 1";
//
//	$booking_result = $conn->query($select_booking);
//
//
//    if ($booking_result->num_rows > 0){ //Verifying if at least one row (num_rows or in other words number_of_rows is greater than (>) zero ) was found as a result of the select query above.

        //$booking_row = $booking_result->fetch_assoc();
?>
<!--        <div class="row">-->
<!--          <div class="col-md-8">-->
<!--            <h2>Donation Branch :---><?php //print $booking_row["donationcenter"]; ?><!--</h2>-->
<!--           -->
<!--           <h6>Published on: --><?php //print date("jS F Y", $booking_row["appointment_publication_date"]); ?><!-- by --><?php //print $booking_row["fullName"]; ?><!--</h6>-->
<!---->
<!--		     <p>--><?php //print $booking_row["donormessage"]; ?><!--</p>-->
<!--		   -->
<!--          </div>-->
<!--          <div class="col-md-4">-->
<!--            <h2>Heading</h2>-->
<!--            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>-->
<!--            <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>-->
<!--          </div>-->
<!--        </div>-->
<?php
//}else{
//        header("Location: ./");
//		exit();
//}
}else{
    /*****
		The $select_art query below has a MySQL JOIN syntax. This means we're selecting data from 2 different tables using a joint or a reference key, a foreign key. Remember the author's details are stored in users table and the articles are stored in the articles table. It is therefore important to select data while matching "users.`userId` with corresponding articles.`article_authorId`" For us to be able to match the article to the author (owner).	
    *****/
    $select_booking = "SELECT * FROM appointments LEFT JOIN users ON (users.`userId` = appointments.`appointment_booker_id`)";
    
    /*****
    After database connection using new mysqli method, database connection object is returned. A query ($select_art) is passed to connection object's query method. This function returns a result set. Here we call it Article results or $art_res
    *****/
    $booking_result = $conn->query($select_booking);
	
	
    if ($booking_result->num_rows > 0){ //Verifying if at least one row (num_rows or in other words number_of_rows is greater than (>) zero ) was found as a result of the select query above.
        
        while($booking_row = $booking_result->fetch_assoc()){
			
	/******
	Likewise procedural way a row from result set is fetched using a fetch_assoc() method.

	This method returns a single row of result, so we use a while loop to fetch all rows in result set. In here, column names are used as array indexes to access result like an article title we do $art_row["article_title"]
	
	See example on for MySQLi Object-oriented: https://www.w3schools.com/php/php_mysql_select.asp
	
	******/
        ?>

            <div class="container">
                <table style="color: white" class="table table-bordered table-striped m-5">
                    <thead>
                    <tr>
                        <th style="width: 150px">Donation ID :-</th>
                        <th style="width: 200px">Donation Branch :-</th>
                        <th style="width: 250px">Booked on:-</th>
                        <th style="width: 200px">Appointment Date: </th>
                        <th>Message</th>
                        <th>Change</th>
                        <th>Delete</th>

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
                        echo "<td>". $booking_row["appointmentID"];
                        echo "<td>". $booking_row["donationcenter"];


//                        echo "<td>".date("jS F Y", $booking_row["appointment_publication_date"]); ?><!-- by --><?php //print $booking_row["appointmentbookerID"];"</td>";
                        echo "<td>".$booking_row["appointment_publication_date"]; ?>  by <?php print $booking_row["fullName"]; ?>
                        <?php
//                        echo "<td>".date("jS F Y", $booking_row["appointment_publication_date"]); ?><!-- by --><?php //print $booking_row["appointmentbookerID"];"</td>";
                        echo "<td>".$booking_row['appointment_date']."</td>";
                        echo "<td>".$booking_row['donormessage']."</td>";
//                                <h6>Published on: <?php print date("jS F Y", $art_row["article_publication_date"]); ?><!-- by --><?php //print $art_row["fullName"]; <!--</h6>-->




                        //trying to use it in the next page
                        $app_ID=$booking_row['appointmentbookerID'];
                        $don_cent=$booking_row['donationcenter'];
                        $don_mes=$booking_row['donormessage'];
                        $app_date=$booking_row['appointment_date'];

                        echo "<td><a href='data_process/edit_admin.php?id=".$booking_row['appointmentID']."'><span class='fa fa-pencil'>";
                        echo "<td><a href='data_process/_delete.php?id=".$booking_row['appointmentID']."'><span class='fa fa-trash'>";


                    }?>
                    </tbody>
                </table>
            </div>
		
		
		
		
		
		
		
		
		
		
<!--                  <div class="col-md-6">-->
<!--            <h3>Donation Branch :-&nbsp--><?php //print $booking_row["donationcenter"]; ?><!--</h3>-->
<!--           -->
<!--           <h6>Booked on: --><?php //print date("jS F Y", $booking_row["appointment_publication_date"]); ?><!-- by --><?php //print $booking_row["appointmentbookerID"]; ?><!--</h6>-->
<!--            -->
<!--   --><?php //
//			$max_words = 20; //initializing the number of words (20) to be printed as a brief story before the viewer reads more
//			$art_fullText = addslashes($booking_row["donormessage"]); //adding slashes in case of php encounters quotation marks
//
//			$shown_string = implode(' ', array_slice(str_word_count(addslashes($art_fullText), 2), 0, $max_words)) . ' ... ' ; //converting the full text into an array storing all words, then slicing the array at the maximum number of words determined by $max_words
//			?>
<!--            -->
<!--			<p>--><?php //print $shown_string; //Print the sliced array ?><!--</p>-->
<!--		-->
<!--            <p><a class="btn btn-info" href="view_appointments.php?appointmentID=--><?php //print $booking_row["appointmentID"]; ?><!--" role="button">Edit Appointment</a></p>-->
<!--        </div>-->
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
<?php
	include "templates/footer.php";
?>