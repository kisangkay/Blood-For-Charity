<?php
require_once "includes/db_connect.php";

include "templates/header.php";
include "templates/navGuest.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="admin/css/bootstrap.css">
    <script src="admin/js/bootstrap.js" ></script>
    <script src="admin/js/jquery.js" ></script>
    <title>Login</title>
</head>
<body>

<style>
    body{
        margin-top: 50px;
        display: flex;
        justify-content: center;
        color: black;

    }
</style>

</html>

<html lang=eng>


<div style="align-content: center; border-radius: 16px;margin-top: 100px" class="container m-5 bg-light p-5  col-4">

    <div style="">
        <div class="modal-body" style="display: flex; justify-content: center; text-align: center">

            <!-- Modal Beginning -->
            <div class="col-md-6" style="">
                <h2>Sign In</h2>
                <form method = "POST" action = "index.php" autocomplete = "off" accept-charset="UTF-8">
                    <div class="form-group">
                        <label for="username">UserName</label>
                        <input placeholder="Enter your UserName" class="form-control form-control-md" name="uName" type="text" id="username" required autofocus />
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input placeholder="Enter your Password" class="form-control form-control-md" name="pWord" type="password" id="password" required />
                    </div>
                    <div class="form-group">
                        <input style="margin-top: 5px;" class="btn btn-primary" type="submit" name="sign_in"  value="Sign In">
                    </div>
                </form>
            </div>

            <!-- Modal Ending-->



        </div>
    </div>
</div>


</body>
</html>