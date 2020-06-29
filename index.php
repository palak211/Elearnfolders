<?php include 'header.php';?>
      <div class="container-fluid"> 
                    
        <div class="row bg-dark"><div class="col-md-12">
 <div class="bg1">
     <h5 class="text-upper text-info"> Find The Course/ Lesson </h5>
     <h1> GET KNOWLEDGE </h1><br/>
     <h6> Master New Skills and Achieve Goals </h6>
                </div></div></div>
            <div class="row">
             <div class="col-md-4"style="background:#A649CA;color:white;text-align:center;padding-top:30px;padding-bottom:30px;">    

                    <div class="row">
                 <div class="col-md-3 text-center pt-4">
                     <i class="icofont icofont-book icofont-4x"></i>
                     </div>
                        
                        <div class="col-md-9 text-left">
                    <h4>Learn</h4>
                            <h5>At your Pace</h5>
                            <p> You can learn at your own pace and become job ready within months.</p>
                    </div>   
                </div>
              </div>
                
                
            <div class="col-md-4" style="background:#F64C72;color:white;text-align:center;padding-top:30px;padding-bottom:30px;">
                    <div class="row">
                 <div class="col-md-3 text-center pt-4">
                     <i class="icofont icofont-book icofont-4x"></i>
                     </div>
                        <div class="col-md-9 text-left">
                    <h4>Explore </h4>
                            <h5>Courses</h5>
                            <p> Advance your career.Pursue your passion.Keep Learning.</p>
                        </div> </div>  
                </div>

                          <div class="col-md-4" style="background:#99738E;color:white;text-align:center;padding-top:30px;padding-bottom:30px;">
                    <div class="row">
                 <div class="col-md-3 text-center pt-4">
                     <i class="icofont icofont-play icofont-4x"></i>
                     </div>
                        
                        <div class="col-md-9 text-left">
                    <h4>Tomorrow 's </h4>
                            <h5>Skills today</h5>
                            <p> Teaching in the Internet age means we must teach Tomorrow 's Skills Today.</p>
                    </div>   
                </div>
              </div>
          
          
          </div>
          
</div>


      <div class="container pt-4 pb-4">
          
<div class="row pt-4 pb-4"><div class='col-md-12'> 
    <h3 align="center"><b> Search By </b> Category</h3>
    <p align="center"> Build Up Your Knowledge and Spark The new Direction </p>
    </div></div>
<div class="row pb-3">
           <?php
    $sql= "select * from course_category limit 4";
    $result=$conn->query($sql);
    while($row=$result->fetch_assoc()){
   $ctid=$row['Category'];
   $image="admin/".trim($row['Image']);
       
 ?> 
        
    <div class="col-md-3">
        <?php echo "<a href='courses.php?crsid=$ctid' style='color:#222'>"; ?>
        <div class="border">
            <div style="min-height:220px;padding-top:100px; 
                        background:url(<?php echo $image ?>);background-size:cover;" >
        <h5 class='p-2 text-center bg-white pt-2' style="opacity:0.9"><?php echo $row['Category'];?></h5>
            </div>
<?php echo "</a>";?>        
        </div></div>
            
            
                   
            
     <?php }  ?>
        
            
            </div></div>

                
                
<div class="container-fluid bg-dark pt-5 pb-5">
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <div class= "bg-danger p-5 text-white">
          <h4><b>What We </b>Do</h4>
          <p>Skill share is  educational  Platfrom. We Provide Courses related Programimg,Web development , Graphic Designing and  Mobile App development Skill Share originated from the idea that there exists a classof readers who respond better to online content and prefer to learn new skills at their own pace  Simply Easy Learning!</p>
          
        </div>
        </div>
      <div class="col-md-6">
    <div class="bg-warning p-5 text-white">
        
          
            <h4><b>Why</b> We</h4>
          <p>

  
 Success is...Always Knowing The Latest. Explore courses you might have missed.  We’re continuously adding new courses and Specializations. Ready to follow your curiosity wherever it takes you? With Skill Share, you get unlimited access to the entire catalog of videos so you can sharpen your professional skills one day, and pursue a new hobby the next. </p>
        
          </div>
    </div>
    </div>
    </div>
    </div>

























      <div class="container pt-4 pb-4">
          
<div class="row pt-4 pb-4"><div class='col-md-12'> 
    <h3 align="center"><b> Explore</b> Courses</h3>
    <p align="center"> Practical Skills Lead to a Digital Terrestrial  </p>
    </div></div>
<div class="row pb-3">
           <?php
    $sql= "select * from course where Status='Active' order by Course_id DESC limit 8";
    $result=$conn->query($sql);
    while($row=$result->fetch_assoc()){
   $aid=$row['Course_id'];
 ?> 
        
    <div class="col-md-3">
        
        
        <div class="border">
            
        <?php echo "<a href='viewcourse.php?id=$aid' style='color:black;text-decoration:none'>"; ?>
        <img src="admin/<?php echo $row['Image'];?>" width="100%" height="180px" class="border rounded p-1"/>
            <div style="min-height:75px;padding-top:10px">
        <h5 class='p-2 text-center'><?php echo $row['Title'];?></h5>
            </div>
        
        <?php echo "</a>";?> 
    <div class="row pb-1">
    <div class="col-6"><p class='pl-1'>
        <i class="icofont icofont-tag fcy"></i> &nbsp; <?php echo $row['Language'];?> </p>
    </div>
    
    <div class="col-6 text-right"><p class='pr-1'>
        <i class="icofont icofont-cur-rupee fcy"></i>  &nbsp; 
        <?php echo $row['fee'];?></p>
        </div></div>
        </div></div>
            
            
                   
            
     <?php }  ?>
        
            
            </div></div>
<div class="container pt-5 pb-5">
    <div class="row pt-2 pb-5"><div class='col-md-12'> 
    <h3 align="center"><b> Latest </b> Articles</h3>
    <p align="center"> Crack The Perfect Blog and Spark the New Direction </p>
    </div></div>
        
<div class="row pb-3">
    <div class="col-md-4">
    <?php
    $sql= "select * from article order by Post_id DESC limit 3";
    $result=$conn->query($sql);
   $row=$result->fetch_assoc();
   $aid=$row['Post_id'];
 ?> 
     <img src="admin/<?php echo $row['Image'];?>" width="100%" height="180px" class=""/>
        
       <h5><?php echo $row['Title'];?></h5>
        <p> <i class="icofont icofont-calendar fcy"></i> &nbsp; <?php echo $row['Added-on'];?> &nbsp;&nbsp;&nbsp;
        <i class="icofont icofont-tag fcy"></i> &nbsp; 
            <?php echo $row['Category'];?>
    </p>
    <p class="text-justify"> <?php echo substr(strip_tags($row['Content']),0,220);?>...
       <?php echo "<a href='viewarticle.php?id=$aid'>Read More </a>";?> </p>
       

    
    </div>
    <div class="col-md-8">    
           <?php
    while($row=$result->fetch_assoc()){
   $aid=$row['Post_id'];
 ?> 
        
<div class="row pb-3">
    <div class="col-md-4">
        <img src="admin/<?php echo $row['Image'];?>" width="100%" height="180px" class=""/>
     
    </div>
    <div class="col-md-8">
        <h5><?php echo $row['Title'];?></h5>
        <p> <i class="icofont icofont-calendar fcy"></i> &nbsp; <?php echo $row['Added-on'];?> &nbsp;&nbsp;&nbsp;
        <i class="icofont icofont-tag fcy"></i> &nbsp; 
            <?php echo $row['Category'];?>
    </p>
    <p class="text-justify"> <?php echo substr(strip_tags($row['Content']),0,220);?>...
       <?php echo "<a href='viewarticle.php?id=$aid'>Read More </a>";?> </p>
    </div>
            
            
            
            </div>            
            
     <?php }  ?>
    </div> 
    </div>
        </div>
    
    
    
            
    <?php include 'footer.php'; ?>

            