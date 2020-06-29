<?php include 'header.php';?>
<div class="bg pt-5 pb-4">
  <h4 class="text-center"> SignIn   </h4>     
    <p class="text-center"> Home / SignIn </p>
  </div>
    
        <div class="container pt-5 pb-5">
              
            <form action="" method="post"autocomplete="off">  
          
            <div class="row pt-2 pb-4">
                <div  class="col-md-3"></div>
                <div  class="col-md-6">
            <h3>Sign In </h3>  <sup class="fcy"> _____________ </sup><br><br>
         
               <label>E-Mail</label>
               <input type="email" class="form-control" placeholder="Enter YourE-Mail" required name="em"><br/>
               <label>Password</label>
               <input type="password" class="form-control" placeholder="Enter Your Password" required name="pw">
               
               <br/>
               <p> <a href="recoverpswrd.php">Forget password ?</a> </p>
               
                <button type="submit" name="signin" class="btn btn bgs mt-3">Sign In</button>
    
               <br/><br/>
                        <p> New User ? <a href='register.php'>Create An Account </a></p>
        
                </div></div></form>
            
        
        
        
                  
            
               <?php
               if(isset($_POST['signin'])){
                   $Sql="Select * from student where Email='$_POST[em]' 
                   and pswrd ='$_POST[pw]'";
                   $result=$conn->query($Sql);
                   if($result->num_rows>0)
                   {
                    $row=$result->fetch_assoc();
                    $_SESSION['sid']=$row['Sid'];
                       
        if(isset($_GET['crsid'])){
        $crsid=$_GET['crsid'];
        echo"<script> window.location='viewcourse.php?id=$crsid'</script>";   
        }                   
        else{                
        echo"<script> window.location='user/student.php'</script>";
        }
                   }
       else 
       {
           echo "<br/><div class='alert alert-danger'> <i class='icofont icofont-error'> </i> &nbsp;
    Invalid UserName Or Password  </div>";
    }
                 }
                   
           
           
           
           ?>
</div>           
    <?php include 'footer.php'; ?>