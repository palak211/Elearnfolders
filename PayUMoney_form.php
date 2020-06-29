<?php include 'db.php'?>
<?php session_start();?>
<div class="row mt-4">
<div class="col-md-12">
<br/><br/>
<h3>  Order Confirmation </h3> 
</div> </div>
<div class="container text-center"> <br/>

<?php

$MERCHANT_KEY = "gtKFFx";
$SALT = "eCwWELxi";
// Merchant Key and Salt as provided by Payu.

$PAYU_BASE_URL = "https://test.payu.in";		// For Test
$action = '';
$currentDir	 = 'http//localhost/elearn/';

$posted = array();
if(!empty($_POST)) {
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
	
  }
}

$formError = 0;

if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
		 
  ) {
    $formError = 1;
  } else {
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
	$hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';	
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;


    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}
?>
<html>
  <head>
  <script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  </script>
  </head>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link href="css/bootstrap.min.css" rel="stylesheet" />


  <body onLoad="submitPayuForm()">
  
<?php $result = $conn->query("SELECT * from student where Sid='$_SESSION[sid]';");
if($result->num_rows>0)
$row= $result->fetch_assoc(); 

$tm=0;$count=0;
$result_c=$conn->query("select * FROM cart,course where cart.userid='$_SESSION[sid]' and course.Course_id=cart.Course_id and cart.status='cart'; ");

if($result_c->num_rows>0){
while($row_c=$result_c->fetch_assoc()){
$tm+=$row_c['fee'];
$count++;
}}

?>  

 
    
    <?php if($formError) { ?>
	 <?php } ?>
    <form action="<?php echo $action; ?>" method="post" name="payuForm">
    <div class="row"> <div class="col-md-3"></div><div class="col-md-6">

    <br/>      
    <span style="color:red">Please Confirm Your Detail .</span>
      <br/>
      <br/>
     
      <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
      <div class="row"> <div class="col-md-4"><label></label></div><div class="col-md-8">
      <input name="productinfo" type="hidden" value="<?php echo $count ?> Course"  /></div></div>
    
     <div class="row"> <div class="col-md-4"><label>Total Amount</label></div><div class="col-md-8">
      <input name="amount" id="amount" value="<?php echo $tm ?>" class="form-control" required style="border:none" /></div></div>
    
      <div class="row"> <div class="col-md-4"><label>User Name</label></div><div class="col-md-8">
      <input name="firstname" id="firstname" value="<?php echo $row['FirstName']." ".$row['LastName'] ; ?>"  class="form-control" required style="border:none" /></div></div>
      
      
     <div class="row"> <div class="col-md-4"><label>Email ID </label></div><div class="col-md-8">  
        <input name="email" id="email" value="<?php echo $row['Email'] ; ?>"  class="form-control" required style="border:none" /></div></div>
        
     <div class="row"> <div class="col-md-4"><label>Contact No </label></div><div class="col-md-8">  
     <input name="phone" id="phone" value="<?php echo $row['Pno'] ; ?>"  class="form-control" required style="border:none" /></div></div>
     
     
     
         
         <div class="row">
      <div class="col-md-12">      

<input type="hidden" name="surl" value="<?php echo (empty($posted['surl'])) ?'http://localhost/elearn/success.php/' : $posted['surl'] ?>" size="64" />
<input type="hidden" name="furl" value="<?php echo (empty($posted['furl'])) ? $currentDir.'failure.php' : $posted['furl'] ?>" size="64" />
<input type="hidden" name="service_provider" value="" size="64" />
          </div> </div> <br/ > 
          
          
                    <?php if(!$hash) { ?>
       <input type="submit" value="Proceed To Payment" class="btn btn-dark" />
          <?php } ?>
       
    </form>
  </body>
</html>
