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
		<title>Sign up</title>
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
		<?php require "includes/header.php" ?>
		<div class="main-div col-xs-12 no-padding">
			<div class="col-xs-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<p class="col-xs-12">Sign up</p>
					</div>
					<div class="panel-body">
						<form class="form-signin" method="post" action="scripts/signup-script.php">
							<label class="col-xs-12">Username<input pattern="[a-z]{4,}" title="Username must be of more than 4 lowercase letters" type="text" class="form-control" name="username" placeholder="Username" required><br></label>
							<label class="col-xs-12">Email<input pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Email must be of the following format user@example.com" type="text" class="form-control" name="email" placeholder="Email" required><br></label>
							<label class="col-xs-12">Password<input pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Password must contain at least one number, an uppercase letter, a lowercase letter and at least 6 or more characters" type="password" class="form-control" name="password" placeholder="Password" required><br></label>
							<div class="col-xs-12"><button class="btn btn-default btn-block" type="submit">Sign up</button><br></div>
						</form>
					</div>
					<div class="panel-footer">Already have an account? <a href="login.php">Login</a></div>
				</div>
			</div>
		</div>
		<?php require "includes/footer.php"; ?>
	</body>
</html>