<?php

	 if(!isset($_SESSION["control"])){
		 //$Message = urlencode("Please_Login_First");
		//header("Location: ./?not_set/Message=".$Message);

		 ?>
		 <script>
			 window.alert("Please Login First");
			 location.replace("index.php");
		 </script>

		 <?php

		 //header("Location:../index.php");
		 //die;

		exit();
	 }
?>  