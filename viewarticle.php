<?php include 'header.php';?>
      
 <div class="bg pt-5 pb-4">
  <h4 class="text-center"> Latest Article   </h4>     
    <p class="text-center"> Home / Articles </p>
  </div>
        
        <div class="container-fluid pt-5 pb-5">
           <?php
    $sql= "select * from article where Post_id='$_GET[id]'";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
   $aid=$row['Post_id'];
 ?> 
        
<div class="row pb-3">
    
        

    <div class="col-md-1"></div>
    <div class="col-md-7">
        <h4><?php echo $row['Title'];?></h4>
        
        <p> <i class="icofont icofont-calendar fcy"></i> &nbsp; <?php echo $row['Added-on'];?>
        <i class="icofont icofont-tag fcy"></i> &nbsp; 
            <?php echo $row['Category'];?>
    </p>
    <img src="admin/<?php echo $row['Image'];?>" width="90%" height="350px" class=""/>
    <p> <?php echo $row['Content'] ;?> </p>
    </div>
      
    <div class="col-md-3">     
    <h4> Recent Articles </h4> 
       <sup class="fcy" >-----------</sup><br>
        <br>
        <?php
    $sql= "select * from article where Post_id!='$_GET[id]'  order by Post_id DESC";
    $result=$conn->query($sql);
    while($row=$result->fetch_assoc()){
   $aid=$row['Post_id'];
 ?>
        
<div class="row pb-3">
    <div class="col-md-4">
        <img src="admin/<?php echo $row['Image'];?>" width="100%" height="70px" class=""/>
    </div>
    <div class="col-md-8">
         <p> <?php echo "<a href='viewarticle.php?id=$aid'>".$row['Title']."</a>";
        ?>
        
        </p>
       
    </div>
            
            
            
            </div>            
            
     <?php }  ?>
        
           
            </div>      
            </div>            
            
     <?php   ?>
        
            
        </div>
    
    
    <?php include 'footer.php'; ?>