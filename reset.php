<?php
require_once "includes/db_connect.php";
include "templates/header.php";

if (isset($_POST["reset"])){

                require 'data_process/connection_no_notice.php';
                $truncatetable= "TRUNCATE TABLE messages,appointments";
                $truncate_result = $conn->query($truncatetable);

                if($truncate_result !== FALSE){
                    ?>
                    <script>
                        window.alert("Appointments and Messages from Contact Us Records Successfully Deleted");

                    </script>
                        <?php
//                    echo "<h4 class='bg-info'>Appointments and Messages from Contact Us Records Successfully Deleted</h4>";
                }
                else{
                    ?>
                    <script>
                        window.alert("No Table Has Been Truncated");
                    </script>
                    <?php
//                    echo  "No Table Has Been Truncated";
                }
}

?>
<div style="padding: 80px; text-align: center">
    <h3 class="bg-danger" style="font-style: italic ">You Are About To Reset The System.
        This Will Delete All APPOINTMENTS and MESSAGES From The Database!! Use With Caution!!</h3>
    <hr>


<!--    <button class="btn btn-danger" name=""  onclick="DELETE()" type="" href="" style="font-size: 50px">RESET</button>-->
<!--    <button class="btn btn-danger" onclick="DELETE()" style="font-size: 50px">RESET</button>-->


    <div>
        <a class="btn btn-danger" style="font-size: 40px; padding-top: 10px;" href="" type="" data-bs-toggle="modal" data-bs-target="#loginmodal">
            RESET
        </a>
    </div>
    <div>
        <a style="font-size: 32px; padding-top: 10px; margin-top: 5px;" class="btn btn-success" href="admin.php" value="CANCEL">CANCEL</a>
    </div>




        <div style="color: black" class="modal fade" id="loginmodal" tabindex="-1" aria-labelledby="loginmodal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="loginmodal"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="display: flex; justify-content: center; text-align: center">

                        <!-- Modal Beginning -->
                        <div class="col-md-6" style="">
                            <h2>Sign In</h2>
                            <form method = "POST" action = "" autocomplete = "off" accept-charset="UTF-8">

                                <p style="color:red;" >Are You Sure You Want To Reset Appointments and Messages Data? This Process is Irreversible</p>

                                <div class="form-group">
                                    <input style="margin-top: 5px;" class="btn btn-danger" type="submit" name="reset"  value="RESET">
                                </div>
                            </form>
                            <div class="form-group">
<!--                                <input style="margin-top: 5px;" class="btn btn-success" type="" name="cancel"  value="CANCEL">-->
                                <a style="margin-top: 5px;" class="btn btn-success" href="admin.php" value="CANCEL">CANCEL</a>
                            </div>
                        </div>





    <p id="demo"></p>
<!--    <script>-->
<!--        function DELETE() {-->
<!--            var txt;-->
<!--            var question = prompt("Are You Sure You Want to Proceed?:", "Enter 'YES' To Proceed");-->
<!--            if (question != 'YES') {-->
<!--                txt = "You Entered A Different Input";-->
<!--            } else {-->
<!---->
<!---->
<!--                var htmlString="--><?php
//                require 'data_process/connection_no_notice.php';
//                $truncatetable= "TRUNCATE TABLE messages";
//                $truncate_result = $conn->query($truncatetable);
//                //if($conn->query($truncate_tables) === TRUE){
//                if($truncate_result !== FALSE){
//                    echo "<h4 class='bg-info'>Appointments and Messages from Contact Us Records Successfully Deleted</h4>";
//                }
//                else{
//                    echo  "No Table Has Been Truncated";
//                }
//                ?>
<!--                        ";-->
<!--//                alert(htmlString);-->
<!--//            }-->
<!--//            //document.getElementById("demo").innerHTML = txt;-->
<!--//        }-->
<!--//        //window.alert("Are you sure you want to proceed??")-->
   </script>

</div>

