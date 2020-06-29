<?php include 'header.php';?>
      
 <div class="bg pt-5 pb-4">
  <h4 class="text-center"> My Cart   </h4>     
    <p class="text-center"> Home / Cart </p>
  </div>
        
        <div class="container pt-3 pb-5" style='min-height:300px'>
            
            <?php if(!isset($_SESSION['sid'])){ 
            echo "<h2> No Course Added </h2> "; }  else { 
            
            ?>
            
           
        
        <?php
    $tfee=0;
    $sql= "select * from course,cart where cart.course_id=course.Course_id and cart.userid='$_SESSION[sid]' and cart.status='cart' order by cartid DESC";
    $result=$conn->query($sql);
    if($result->num_rows>0){ ?>
  <div class="row">
                <div class="col-md-10"></div>
                <div class="col-md-2">
                    
                <a class="btn btn-block" href='PayUMoney_form.php' style="background:#20d1e9; color:#fff;"> Take This Course </a>
                </div>
            
            
            </div> 
            
            <br/>
            
            <table class="table table-striped table-bordered table-hover">
<tr>
    <th>Image</th>

    <th>Title</th>
    
    
    
    <th>Fee</th>
    <th>Remove</th>
        
            
    <?php 
    while($row=$result->fetch_assoc()){
   $aid=$row['cartid'];
        $tfee+=$row['fee'];
 ?> 
    
    
</tr>    
    <?php
    echo"<tr>";
        
        
    echo"<td><img src='admin/".$row['Image']."' width='50px' height='50px'></td>";
    echo"<td>".$row['Title']."</td>";
         
         echo"<td>".$row['fee']."</td>";
    echo "<td> <a href='cart.php?dl=$aid'> <i class='icofont icofont-delete'> </i></a> </td>";
    echo"</tr>";
    

    ?>
       
            <?php }
echo "<tr> <th colspan='2'>  Total Amount </th> <th> ".$tfee." </th> ";
    } else 
         echo "<h2> No Course Added </h2> ";
 ?>
            </table> 
         <?php 
    if(isset($_GET['dl'])){
        
    $sql="DELETE FROM cart WHERE cartid ='$_GET[dl]'";
    if($conn->query($sql)===TRUE)
        echo"<script> window.alert('Remove From Cart '); window.location='cart.php'; </script>";
       else 
        
        
           echo "<br/><div class='alert alert-danger'> <i class='iconfont iconfont-delete'> </i> &nbsp;
     Error:</div>".$conn->error;
        
    } } ?> 
            </div>
    
    
    <?php include 'footer.php'; ?>