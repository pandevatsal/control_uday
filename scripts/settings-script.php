<?php
	require '../includes/common.php';
	if(!isset($_SESSION["email_id"])){
		header("location: index.php");
    }else{
        $user_id = $_SESSION["user_id"];
        $email_id = $_SESSION["email_id"];

        $new_pass = md5(mysqli_real_escape_string($conn, $_POST["new_pass"]));
        $retype_new_pass = md5(mysqli_real_escape_string($conn, $_POST["retype_new_pass"]));

        if($new_pass != $retype_new_pass){
            echo "The passwords do not match. Try again.";
        }else{
            $query = "UPDATE users SET password = '$new_pass' WHERE email = '$email_id' AND user_id = '$user_id'";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

            header ("location: ../index.php");
        }
    }
?>