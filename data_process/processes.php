<?php
	session_start(); 
    require('connection_no_notice.php');


   if (isset($_POST["sign_up"])){


       //$conn=mysqli_connect("localhost","root","", "bloodforcharity");
       $password= $_POST['password'];
       // Validate password strength
       $uppercase = preg_match('@[A-Z]@', $password);
       //$lowercase = preg_match('@[a-z]@', $password);
       $number = preg_match('@[0-9]@', $password);
       //$specialChars = preg_match('@[^\w]@', $password);

       if (!$uppercase || !$number || strlen($password) < 6) {
           //echo '<div class="alert alert-danger" role="alert">Password should be at least 6 characters in length <br> and should include at least one upper case letter and one number.</div>';
           ?>
           <script>
               window.alert("Password should be at least 6 characters in length \n and should include at least one upper case letter and one number.")
               location.replace("../index.php")
           </script>
               <?php
           exit();

       } else {
           echo 'Strong password.';
       }


       $fullName = mysqli_real_escape_string($conn, $_POST["fullName"]);
    $email_address = mysqli_real_escape_string($conn, $_POST["email_address"]);
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);






    $ConfPass = mysqli_real_escape_string($conn, $_POST["ConfPass"]);
    //$userRole = mysqli_real_escape_string($conn, $_POST["userRole"]);

    $userRole='Donor';
    

    $hash_pass = password_hash($ConfPass, PASSWORD_BCRYPT);



       $getemail="SELECT * FROM users WHERE email = '".$_POST['email_address']."'";

       $runusers =mysqli_query($conn,$getemail);

       if (mysqli_num_rows($runusers)>0){
           //echo '<div class="alert alert-danger" role="alert">This Email Already Exists!</div>';
           ?>
           <script>
           window.alert("Email Already Exists!")
           location.replace("../index.php");
                          </script>
<?php

           //header("Location: ../");
           exit();
       }

       $getusername="SELECT * FROM users WHERE username = '".$_POST['username']."'";

       $runusername =mysqli_query($conn,$getusername);

       if (mysqli_num_rows($runusername)>0){
           ?>
           <script>
               window.alert("Username Already Exists!")
               location.replace("../index.php");
           </script>
           <?php

           //header("Location: ../");
           exit();
       }




       else{


    $user_insert = "INSERT INTO users(fullName, email, username, password, createdtime, user_role) VALUES ('$fullName', '$email_address', '$username', '$hash_pass', UNIX_TIMESTAMP(), '$userRole')";
    
    if($conn->query($user_insert) === TRUE){
        header("Location: ../");
        exit();
        print "Record stored successfully";
    }else{
        print "Failed: " . $conn->error;
    }}
    
    }







if (isset($_POST["send_message"])){

    $emailfetch= $_SESSION["control"]["email"];
    $fullnamefetch= $_SESSION["control"]["fullName"];

    $email_address = $emailfetch;
    $fullName = $fullnamefetch;
    //$email_address = mysqli_real_escape_string($conn, $_POST["email_address"]);
    //$fullName = mysqli_real_escape_string($conn, $_POST["fullName"]);
    $subject = mysqli_real_escape_string($conn, $_POST["subject"]);
    $textMessage = mysqli_real_escape_string($conn, $_POST["textMessage"]);


    $msg_insert = "INSERT INTO messages(msg_fullName, msg_email, msg_subject, msg_fullText, msg_datetime) VALUES ('$fullName', '$email_address', '$subject', '$textMessage', UNIX_TIMESTAMP())";


    if($conn->query($msg_insert) === TRUE){

        ?>
        <script>
            window.alert("Your Message Has Been Sent Successfully. We Will Reach You As Soon As Possible");
            location.replace("../index.php");
        </script>
        <?php

//        header("Location: ../index.php");
//        exit();
    }else{
        print "Failed: " . $conn->error;
    }

}

if (isset($_POST["save_article"])){

    $article_authorId = mysqli_real_escape_string($conn, $_POST["article_authorId"]);
    $article_title = mysqli_real_escape_string($conn, $_POST["article_title"]);
    $article_full_text = mysqli_real_escape_string($conn, $_POST["article_full_text"]);

    //Since the publication field is not mandatory, we need to verify if it contains any data upon submission, ELSE the publication time is set as NOW using time() on line 15
    if(isset($_POST["article_publication_date"])){
        $pub_date = mysqli_real_escape_string($conn, $_POST["article_publication_date"]);
        //Converting the into date into an UNIX_DATETIME()
        $date = new DateTime($pub_date);
        $article_publication_date = strtotime( $date->format('Y-m-d H:i:s') );
    }else{
        $article_publication_date = time();
    }
    // $article_photo = mysqli_real_escape_string($conn, $_POST["article_photo"]);

    $art_insert = "INSERT INTO articles(article_authorId, article_title, article_full_text, article_publication_date, article_created_date, article_last_update) VALUES ('$article_authorId', '$article_title', '$article_full_text', '$article_publication_date', UNIX_TIMESTAMP(), UNIX_TIMESTAMP())";

    if($conn->query($art_insert) === TRUE){
        header("Location: ../view_art.php");
        exit();
    }else{
        print "Failed: " . $conn->error;
    }

}


?>