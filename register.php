<?php include 'header.php'?>
<div class="bg pt-5 pb-4">
  <h4 class="text-center"> Sign Up </h4>     
    <p class="text-center"> Home / Register </p>
  </div>
        
        <div class="container pt-5 pb-5">
              
            <form action="" method="post" autocomplete="off">  
          
            <div class="row pt-2 pb-4">
                <div  class="col-md-2"></div>
                <div  class="col-md-8">
            <h3>Register</h3>  <sup class="fcy"> _____________ </sup><br><br>
                    
                    
                    
            <div class="row">
                <div  class="col-md-6">
                   <input type="text" name="fnm" class="form-control" placeholder="First  Name"pattern="[a-z A-Z]{3,40}"  required>
                </div>
                <div  class="col-md-6">
                   <input type="text" name="lnm" class="form-control"pattern="[a-z A-Z]{3,40}"  placeholder="Last Name" required> 
                 
                </div>
                    </div> <br/>
                    
                            
            <div class="row">
                <div  class="col-md-6">
                    <input type="email" name="em" class="form-control" placeholder="Your Email" required> <br/>
                </div>
                
                    <div  class="col-md-6">
                    <input type="text"  pattern="[0-9]{10}" name="ph" class="form-control" placeholder="Phone No" required> <br/>
                </div></div>
                 <div class="row">
                    <div  class="col-md-6">
                    <input type="password" name="pwd" autocomplete="false" class="form-control" placeholder="Type Password" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"title="Min 8 character Password must contain a number,a special character(_@#%^&*) and an uppercase"title="Min 8 character Password must contain a number,a special character(_@#%^&*) and an uppercase"required> <br/>
                     </div>
                     <div  class="col-md-6">
                    <input type="password" name="cpwd" autocomplete="false" class="form-control" placeholder="Retype Password" required> <br/>
                     </div></div>
                    <button type="submit"  class=" btn bgs mt-3" name="sb">Register</button>
                </div>
               </div>
            
            </form>
            
            
            <?php 
    if(isset($_POST['sb'])){
$result=$conn->query("Select * from student where Email='$_POST[em]'");
if($result->num_rows>0)
    {
                       
 echo"<br/><div class='alert alert-warning'> <i class='icofont icofont-info'> </i> &nbsp;Account already exisits. </div>";
    }
        
else{
    if($_POST['pwd']==$_POST['cpwd'])   
{
    $sql="INSERT INTO student(FirstName,LastName,Email,Pswrd,Pno) VALUES('$_POST[fnm]','$_POST[lnm]','$_POST[em]','$_POST[pwd]','$_POST[ph]');";
       
    if($conn->query($sql)===TRUE)
    {
        require 'PHPMailer-master/PHPMailerAutoload.php';
$email='gagandeep.a24@gmail.com';
$password='project_php';
$to_id=$_POST['em'];
$subject='Welcome';
$message='<h4>Start Learning Today with Specialisation.</h4><p> Showcase new Skills and power up your resume,You can earn Specializations Certificates';
$mail=new PHPMailer;
$mail->isSMTP();
$mail->Host='smtp.gmail.com';
$mail->Port=587;
$mail->SMTPSecure='tls';
$mail->SMTPAuth=true;
$mail->Username=$email;
$mail->Password=$password;
$mail->addAddress($to_id);
$mail->Subject=$subject;
$mail->msgHTML($message);
if(!$mail->send())
{
$error="Mailer Error:".$mail->ErrorInfo;
echo '<p id="para">'.$error.'</p>';
}
else
{
echo "<script>window.location='login.php';</script>";
}

    }
       else 
           echo "<br/><div class='alert alert-danger'> <i class='icofont icofont-delete'> </i> &nbsp;
     Error:</div>".$conn->error;
    }
    else
        echo"<br/><div class='alert alert-warning'> <i class='icofont icofont-info'> </i> &nbsp;Retype Password Not Matched </div>";
     
       }
    }
            ?>
         

    
    
                </div> 
                    <?php include 'footer.php';?>
                     
                    
                
        