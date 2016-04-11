<?php
ob_start(); 
session_start();
include_once("includes/form.php");
include_once("includes/student.php");
include_once("includes/visitor.php");
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
      <h1>Visiting Details</h1>
    </div>
    <div class="form-content">
      
     
        
<?php
$ID=0;
$VisitorID=0;
 if(isset($_GET["pageid"]))
        {
                                	
            $ID=$_GET["pageid"];
        }
$oVisitor=new Visitor();
$oVisitor->getvisitingdetailsBYStudentID($ID);
$VisitorID=$oVisitor->studentvisitorID;


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

				
			
			
			$oVisitor->visitorID=$VisitorID;
			$oVisitor->studentvehicleid=$_POST["VehicleID"];
			$oVisitor->studentarrival= $_POST["Arrival"];
			$oVisitor->studentdepartue=$_POST["Departure"];
			$oVisitor->studenttiming= $_POST["Timing"];
			$oVisitor->studentID=$ID;
			
			
			$oVisitor->save();
			echo "successful";
			// header("Location:index.php");
			exit;	
		}
	}
// echo '<pre>';
// print_r($oForm);
// echo '</pre>';
		   $oForm1->makeUpdateInput("VehicleID",$oVisitor->studentvehicleid);
           $oForm1->makeUpdateInput("Arrival",$oVisitor->studentarrival);
           $oForm1->makeUpdateInput("Departure",$oVisitor->studentdepartue);
           $oForm1->makeUpdateInput("Timing",$oVisitor->studenttiming);
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

      
       
      
        
      
 
