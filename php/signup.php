<?php
    session_start();
    include_once "config.php";
    $fname=mysqli_real_escape_string($conn,$_POST["fname"]);
    $lname=mysqli_real_escape_string($conn,$_POST["lname"]);
    $email=mysqli_real_escape_string($conn,$_POST["email"]);
    $password=mysqli_real_escape_string($conn,$_POST["password"]);

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password))
    {
         if(filter_var($email,FILTER_VALIDATE_EMAIL))
         {
            $sql="Select email from ppl where email= '$email'";
            $res=mysqli_query($conn,$sql);
            if(mysqli_num_rows($res)>0)
            {
                echo "$email - This email is already exist";
            }
            else
            {
                if(isset($_FILES['image']))
                {
                    $image_name=$_FILES["image"]["name"];//getting user uploaded img name
                    
                    $image_type=$_FILES["image"]["type"];//getting user uploaded img type
                    $tmp_name= $_FILES["image"]["tmp_name"]; //this temporary name is used to save/move file in out folder
                    //explode image and get the lastname like jpg jpeg png
                    $img_explode=explode(".",$image_name);
                    $img_ext=end($img_explode);
                    
                    $extensions =['png','jpeg',"jpg"];
                    if(in_array($img_ext, $extensions))
                    {
                        $time=time();
                        $new_img_name=$time.$image_name;
                        if(move_uploaded_file($tmp_name,"images/".$new_img_name)){
                            $status="Active now";
                            $random_id=rand(time(),10000000);
                            $sql2="INSERT INTO ppl (unique_id,fname,lname,email,password,img,status) VALUES ('$random_id','$fname','$lname','$email','$password','$new_img_name','$status')";
                            $res=mysqli_query($conn,$sql2);
                            if($res)
                            {
                                $sql3="SELECT * From ppl where email ='$email'";
                                $res=mysqli_query($conn,$sql3);
                                if(mysqli_num_rows($res)>0)
                                {
                                    $row=mysqli_fetch_assoc($res);
                                    $_SESSION["unique_id"]=$row["unique_id"];
                                    echo "success";
                                }
                            }
                            else 
                            {
                                echo "something went wrong please try again";
                            }

                        }
                    }
                    else
                    {
                        echo "please select an image file -jpeg -jpg - png";
                    }
                }
                else
                {
                    echo "Please Select an image";
                }
            }
         }
         else
         {
            echo "$email is not a valid email!";
         }
    }
    else 
    {
        echo "all input field are required";
    }