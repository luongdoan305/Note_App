<?php
    include "./database.php";
    $id = $_GET["id"];
    $deleteQuery = "DELETE FROM `note_1` WHERE `STT` = '$id'";
    $res = mysqli_query($con,$deleteQuery);
    header("location:./index.php");
?>