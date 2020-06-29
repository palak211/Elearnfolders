<?php include 'header.php';?>

      
 <div class="bg pt-5 pb-4">
  <h4 class="text-center"> Admin Login  </h4>     
    <p class="text-center">  </p>
  </div>
    
    <div class="container pt-5 pb-5">
              
            <form action="" method="post" autocomplete="off">  
          
            <div class="row pt-2 pb-4">
                <div  class="col-md-3"></div>
                <div  class="col-md-6">
            <h3>AdminLogin </h3>  <sup class="fcy"> _____________ </sup><br>
         
               
            
           <br/>
          
               <label><i class="icofont icofont-user text-warning"></i> UserName</label>
               <input type="text" class="form-control" placeholder="Enter YourE-Mail" required name="nm"><br/>
              <label> <i class="icofont icofont-lock text-warning "></i> Password</label>

               <input type="password" class="form-control" placeholder="Enter Your Password" required name="pw">
               
               <br/>
               
               <br/>
                <button type="submit" name="signin" class="btn btn bgs mt-3">Sign In</button>
    
               <br/>
             
        
        
        
                  
               
               </form>
               <?php
               if(isset($_POST['signin'])){
                   $pw=md5($_POST['pw']);
                   $Sql="Select * from admin where Username='$_POST[nm]' 
                   and Password ='$pw'";
                   $result=$conn->query($Sql);
                   if($result->num_rows>0)
                   {
                    $row=$result->fetch_assoc();
                       $_SESSION['admin']='ad';
                       
                       
                    
    echo"<script> window.location='admin/course.php'</script>";
                   }
       else 
       {
           echo "<br/><div class='alert alert-danger'> <i class='icofont icofont-error'> </i> &nbsp;
    Invalid UserName Or Password  </div>";
    }
                 }
                   
           
           
           
           ?>
               
           </div>
        </div>
        
                  
        
        
    
    
        
        </div></div>
 <?php include 'footer.php'; ?>  