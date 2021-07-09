<?php
    require "../includes/common.php";
    $email_id = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    $query = "SELECT * FROM users WHERE email = '$email_id' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 0){
        echo "<script>alert('User account does not exist, Try again')</script>";
        echo ("<script>location.href='../login.php'</script>");
    }
    else{
        $row = mysqli_fetch_array($result);
        $_SESSION["email_id"] = $email_id;
        $_SESSION["user_id"] = $row["user_id"];

        header("location: ../home.php");
    }
?>