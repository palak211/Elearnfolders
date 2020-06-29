<?php include 'header.php';?>
            <?php
    $sql= "select * from course where Course_id='$_GET[id]'";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
   $aid=$row['Course_id'];
   
$result_c=$conn->query("Select * from cart where course_id='$_GET[id]' and status='enroll'");
$no_of_stu=$result_c->num_rows;

 ?>  
<?php @include 'calc_d.php'; ?> 

 <div class="bg pt-5 pb-4">
  <h4 class="text-center"> Courses Overview   </h4>     
    <p class="text-center"> Home / Courses /<?php echo $row['Title'];?> </p>
  </div>
        
        <div class="container-fluid pt-5 pb-5">
    
        <div class="container">
        
<div class="row pb-3">
    
        <div class="col-md-9">
        <h4> Course Title : <?php echo $row['Title'];?></h4> <br/>
        <h6> Type  : &nbsp; 
<span style="color:brown"><?php echo $row['Category'];?> </span> | &nbsp; 
         Language  : &nbsp; 
<span style="color:brown"><?php echo $row['Language'];?> </span> | &nbsp;  
Duration  : &nbsp; 
<span style="color:brown"><?php echo round(($videoduration/60),0);?> Hours </span> |&nbsp; 
Level  : &nbsp;
<span style="color:brown"><?php echo $row['Level'];?> </span> | &nbsp;
Students   : &nbsp;
<span style="color:brown"><?php echo $no_of_stu;?> </span>
       
        </h6> <br/>
         <div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
    +       Course Overview
        </button>
      </h2>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
     <?php echo $row['Overview'];?>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
    +      Course Outline
        </button>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
      <?php echo $row['Outline'];?>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
    +      Course Requirments
        </button>
      </h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
       <?php echo $row['Requirements'];?>
      </div>
    </div>
  </div>
<div class="card">
    <div class="card-header" id="headingFour">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
    +      Course Lessons
        </button>
      </h2>
    </div>
    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
      <div class="card-body">
          <ul type='square'>
          <?php
    $sql= "select * from video where Course_id='$_GET[id]'";
    $result1=$conn->query($sql);
    while($row1=$result1->fetch_assoc()){
   $vid=$row1['Video_id'];
 ?>  
<li style="padding:8px">        <?php echo $row1['Title'];?> </li>          
<?php } ?>
          </ul>
      </div>
    </div>
  </div>

<div class="card">
    <div class="card-header" id="headingFive">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
    +      Course Reviews
        </button>
      </h2>
    </div>             
<div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
      <div class="card-body">
         
          <?php
    $sql= "select * from course_review cr,student s where cr.courseid='$_GET[id]' and cr.userid=s.Sid";
    $result1=$conn->query($sql);
    while($row1=$result1->fetch_assoc()){
   $vid=$row1['reviewid'];
 ?>  
<div class='alert alert-light border pl-5 mb-1'>   
    <p> <?php echo $row1['review'];?>  </p> 
<p class='text-right text-capitalize'> <i class='icofont icofont-user'></i> &nbsp;
<?php echo $row1['FirstName'];?>  <?php echo $row1['LastName'];?> &nbsp;&nbsp;
<i class='icofont icofont-time'></i> &nbsp; <?php echo $row1['reviewdate'];?> 
    </p>
          </div>          
<?php } ?>
         
      </div>
    </div>
  </div>
</div>
                      
            
        
            
        </div>
<div class='col-md-3 text-center'> 
    <div class='pb-3 pt-3'>
    <img src='admin/<?php echo $row['Image'];?>' width='90%' height='200px' class="border rounded"> 
        </div>
    <h5>
<i class="icofont icofont-cur-rupee"></i>  Course Fee  : &nbsp; 
            <?php echo $row['fee'];?>   </h5> <br/>
    
    <form action="" method="post">
        
<button type='submit' name='sb' class="btn btn-block" style="background:#20d1e9; color:#fff;"> Take This Course </button>
    </form>
    <?php 
    if(isset($_POST['sb'])){
        if(!isset($_SESSION['sid'])){
        
        echo"<script>window.location='login.php?crsid=$aid'; </script>";    
        }
        else{
$result2=$conn->query("Select * from cart where userid='$_SESSION[sid]' and course_id='$_GET[id]' and status='cart'");
$result3=$conn->query("Select * from cart where userid='$_SESSION[sid]' and course_id='$_GET[id]' and status='enroll'");

if($result2->num_rows>0)
{
echo"<script>window.alert(' Already In Cart'); </script>";
}
elseif($result3->num_rows>0)
{
echo"<script>window.alert(' Already Purchased'); </script>";
}

            
else{
    
        $sql="INSERT INTO cart(userid,course_id) VALUES('$_SESSION[sid]','$_GET[id]')";
    if($conn->query($sql)===TRUE)
        echo"<script>window.alert('Added to Cart'); </script>";
       else 
           echo "<br/><div class='alert alert-danger'> <i class='iconfont iconfont-delete'> </i> &nbsp;
     Error:</div>".$conn->error;
    }}
    }
?>  
    
    
        <?php if(!isset($_SESSION['sid'])){ ?>
    <div class='alert alert-light mt-4 border'>
    <i class="icofont icofont-info"></i>  or  login to access your Purchased Course
    </div>
    <?php } ?>
    </div>
</div>
            </div></div>    
    <?php include 'footer.php'; ?>