<?php
session_start();
require('connection_no_notice.php');

if (isset($_POST["id"]) and !empty (trim($_POST["id"]))){

    require('connection_no_notice.php');
	

	$id=trim($_POST["id"]);

	
	$sql="DELETE FROM appointments WHERE appointmentID='$id'";
	
	
	$result =mysqli_query($conn,$sql);
	
	if ($result) {
	    ?>
<script>
    window.alert("Record Deleted Successfully");
    location.replace("../view_appointments.php");
</script>
<?php
//		echo "<div class='alert alert-success' role='alert'> Record Deleted Successfully</div>";
//		echo "<a href='../view_appointments.php' class='btn btn-outline-primary'>EXIT</a>";
		die();
	}
	else 
	{
		echo "Error executing query $sql".mysqli_error($conn);
		
	}
	//die();
	}
	
	else {
		 		//echo "<div class='alert alert-success' role='alert'> Id Parameter was not picked</div>";
	}
	

?>





<html lang=en>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../admin/css/bootstrap.css">
<script src="admin/js/bootstrap.js" ></script>
<script src="admin/js/jquery.js" ></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



<body>
<div class="container" style="padding-top: 5px">

<div class="row text-center">
<h2 style="color: white">DELETE RECORD</h2>

</div>

<div class="text-center alert alert-danger">

<form action="" method="post">

<div>
<input type="hidden" name="id" value= " <?php echo trim($_GET["id"]); ?> ">
<p> Are you sure you want to delete the record?</p>

</div>

<div>
<input type="submit" value="YES" class="btn btn-danger">
<a href="../view_appointments.php" class="btn btn-outline-primary">CANCEL</a>

</div>
</form>


</div>



</div>

</body>
</html>