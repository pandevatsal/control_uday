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
		<title>View Plan</title>
	</head>
	<body>
		<?php require 'includes/header.php'; ?>
		<?php
			$query1 = "SELECT * FROM users_plans WHERE user_id = '$_SESSION[user_id]' && plan_id = '$_SESSION[view_plan_id]'";
			$result1 = mysqli_query($conn, $query1);
			$row1 = mysqli_fetch_array($result1);
			$query2 = "SELECT * FROM users_plans_people WHERE user_id = '$_SESSION[user_id]' && plan_id = '$_SESSION[view_plan_id]'";
			$result2 = mysqli_query($conn, $query2);
			$row2 = mysqli_fetch_array($result2);
			$query3 = "SELECT * FROM users_plans_expenses WHERE user_id = '$_SESSION[user_id]' && plan_id = '$_SESSION[view_plan_id]'";
			$result3 = mysqli_query($conn, $query3);
			$row3 = mysqli_fetch_array($result3);
			function getColor($n){
				if($n < 0) return 'red';
				elseif($n > 0) return 'green';
				else return 'black';
			}
		?>
		<div class="main-div col-xs-12 no-padding">
			<div class="col-md-8 no-padding">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<b class="col-xs-6">Title</b>
							<p class="col-xs-6 float-right"><?php echo $row1["title"] ?></p>
						</div>
						<div class="panel-body">
							<b class="col-xs-6">People</b>
							<p class="col-xs-6 float-right"><?php echo $row1["people"] ?></p>
							<?php $result3 = mysqli_query($conn, $query3); $total_amount_spent = 0; while($row3 = mysqli_fetch_array($result3)){
								$total_amount_spent += $row3["amount_spent"];
							} ?>
							<b class="col-xs-6">Budget</b>
							<p class="col-xs-6 float-right">₹ <?php echo $row1["budget"] ?></p>
							<b class="col-xs-6">Remaining Amout</b>
							<p class="col-xs-6 float-right" style="color: <?php echo getColor($row1["budget"] - $total_amount_spent) ?>;">₹ <?php echo $row1["budget"] - $total_amount_spent?></p>
							<b class="col-xs-2">Date</b>
							<p class="col-xs-10 float-right"><?php echo $row1["start_date"] ?> - <?php echo $row1["end_date"] ?></p>							
						</div>
					</div>
				</div>
				<?php $result3 = mysqli_query($conn, $query3); while($row3 = mysqli_fetch_array($result3)){ ?>
					<div class="col-md-6">
						<div class="panel panel-default">
							<div class="panel-heading">
								<b class="col-xs-6">Expense</b>
								<p class="col-xs-6 float-right"><?php echo $row3["title"] ?></p>
							</div>
							<div class="panel-body">
								<form method="post" action="scripts/view-plan-script.php">
									<b class="col-xs-6">Amount</b>
									<p class="col-xs-6 float-right">₹ <?php echo $row3["amount_spent"] ?></p>
									<b class="col-xs-6">Paid by</b>
									<p class="col-xs-6 float-right"><?php echo $row3["person"] ?></p>
									<b class="col-xs-6">Paid on</b>
									<p class="col-xs-6 float-right"><?php echo $row3["date"] ?></p>
									<p class="col-xs-12"></p>
									<?php if(empty($row3["bill_name"])){ ?>
										<a href="view-plan.php"><p class="col-xs-12 float-centre">No bill added</p></a>
									<?php }else{ ?>
										<a href=<?php echo "uploads/".$row3["bill_name"]; ?>><p class="col-xs-12 float-centre">View bill</p><a>
									<?php } ?>
								</form>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
			<div class="col-md-4">
				<div class="panel">
					<a href="expense-distribution.php"><button class="btn btn-default btn-block">Expense Distribution</button></a>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<p class="col-xs-12">Add New Expense</p>
					</div>
					<div class="panel-body">
						<form method="post" action="scripts/add-expense-script.php" enctype="multipart/form-data">
							<label class="col-xs-12">Title<input type="text" class="form-control" name="title" placeholder="Title" required><br></label>
							<label class="col-xs-12">Date<input type="date" class="form-control" name="date" min="<?php $row1["start_date"]?>" max="<?php $row1["end_date"] ?>" required></br></label>
							<label class="col-xs-12">Amount Spent<input type="number" class="form-control" name="amount_spent" placeholder="Amount Spent" required></br></label>
							<label class="col-xs-12">Choose a Person:
								<select class="form-control" name="person">
									<?php $result2 = mysqli_query($conn, $query2); while($row2 = mysqli_fetch_array($result2)){ ?>
										<option value="<?php echo $row2["person"] ?>"><?php echo $row2["person"] ?></option>
									<?php } ?>
								</select><br>
							</label>
							<label class="col-xs-12">Upload Bill<input type="file" class="form-control" name="bill_name" placeholder="Upload Bill"><br></label>
							<button class="btn btn-default btn-block" type="submit">Add</button><br>
						</form>
					</div>
				</div>
			</div>
		</div>
        <?php require 'includes/footer.php'; ?>
	</body>
</html>