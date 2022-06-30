<?php
include './begin./db_begin.php';
error_reporting(0);
$name= $_POST['Name'];
$Email= $_POST['Email'];
$training_field= $_POST['Training_field'];
$img= $_POST['img'];

if(isset($_POST['submit'])){   

    $name= mysqli_real_escape_string($conn,$_POST['Name']); 
    $Email= mysqli_real_escape_string($conn,$_POST['Email']); 
	$training_field= mysqli_real_escape_string($conn,$_POST['Training_field']); 
	$img= mysqli_real_escape_string($conn,$_POST['img']); 

    $sql="INSERT INTO company_register(Name,Email,Training_field ,img)
    VALUES ('$name','$Email','$training_field','$img')";
    //mysqli_query($conn,$sql);
    if(empty ($name)){        
      $alert="<script> alert('Name is empty');</script>";
      echo $alert;
    }elseif(!filter_var($Email)){
        $alert="<script> alert('Email is empty');</script>";
      echo $alert;
    }elseif(!filter_var($training_field)){
        $alert="<script> alert('Training field is empty');</script>";
      echo $alert;
    }elseif(!filter_var($img)){
        $alert="<script> alert('img is empty');</script>";
      echo $alert;
    }else{
    if(mysqli_query($conn,$sql)){
        header('location:Home1.php');
    }else{
        echo "error:". mysqli_error($conn);
    }
    } 
}
include './begin./db_close.php';
?>
<!--
 <script>
function checkempty(){
    if(document.getElementById('Name').value==""){
        alert('name is empty')
    }
}
</Script>
عشان يشتغل هاذ الكود لازم تحط عند الفورم -> onsubmit="checkempty()"
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <title>Companies Register</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="css/comreg.css" rel="stylesheet">
</head>
<body>
    <div class="page-wrapper bg-dark p-t-100 p-b-50">
        <div class="wrapper wrapper--w900">
            <div class="card card-6">
                <div class="card-heading">
                    <h2 class="title">Companies Register</h2>
                </div>
                <div class="card-body">
                    <form action="Companies-register.php" method="POST" onsubmit="checkempty()">
                        <div class="form-row">
                            <div class="name">Name</div>
                            <div class="value">
                                <input class="input--style-6" type="Name" id="Name" name="Name" >
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Email</div>
                            <div class="value">
                                <input class="input--style-6" type="Email" id="Email" name="Email" >
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Training field</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" id="Training_field" name="Training_field" >
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">picture</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="file" id="img" name="img"></input>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                             <input type="submit" name="submit" id="submit" class="btn btn--radius-2 btn--blue-2" value="Send To Admin" >
                        </div>
                    </form>
                </div>
               
            </div>
        </div>
    </div>
</body>
</html>
