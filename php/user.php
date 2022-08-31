<?php 
session_start();
include "config.php";
$outgoig_id=$_SESSION['unique_id'];

$sql=mysqli_query($conn,"Select * from ppl where unique_id !='$outgoig_id'");
$output="";
if(mysqli_num_rows($sql)==1)
{
        $output.="No users are available to chat";
}
elseif(mysqli_num_rows($sql)>0) 
{
  include "data.php";
}
echo $output;