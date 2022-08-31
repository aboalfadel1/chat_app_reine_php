<?php

session_start();
    include_once "config.php";
    
    $email=mysqli_real_escape_string($conn,$_POST["email"]);
    $password=mysqli_real_escape_string($conn,$_POST["password"]);
    if(!empty($email) && !empty($password))
    {
        $sql ="Select * from ppl where email ='$email' and password='$password'";
        $res=mysqli_query($conn,$sql);
        if(mysqli_num_rows($res)>0)
        {
            $row=mysqli_fetch_assoc($res);
            $status="Active now";
            $sql2=mysqli_query($conn,"UPDATE ppl set status='$status' where unique_id= {$row['unique_id']}");
            if($sql2)
            {
                $_SESSION["unique_id"]=$row["unique_id"];
                echo "success";
            }
           
        }
        else
        {
            echo "Email or Password is incorrect!";
        }
    }
    else
    {
        echo "All input failds are required";
    }
