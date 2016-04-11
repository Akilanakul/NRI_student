<?php
ob_start(); 

require_once("form.php");
require_once("Student.php");
require_once("fee.php");
require_once("marks.php");
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/styles.css">
  
</head>
<body> 
 
<div class="form">
         <ul class="tab-group">
        
        <li class="tab active"><a href="#login">MarksSheet</a></li>
      </ul>
      

    
      
      <div >
        <div >   
         
          <?php 
           $oForm1=new Form();

           if(isset($_POST['submit']) == true)
               {
               
                
                $oForm1->data=$_POST;
                
                // $oForm->checkRequired("Username");
                // $oForm->checkRequired("Useremail");
                // $oForm->checkRequired("Usertelephone");
                // $oForm->checkRequired("Userpassword");
                
                $oMarks=new Marks();

                if($oForm1->valid==true)
                {
                  $oMarks->studentsub1marks=$_POST["Sub1"];;
                  $oMarks->studentsub2marks=$_POST["Sub2"];
                  $oMarks->studentsub3marks=$_POST["Sub3"];
                  $oMarks->studentsub4marks=$_POST["Sub4"];;
                  $oMarks->studentsub5marks=$_POST["Sub5"];
                  $oMarks->studentsub6marks=$_POST["Sub6"];
                  $oMarks->studentlab1marks=$_POST["Lab1"];;
                  $oMarks->studentlab2marks=$_POST["Lab2"];
                  $oMarks->studentlab3marks=$_POST["Lab3"];
                  
               
                  
                  $oMarks->save();
                  
                  header("Location:success.php");
                  exit; 
                }
              }

          
           
           $oForm1->makeInput("Sub1","");
           $oForm1->makeInput("Sub2","");
           $oForm1->makeInput("Sub3","");
           $oForm1->makeInput("Sub4","");
           $oForm1->makeInput("Sub5","");
           $oForm1->makeInput("Sub6","");
           $oForm1->makeInput("Lab1","");
           $oForm1->makeInput("Lab2","");
           $oForm1->makeInput("Lab3","");

          
         
           
           
           $oForm1->makeSubmit("submit");

           echo $oForm1->html;
           ?>
          
         
          

        </div>

 </div>
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/script.js"></script>
</body>
</html>

