<?php
require_once("connection.php");

class Marks{
	private $MarksID;
	private $Sub1;
	private $Sub2;
	private $Sub3;
	private $Sub4;
	private $Sub5;
	private $Sub6;
	private $Lab1;
	private $Lab2;
	private $Lab3;
    private $StudentID;

	public function _construct(){
		$this->MarksID='';
		$this->Sub1='';
		$this->Sub2='';
		$this->Sub3='';
		$this->Sub4='';
		$this->Sub5='';
		$this->Sub6='';
		$this->Lab1='';
		$this->Lab2='';
		$this->Lab3='';
	}
	public function load($iID){
		$oConnection = new Connection();


        // create query
        $sSQL = 'SELECT sub1,sub2,sub3,sub4,sub5,sub6,lab1,lab2,lab3
        from tb_marks where marksID= "'.$iID.'"';
        
        //execute
        $oResultSet=$oConnection->query($sSQL);

        //fetch data

        // check if the customer is present
        $aRow=$oConnection->fetchArray($oResultSet);
        $this->Sub1=$aRow["sub1"];
        $this->Sub2=$aRow["sub2"];
        $this->Sub3=$aRow["sub3"];
        $this->Sub4=$aRow["sub4"];
        $this->Sub5=$aRow["sub5"];
        $this->Sub6=$aRow["sub6"];
         $this->Lab1=$aRow["lab1"];
        $this->Lab2=$aRow["lab2"];
        $this->Lab3=$aRow["lab3"];
        
        $this->MarksID=$iID;

        $oConnection->close();
	}
	public function save(){

		$oConnection = new Connection();


		//create query
       if($this->MarksID==0)
       {
		$sSQL = "INSERT INTO tb_marks(sub1,sub2,sub3,sub4,sub5,sub6,lab1,lab2,lab3,studentID) 
			values('".$oConnection->escape($this->Sub1)."',
                   '".$oConnection->escape($this->Sub2)."',
                    '".$oConnection->escape($this->Sub3)."',
                    '".$oConnection->escape($this->Sub4)."',
                   '".$oConnection->escape($this->Sub5)."',
                    '".$oConnection->escape($this->Sub6)."',
                    '".$oConnection->escape($this->Lab1)."',
                   '".$oConnection->escape($this->Lab2)."',
                    '".$oConnection->escape($this->Lab3)."',
                    '".$oConnection->escape($this->StudentID)."'
                   )";


		//execute$this->Name='';
       
		$oResultSet=$oConnection->query($sSQL);

		

        		if($oResultSet==true){
                            echo "successful";

                        }else{
                            die($sSQL."jdhbf");

                        }
            }

        else{
            $sSQL1="UPDATE tb_fee
                    SET
                    sub1 = '".$this->Sub1."',
                    sub2 = '".$this->Sub2."',
                    sub3 = '".$this->Sub3."',
                    sub4 = '".$this->Sub4."',
                    sub5 = '".$this->Sub5."',
                    sub6 = '".$this->Sub6."',
                    lab1 = '".$this->Lab1."',
                    lab2 = '".$this->Lab2."',
                    lab3 = '".$this->Lab3."',
                    
                    WHERE marksID = ".$this->MarksID;

            $result=$oConnection->query($sSQL1);
              if($result==false){
                    die($sSQL."jdhbf");

                }
            }
	}
	public function getmarksBYStudentID($ID){
		  $oConnection = new Connection();


            // create query
            $sSQL = 'SELECT marksID from tb_marks where studentID= "'.$ID.'"';

            //execute
            $oResultSet=$oConnection->query($sSQL);
            $aRow=$oConnection->fetchArray($oResultSet);

            if($aRow == true)
            {
                $iID=$aRow["marksID"];
                $this->load($iID);

                return true;
            }
            else
            {

                return false;
            }
            $oConnection->close();
	}
    public function __get($var){
        switch($var){
            case "studentsub1marks":
            return $this->Sub1;
            break;
            case "studentsub2marks":
            return $this->Sub2;
            break;
            case "studentsub3marks":
            return $this->Sub3;
            break;
            case "studentsub4marks":
            return $this->Sub4;
            break;
            case "studentsub5marks":
            return $this->Sub5;
            break;
            case "studentsub6marks":
            return $this->Sub6;
            break;
            case "studentlab1marks":
            return $this->Lab1;
            break;
            case "studentlab2marks":
            return $this->Lab2;
            break;
            case "studentlab3marks":
            return $this->Lab3;
            break;
            case "studentID":
            return $this->StudentID;
            break;
            case "marksID":
            return $this->MarksID;
            break;

       
            default:
            die($var."is not allowed");
            break;
        }
    }
	public function __set($var,$value){       
        
		switch($var){
        	case "studentsub1marks":
            $this->Sub1=$value;
            break;
            case "studentsub2marks":
            $this->Sub2=$value;
            break;
            case "studentsub3marks":
            $this->Sub3=$value;
            break;
            case "studentsub4marks":
            $this->Sub4=$value;
            break;
            case "studentsub5marks":
            $this->Sub5=$value;
            break;
            case "studentsub6marks":
            $this->Sub6=$value;
            break;
            case "studentlab1marks":
            $this->Lab1=$value;
            break;
            case "studentlab2marks":
            $this->Lab2=$value;
            break;
            case "studentlab3marks":
            $this->Lab3=$value;
            break;
            case "marksID":
            $this->MarksID=$value;
            break;
            case "studentID":
            $this->StudentID=$value;
            break;

       
          	default:
            die($var."is not allowed");
            break;
        
       
        }
	}
}

// $of=new Marks();
// $of->getmarksBYStudentID(1);
// echo "<pre>";
// print_r($of->studentsub1marks);
// echo "</pre>"
// $of->studentsub1marks="mdsbf";
// $of->studentlab1marks="dsfsfd";
// $of->studentsub6marks="sdf";
// $of->save();
?>