<?php
    require_once "includes/db_connect.php";

include "templates/header.php";
include "templates/navAdmin.php";

?>

    <main role="main">


      <div class="">
        <div class="container" style="padding-top: 58px">
          <h1 class="display-3">View Messages</h1>
        </div>
      </div>
      <div class="container">
        <!-- Example row of columns -->
        <div class="row">
          <div class="col-md-12">
<?php
    $select_mgs = "SELECT * FROM messages";
    $msg_res = $conn->query($select_mgs);
    if ($msg_res->num_rows > 0){
        while($msg_row = $msg_res->fetch_assoc()){
        ?>
            <h2><?php print $msg_row["msg_subject"]; ?></h2>
           
           <h6>Published on: <?php print date("jS F Y H:i:s", $msg_row["msg_datetime"]); ?> by <?php print $msg_row["msg_fullName"]; ?></h6>
            
            <p><?php 
			$max_words = 50;
			$msg_fullText = addslashes($msg_row["msg_fullText"]);
			$shown_string = implode(' ', array_slice(str_word_count(addslashes($msg_fullText), 2), 0, $max_words)) . ' ... ' ;
			
			print $shown_string;


			?>
			</p>
            
            <p><a class="btn btn-secondary" href="read_more.php?messageId=<?php print $msg_row["messageId"]; ?>" role="button">Read more about <?php print $msg_row["msg_subject"]; ?> &raquo;</a></p>
        <?php
        }         
    }else{
        echo 'No data';
    }         
?>
          </div>
        </div>

      </div> <!-- /container -->

    </main>
<?php
	include "templates/footer.php";
?>