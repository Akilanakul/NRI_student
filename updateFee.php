<?php
ob_start(); 
session_start();
include_once("includes/form.php");
include_once("includes/student.php");
include_once("includes/fee.php");
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
      <h1>Fee Details</h1>
    </div>
    <div class="form-content">
      
     
        
<?php
$ID=1;
$FeeID=0;
 if(isset($_GET["pageid"]))
                                {
                                	
                                    $ID=$_GET["pageid"];
                                }
$oFee=new Fee();
$oFee->getfeeBYStudentID($ID);
$FeeID=$oFee->studentfeeID;
// print_r($FeeID);

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

				
			
			
			$oFee->studentfeeID=$FeeID;
			$oFee->studentfee=$_POST["Amount"];
			$oFee->studentpaidstatus= $_POST["Paid"];
			$oFee->studentfeepaiddate=$_POST["Date"];
			$oFee->studentID=$ID;
			
			$oFee->save();
			echo "successful";
			// header("Location:index.php");
			exit;	
		}
	}
// echo '<pre>';
// print_r($oForm);
// echo '</pre>';
		   $oForm1->makeUpdateInput("Amount",$oFee->studentfee);
           $oForm1->makeUpdateInput("Paid",$oFee->studentpaidstatus);
           $oForm1->makeUpdateInput("Date",$oFee->studentfeepaiddate);
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

      
       
      
        
      
 
