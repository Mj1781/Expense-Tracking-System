<?php
    $id = $_GET['pid'];
    include './dbconfig.php';
    $conn = mysqli_connect(HOSTNAME, USERNAME, "",DBNAME);
    $qry = "delete from expense where id = $id";
    mysqli_query($conn,$qry);
    header("location:manage_expense.php");
?>