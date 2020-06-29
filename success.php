<html>
<head>
<?php session_start();?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<?php include 'db.php';?>
<body style='background-color:#e8e8e8;text-align:center; min-height:400px; padding-top:100px;'>
<div >
<h3>  Transaction Confirmation </h3> 
<?php
    $edate=date("Y-m-d");
$status=$_POST["status"];
$firstname=$_POST["firstname"];
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];
$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$email=$_POST["email"];
$salt="eCwWELxi";

// Salt should be same Post Request 

If (isset($_POST["additionalCharges"])) {
       $additionalCharges=$_POST["additionalCharges"];
        $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
  } else {
        $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
         }
		 $hash = hash("sha512", $retHashSeq);
       if ($hash != $posted_hash) {
	       echo "Invalid Transaction. Please try again";
		   } else {?>
          <div class="card">
  <h5 class="card-header"> Thank You.</h5> 
  <div class="card-body"> 
              <?php 

$sql="INSERT INTO payment(transid,amount,user_id) values('$txnid','$amount','$_SESSION[sid]')";
if($conn->query($sql)===TRUE){
$payid=$conn->insert_id;
$sql="update cart set status='enroll', payment_id='$payid' ,edate='$edate' where userid='$_SESSION[sid]' and status='cart';";
if($conn->query($sql)===TRUE){          

echo "<h4> Your Transaction ID for this transaction is ".$txnid."</h4>";
echo "<h4> We have received a payment of Rs. " . $amount . "</h4>";


          ?>
            </div></div>         
			<?php
            require 'PHPMailer-master/PHPMailerAutoload.php';

$email1="gagandeep.a24@gmail.com";
$password ="project_php";
$to_id =$email;
$message = "<p> Your Transaction Is Successfully Placed .
Your Transaction ID for the same  is ".$txnid." We have received a payment of Rs. " . $amount . " </p><br/> <h1 style='text-center'>keep Learning :) </h1> <br/><p> Advance your career.Pursue your passion.</p><h6> Regard </h6> <h5> Elearn Team </h5>";

$subject = "Enrollment Confirmation";
$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;

$mail->Username = $email1;
$mail->Password = $password;
$mail->addAddress($to_id);
$mail->Subject = $subject;
$mail->msgHTML($message);
if (!$mail->send()) {
$error = "Mailer Error: " . $mail->ErrorInfo;
echo '<p id="para">'.$error.'</p>';
}
else {
	
echo "<br/><div class ='text-success' style='padding:2px;'>Confirmation Mail has been sent </div> <div><a href='http://localhost/elearn/user/mycourses.php'> <button style='padding:5px; background-color:#222; color:#fff'> Start Your Course Now </button> </a> </div>";
}
          
}else{
		echo "Error:".$sql."<br>".$conn->error;
	}
}else{
		echo "Error:".$sql."<br>".$conn->error;
	}
}         
?>	
		   </div>
           
           <br/>
