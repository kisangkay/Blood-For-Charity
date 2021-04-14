<?php
session_start();
require('connection_no_notice.php');

$id=trim($_GET["id"]);
$select="SELECT * FROM appointments WHERE appointmentID='$id';";
$answer=$conn->query($select);
$rows=$answer->fetch_assoc();

$donor_name= $rows["appointmentbookerID"];
$center_of_donation= $rows["donationcenter"];
$message_of_donor= $rows["donormessage"];
$date_of_appointment= $rows["appointment_date"];



if (isset($_POST["id"]) and !empty (trim($_POST["id"]))){

    require_once 'connection_no_notice.php';


    //get hidden input

    $id=trim($_POST["id"]);


    //pick from updated values
    $updated_name=$_POST ['appointmentbookerID'];
    $updated_donation_center=$_POST ['donationcenter'];
    $updated_donor_message=$_POST ['donormessage'];
    $updated_appointment_date=$_POST ['appointment_date'];


    //update query
    $sql="UPDATE appointments SET appointmentbookerID = '$updated_name', donationcenter = '$updated_donation_center',donormessage='$updated_donor_message',appointment_date='$updated_appointment_date' WHERE appointmentID='$id';";
    // $sql2 = "SELECT id,fullname,phone,email,gender,sports,sportslevel FROM studentsd WHERE id='$id';";


    $result =mysqli_query($conn,$sql);

    if ($result) {

        echo "<div class='alert alert-success' role='alert'> Record Updated Successfully</div>";
        //var_dump($_POST);

        }
    else
    {
        echo "Error executing query $sql".mysqli_error($conn);
    }
}

else{
    //echo "Id Not Picked";
}




//else {
   // echo "No Data";
    //header("Location: ./");
    //exit();
//}

?>
<div class="row text-center">
    <h2>Update Donor Appointment Details</h2>
    <h6>Update</h6>
</div>
    <link rel="stylesheet" href="../admin/css/bootstrap.css">
<!--    <video autoplay muted loop id="myVideo">-->
<!--        <source src="../admin/videos/hearts.mp4" type="video/mp4">-->
<!--    </video>-->
    <div class="container">

<!--        <table style="color: white" class="table table-bordered table-striped m-5">-->
<!--            <thead>-->
<!--            <tr>-->
<!--                <th>Donation Branch :-&nbsp</th>-->
<!--                <th>Booked on:-</th>-->
<!--                <th>Appointment Date: </th>-->
<!--                <th>Message</th>-->
<!---->
<!--            </tr>-->
<!--            </thead>-->
<!--            <tbody>-->
<!--            <style>-->
<!--                td{-->
<!--                    color: white;-->
<!--                }-->
<!--            </style>-->

<!--           <td> <div class="" >-->
<!--                <h6></h6>-->
<!--                <label>-->
<!--                    <input  type="text"  class="form-control" name="appointmentbookerID" placeholder="" value="--><?php //echo $donorName ?><!--">-->
<!--                </label>-->
<!--               </div></td>-->
<!---->
<!--            <td> <div class="" >-->
<!--                    <h6></h6>-->
<!--                    <label>-->
<!--                        <input  type="text"  class="form-control" name="donationcenter" placeholder="" value="--><?php //echo $don_cent ?><!--">-->
<!--                    </label>-->
<!--                </div></td>-->
<!---->
<!--            <td> <div class="" >-->
<!--                    <h6></h6>-->
<!--                    <label>-->
<!--                        <input  type="text"  class="form-control" name="donormessage" placeholder="" value="--><?php //echo $don_mes ?><!--">-->
<!--                    </label>-->
<!--                </div></td>-->
<!---->
<!--            <td> <div class="" >-->
<!--                    <h6></h6>-->
<!--                    <label>-->
<!--                        <input  type="text"  class="form-control" name="appointment_date" placeholder="" value="--><?php //echo $app_date ?><!--">-->
<!--                    </label>-->
<!--                </div></td>-->



    <div class="container">

        <div>
            <form action="" method="post">
                <div class="row">
                     <div class="" >
                            <h6>Donor Name</h6>
                            <label>
                                <input  type="text"  class="form-control" name="appointmentbookerID" placeholder="" value="<?php echo $donor_name ?>">
                            </label>
                        </div>

                     <div class=""style="padding-top: 10px" >
                            <h6>Donation Center</h6>
                            <label>
<!--                                <input  type="text"  class="form-control" name="donationcenter" placeholder="" value="--><?php //echo $center_of_donation;
//                                ?><!--">-->
                                <select name="donationcenter" class="form-control form-control-md" aria-required="true" aria-invalid="false"><option value="Donation Center"><?php echo $center_of_donation ?></option><option value="Bomet">Bomet</option><option value="Bungoma">Bungoma</option><option value="Busia">Busia</option><option value="Eldoret">Eldoret</option><option value="Embu">Embu</option><option value="Garissa">Garissa</option><option value="Kericho">Kericho</option><option value="Kisii">Kisii</option><option value="Kisumu">Kisumu</option><option value="Kitale">Kitale</option><option value="Kitui">Kitui</option><option value="Kwale">Kwale</option><option value="Lamu">Lamu</option><option value="Lodwar">Lodwar</option><option value="Machakos">Machakos</option><option value="Malindi">Malindi</option><option value="Meru">Meru</option><option value="Migori">Migori</option><option value="Mombasa">Mombasa</option><option value="Nairobi">Nairobi</option><option value="Naivasha">Naivasha</option><option value="Nakuru">Nakuru</option><option value="Nandi">Nandi</option><option value="Narok">Narok</option><option value="Nyeri">Nyeri</option><option value="Thika">Thika</option><option value="Vihiga">Vihiga</option><option value="Voi">Voi</option><option value="Wajir">Wajir</option>
                                </select>
                            </label>
                        </div>

                     <div class="" style="padding-top: 10px">
                            <h6>Donor Message</h6>
                            <label>
                                <input  type="text" style="width: 500px; height: 70px"  class="form-control" name="donormessage" placeholder="" value="<?php echo $message_of_donor ?>">
                            </label>

                        </div>


                     <div class="" style="padding-top: 10px">
                            <h6>Appointment Date</h6>
                            <label><?php echo $date_of_appointment ?>
                                <input  type="datetime-local"  class="form-control" name="appointment_date" placeholder="" value="">
                            </label>
                        </div>
                </div>


        </div>

        <input  type="hidden" name="id" value= "<?php  echo trim($_GET["id"]); ?> ">
        <div style="padding-left: 50px">
            <input type="submit" value="UPDATE" class="btn btn-danger">
            <a href="../view_appointments.php" class="btn btn-outline-primary">BACK</a>
        </div>
        </form>


    </div>



</div>

</body>
</html>
<!--


// }


// }	else

// {
// echo "No Existing Records";
// }

}
?>




