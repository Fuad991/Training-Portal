<?php
include './begin./db_begin.php';
include './begin./company.php';
error_reporting(0);
$university_number= $_POST['university_number'];
$password= $_POST['password'];

if(isset($_POST['submit'])){   

  $university_number= mysqli_real_escape_string($conn,$_POST['university_number']); 
  $password=  mysqli_real_escape_string($conn,$_POST['password']); 

  $sql="INSERT INTO student_courses(university_number)
  VALUES ('$university_number')";

  if(empty ($university_number)){        
    $alert="<script> alert('university_number is empty');</script>";
    echo $alert;
  }elseif(empty($password)){
      $alert="<script> alert('password is empty');</script>";
    echo $alert;
  } else{
    $query ="select * from college where university_number='".$university_number."' AND password='".$password."'limit 1";
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)==1){
  
    if(mysqli_query($conn,$sql)){
        header('location:Home1.php');
    }else{
        echo "error:". mysqli_error($conn);
    }
    }else{
     $alert="<script> alert('invalid data');</script>";
  echo $alert;
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
 
  <link rel="stylesheet" href="css/Trainer.css" media="screen">
  <link rel="stylesheet" href="css/Home_1.css" media="screen">
  <link rel="stylesheet" href="css/nicepage.css" media="screen">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <title>Courses</title>
</head>
<nav  id="mainNav" style="height: 25px;">
      <div >
        <p class="navbar-brand">Training Day</p>
      </div>
</nav>  
<body class="u-body"><header class="u-clearfix u-header u-header" id="sec-0098"><div class="u-align-left u-clearfix u-sheet u-sheet-1"></div></header>
    <section class="u-align-center u-clearfix u-palette-5-dark-3 u-section-1" id="carousel_ba7c">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h1 class="u-text u-text-custom-color-2 u-text-default u-text-1">Courses companies</h1>
        <p class="u-text u-text-default u-text-2">Here we are got to you all companies training</p>
        <div class="u-expanded-width u-list u-list-1">
          <div class="u-repeater u-repeater-1">
          <?php
            $query="SELECT * FROM courses_company ORDER BY id ASC";
            $result=mysqli_query($conn,$query);
            if(mysqli_num_rows($result)>0){
              while ($row=mysqli_fetch_array($result)){
                company( $row['pic'],$row['Name'],$row['Trainning_field'],$row['id']);
              }
            }
           ?>
            <div class="u-align-center u-container-style u-list-item u-radius-15 u-repeater-item u-shape-round u-white u-list-item-6">
              <div class="u-container-layout u-similar-container u-container-layout-6">
                <div class="u-border-6 u-border-white"> <img class="u-image-1 u-image u-image-circle" src="img/pogress.jfif">  </div>
                <h5 class="u-custom-font u-font-raleway u-text u-text-custom-color-2 u-text-default u-text-13">ProgressSoft</h5>
                <p class="u-text u-text-14">The Quality Assurance Specialist will carry out duties designed to meet the objectives of the Activity. The Business Analyst will report to the Information Technology Development Team Leader.</p>
                <a class="u-active-palette-5-dark-2 u-btn u-button-style u-grey-15 u-hover-palette-5-dark-2 u-radius-50 u-text-hover-white u-btn-6" onclick="document.getElementById('ticketModal').style.display='block'">Apply</a>
              </div>
              <form action="Courses.php" method="POST" onsubmit="checkempty()">
               <div id="ticketModal" class="w3-modal">
                <div class="w3-modal-content" style="width: 550px;" >
                 <header  class="w3-teal w3-padding-32"> 
                  <span onclick="document.getElementById('ticketModal').style.display='none'" class="w3-button w3-teal  w3-display-topright">×</span>
                   <h2><i></i>Register</h2>
                 </header>
                 <div class="w3-container">
                  <p><label><i></i> University Number</label></p>
                   <input type="number" name="university_number">
                    <p><label><i></i> Password</label></p>
                     <input type="password" name="password">
                     <p></p>
                 <button class="w3-button w3-teal w3-padding-16 w3-section" style="width: 110px;" type="submit" name="submit">submit <i></i></button>
                </div>
               </div>
            </div>
        </div>
      </div>
    </section>
</body>