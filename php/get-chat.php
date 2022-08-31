<?php 
session_start();
if(isset($_SESSION["unique_id"]))
{
    include "config.php";
    $outgoing_id=mysqli_real_escape_string($conn,$_POST["outgoing_id"]);
    $incoming_id=mysqli_real_escape_string($conn,$_POST["incoming_id"]);
    $output="";

    $sql="SELECT * from msg
    LEFT JOIN ppl on ppl.unique_id= msg.incoming_msg_id
     WHERE (outgoing_msg_id={$outgoing_id} AND incoming_msg_id=$incoming_id) OR (outgoing_msg_id=$incoming_id AND incoming_msg_id=$outgoing_id) ORDER By msg_id ";
    $res=mysqli_query($conn,$sql);
    if(mysqli_num_rows($res)>0)
    {
        while($row=mysqli_fetch_assoc($res))
        {
            
            if($row["outgoing_msg_id"]===$outgoing_id) 
            {
                $output.='<div class="chat outgoing">
                            <div class="details">
                                <p>'.$row["msg"].'</p>
                            </div>
                        </div>';
            }
            else
            {
                $output.='<div class="chat incoming">
                            <img src="php/images/'.$row["img"].'" alt="">
                            <div class="details">
                                <p>'.$row["msg"].'</p>
                            </div>
                        </div>';
            }
        }
        echo $output;
    }
 
}
else
{
    header("location:../login.php");
}