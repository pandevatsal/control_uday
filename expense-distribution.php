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
		<title>Expense Distribution</title>
	</head>
	<style>
        @media(min-width:768px){
            .panel{
                max-width: 50%;
                margin: auto;
            }
        }
	</style>
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
			$query4 = "SELECT * FROM users_plans_expenses WHERE user_id = '$_SESSION[user_id]' && plan_id = '$_SESSION[view_plan_id]' && person = '$row2[person]'";
			$result4 = mysqli_query($conn, $query4);
			$row4 = mysqli_fetch_array($result4);
			function getColor($n){
				if($n < 0) return 'red';
				elseif($n > 0) return 'green';
				else return 'black';
			}
			function changeText($t){
				if($t < 0) return 'Owes ₹ '.abs($t);
				else return 'Gets ₹ '.$t;
			}
		?>
		<div class="main-div col-xs-12 no-padding">
			<div class="col-xs-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<b class="col-xs-12">Expense Distribution</b>
					</div>
					<div class="panel-body">
						<b class="col-xs-6">Initial Budget</b>
						<p class="col-xs-6 float-right">₹ <?php echo $row1["budget"] ?></p>
						<p class="col-xs-12"></p>
						<?php $result2 = mysqli_query($conn, $query2); while($row2 = mysqli_fetch_array($result2)){ ?>
							<b class="col-xs-6"><?php echo $row2["person"] ?></b>
							<?php
								$query4 = "SELECT * FROM users_plans_expenses WHERE user_id = '$_SESSION[user_id]' && plan_id = '$_SESSION[view_plan_id]' && person = '$row2[person]'";
								$result4 = mysqli_query($conn, $query4);
								$row4 = mysqli_fetch_array($result4);
								$personal_total_amount_spent = 0;
								do{								
									$personal_total_amount_spent += $row4["amount_spent"];
								}while($row4 = mysqli_fetch_array($result4))
							?>
							<p class="col-xs-6 float-right">₹ <?php echo $personal_total_amount_spent ?></p>
						<?php } ?>
						<p class="col-xs-12"></p>
						<?php $result3 = mysqli_query($conn, $query3); $total_amount_spent = 0; while($row3 = mysqli_fetch_array($result3)){
							$total_amount_spent += $row3["amount_spent"];
						} ?>
						<b class="col-xs-6">Total Amount Spent</b>
						<p class="col-xs-6 float-right">₹ <?php echo $total_amount_spent ?></p>
						<b class="col-xs-6">Remaining Amout</b>
						<p class="col-xs-6 float-right" style="color: <?php echo getColor($row1["budget"] - $total_amount_spent) ?>;">₹ <?php echo $row1["budget"] - $total_amount_spent ?></p>
						<p class="col-xs-12"></p>
						<b class="col-xs-6">Individual Shares</b>
						<p class="col-xs-6 float-right">₹ <?php echo $individual_shares = $total_amount_spent / $row1["people"] ?></p>
						<p class="col-xs-12"></p>
						<?php $result2 = mysqli_query($conn, $query2); while($row2 = mysqli_fetch_array($result2)){ ?>
							<b class="col-xs-6"><?php echo $row2["person"] ?></b>
							<?php
								$query4 = "SELECT * FROM users_plans_expenses WHERE user_id = '$_SESSION[user_id]' && plan_id = '$_SESSION[view_plan_id]' && person = '$row2[person]'";
								$result4 = mysqli_query($conn, $query4);
								$row4 = mysqli_fetch_array($result4);
								$personal_total_amount_spent = 0;
								do{								
									$personal_total_amount_spent += $row4["amount_spent"];
								}while($row4 = mysqli_fetch_array($result4))
							?>
							<p class="col-xs-6 float-right" style="color: <?php echo getColor($individual_shares - $personal_total_amount_spent) ?>;"><?php echo changeText($individual_shares - $personal_total_amount_spent) ?></p>
						<?php } ?>
						<p class="col-xs-12"></p>
						<div class="float-centre">
							<a href="view-plan.php"><button class="btn btn-default">Go back</button></a>
						</div>
						<p class="col-xs-12"></p>
					</div>
				</div>
			</div>
		</div>
        <?php require 'includes/footer.php'; ?>
	</body>
</html>