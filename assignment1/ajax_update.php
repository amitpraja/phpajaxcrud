<?php
include("user.php");
// include("dispaly.php");

$id = $_GET['id'];


$sqlquery = "SELECT * FROM user where id = '$id' ";
$data = mysqli_query($con,$sqlquery);
$record = mysqli_num_rows($data);
$result = mysqli_fetch_assoc($data);



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
    	<form action="" method="post">
    		<div class="header">
    			<h1>Update Details</h1>
    			 <p>please fill this form.</p> 
    		</div>

    		<div class="input-group">
    			<input id="u_data" type="text" name="name" value='<?php echo $result['name']; ?>' placeholder="Enter the name" required="" >
    		</div>

    		<div class="input-group">
    			<input id="e_data" type="email" name="Email" value="<?php echo $result['email']; ?>" placeholder="Enter the email" required="" >
    		</div>

    		<div class="input-group">
    			<input id="n_data" type="number" name="number" value="<?php echo $result['phone']; ?>" placeholder="Enter your number" required="">
    		</div>

    		<div class="input-group">
    			<button id="up_btn" type="submit" name="update" class="button">Update Details</button>
    		</div>
    	</form>

    </div>
	
</body>
</html> 

<?php
require_once "user.php";

if (isset($_POST['update'])) {
	# code...
	$name = $_POST['name'];
	$email = $_POST['Email'];
	$phone = $_POST['number'];
    
    
    $query = "UPDATE user set name= '$name', email= '$email', phone= '$phone' where id = '$id'";

    $data = mysqli_query($con,$query);

    if ($data) {
        # code...
        echo "<script>alert('data sucessfully updated!!!')</script>";
        ?>
    
   <meta http-equiv="refresh" content="0; URL=http://localhost/assignment1/display.php" />

  <?php       
    }else {
        # code...
        echo "<script>alert('something went to wrong!!!')</script>";
    }
}

?>


