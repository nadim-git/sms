<?php
include 'database.php';
$id = $_GET['id'];

$qry = mysqli_query($conn, "SELECT * FROM student WHERE id = '$id' ");
$data = mysqli_fetch_array($qry);

if(isset($_POST['insert'])){  
    // $upload_dir = 'image/';
    // $allowed_types = array('jpg','png','jpeg','gif');


    $name = $_POST['name'];
    $city = $_POST['city'];
    $pcont = $_POST['pcont'];
    $file = $_POST['file'];
    $update_id = $_POST['update_id'];

   $query = mysqli_query($conn,"UPDATE student SET name = '$name', city = '$city', pcont = ' $pcont', file = '$file' WHERE id = ".$update_id." ");
 
    if($query){
        header('location: display.php');
    }else{
        echo "error: " .mysqli_error($query);
    }
}

 


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Document</title> 
</head>
<body>
<div class="container">

    <form action="update.php" method="post" >
    Name:<input type="text" name="name" value="<?php echo $data['name'];?>" /><br>
    City:<input type="text" name="city" value="<?php echo $data['city'];?>" /><br>
    pcont:<input type="text" name="pcont" value="<?php echo $data['pcont'];?>" /><br>
    Upload Image: <input type="file" name="file" value="<?php echo $data['file'];?>" /><br>
    <input type="hidden" name="update_id" value="<?php echo $data['id']?>">
    <button type="submit" name="insert" class="btn btn-primary">Update</button>
 
    </form>
    </div>
</body>
</html> 