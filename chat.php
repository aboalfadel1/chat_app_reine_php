<?php
session_start(); 
if(!isset($_SESSION["unique_id"]))
{
    header("location:login.php");
}
    ?>
<?php include "header.php" ?>
<body>

    <div class="wrapper">
        <section class="chat-area">
            <header>
            <?php
            include 'php/config.php';
            $user_id=mysqli_real_escape_string($conn,$_GET['user_id']);
            $sql="select * from ppl where unique_id={$user_id}";
            $res=mysqli_query($conn,$sql);
            if(mysqli_num_rows($res)>0)
            {
                $row=mysqli_fetch_assoc($res);
            }
                
                
            ?>
                <a href="user.php" class="back-icon"><i class="fa-solid fa-arrow-left-long"></i></a>
                <img src="php/images/<?php echo $row["img"] ?>" alt="">


                <div class="details">
                    <span><?php echo $row["fname"]. " ". $row["lname"] ?></span>
                    <p><?php echo $row["status"]?></p>
                </div>
            </header>
            <div class="chat-box">
                
               
                
                
                
            </div>
            <form action="" class="typing-area">
                <input type="hidden" name="outgoing_id" value="<?php echo $_SESSION['unique_id'] ?>">
                <input type="hidden" name="incoming_id" value="<?php echo $user_id ?>">
                <input type="text" class="input-field" name="message" placeholder="Type a message here...">
                <button><i class="fa-solid fa-paper-plane"></i></button>
            </form>
        </section>
    </div>

<script src="javascript/chat.js"></script>

</body>

</html>