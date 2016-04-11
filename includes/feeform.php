<?php
ob_start(); 

require_once("form.php");
require_once("Student.php");
require_once("fee.php");
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
        
        <li class="tab active"><a href="#login">Fee details</a></li>
      </ul>
      

    
      
      <div >
        <div >   
         
          <?php 
           $oForm1=new Form();

           if(isset($_POST['submit']) == true)
               {
                echo "hello";
                print_r($_POST);
                
                $oForm1->data=$_POST;
                
                // $oForm->checkRequired("Username");
                // $oForm->checkRequired("Useremail");
                // $oForm->checkRequired("Usertelephone");
                // $oForm->checkRequired("Userpassword");
                
                $oFee=new Fee();

                if($oForm1->valid==true)
                {
                  $oFee->studentfee=$_POST["Amount"];;
                  $oFee->studentpaidstatus=$_POST["Paid"];
                  $oFee->studentfeepaiddate=$_POST["Paid Date"];
                  
               
                  
                  $oFee->save();
                  
                  header("Location:success.php");
                  exit; 
                }
              }

          
           
           $oForm1->makeInput("Amount","");
           $oForm1->makeInput("Paid","");
             
           

           
           $oForm1->makeInput("Paid Date","");
         
           
           
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

