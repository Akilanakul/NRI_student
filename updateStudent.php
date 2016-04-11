<?php
ob_start(); 
session_start();
include_once("includes/form.php");
include_once("includes/student.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
 
  <link rel="stylesheet" href="css/updateform.css">
</head>
<div class="form">
  <div class="form-toggle"></div>
  <div class="form-panel one">
    <div class="form-header">
      <h1>Update your details</h1>
    </div>
    <div class="form-content">
      
     
        
<?php

 if(isset($_GET["pageid"]))
                                {
                                	
                                    $ID=$_GET["pageid"];
                                }
$oStudent=new Student();
$oStudent->load($ID);
// print_r($oRecipe);

$oForm1=new Form();
// if(isset($_SESSION["studentID"]))
// {
	if(isset($_POST['update']) == true)
 {

	 	// print_r($_POST);
	 	
		$oForm1->data=$_POST;
		

		// $oForm->checkRequired("name");
		// $oForm->checkRequired("photo");
		// $oForm->checkRequired("ingredients");
		// $oForm->checkRequired("direction");
		// $oForm->checkFileUploaded("photo");
		
	

		if($oForm1->valid==true)
		{

				
			$oStudent=new Student();
			
			$oStudent->studentID=$ID;
			$oStudent->studentname=$_POST["name"];
			$oStudent->studenttype= $_POST["type"];
			$oStudent->studenttelephone=$_POST["contact"];
			$oStudent->studentemail=$_POST["email"];
			$oStudent->studentdob=$_POST["dob"];
			$oStudent->studentstate=$_POST["state"];
			$oStudent->studentdistrict=$_POST["district"];
			$oStudent->studenttaluk=$_POST["taluk"];
			
			
			$oStudent->save();
			
			header("Location:studentdetails.php?key=".$ID);
			exit;	
		}
	}
// echo '<pre>';
// print_r($oForm);
// echo '</pre>';
			$oForm1->makeUpdateInput("name",$oStudent->studentname);
           $oForm1->makeUpdateInput("email",$oStudent->studentemail);
             
           

           
           $oForm1->makeUpdateInput("type",$oStudent->studenttype);
           
           

           
           $oForm1->makeUpdateInput("contact",$oStudent->studenttelephone);
           

           $oForm1->makeUpdateInput("dob",$oStudent->studentdob);

           
           $oForm1->makeUpdateInput("state",$oStudent->studentstate);
           $oForm1->makeUpdateInput("district",$oStudent->studentdistrict);
           

          
           $oForm1->makeUpdateInput("taluk",$oStudent->studenttaluk);
           
           
           
           $oForm1->makeSubmit("update");	
           echo $oForm1->html;
// }

// else
// {
	
// 	header("Location:registerForm.php");
// }

?>
</div>
</div>
</div>
<?php
include_once("includes/footer.php");
?>


<!-- Form-->

      
       
      
        
      
 
