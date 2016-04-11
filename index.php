<?php
ob_start(); 
require_once("includes/header.php");
require_once("includes/form.php");
require_once("includes/Student.php");

?>
  
 
<div class="form">
      
      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#login">Log In</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="signup">   
          <h1>Register by filling up the form below</h1>
          <?php 
           $oForm1=new Form();

           if(isset($_POST['registersubmit']) == true)
               {
                echo "hello";
                print_r($_POST);
                
                $oForm1->data=$_POST;
                
                // $oForm->checkRequired("Username");
                // $oForm->checkRequired("Useremail");
                // $oForm->checkRequired("Usertelephone");
                // $oForm->checkRequired("Userpassword");
                
                $oStudent=new Student();

                if($oForm1->valid==true)
                {
                  $oStudent->studentpassword=password_hash($_POST["password"],PASSWORD_DEFAULT);
                  $oStudent->studentname=$_POST["name"];
                  $oStudent->studentemail=$_POST["email"];
                  $oStudent->studenttelephone=$_POST["contact"];
                  $oStudent->studenttype=$_POST["type"];
                  $oStudent->studentdob=$_POST["dob"];
                  $oStudent->studentstate=$_POST["state"];
                  $oStudent->studentdistrict=$_POST["district"];
                  $oStudent->studenttaluk=$_POST["taluk"];
                  $oStudent->studentaddress=$_POST["address"];
                  // $oUser->userpassword=$_POST["Userpassword"];
                  
                  $oStudent->save();
                  
                  header("Location:index.php");
                  exit; 
                }
              }

          
           
           $oForm1->makeInput("name","");
           $oForm1->makeInput("email","");
             
           

           
           $oForm1->makeInput("type","");
          
           

           
           $oForm1->makeInput("password","");
           $oForm1->makeInput("confirmpassowrd","");
           
           $oForm1->makeInput("contact","");
           $oForm1->makeInput("dob","");

           
           $oForm1->makeInput("state","");
           $oForm1->makeInput("district","");
           

          
           $oForm1->makeInput("taluk","");
           $oForm1->makeInput("address","");
           
           
           $oForm1->makeSubmit("registersubmit");
           echo $oForm1->html;
           ?>
          
         
          

        </div>
<!-- login div @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->
           <?php
                 $oForm=new Form();


               if(isset($_POST['login']) == true)
                   {
                    
                    
                    $oForm->data=$_POST;

                   
                    
                    $oStudent=new Student();

                    if($oForm->valid==true)
                    {
                      $sEmail=$_POST["email"];

                      
                     
                     $bLoaded=$oStudent->getStudentByEmail($sEmail);

                      if($bLoaded)
                        // password_verify($_POST["Password"],$oUser->userpassword)== false
                        {
                               // if($_POST["password"]==$oUser->userpassword)
                          if(password_verify($_POST["Password"],$oUser->userpassword)== false)
                               {
                                  $_SESSION["studentID"]=$oStudent->studentID;
                              
                                  echo "successful";

                                  header("Location:studentdetails.php?key=".$_SESSION["studentID"]);
                                  exit;
                               }
                               else
                              {
                               $oForm->raiseCustomError("password","This password is incorrect");
                              }

                        }
                        else
                        {
                          
                          $oForm->raiseCustomError("email","This email has not been registered yet");
                 
                        }

                     
                      // $oUser->useremail=$_POST["password"];
                      
                    
                      // header("Location:index.php");
                      // exit; 
                    }
                  }

               
               
        echo "<div id='login'> ";  
          echo "<h1>Welcome Back!</h1><form class='myForm' method='post' enctype='multipart/form-data'>";
          
          
           
            $oForm->makeInput("email","");
            $oForm->makeInput("password","");
            $oForm->makeSubmit("login","");
            echo $oForm->html;
            
           
      
          
         
          
          
          
         

        echo "</div>";
        
  

    ?>
 </div>
<?php
require_once("includes/footer.php");
?>

