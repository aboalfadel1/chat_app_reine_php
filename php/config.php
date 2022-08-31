<?php 
    $conn=mysqli_connect("localhost:3309","root","","chatapp");
    if(!$conn)  echo "error" . mysqli_connect_error();
