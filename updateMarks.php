<?php
ob_start(); 
session_start();
include_once("includes/form.php");
include_once("includes/student.php");
include_once("includes/marks.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
 
  <link rel="stylesheet" href="css/updateform.css">
</head>
<div>
	<a href="lecture_studentDetails.php">Go Back</a>
</div>
<div class="form">
  <div class="form-toggle"></div>
  <div class="form-panel one">
    <div class="form-header">
      <h1>Marks Details</h1>
    </div>
    <div class="form-content">
      
     
        
<?php
$ID=1;
$MarksID=0;
 if(isset($_GET["pageid"]))
                                {
                                	
                                    $ID=$_GET["pageid"];
                                }
$oMarks=new Marks();
$oMarks->getmarksBYStudentID($ID);
$MarksID=$oMarks->marksID;
// print_r($oMarks->studentsub1marks);

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

				
			
			
			$oMarks->marksID=$MarksID;
			$oMarks->studentsub1marks=$_POST["Sub1"];
			$oMarks->studentsub2marks=$_POST["Sub2"];
			$oMarks->studentsub3marks=$_POST["Sub3"];
			$oMarks->studentsub4marks=$_POST["Sub4"];
			$oMarks->studentsub5marks=$_POST["Sub5"];
			$oMarks->studentsub6marks=$_POST["Sub6"];
			$oMarks->studentlab1marks=$_POST["Lab1"];
			$oMarks->studentlab2marks=$_POST["Lab2"];
			$oMarks->studentlab3marks=$_POST["Lab3"];
			$oMarks->studentID=$ID;
			
			
			$oMarks->save();
			echo "successful";
			
			exit;	
		}
	}
// echo '<pre>';
// print_r($oForm);
// echo '</pre>';
		   $oForm1->makeUpdateInput("Sub1",$oMarks->studentsub1marks);
           $oForm1->makeUpdateInput("Sub2",$oMarks->studentsub2marks);
           $oForm1->makeUpdateInput("Sub3",$oMarks->studentsub3marks);
           $oForm1->makeUpdateInput("Sub4",$oMarks->studentsub4marks);
           $oForm1->makeUpdateInput("Sub5",$oMarks->studentsub5marks);
           $oForm1->makeUpdateInput("Sub6",$oMarks->studentsub6marks);
           $oForm1->makeUpdateInput("Lab1",$oMarks->studentlab1marks);
           $oForm1->makeUpdateInput("Lab2",$oMarks->studentlab2marks);
           $oForm1->makeUpdateInput("Lab3",$oMarks->studentlab3marks);

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

      
       
      
        
      
 
