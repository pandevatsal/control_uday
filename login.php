<?php
	require "includes/common.php";
    if(isset($_SESSION["email_id"])){
		header("location: home.php");
    }
?>
<!DOCTYPE html>
<html>
	<head>
        <?php require "includes/bootstrap.php" ?>
		<title>Log in</title>
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
		<?php require "includes/header.php"; ?>
        <div class="main-div col-xs-12 no-padding">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <p class="col-xs-12">Log in</p>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="scripts/login-script.php">
                            <label class="col-xs-12">Email<input type="text" class="form-control" name="email" placeholder="Email" required><br></label>
                            <label class="col-xs-12">Password<input type="password" class="form-control" name="password" placeholder="Password" required><br></label>
                            <div class="col-xs-12"><button class="btn btn-default btn-block">Login</button><br></div>
                        </form>
                    </div>
                    <div class="panel-footer">Don't have an account? <a href="signup.php">Register</a></div>
                </div>
            </div>
        </div>
		<?php require "includes/footer.php"; ?>
	</body>
</html>