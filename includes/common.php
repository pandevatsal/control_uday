<?php
    $conn = mysqli_connect("localhost", "u867443879_controluday", "", "u867443879_controluday") or die(mysqli_error($conn));
    
    if(!isset($_SESSION)){
        session_start();
    }
?>