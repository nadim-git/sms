<?php
include 'database.php';
session_start();
if(!isset($_SESSION['username'])){
    header('location: login.php');
}
// error_reporting(0);
if(isset($_POST['insert'])){
    $rollno = $_POST['rollno'];
    $name = $_POST['name'];
    $city = $_POST['city'];
    $pcont = $_POST['pcont'];
    $std = $_POST['std'];
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];

    
    $folder = "image/" . $filename;
    $exist = mysqli_query($conn,"SELECT * FROM student WHERE rollno = '$rollno' AND standerd = '$std'");
  if(mysqli_num_rows($exist)>0){
    echo '<script>alert("Student Details Already exist")</script>';
  }
  else
  {
    $sql = "INSERT INTO student (rollno,name,city,pcont,standerd,file) VALUES ('$rollno','$name','$city','$pcont','$std','$filename')";

    if (move_uploaded_file($tempname, $folder)) {
        //echo "nadim";
        //exit();
        $msg = "Image uploaded successfully";
    } else {
        $msg = "Failed to upload image";
    }

    if(mysqli_query($conn,$sql)){
        header('location:display.php');
    }else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    } 
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
        integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
        integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous">
    </script>
    <title>Insert Student Details</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="text-primary" href="admindash.php">Home</a><br>

        <!-- <button class="btn btn-primary"><a href="display.php"></a>Manage Student Data</button> -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- <li class="nav-item active">
        <a class="nav-link" href="display.php">Manage Student Data<span class="sr-only"></span></a>
      </li> -->

    </nav>
    <h1 align="center">Insert Student Details here</h1>
    <div class="conatainer">
        <button class="btn btn-success" onclick="location.href='display.php'">Manage Student Data</button>
    </div>
    <form action="addstudent.php" method="post" align="center" enctype="multipart/form-data">
        <table border="6" align="center">
            <tr>
                <td>Roll No:<input type="text" name="rollno" required><br><br></td>
            </tr>
            <tr>
                <td>Name:<input type="text" name="name" required><br><br></td>
            </tr>
            <tr>
                <td>City:<input type="text" name="city" required><br><br></td>
            </tr>
            <tr>
                <td>
                    Parent Num:<input type="text" name="pcont" required><br><br>
                </td>
            </tr>
            <tr>
                <td>Standard:<input type="text" name="std" required><br><br></td>
            </tr>
            <tr>
                <td>image:<input type="file" name="uploadfile" id="uploadfile" required><br><br></td>
            </tr>

            <tr>
                <td>
                    <button class="btn btn-primary" type="submit" name="insert">Insert</button>
                </td>
            </tr>
            <hr>
        </table>
    </form>

</body>

</html>