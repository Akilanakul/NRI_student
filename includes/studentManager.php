<?php
require_once("connection.php");
require_once("student.php");

class StudentManager
{
	static public function getAllStudents()
	{

		$aStudent=[];
		$oConnection = new Connection();


		//create query
		$sSQL = "SELECT studentID
		from tb_NRIstudent";


		//execute
		$oResultSet=$oConnection->query($sSQL);

		//fetch data
		while($aRow=$oConnection->fetchArray($oResultSet))
		{
			$oStudent = new Student();
			$oStudent->load($aRow['studentID']);
			$aStudent[]=$oStudent;

		}
	    

	    $oConnection->close();
	    return $aStudent;
	}
}

// $aStudent=StudentManager::getAllStudents();
// echo "<pre>";
// print_r($aStudent);
// echo "</pre>";
?>