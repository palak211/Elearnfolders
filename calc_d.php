<?php 
$times = array();
$i=0;
    $sql= "select * from video where Course_id='$_GET[id]'";
    $resultd=$conn->query($sql);
    while($rowd=$resultd->fetch_assoc()){
   $times[$i]=$rowd['Duration'];
$i++;
    }
// pass the array to the function
$videoduration=AddPlayTime($times);

function AddPlayTime($times) {
    $minutes = 0; //declare minutes either it gives Notice: Undefined variable
    // loop throught all the times
    foreach ($times as $time) {
        list($hour, $minute) = explode(':', $time);
        $minutes += $hour * 60;
        $minutes += $minute;
    }

    $hours = floor($minutes / 60);
    $minutes -= $hours * 60;

    // returns the time already formatted
    #return sprintf('%02d:%02d', $hours, $minutes);
return($hours);
}

?>