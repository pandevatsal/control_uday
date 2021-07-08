<?php
    require "../includes/common.php";
    
    function GetImageExtension($imagetype){
        if(empty($imagetype)) return false;
        switch($imagetype){
            case 'image/bmp': return '.bmp';
            case 'image/gif': return '.gif';
            case 'image/jpeg': return '.jpg';
            case 'image/png': return '.png';
            default: return false;
        }
    }
    
    $user_id = $_SESSION["user_id"];
    $view_plan_id = $_SESSION["view_plan_id"];
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $date = mysqli_real_escape_string($conn, $_POST["date"]);
    $amount_spent = mysqli_real_escape_string($conn, $_POST["amount_spent"]);
    $person = mysqli_real_escape_string($conn, $_POST["person"]);

    if (!empty($_FILES["bill_name"]["name"])){
        $img_file_name = $_FILES["bill_name"]["name"];
        $img_tmp_name = $_FILES["bill_name"]["tmp_name"];
        $img_type = $_FILES["bill_name"]["type"];
        $img_ext = GetImageExtension($img_type);
        $img_name = date("d-m-Y")."-".time().$img_ext;
        $img_path = "../uploads/".$img_name;
        if(move_uploaded_file($img_tmp_name, $img_path) && $img_ext == true){
            $query = "INSERT INTO users_plans_expenses (user_id, plan_id, title, date, amount_spent, person, bill_name) VALUES ('$user_id', '$view_plan_id', '$title', '$date', '$amount_spent', '$person', '$img_name')";
            mysqli_query($conn, $query);
        }else{
            $query = "INSERT INTO users_plans_expenses (user_id, plan_id, title, date, amount_spent, person) VALUES ('$user_id', '$view_plan_id', '$title', '$date', '$amount_spent', '$person')";
            mysqli_query($conn, $query);
        }
    }else{
        $query = "INSERT INTO users_plans_expenses (user_id, plan_id, title, date, amount_spent, person) VALUES ('$user_id', '$view_plan_id', '$title', '$date', '$amount_spent', '$person')";
        mysqli_query($conn, $query);
    }
    
    header ("location: ../view-plan.php");
?>