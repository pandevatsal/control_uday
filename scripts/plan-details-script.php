<?php
    require "../includes/common.php";
    $user_id = $_SESSION["user_id"];
    $budget = $_SESSION["budget"];
    $people = $_SESSION["people"];
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $start_date = mysqli_real_escape_string($conn, $_POST["start-date"]);
    $end_date = mysqli_real_escape_string($conn, $_POST["end-date"]);
    
    $query = "INSERT INTO users_plans (user_id, budget, people, title, start_date, end_date) VALUES ('$user_id', '$budget', '$people', '$title', '$start_date', '$end_date')";
    mysqli_query($conn, $query);

    $_SESSION["plan_id"] = mysqli_insert_id($conn);
    $plan_id = $_SESSION["plan_id"];

    for ($x = 1; $x <= $_SESSION["people"]; $x++) {
        $person = mysqli_real_escape_string($conn, $_POST["person$x"]);
        $query = "INSERT INTO users_plans_people (user_id, plan_id, person) VALUES ('$user_id', '$plan_id', '$person')";
        mysqli_query($conn, $query);
    }

    header ("location: ../home.php");
?>