<?php
    require 'includes/common.php'; 
    if(isset($_SESSION["email_id"])){
		header("location: home.php");
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <?php require "includes/bootstrap.php" ?>
        <title>Home</title>
        <style>
            .navbar{
                margin-bottom: 0px;
            }
            body{
                padding-top: 0px;
                padding-bottom: 0px;
            }
            .footer{
                margin-top: 0px;
            }
        </style>
    </head>
    <body>
        <?php require 'includes/header.php'; ?>
        <div class="main-div">
            <div class="banner-image">
                <div class="col-xs-12">
                    <div class="container-fluid">
                        <h1>CONT₹OL BUDGET</h1>
                        <h4>Control your expenses with our great set of online tools</h4><br>
                        <a href="login.php"><button class="btn btn-default">Log in</button></a><br>
                    </div>
                </div>
            </div>
        </div>
        <?php require 'includes/footer.php'; ?>
    </body>
</html>