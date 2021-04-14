<?php
    require_once "includes/db_connect.php";

include "templates/header.php";
include "templates/navAdmin.php";

?>

    <main role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="" style="padding-top: 80px">
        <div class="container">
          <h1 class="display-3">View Messages</h1>
        </div>
      </div>
      <div class="container">
        <!-- Example row of columns -->
        <div class="row">
          <div class="col-md-12">
<?php
$messageId = $_GET["messageId"];
$select_mgs = "SELECT * FROM messages WHERE messageId = '$messageId' LIMIT 1";
    $msg_res = $conn->query($select_mgs);
    if ($msg_res->num_rows > 0){
        $msg_row = $msg_res->fetch_assoc();
        ?>
            <h2><?php print $msg_row["msg_subject"]; ?></h2>
           
           <h6>Published on: <?php print date("jS F Y H:i:s", $msg_row["msg_datetime"]); ?> by <?php print $msg_row["msg_fullName"]; ?></h6>
            
            <p><?php print $msg_row["msg_fullText"]; ?></p>
            
        <?php
                
    }else{
        echo 'No data';
    }         
?>
          </div>
        </div>

      </div> <!-- /container -->

    </main>

<?php
include 'templates/footer.php';
?>


  </body>
</html>
