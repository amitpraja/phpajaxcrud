<?php 
// require_once "user.php";

//  if (isset($_POST['submit_btn'])) {
// 	# code...
// 	$name = $_POST['u_name'];
// 	$email = $_POST['u_email'];
// 	$phone = $_POST['u_num'];
    
//     $query = mysqli_query($con,"INSERT INTO user(name,email,phone)VALUES('$name','$email','$phone')");

//     if ($query) {
//         # code...
// 		echo 1;
//         echo "<script>alert('data sucessfully added!!!')</script>";
//          echo "<script>document.location = 'form.php'</script>";
//     }else {
//         # code...
// 		echo 0;
//          echo "<script>alert('something went to wrong!!!')</script>";
//     }
//  }
?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>user form</title>
</head>
<body>
    <div class="user-form">
    	<form action="" id="fm-group">
    		<div class="header">
    			<h1>Registration Form</h1>
    			<p>please fill this form.</p>
    		</div>

    		<div class="input-group">
    			<input id="nm" type="text" name="name" placeholder="Enter the name" required="" >
    		</div>

    		<div class="input-group">
    			<input id="em" type="email" name="Email" placeholder="Enter the email" required="" >
    		</div>

    		<div class="input-group">
    			<input id="num" type="number" name="number" placeholder="Enter your number" required="">
    		</div>

    		<div class="input-group">
    			<button id="btn" type="submit" name="submit_btn" class="button">Register</button>
    		</div>
    	</form>

        <div class="record">
            <a href="display.php">view record</a>
        </div>
    </div>

    <div id="error-mssg"></div>
	<div id="succes-mssg"></div>
     
	<script type="text/javascript" src="jquery-3.6.3.min.js" ></script>
	<script type="text/javascript" >
		$('#btn').on('click',function(f){
			f.preventDefault()
			var uname = $('#nm').val();
			var uemail = $('#em').val();
			var unumber = $('#num').val();
		

		$.ajax({
			url:'ajax_insert.php',
			type:'POST',
			data:{u_name:uname,u_email:uemail,u_num:unumber},
			success:function (data) {
				if (data == 1) {
				   $('#fm-group').trigger('reset')
				}else{
					

				}
			}

		})
		})
	</script>
</body>
</html>
