<?php include 'header.php';?>
      
 <div class="bg pt-5 pb-4">
  <h4 class="text-center"> Latest Article   </h4>     
    <p class="text-center"> Home / Articles </p>
  </div>
        
        <div class="container pt-5 pb-5">
           <?php
    $sql= "select * from article order by Post_id DESC";
    $result=$conn->query($sql);
    while($row=$result->fetch_assoc()){
   $aid=$row['Post_id'];
 ?> 
        
<div class="row pb-3">
    <div class="col-md-4">
        <img src="admin/<?php echo $row['Image'];?>" width="100%" height="200px" class=""/>
    </div>
    <div class="col-md-8">
        <h4><?php echo $row['Title'];?></h4>
        <p> <i class="icofont icofont-calendar fcy"></i> &nbsp; <?php echo $row['Added-on'];?>
        <i class="icofont icofont-tag fcy"></i> &nbsp; 
            <?php echo $row['Category'];?>
    </p>
    <p> <?php echo substr(strip_tags($row['Content']),0,380);?>...
       <?php echo "<a href='viewarticle.php?id=$aid'>Read More </a>";?> </p>
    </div>
            
            
            
            </div>            
            
     <?php }  ?>
        
            
        </div>
    
    
    <?php include 'footer.php'; ?>