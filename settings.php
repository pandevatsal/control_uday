<?php
    require 'includes/common.php';
    if(!isset($_SESSION["email_id"])){
        header("location: login.php");
    }
?>
<!DOCTYPE html>
<html>
	<head>
        <?php require "includes/bootstrap.php" ?>
		<title>Settings</title>
        <style>
            @media(min-width:768px){
                .panel{
                    max-width: 30%;
                    margin: auto;
                }
            }
		</style>
	</head>
	<body>
		<?php require 'includes/header.php'; ?>
        <div class="main-div col-xs-12 no-padding">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <p class="col-xs-12">Change Password</p>
                    </div>
                    <div class="panel-body">
                        <form class="form-settings" action="scripts/settings-script.php" method="post">
                            <label class="col-xs-12">Old Password<input type="password" class="form-control" name="old_pass" placeholder="Old Password" required><br></label>
                            <label class="col-xs-12">New Password<input type="password" class="form-control" name="new_pass" placeholder="New Password" required><br></label>
                            <label class="col-xs-12">Retype New Password<input type="password" class="form-control" name="retype_new_pass" placeholder="Retype Password" required><br></label>
                            <div class="col-xs-12"><button class="btn btn-default btn-block" type="submit">Change</button><br></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
		<?php require 'includes/footer.php'; ?>
	</body>
</html>