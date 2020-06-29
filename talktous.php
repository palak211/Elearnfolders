<?php include 'header.php';?>
      
 <div class="bg pt-5 pb-4">
  <h4 class="text-center"> Contact Us   </h4>     
    <p class="text-center"> Home / Contact Us </p>
  </div>
        
        <div class="container pt-5 pb-5">
            <form action="" method="post" autocomplete="off">  
            
            <div class="row pt-2 pb-4">
                <div  class="col-md-12 text-center">
            <h3>TALK TO US!</h3>  <sup class="fcy"> _____________ </sup>
                </div></div>
            <div class="row">
                <div  class="col-md-4">
                    <h4><i class='icofont icofont-phone fcy'> </i>Phone Number</h4>
                      &nbsp; &nbsp; &nbsp; &nbsp; 
        
        9123854753  <hr/>
                    <h4><i class='icofont icofont-email fcy'> </i>E-Mail ID</h4>
                &nbsp; &nbsp; &nbsp; &nbsp; Help_desk@gmail.com <br/><br/>
                    
    <button class='btn bgy rounded-0'> <i class='icofont icofont-social-facebook'></i> </button>
                     <button class='btn bgy rounded-0'> <i class='icofont icofont-social-twitter'></i> </button>
                <button class='btn bgy rounded-0'> <i class='icofont icofont-social-linkedin'></i> </button>
    
                    
                </div>
                    
                     
                
                
                
                
                
                <div class="col-md-8">
                    <div class="row">
                        
                        <div class="col-md-6">
                            
                <label>Your Name *</label>
                    <input type="text" class="form-control" pattern="[a-z A-Z]{3,40}" name="nm" required >
                    
                        
                        <label class="pt-2">Your Email *</label>
                    
                <input type="email" class="form-control" name="em" required >
                    
                   
                    <label class="pt-2">Subject </label>
                 <input type="text" class="form-control"pattern="[a-z A-Z]{3,40}"  name="sub" required >
                        </div>
                    
                 <div class="col-md-6">
                     <label>Your Meassage </label>
                     <textarea name="msg" rows="5" maxlength="4000" class="form-control"></textarea>
                     <button type="submit"  class=" btn bgs mt-3" name="sb">Send Message</button>
                        </div>   </div></div></div></form></div>
        
        
        
        
             <?php 
    if(isset($_POST['sb'])){
        
                
        

    $sql="INSERT INTO Contact_msg(name,email,subject,msg) VALUES('$_POST[nm]','$_POST[em]','$_POST[sub]','$_POST[msg]')";
    
    
    
    
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
}}
else 
echo "<br/><div class='alert alert-danger'> <i class='icofont icofont-delete'> </i> &nbsp; Error:</div>".$conn->error;
    }
     
?>  
        <div class="container-fluid">
            
        
        </div>
    
    
    <?php include 'footer.php'; ?>