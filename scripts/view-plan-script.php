<?php
    require "../includes/common.php";
    $_SESSION["view_plan_id"] = $_POST["button"];

    header ("location: ../view-plan.php");
?>