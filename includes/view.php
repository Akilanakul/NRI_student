<?php
session_start();

require_once("student.php");

class View
{
  static public function renderAllStudents($aStudents){
    $sHTML='';
      $oStudent=new Student();
        for($icount=0;$icount<count($aStudents);$icount++){
          $oStudent=$aStudents[$icount];
                $sHTML.='<tr>
                          <td><strong>'.$oStudent->studentname.'</strong></td>
                          <td><a href="./studentdetails.php?key='.$oStudent->studentID.'">Edit/View</a></td>
                          <td><a href="./updateMarks.php?pageid='.$oStudent->studentID.'">Edit/View</a></td>
                          <td><a href="./updateFee.php?pageid='.$oStudent->studentID.'">Edit/View</a></td>
                          <td><a href="./updateVisitorDetails.php?pageid='.$oStudent->studentID.'">Edit/View</a></td>                       
                          </tr>';
        }
        return $sHTML;
  }
	static public function renderStudentDetails($oStudent)
	{
		$sHTML='';
		
			
        $sHTML.='
      
      <div class="table-responsive form">

<table class="table">
<h1 class="button button-click">Personal Details</h1>
  <tr>
    <th>Name</th>
    <td data-th="Movie Title">'.$oStudent->studentname.'</td>
    
    
  </tr>
  <tr>
    <th>Type</th>
    
    <td data-th="Genre">'.$oStudent->studenttype.'</td>
    
  </tr>
  <tr>
    <th>Contact</th>
    
    <td data-th="Genre">'.$oStudent->studenttelephone.'</td>
    
  </tr>
   <tr>
    <th>Email</th>
    
    <td data-th="Genre">'.$oStudent->studentemail.'</td>
    
  </tr>
   <tr>
    <th>Dob</th>
    
    <td data-th="Genre">'.$oStudent->studentdob.'</td>
    
  </tr>
   <tr>
    <th>State</th>
    
    <td data-th="Genre">'.$oStudent->studentstate.'</td>
    
  </tr>
   <tr>
    <th>District</th>
    
    <td data-th="Genre">'.$oStudent->studentdistrict.'</td>
    
  </tr>
   <tr>
    <th>Taluk</th>
    
    <td data-th="Genre">'.$oStudent->studenttaluk.'</td>
    
  </tr>
   
  
</table>
<a href="updateStudent.php?pageid='.$oStudent->studentID.'">update</a>
';


			
	
		return $sHTML;
}
  static public function renderStudent($oStudent)
  {

  }
  static public function renderFeeDetails($oStudent)
  {

  }
  static public function renderMarksDetails($oStudent)
  {

  }
  static public function renderVisitingDetails($oStudent)
  {

  }
}
// echo View::getMealCategories(3);

?>
