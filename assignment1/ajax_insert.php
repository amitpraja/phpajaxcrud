<?php
require_once "user.php";

// if (isset($_POST['submit_btn'])){ 
        $name = $_POST['u_name'];
        $email = $_POST['u_email'];
        $phone = $_POST['u_num'];
        
        $query = mysqli_query($con,"INSERT INTO user(name,email,phone)VALUES('$name','$email','$phone')");
        if ($query) {
            # code...
        	echo 1;
            // echo "<script>alert('data sucessfully added!!!')</script>";
            // echo "<script>document.location = 'form.php'</script>";
        }else {
            # code...
        	echo 0;
            // echo "<script>alert('something went to wrong!!!')</script>";
        }
    
?>