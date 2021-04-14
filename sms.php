<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <title>Student Management System</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">


        <h5 align="left" style="margin-right:20px;"><a class="btn btn-primary" href="index.php">Home</a></h5>
        <!-- <button class="btn btn-primary"><a href="display.php"></a>Manage Student Data</button> -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- <li class="nav-item active">
        <a class="nav-link" href="display.php">Manage Student Data<span class="sr-only"></span></a>
      </li> -->

    </nav>

    <h1 align="center">Student Management System</h1>
    <form action="sms.php" method="post">
        <table style="width:30%" align="center" border="1">
            <tr>
                <td colspan="2" align="center">Student Information</td>
            </tr>
            <tr>
                <td align="left">choose standard</td>
                <td>
                    <select name="standerd" required>
                        <option value="1">1st</option>
                        <option value="2">2nd</option>
                        <option value="3">3rd</option>
                        <option value="4">4th</option>
                        <option value="5">5th</option>
                        <option value="6">6th</option>
                        <option value="7">7th</option>
                        <option value="8">8th</option>
                        <option value="9">9th</option>
                        <option value="10">10th</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="left">enter RollNo</td>
                <td><input type="text" name="rollno" required></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="show" value="show info"
                        class="btn btn-success"></td>
            </tr>
        </table>
    </form>
</body>

</html>
<?php
include 'database.php';
error_reporting(0);
if (isset($_POST['show'])) {
  $std = $_POST['standerd'];
  $rollno = $_POST['rollno'];
  
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>Document</title>
</head>

<body>
    <hr>
    <!-- <h1 align="center">Data shown Above</h1>
<hr> -->
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">rollno</th>
                <th scope="col">name</th>
                <th scope="col">city</th>
                <th scope="col">Parent Contact</th>
                <th scope="col">standerd</th>
                <th scope="col">image</th>
                <th scope="col">Result</th>

            </tr>
        </thead>
        <tbody>
            <?php

      $sql = "SELECT rollno,name,city,pcont,standerd,file FROM student WHERE Standerd = '$std' AND rollno = ' $rollno'";

      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        while ($data = mysqli_fetch_assoc($result)) {
     
       
      ?>
            <tr>
                <th scope="row">1</th>
                <td><?php echo $data['rollno']; ?></td>
                <td><?php echo $data['name']; ?></td>
                <td><?php echo $data['city']; ?></td>
                <td><?php echo $data['pcont']; ?></td>
                <td><?php echo $data['standerd']; ?></td>
                <td><img src="image/<?php echo $data['file']; ?>" alt="no Image" width=100;></td>
                <td><a class="btn btn-primary" href="Result.php">View Result</a></td>

            </tr>
            <?php
        }
        ?>
            <?php
      } else {
        ?>
            <tr>
                <td align="center" colspan='8'><?php echo "No Records ";?></td>
            </tr>
            <?php
      }
      ?>
        </tbody>

    </table>


</body>

</html>