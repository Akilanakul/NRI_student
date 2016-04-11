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
