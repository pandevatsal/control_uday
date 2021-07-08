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
		<title>Plan Details</title>
        <style>
            @media(min-width:768px){
                .panel{
                    max-width: 50%;
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
                        <p class="col-xs-12">Add Plan Details</p>
                    </div>
                    <div class="panel-body">
                        <form class="form-signin" method="post" action="scripts/plan-details-script.php">
                            <label class="col-xs-12">Title<input type="text" class="form-control" name="title" placeholder="Title" required><br></label>
                            <label class="col-xs-6">From<input type="date" class="form-control" name="start-date" name="From"></br></label>
                            <label class="col-xs-6">To<input type="date" class="form-control" name="end-date" name="To"></br></label>
                            <label class="col-xs-8">Budget<input type="number" class="form-control" name="initial-budget" placeholder="Initial Budget" value="<?php echo $_SESSION["budget"] ?>" disabled><br></label>
                            <label class="col-xs-4">People<input type="number" class="form-control" name="no-of-people" placeholder="No of people" value="<?php echo $_SESSION["people"] ?>" disabled><br></label>
                            <?php for ($x = 1; $x <= $_SESSION["people"]; $x++) { ?>
                                <label class="col-xs-12">Person <?php echo $x ?><input type="text" class="form-control" name="person<?php echo $x ?>" placeholder="Person <?php echo $x ?>" required><br></label>
                            <?php } ?>
                            <div class="col-xs-12"><button class="btn btn-default btn-block" type="submit">Next</button><br></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
		<?php require "includes/footer.php"; ?>
	</body>
</html>