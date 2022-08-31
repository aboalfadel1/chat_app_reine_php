<?php
    session_start();
    if(isset($_SESSION["unique_id"]))
    {
        include "config.php";
        $logout_id=mysqli_real_escape_string($conn,$_GET["user_id"]);
        if(isset($logout_id))
        {
            $status="offline now";
            $sql=mysqli_query($conn,"UPDATE ppl set status='$status' where unique_id= '$logout_id'");
            if($sql)
            {
                session_unset();
                session_destroy();
                header("location:../login.php");
            }
        }
        else
        {

            header("location:../user.php");
        }

    }
    else{
        header("location:../login.php");
    }