<?php
$count=0;
$no1=0;
$no2=1;
$tot=0;
echo "<h2>Fabonnic Series</h2>";
while($count<=10)
{
    echo $tot."<br/>";
    $no1=$no2;
    $no2=$tot;
    $tot=$no1+$no2;
    $count++;
}
?>


    
    