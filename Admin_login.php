<?php
include './begin./db_begin.php';
error_reporting(0);
$Username= $_POST['Username'];
$Email= $_POST['Email'];
$Password= $_POST['Password'];

if(isset($_POST['submit'])){   
	if(empty ($Username)){        
        $alert="<script> alert('Username is empty');</script>";
        echo $alert;
    }elseif(empty($Email)){
        $alert="<script> alert('Email is empty');</script>";
        echo $alert;
    }elseif(empty($Password)){
        $alert="<script> alert('Password is empty');</script>";
        echo $alert;
    }else{
   $sql ="select * from admin_login where Username='".$Username."' AND Email='".$Email."' AND Password='".$Password."'limit 1";
   $result=mysqli_query($conn,$sql);
   if(mysqli_num_rows($result)==1){

    $row = mysqli_fetch_assoc($result);
    if ($row['Username'] === $Username &&$row['Email']==$Email &&$row['Password'] === $Password) {
	echo "successfully logged in";
	header('location:Admin_page.php');
   }
}else{
	$alert="<script> alert('invalid data');</script>";
    echo $alert;
}
    }
}
include './begin./db_close.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/Admin_login.css">

</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="Admin_login.php" method="POST">
					<span class="login100-form-title p-b-26">
						Welcome Admin
					</span>
					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" id="Username" name="Username"  placeholder="Username">
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100" type="text" id="Email" name="Email"  placeholder="Email">
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="Password" id="Password" name="Password"  placeholder="Password">
					</div>
					
					<div class="wrap-login100-form-btn">
						<input type="submit" name="submit" id="submit" style="background-color: blue" class="login100-form-btn" value="Login" >
					</div> 
				</form>
			</div>
		</div>
	</div>
</body>
</html>  
