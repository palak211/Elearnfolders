<?php include 'header.php';?>
<div class="bg pt-5 pb-4">
  <h4 class="text-center"> Recover Password   </h4>     
    <p class="text-center"> Home / Contact Us </p>
  </div>
<div class="container pt-5 pb-5">
<div class="row">
<div class="col-md-3">
</div>
<div class="col-md-6">
    <form action="" method="post">
<h3>Recover Password </h3><sup class="fcy"> _____________ </sup>
<p> Forgotten Password ? Enter Your E-Mail address below,And we'll send an
    E-Mail Allowing You to Reset It</p> <br/>
<input type="email" placeholder="Email Address" name="ea" class="form-control" required> <br/>

<button type="submit"  class=" btn bgs mt-3" name="sb">Next</button><br>
    </form>
    <?php 
    if(isset($_POST['sb'])){
$result=$conn->query("Select * from student where Email='$_POST[ea]'");
if($result->num_rows>0)
    {
    $_SESSION['code']=rand(1000,9999);
                           
require 'PHPMailer-master/PHPMailerAutoload.php';
$email='gagandeep.a24@gmail.com';
$password='project_php';
$to_id=$_POST['ea'];
$subject='Recover Password';
$message="Your verification code is ". $_SESSION['code'].".Please use this code to recover your password.
 Click on the following link:<br/> <a href='http://localhost/elearn/Resetpassword.php?id=".$to_id."'>click here</a>
 <br/><br/><h5>Regards</h5><h5>Skill Share</h5>";

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
echo "Message Sent";
}

    }                  
    
    
        
else{
       echo"<br/><div class='alert alert-warning'> <i class='icofont icofont-info'> </i> &nbsp;Account does not exisits. </div>"; } }

   
                ?>
         

    
    
                
</div>
<div class="col-md-3">
</div>
</div>
    </div>

 

<?php include 'footer.php';?>