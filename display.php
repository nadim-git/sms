<?php
include 'database.php';
session_start();
if(!isset($_SESSION['username'])){
    header('location: login.php');
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
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
    <title>Manage Data</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="text-primary" href="addstudent.php">Student Management System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Roll NO</th>
                <th scope="col">Name</th>
                <th scope="col">City</th>
                <th scope="col">PCont</th>
                <th scope="col">Standard</th>
                <th scope="col">Image</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT id,rollno,name,city,pcont,standerd,file FROM student";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $x = 1;
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <th scope="row"><?php echo $x;
                                        $x++; ?></th>
                <td><?php echo $row['rollno']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['city']; ?></td>
                <td><?php echo $row['pcont']; ?></td>
                <td><?php echo $row['standerd']; ?></td>
                <td><img src="image/<?php echo $row['file']; ?>" alt="No Image" width=100;></td>
                <td>
                    <a class="btn btn-primary" href='Update.php?id=<?php echo $row['id'];?>'>Update</a>
                    <a class="btn btn-danger" href='delete.php?id=<?php echo $row['id'];?>'>Delete</a>
                </td>
            </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>

</body>

</html>