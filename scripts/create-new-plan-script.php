<?php
    require "../includes/common.php";
    $budget = mysqli_real_escape_string($conn, $_POST["budget"]);
    $people = mysqli_real_escape_string($conn, $_POST["people"]);

    $_SESSION["budget"] = $budget;
    $_SESSION["people"] = $people;

    header ("location: ../plan-details.php");
?>