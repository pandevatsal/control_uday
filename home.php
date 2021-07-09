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
		<title>Dashboard</title>
		<style>
			.panel{
				margin: 25px 0px 25px 0px;
			}
		</style>
	</head>
	<body>
		<?php require 'includes/header.php'; ?>
		<?php 
			$query1 = "SELECT * FROM users_plans WHERE user_id = '$_SESSION[user_id]'";
			$result1 = mysqli_query($conn, $query1);
			$row1 = mysqli_fetch_array($result1);
		?>
		<div class="main-div col-xs-12 no-padding">
			<?php if(mysqli_num_rows($result1) == 0){ ?>
				<div class="col-xs-12">
                	<h4>You don't have any active plans yet</h4><br>
                	<a href="create-new-plan.php"><button class="btn btn-default">Add Plan</button></a><br>
            	</div>
			<?php }else{ ?>
				<div class="col-sm-12">
					<h2>Your Plans</h2>
				</div>
				<div>
				<?php $result1 = mysqli_query($conn, $query1); while($row1 = mysqli_fetch_array($result1)){ ?>
					<div class="col-sm-4">
						<div class="panel panel-default">
							<div class="panel-heading">
								<p class="col-xs-6"><?php echo $row1["title"] ?></p>
								<p class="col-xs-6 float-right"><i class="glyphicon glyphicon-user"></i> <?php echo $row1["people"] ?></p>
							</div>
							<div class="panel-body">
								<form method="post" action="scripts/view-plan-script.php">
									<b class="col-xs-6">Budget</b>
									<p class="col-xs-6 float-right">₹ <?php echo $row1["budget"] ?></p>
									<b class="col-xs-2">Date</b>
									<p class="col-xs-10 float-right"><?php echo $row1["start_date"] ?> - <?php echo $row1["end_date"] ?></p>
									<button class="btn btn-default btn-block" name="button" value="<?php echo $row1["plan_id"] ?>">View Plan</button>
								</form>
							</div>
						</div>
					</div>
				<?php } ?>
				</div>
				<div class="col-sm-12 navbar-fixed-bottom float-right">
					<a href="create-new-plan.php"><button class="btn btn-default btn-round">+</button></a>
				</div>
			<?php } ?>
		</div>
        <?php require 'includes/footer.php'; ?>
	</body>
</html>