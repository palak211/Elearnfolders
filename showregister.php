<?php include 'header.php'?>
<html>
    <head>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/icofont.css" rel="stylesheet">    
    </head>
    <body>
        
        <div class="container-fluid bg-light  pt-5 pb-5">
            <div class="row">
                <div  class="col-md-1"></div>
                
        <div  class="col-md-10">
             
            
            
            <table class="table table-striped table-bordered table-hover">
<tr>
    <th>Firstname</th>
    <th>Lastname</th>
    <th>E-Mail</th>
    <th>Phoneno</th>
    <th>Password</th>
    <th>Confirm Passworsd</th>
   
    <th>Edit</th>

    
</tr>    
    <?php
    $sql= "select * from student";
    $result=$conn->query($sql);
    while($row=$result->fetch_assoc()){
$Sid=$row['Sid'];
    echo"<tr>";
    echo"<tr>";
    echo"<td>".$row['FirstName']."</td>";
         echo"<td>".$row['LastName']."</td>";
         echo"<td>".$row['Email']."</td>";
        echo"<td>".$row['Pno']."</td>";
         echo"<td>".$row['Pswrd']."</td>";
         
        echo "<td> <a href='showregister.php?id=$sid'> <i class='icofont icofont-edit'> </i></a> </td>";
   
    echo"</tr>";
    }

    ?>
            </table>
                </div></div></div>
        <?php include 'footer.php';?>