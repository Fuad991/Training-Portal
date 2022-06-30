<?php
include './begin./db_begin.php';
include './begin./company.php';
error_reporting(0);
$university_number= $_POST['university_number'];
$password= $_POST['password'];


if(isset($_POST['submit'])){   

  $university_number= mysqli_real_escape_string($conn,$_POST['university_number']); 
  $password=  mysqli_real_escape_string($conn,$_POST['password']); 


  $sql="INSERT INTO student_training(university_number)
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

/*if(isset($_POST['apply'])){  
  if(isset($_SESSION["Training_company"])){
   $company_array_id = array_column($_session["Training_company"],"company_id");
    if(!in_array($_GET["id"],$company_array_id)){
     $count=count($session["Training_company"]);
     $company_array= array(
      'company_id' => $_GET["id"],
      'company_name' => $_GET["hidden_name"],
      'company_training_field' => $_GET["hidden_training_field"]
     );
     $session["Training_company"][$count]=$company_array;
    }else{
      
    }
  }else{
    $company_array = array(
      'company_id' => $_GET["id"],
      'company_name' => $_GET["hidden_name"],
      'company_training_field' => $_GET["hidden_training_field"]
    );
    $session["Training_company"] [0] = $company_array;
  }
}
*/
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

  <title>Training</title>
</head>
<nav  id="mainNav" style="height: 25px;">
      <div >
        <p class="navbar-brand">Training Day</p>
      </div>
</nav>  
<body class="u-body"><header class="u-clearfix u-header u-header" ><div class="u-align-left u-clearfix u-sheet u-sheet-1"></div></header>
    <section class=" u-palette-5-dark-3 u-section-1" id="carousel_ba7c">
      <div class="u-clearfix u-sheet ">
        <h1 class=" u-text-custom-color-2 u-text-default u-text-1">Training companies</h1>
        <p class="u-text u-text-default u-text-2">Here we are got to you all companies training</p>
        <div class="u-expanded-width u-list u-list-1">
        <div class="u-repeater u-repeater-1">
           <?php
            $query="SELECT * FROM training_company ORDER BY id ASC";
            $result=mysqli_query($conn,$query);
            if(mysqli_num_rows($result)>0){
              while ($row=mysqli_fetch_array($result)){
                company( $row['pic'],$row['Name'],$row['Trainning_field'],$row['id']);
              }
            }
           ?>
           <!--
            <div class="u-align-center u-container-style u-list-item u-radius-15 u-repeater-item u-shape-round u-white u-list-item-2">
              <div class="u-container-layout u-similar-container u-container-layout-2">
                <div class="u-border-6 u-border-white"> <img class="u-image-1 u-image u-image-circle" src="img/Bseel.jpg"> </div>
                <h5 class="u-custom-font u-font-raleway u-text u-text-custom-color-2 u-text-default u-text-5"> Bseel</h5>
                <p class="u-text u-text-6">Web developer is a type of programmer who specializes in developing applications related to the World Wide Web, which work using related programming languages ​​such as HTML/CSS and PHP for example. A web developer is usually concerned with the back-end or programming aspect of creating a website.</p>
                <a class="u-active-palette-5-dark-2 u-btn u-button-style u-grey-15 u-hover-palette-5-dark-2 u-radius-50 u-text-hover-white u-btn-6"  onclick="document.getElementById('ticketModal').style.display='block'">Apply</a>
              </div>
              </div>
            <div class="u-align-center u-container-style u-list-item u-radius-15 u-repeater-item u-shape-round u-white u-list-item-3">
              <div class="u-container-layout u-similar-container u-container-layout-3">
                <div class="u-border-6 u-border-white"> <img class="u-image-1 u-image u-image-circle" src="img/jolife.png"> </div>
                <h5 class="u-custom-font u-font-raleway u-text u-text-custom-color-2 u-text-default u-text-7">JOLIFE</h5>
                <p class="u-text u-text-8"> The Software Development Team Lead will provide technical and team leadership through coaching and mentorship and problem solvers and the first ones who remove team roadblocks. They are not afraid to roll up their sleeves and write code whenever needed. Additionally, their role is to help the team keep motivated.</p>
                <a class="u-active-palette-5-dark-2 u-btn u-button-style u-grey-15 u-hover-palette-5-dark-2 u-radius-50 u-text-hover-white u-btn-6"  onclick="document.getElementById('ticketModal').style.display='block'">Apply</a>
              </div>
            </div>
            <div class="u-align-center u-container-style u-list-item u-radius-15 u-repeater-item u-shape-round u-white u-list-item-4">
              <div class="u-container-layout u-similar-container u-container-layout-4">
                <div class="u-border-6 u-border-white"> <img class="u-image-1 u-image u-image-circle" src="img/socuimtech.jpg">  </div>
                <h5 class="u-custom-font u-font-raleway u-text u-text-custom-color-2 u-text-default u-text-9">socuimtech</h5>
                <p class="u-text u-text-10">A software manager oversees the development, installation, and maintenance of new or upgraded software for an organization. As a software manager, you coordinate with staff to determine client needs.</p>
                <a class="u-active-palette-5-dark-2 u-btn u-button-style u-grey-15 u-hover-palette-5-dark-2 u-radius-50 u-text-hover-white u-btn-6"  onclick="document.getElementById('ticketModal').style.display='block'">Apply</a>
              </div>
            </div>
            <div class="u-align-center u-container-style u-list-item u-radius-15 u-repeater-item u-shape-round u-white u-list-item-5">
              <div class="u-container-layout u-similar-container u-container-layout-5">
                <div class="u-border-6 u-border-white"> <img class="u-image-1 u-image u-image-circle" src="img/cloudpaper.jpg">  </div>
                <h5 class="u-custom-font u-font-raleway u-text u-text-custom-color-2 u-text-default u-text-11">cloudpaper</h5>
                <p class="u-text u-text-12">Flutter is an open-source UI software development kit created by Google. It is used to develop cross platform applications for Android, iOS, Linux,Windows, Google Fuchsia,and the web from a single codebase.</p>
                <a class="u-active-palette-5-dark-2 u-btn u-button-style u-grey-15 u-hover-palette-5-dark-2 u-radius-50 u-text-hover-white u-btn-6"  onclick="document.getElementById('ticketModal').style.display='block'">Apply</a>
              </div>
            </div>
             -->
            <div class="u-align-center u-container-style u-list-item u-radius-15 u-repeater-item u-shape-round u-white u-list-item-6">
              <div class="u-container-layout u-similar-container u-container-layout-6">
                <div class="u-border-6 u-border-white"> <img class="u-image-1 u-image u-image-circle" src="img/aspire.png">  
                <h5 class="u-custom-font u-font-raleway u-text u-text-custom-color-2 u-text-default u-text-13">Aspire</h5>
                <p class="u-text u-text-14">The Quality Assurance Specialist will carry out duties designed to meet the objectives of the Activity. The Business Analyst will report to the Information Technology Development Team Leader.</p>
                <a name="apply" class="u-active-palette-5-dark-2 u-btn u-button-style u-grey-15 u-hover-palette-5-dark-2 u-radius-50 u-text-hover-white u-btn-6"  onclick="document.getElementById('ticketModal').style.display='block'">Apply</a>
                <input type="hidden" name="company_name" value="$name" >
                <input type="hidden" name="training_field" value="$training_field" >
                <input type="hidden" name="id" value="$id" >
              </div>
              <form action="Training.php" method="POST" onsubmit="checkempty()">
                <div id="ticketModal" class="w3-modal">
                <div class="w3-modal-content" style="width: 550px;">
                  <header  class="w3-teal w3-center w3-padding-32"> 
                  <span onclick="document.getElementById('ticketModal').style.display='none'" class="w3-button w3-teal  w3-display-topright">×</span>
                    <h2><i></i>Register</h2>
                  </header>
                  <div class="w3-container">
                  <p><label><i></i> University Number</label></p>
                    <input type="number" name="university_number">
                    <p><label><i></i> Password</label></p>
                      <input  type="password" name="password">
                    <p></p>
                    <input class="w3-button w3-teal w3-padding-16 w3-section" style="width: 110px;" type="submit" name="submit"> <i></i></input>
                    <input type="hidden" name="company_name" value="<?php $row['Name'] ?>" >
                    <input type="hidden" name="training_field" value="<?php $row['Trainning_field'] ?>" >
                </div>
                </div>
               </form>
            </div>
            </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
