<?php
require_once("connection.php");

class Visitor{
	private $VisitorID;
	private $VehicleID;
	private $Arrival;
	private $Departure;
	private $Visittime;
    private $StudentID;

	public function _construct(){
		$this->VehicleID='';
		$this->Arrival='';
		$this->Departure='';
		$this->Visittime='';
	}
	public function save()
	{
		$oConnection = new Connection();


		//create query
       
		$sSQL = "INSERT INTO tb_visitor(vehicleID,arrival,departure,timing,studentID) 
			values('".$oConnection->escape($this->VehicleID)."',
                   '".$oConnection->escape($this->Arrival)."',
                    '".$oConnection->escape($this->Departure)."',
                    '".$oConnection->escape($this->Visittime)."',
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
	public function load($iID){
		$oConnection = new Connection();


        // create query
        $sSQL = 'SELECT vehicleID,arrival,departure,timing
        from tb_visitor where visitorID= "'.$iID.'"';
        
        //execute
        $oResultSet=$oConnection->query($sSQL);

        //fetch data

        // check if the customer is present
        $aRow=$oConnection->fetchArray($oResultSet);
        $this->VehicleID=$aRow["vehicleID"];
        $this->Arrival=$aRow["arrival"];
        $this->Departure=$aRow["departure"];
        $this->Visittime=$aRow["timing"];
        
        $this->VisitorID=$iID;

        $oConnection->close();
	}
	public function getvisitingdetailsBYStudentID($ID){
		  $oConnection = new Connection();


            // create query
            $sSQL = 'SELECT visitorID from tb_visitor where studentID= "'.$ID.'"';

            //execute
            $oResultSet=$oConnection->query($sSQL);
            $aRow=$oConnection->fetchArray($oResultSet);

            if($aRow == true)
            {
                $iID=$aRow["visitorID"];
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
            case "studentvehicleid":
            return $this->VehicleID;
            break;
            case "studentarrival":
            return $this->Arrival;
            break;
            case "studentdepartue":
            return $this->Departure;
            break;
            case "studenttiming":
            return $this->Visittime;
            break;
            case "visitorID":
            return $this->VisitorID;
            break;
            case "studentID":
            return $this->StudentID;
            break;
             case "studentvisitorID":
            return $this->VisitorID;
            break;
       
            default:
            die($var."is not allowed");
            break;
        
       
        }
    }
		public function __set($var,$value){       
        
		switch($var){
        	case "studentvehicleid":
            $this->VehicleID=$value;
            break;
            case "studentarrival":
            $this->Arrival=$value;
            break;
            case "studentdepartue":
            $this->Departure=$value;
            break;
            case "studenttiming":
            $this->Visittime=$value;
            break;
            case "visitorID":
            $this->VisitorID=$value;
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
// $of=new Visitor();
// $of->getvisitingdetailsBYStudentID(1);
// echo "<pre>";
// print_r($of);
// echo "</pre>"
// $of->studentvehicleid="mdsbf";
// $of->studentdepartue="dsfsfd";
// $of->studenttiming="sdf";
// $of->save();
?>