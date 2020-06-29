<?php
$servername="localhost";
$username="root";
$password="";
$dbname="elearn_db";


$conn=new mysqli($servername,$username,$password,$dbname);
if(!$conn){
die("connection error");
}

?>
