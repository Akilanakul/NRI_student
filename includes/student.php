<?php
include_once("connection.php");
class Student{
	private $Name;
    private $iID;
	private $Email;
	private $Telephone;
	private $Password;
    private $Type;
    private $Dob;
    private $State;
    private $District;
    private $Taluk;
    private $Address;

	public function __construct(){
		$this->Name='';
		$this->Email='';
		$this->Telephone='';
		$this->Password='';
        $this->iID=0;
        $this->Type='';
        $this->Dob='';
        $this->State='';
        $this->District='';
        $this->Taluk='';
        $this->Address='';

	}
	public function load($iID){
        $oConnection = new Connection();


        // create query
        $sSQL = 'SELECT name,type,password,contact,email,dob,state,district,taluk
        from tb_NRIstudent where studentID= "'.$iID.'"';
        
        //execute
        $oResultSet=$oConnection->query($sSQL);

        //fetch data

        // check if the customer is present
        $aRow=$oConnection->fetchArray($oResultSet);
        $this->Name=$aRow["name"];
        $this->Type=$aRow["type"];
        $this->Email=$aRow["email"];
        $this->Password=$aRow["password"];
        $this->Telephone=$aRow["contact"];
        $this->Dob=$aRow["dob"];
        $this->State=$aRow["state"];
        $this->District=$aRow["district"];
        $this->Taluk=$aRow["taluk"];
        
        $this->iID=$iID;

        $oConnection->close();

	}
	public function save(){
		$oConnection = new Connection();


		//create query
       if($this->iID == 0){

		$sSQL = "INSERT INTO tb_NRIstudent(name,password,type,contact,email,dob,state,district,taluk) 
			values('".$oConnection->escape($this->Name)."',
                   '".$oConnection->escape($this->Password)."',
                   '".$oConnection->escape($this->Type)."',
                   '".$oConnection->escape($this->Telephone)."',
                   '".$oConnection->escape($this->Email)."',
                    '".$oConnection->escape($this->Dob)."',
                   '".$oConnection->escape($this->State)."',
                   '".$oConnection->escape($this->District)."',
                   '".$oConnection->escape($this->Taluk)."'
                   
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
            $sSQL1="UPDATE tb_NRIstudent
                    SET
                    name = '".$this->Name."',
                    type = '".$oConnection->escape($this->Type)."',
                    
                    contact= '".$oConnection->escape($this->Telephone)."', 
                    email = '".$oConnection->escape($this->Email)."' ,
                    dob = '".$oConnection->escape($this->Dob)."' ,
                    state= '".$oConnection->escape($this->State)."', 
                    district = '".$oConnection->escape($this->District)."' ,
                    taluk = '".$oConnection->escape($this->Taluk)."' 
                    
                    WHERE studentID = ".$this->iID;

            $result=$oConnection->query($sSQL1);
              if($result==false){
                    die($sSQL."jdhbf");

                }
        }
	}
    public function getStudentByEmail($sEmail){
        $oConnection = new Connection();


            // create query
            $sSQL = 'SELECT studentID from tb_NRIstudent where email= "'.$sEmail.'"';

            //execute
            $oResultSet=$oConnection->query($sSQL);
            $aRow=$oConnection->fetchArray($oResultSet);

            if($aRow == true)
            {
                $iID=$aRow["studentID"];
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
        	case "studentname":
            return $this->Name;
            break;
            case "studentemail":
            return $this->Email;
            break;
            case "studenttelephone":
            return $this->Telephone;
            break;
            case "studentID":
            return $this->iID;
            break;
            case "studentpassword":
            return $this->Password;
            break;
            case "studenttype":
            return $this->Type;
            break;
            case "studentdob":
            return $this->Dob;
            break;
            case "studentstate":
            return $this->State;
            break;
            case "studentdistrict":
            return $this->District;
            break;
            case "studenttaluk":
            return $this->Taluk;
            break;
            case "studentaddress":
            return $this->Address;
            break;
            


            default:
            die($var."is not allowed");
            break;
     	}
    
	}
	public function __set($var,$value){       
        
		switch($var){
        	case "studentname":
            $this->Name=$value;
            break;
            case "studentemail":
            $this->Email=$value;
            break;
            case "studentID":
            $this->iID=$value;
            break;
            case "studentpassword":
            $this->Password=$value;
            break;
            case "studenttelephone":
            $this->Telephone=$value;
            break;
            case "studenttype":
            $this->Type=$value;
            break;
            case "studentdob":
            $this->Dob=$value;
            break;
            case "studentstate":
            $this->State=$value;
            break;
            case "studentdistrict":
            $this->District=$value;
            break;
            case "studenttaluk":
            $this->Taluk=$value;
            break;
            case "studentaddress":
            $this->Address=$value;
            break;

          	default:
            die($var."is not allowed");
            break;
        
       
        }	}
}
$or=new Student();
// // $or->getStudentByEmail("akila90");
$or->load(1);

// // // $or->getRecipe(2);
// $or->studentname="asdf";
// $or->studentemail="akila90";
// $or->studentpassword="sdf";
// $or->studentaddress="fdv";
// $or->studentID="1";

// $or->save();
echo "<pre>";
print_r($or->fee);
// print_r(
//     $or->studentname);
echo "</pre>";