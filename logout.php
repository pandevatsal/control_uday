<!DOCTYPE html>
<html>
	<head>
		<?php require "includes/bootstrap.php" ?>
		<title>Log out</title>
	</head>
	<body>
		<?php require 'includes/header.php'; ?>
		<?php
			echo "<script>alert('You have been successfully logged out')</script>";
			echo ("<script>location.href='index.php'</script>");
		?>
		<?php require 'includes/footer.php'; ?>
	</body>
</html>