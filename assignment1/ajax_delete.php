<html>
    <head>
        <title>delete data</title>
        <style>
            body{
                background:linear-gradient(to right,greenyellow,skyblue);
            }
        </style>
    </head>
</html>


<?php
 include("user.php");

 $id = $_POST['id'];
 echo $id;

 $query = "DELETE FROM user where id = '$id' ";
 $data = mysqli_query($con,$query);

 if ($data) {
    # code...
    echo 1;
    // echo "<script>alert('Record Deleted!!!')</script>";
    ?>
     
     <meta http-equiv="refresh" content="0; URL=http://localhost/assignment1/display.php" />

    <?php
 }else {
    echo 0;
    // echo "<script>alert('Failed to delete!!!')</script>";
 }


?>