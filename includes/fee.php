<?php
require_once("connection.php");

class Fee{
	private $FeeID;
	private $Totalfee;
	private $PaidStatus;
	private $Feepaiddate;
    private $StudentID;

	public function _construct(){
		$this->FeeID='';
		$this->Totalfee='';
		$this->PaidStatus='';
		$this->Feepaiddate='';
	}
	public function load($iID){
		$oConnection = new Connection();


        // create query
        $sSQL = 'SELECT totalfee,paid,feepaiddate
        from tb_fee where feeID= "'.$iID.'"';
        
        //execute
        $oResultSet=$oConnection->query($sSQL);

        //fetch data

        // check if the customer is present
        $aRow=$oConnection->fetchArray($oResultSet);
        $this->Totalfee=$aRow["totalfee"];
        $this->PaidStatus=$aRow["paid"];
        $this->Feepaiddate=$aRow["feepaiddate"];
        
        $this->FeeID=$iID;

        $oConnection->close();
	}
	public function save(){

		$oConnection = new Connection();


		//create query
       if($this->FeeID==0)
       {
		$sSQL = "INSERT INTO tb_fee(totalfee,paid,feepaiddate,studentID) 
			values('".$oConnection->escape($this->Totalfee)."',
                   '".$oConnection->escape($this->PaidStatus)."',
                    '".$oConnection->escape($this->Feepaiddate)."',
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
                    totalfee = '".$this->Totalfee."',
                    paid = '".$oConnection->escape($this->PaidStatus)."',
                    
                    
                    
                    feepaiddate = '".$oConnection->escape($this->Feepaiddate)."' 
                    
                    WHERE feeID = ".$this->FeeID;

            $result=$oConnection->query($sSQL1);
              if($result==false){
                    die($sSQL."jdhbf");

                }
        }
	}
	public function getfeeBYStudentID($ID){
		  $oConnection = new Connection();


            // create query
            $sSQL = 'SELECT feeID from tb_fee where studentID= "'.$ID.'"';

            //execute
            $oResultSet=$oConnection->query($sSQL);
            $aRow=$oConnection->fetchArray($oResultSet);

            if($aRow == true)
            {
                $iID=$aRow["feeID"];
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
            case "studentfee":
            return $this->Totalfee;
            break;
            case "studentpaidstatus":
            return $this->PaidStatus;
            break;
            case "studentfeepaiddate":
            return $this->Feepaiddate;
            break;
            case "studentfeeID":
            return $this->FeeID;
            break;
             case "studentID":
            return $this->StudentID;
            break;
            
            default:
            die($var."is not allowed");
            break;
        }
    }
	public function __set($var,$value){       
        
		switch($var){
        	case "studentfee":
            $this->Totalfee=$value;
            break;
            case "studentpaidstatus":
            $this->PaidStatus=$value;
            break;
            case "studentfeepaiddate":
            $this->Feepaiddate=$value;
            break;
            case "studentfeeID":
            $this->FeeID=$value;
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

// $of=new Fee();
// $of->getfeeBYStudentID(1);
// $of->studentfee="mdsbf";
// $of->studentpaidstatus="dsfsfd";
// $of->studentfeepaiddate="sdf";
// $of->save();
// echo "<pre>";
// print_r($of);
// echo "</pre>"
?>