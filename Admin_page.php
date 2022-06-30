<?php
include './begin./db_begin.php';

if(isset($_POST['approv'])){ 
  $id=$_POST['id'];
  $query="DELETE FROM student_training  WHERE id='$id'";  
  $query_run= mysqli_query($conn,$query);
  if($query_run){
      $alert="<script> alert('Data Approval');</script>";
      echo $alert;
    }else{
      $alert="<script> alert('Data not Approval');</script>";
      echo $alert;
  }

}
if(isset($_POST['delete'])){ 
  $id=$_POST['id'];
  $query="DELETE FROM student_training  WHERE id='$id'";  
  $query_run= mysqli_query($conn,$query);
  if($query_run){
      $alert="<script> alert('Data deleted');</script>";
      echo $alert;
        }else{
      $alert="<script> alert('Data not deleted');</script>";
      echo $alert;
  }

}

$sql = "SELECT * FROM student_training INNER JOIN training_company ON training_company.id =student_training.id";  
$result = mysqli_query($conn, $sql); 
?>
<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <title>admin page</title>
  </head>
  <style>
    .button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 10px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #38444d;
}
li {
  float: left;
}
li a{
  font-size: 20px;
  display: inline-block;
  color: white;
  text-align: center;
  padding: 14px 26px;
  text-decoration: none;
}

li a:hover  {
  background-color: gray;
}
</style>
  <body>
  <ul>
  <li><a href="Admin_page.php">Training request</a></li>
  <li><a href="courses_request.php">Courses request</a></li>
  <li><a href="company_request.php">Company request</a></li>
  <li><a href="college.php">College</a></li>
</ul>
<a href="Home1.php" class="btn btn-info btn-lg" style="margin-left: 1400px; margin-top: -80px; background-color: #38444d;"> Log out</a>
<section id="training">  
<div class="content">
    <div class="container">
      <h2 class="mb-5">Student Training request</h2>
      <div class="table-responsive">
        <table class="table custom-table">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">university number</th>
              <th scope="col">company name</th>
              <th scope="col">training field</th>
              <th scope="col">Approval</th>
              <th scope="col">Dispproval</th>
            </tr>
          </thead>
          <?php         
                  if(mysqli_num_rows($result)>0){
                    while ($row=mysqli_fetch_array($result)){
                      
                        
             ?>
          <tbody>
            <tr scope="row">
            <td><?php echo $row["id"];?></td> 
            <td><?php echo $row["university_number"];?></td> 
            <td><?php echo $row["Name"]; ?></td>
             <td><?php echo $row["Trainning_field"]; ?></td>
             <form action="Admin_page.php" method="POST">
             <input type="hidden" name="id" value="<?php echo $row["id"] ?>">
             <td>
               <input class="button" type="submit" name="approv" value="Approval"></input>
             </td>
             </form>
             <form action="Admin_page.php" method="POST">
             <input type="hidden" name="id" value="<?php echo $row["id"] ?>">
             <td>
               <input class="button" style="background-color: red;" type="submit" name="delete" value="disapproval"> </input>
             </td>
             </form>
            </tr>
          </tbody>
          <?php  
                               }  
                              }
                          ?>  
        </table>
      </div>
    </div>
  </div>
  </section>
  </body>
</html>