<?php
require_once("includes/header.php");
require_once("includes/form.php");
require_once("includes/student.php");
require_once("includes/view.php");
?>
<div class="studentDetailsContainer">
<a href="index.php">Home</a>
<?php
$oStudent=new Student();
if(isset($_SESSION["studentID"]))
{
	echo "hello";
}

$Key=' ';

                if(isset($_GET["key"]))
                    {
                     $keyword=$_GET["key"];
                    }
                $oStudent->load($keyword);

                
                	echo view::renderStudentDetails($oStudent);
               
               


?>
</div>
<?php
include_once("includes/footer.php");
?>