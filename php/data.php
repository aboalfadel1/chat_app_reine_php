<?php
  while($row=mysqli_fetch_assoc($sql))
  {
      $sql2="select * from msg where (incoming_msg_id ={$row['unique_id']} or outgoing_msg_id= {$row ['unique_id']})and (incoming_msg_id = {$outgoig_id} or outgoing_msg_id= {$outgoig_id}) order by msg_id Desc limit 1";
      $query2=mysqli_query($conn,$sql2);
      $row2=mysqli_fetch_assoc($query2);
      if(mysqli_num_rows($query2)>0)
      {
        $res=$row2["msg"];
      }
      else
      {
        $res="No message available";
      }
      strlen($res)>28 ? $msg=substr($res,0,28)."...":$msg=$res;
      ($row["status"]== "offline now")? $offline="offline":$offline=""; 
      $output.= '<a href="chat.php?user_id='.$row["unique_id"].'">
                  <div class="content">
                      <img src="php/images/'.$row["img"].'" alt="">
                      <div class="details">
                          <span>'.$row["fname"] ." ".$row["lname"] .'</span>
                          <p>'.$msg.'</p>
                      </div>
                  </div>
                  <div class="status-dot '.$offline.'"><i class="fa-solid fa-circle"></i></div>
              </a>';
  }