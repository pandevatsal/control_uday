<?php
	require "includes/common.php";
    if(!isset($_SESSION["email_id"])){
		header("location: login.php");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<?php require "includes/bootstrap.php" ?>
		<title>Create New Plan</title>
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
						<p class="col-xs-12">Create New Plan</p>
					</div>
					<div class="panel-body">
						<form method="post" action="scripts/create-new-plan-script.php">
							<label class="col-xs-12">Budget<input type="number" class="form-control" name="budget" min="500" max="100000" placeholder="Enter a budget from 500/- to 100000/-" title="Allowed budget is 500/- to 100000/-" required><br></label>
							<label class="col-xs-12">People<input type="number" class="form-control" name="people" min="1" max="10" placeholder="Enter a number from 1 to 10" title="Allowed number of people are 1 to 10" required><br></label>
							<div class="col-xs-12"><button class="btn btn-default btn-block" type="submit">Next</button><br></div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<?php require "includes/footer.php"; ?>
	</body>
</html>