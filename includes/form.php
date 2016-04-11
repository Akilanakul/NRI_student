<?php
class Form{
	private $sHTML;
	private $aData;
	private $aErrors;
	private $aFiles;


	public function __construct(){
		$this->sHTML='<form class="Form" method="post" enctype="multipart/form-data">';
		$this->aData=[];
		$this->aErrors=[];

	}

	public function makeInput($sControlName,$sControlData){
		
		
		$this->sHTML.='<div class="field-wrap">';
           

		if(isset($this->aData[$sControlName])==true)
		{
			$sControlData=$this->aData[$sControlName];
		}
		$sErrors="";
			if(isset($this->aErrors[$sControlName])==true)
		{
			$sErrors="<p>".$this->aErrors[$sControlName]."</p>";

		}
		$this->sHTML.='  
              <label for="'.$sControlName.'">'.$sControlName.'<span class="req">*</span></label>
              <input type="text"required autocomplete="off" name="'.$sControlName.'"  value="'.$sControlData.'"/>
            </div>'.$sErrors.'';

           
       
	}
	public function makeUpdateInput($sControlName,$sControlData){
		
		
		$this->sHTML.='<div class="form-group">';
           

		if(isset($this->aData[$sControlName])==true)
		{
			$sControlData=$this->aData[$sControlName];
		}
		$sErrors="";
			if(isset($this->aErrors[$sControlName])==true)
		{
			$sErrors="<p>".$this->aErrors[$sControlName]."</p>";

		}
		$this->sHTML.='  
              <label for="'.$sControlName.'">'.$sControlName.'<span class="req">*</span></label>
              <input type="text"required autocomplete="off" name="'.$sControlName.'"  value="'.$sControlData.'"/>
            </div>'.$sErrors.'';

           
       
	}
	public function makeSearch($sControlName){
		
		$this->sHTML.='
		<div class="col-lg-6"><input  type="text" name="'.$sControlName.'" 
                class="form-control"  
                placeholder="'.$sControlName.'" 
                ></div>';

	}
	public function makeGo($sControlLabel)
	{
		$this->sHTML.=' 
               <div col-lg-6><input type="submit" name="'.$sControlLabel.'" class="btn 
               btn-primary " value="'.$sControlLabel.'"></div>';

	}
	public function makeTextArea($sControlName,$sControlData){
		
		
		
		
		if(isset($this->aData[$sControlName])==true)
		{
			$sControlData=$this->aData[$sControlName];
		}
		$sErrors="";
		if(isset($this->aErrors[$sControlName])==true)
		{
			$sErrors="<p>".$this->aErrors[$sControlName]."</p>";

		}
		$this->sHTML.='<div class="form-group">';
            $this->sHTML.='<label class="control-label col-xs-3" for="'.$sControlName.'">'.$sControlName.'</label>
            <div class="col-xs-9 col-md-6">
                <textarea rows="3" class="form-control" name="'.$sControlName.'" placeholder="'.$sControlName.'">'.$sControlData.'</textarea>
            </div>'.$sErrors.'
        </div>';

				// $this->sHTML.="\t\t".'	
				//  <div class="item">
                                        
                                        
				// 		<textarea class="col-lg-12" id="'.$sControlName.'" name="'.$sControlName.'"
				// 		  placeholder="'.$sControlLabel.'">'.$sControlData.'</textarea>
				// 		</div>'.$sErrors."\n";
	}
	
	public function makeSubmit($sControlLabel)
	{
		$this->sHTML.='<div class="field-wrap">
            
                <input type="submit" name="'.$sControlLabel.'" class="button button-block" value="'.$sControlLabel.'">
                
           
        </div>';

        // $this->sHTML .='<div class="item"><input class="pull-right" type="submit" name="submit" value="'.$sControlLabel.'"/></div>';

        }
   

    public function makeDropDown($sControlLabel,$sControlName)
    {
    	$sControlData='';

		$this->sHTML.='<div class="form-group">';
           

		if(isset($this->aData[$sControlName])==true)
		{
			$sControlData=$this->aData[$sControlName];
		}
		$sErrors="";
			if(isset($this->aErrors[$sControlName])==true)
		{
			$sErrors="<p>".$this->aErrors[$sControlName]."</p>";

		}
		$this->sHTML.='<label class="control-label col-xs-3" for="'.$sControlName.'"" >Meal Type</label>
						<div class="col-xs-9 col-md-6">
							<select class="form-control" name="'.$sControlName.'">
							<option value="1">Breakfast</option>
							<option value="2">Lunch</option>
							<option value="3">Dinner</option>
							</select>
						</div>
						</div>';
    }
    public function checkRequired($sControlName){


    	$sControlData='';
		if(isset($this->aData[$sControlName])==true)
		{
		$sControlData=trim($this->aData[$sControlName]);
		}
		if(strlen($sControlData)==0)
		{
			$this->aErrors[$sControlName]="Must not be empty";
		}


    }
    public function checkFileUploaded($sControlName){
			if(isset($this->aFiles[$sControlName])==false){
				$this -> aErrors[$sControlName] = "File not uploaded";
			}else{
				if($this->aFiles[$sControlName]["error"] != 0){
					$this -> aErrors[$sControlName] = "File has error";
				}
			}
	}
	public function moveFile($sControlName,$sNewName)
	{

		$sNewPath = dirname(__FILE__).'/../images/blog/'.$sNewName;
		
		move_uploaded_file($this->aFiles[$sControlName]['tmp_name'], $sNewPath);

		// echo '<pre>';
		// print_r($this->aFiles);
		// echo '</pre>';
		// exit;

	}
	public function makeFileInput($sControlLabel,$sControlName){
		
		$sError = "";
		if(isset($this->aErrors[$sControlName])){
			$sError = '<p style="color:orange">'.$this->aErrors[$sControlName].'</p>';
		}

		$this->sHTML .= '<div class="control-group">
              <label class="control-label col-xs-3" control-label" for="'.$sControlName.'">'.$sControlLabel.':</label>
              <div class="col-xs-9 col-md-6 controls">
                <input id="'.$sControlName.'" name="'.$sControlName.'" type="file" class="form-control" placeholder="'.$sControlLabel.'" class="input-medium">
              </div>
              '.$sError.'
            </div>';
	}
	 public function raiseCustomError($sControlName,$sMessage)
    {
		$this->aErrors[$sControlName] = $sMessage;
	}
    public function __get($var){
		switch ($var) {
			case 'html':
			return $this->sHTML."</form>";
				break;

			case 'valid':
			if(count($this->aErrors) == 0)
				return true;
			else
				return false;
			break;
			
			default:
			die($var."is not allowed");
				break;
		}
	}

	public function __set($var,$value){
		switch ($var) {
			case 'data':
			 $this->aData=$value;
			 break;
			case 'files':
				$this->aFiles = $value;
				break;
			default:
			die($var."is not allowed");
				break;
		}
	}
}

?>