<?php include 'header.php';?>
<div class="bg pt-5 pb-4">
  <h4 class="text-center"> Reset Password   </h4>     
    <p class="text-center"> Home / Contact Us </p>
  </div>
<div class="container pt-5 pb-5">
<div class="row">
<div class="col-md-2">
</div>
<div class="col-md-8">
    <form action="" method="post">
<h2>Reset password </h2><sup class="fcy"> _____________ </sup>
<p>We have sent a reset password email to mollyzoomtest@gmail.com.Please click the Reset Paasword link to set your new password. </p>
    <p> Didn't recieve the email yet?
        Please check your spam folder,or Resend the email.</p>
    
    <br/>

<input type="text" placeholder="Code***" name="cp" class="form-control" required> <br/>
<input type="text" placeholder="New Password" name="np" class="form-control"pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required><br/>
    <input type="text" placeholder="Retype Password" name="rp" class="form-control" required>
 <br/>
<button type="submit"  class=" btn bgs mt-3" name="sb">Reset Password</button><br>
    </form>
    
    
    <?php 
    if(isset($_POST['sb'])){

        if($_POST['cp']==$_SESSION['code'])
        {
    
        
    if($_POST['np']==$_POST['rp'])   
{
    $sql="update student set Pswrd='$_POST[rp]' where Email='$_GET[id]'";
       
    if($conn->query($sql)===TRUE)
    
{
echo "<script>window.location='login.php';</script>";
}

    }
       else 
        echo"<br/><div class='alert alert-warning'> <i class='icofont icofont-info'> </i> &nbsp;Retype Password Not Matched </div>";

    }
    else
        echo"<br/><div class='alert alert-warning'> <i class='icofont icofont-info'> </i> &nbsp;Please enter a valid code. </div>";
     
       }
    
            ?>
         

    
    
                </div> 
</div>s
</div>
<div class="col-md-2">
</div>
</div>

<?php include 'footer.php';?>