<?php
session_start();
include "config.php";
$outgoig_id=$_SESSION['unique_id'];

$serachTerm=mysqli_real_escape_string($conn,$_POST["searchTerm1"]);
$output="";
$sql=mysqli_query($conn,"Select  * from ppl where concat(fname,' ',lname) like '%{$serachTerm}%' and unique_id !='$outgoig_id'");
if(mysqli_num_rows($sql)>0)
{
    include "data.php";
}
else
{
    $output="No user found related to your search term";
}
echo $output;