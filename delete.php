<?php
include 'database.php';
$id = $_GET['id'];
$sql = "DELETE FROM student WHERE id = '$id'";

if(mysqli_query($conn,$sql)){
    header('location: display.php');
}else{
    echo "error: ".mysqli_error($conn);
}

?>