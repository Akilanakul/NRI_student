<?php
require_once("includes/studentManager.php");
require_once("includes/view.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/styles.css">
  
</head>
<body id="L_studentDetailsConatiner">
<?php
  if(isset($_GET["pageid"]))
                    {
                     $keyword=$_GET["pageid"];
                    }
?>
	<table>
  <thead>
    <tr>
      <th>Student Name</th>
      <th>Personal Details</th>
      <th>Marks</th>
      <th>Fee</th>
      <th>Visiting Details</th>
    </tr>
  </thead>
  <tbody>
	 <?php
    $aStudent=StudentManager::getAllStudents();
    echo view::renderAllStudents($aStudent);
   ?>
  </tbody>
</table>
  <table>
  <thead>
    <tr>
      <th>Sub1</th>
      <th>Sub2</th>
      <th>Sub3</th>
      <th>Sub4</th>
      <th>Sub5</th>
      <th>Sub6</th>
      <th>Lab1</th>
      <th>Lab2</th>
      <th>Lab3</th>

    </tr>
  </thead>
  <tbody>
   <?php
    
     if(isset($_GET["pageid"]))
                    {
                     $keyword=$_GET["pageid"];
                    }
                $oStudent->load($keyword);

                
                  echo view::renderStudentDetails($oStudent);
               
   ?>
  </tbody>
</table>
  <table>
  <thead>
    <tr>
      <th>Student Name</th>
      <th>Personal Details</th>
      <th>Marks</th>
      <th>Fee</th>
      <th>Visiting Details</th>
    </tr>
  </thead>
  <tbody>
   <?php
    $aStudent=StudentManager::getAllStudents();
    echo view::renderAllStudents($aStudent);
   ?>
  </tbody>
</table>
  <table>
  <thead>
    <tr>
      <th>Student Name</th>
      <th>Personal Details</th>
      <th>Marks</th>
      <th>Fee</th>
      <th>Visiting Details</th>
    </tr>
  </thead>
  <tbody>
   <?php
    $aStudent=StudentManager::getAllStudents();
    echo view::renderAllStudents($aStudent);
   ?>
  </tbody>
</table>

<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>
