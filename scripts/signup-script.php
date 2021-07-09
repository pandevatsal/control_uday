<?php
    require "../includes/common.php";
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $email_id = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $query1 = "SELECT user_id FROM users WHERE email = '$email_id' OR username = '$username'";
    $query2 = "INSERT INTO users (username, email, password) VALUES ('$username', '$email_id', '$password')";

    $result = mysqli_query($conn, $query1);
    if(mysqli_num_rows($result) > 0){
        echo "<script>alert('User account already exists, Try another')</script>";
        echo ("<script>location.href='../signup.php'</script>");
    }else{
        $result = mysqli_query($conn, $query2);
        $_SESSION["email_id"] = $email_id;
        $_SESSION["user_id"] = mysqli_insert_id($conn);

        header("location: ../index.php");
    }
?>