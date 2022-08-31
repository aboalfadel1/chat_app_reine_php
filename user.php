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
        <section class="users">
            <header>
            <?php
            include 'php/config.php';
            $sql="select * from ppl where unique_id={$_SESSION['unique_id']}";
            $res=mysqli_query($conn,$sql);
            if(mysqli_num_rows($res)>0)
            {
                $row=mysqli_fetch_assoc($res);
            }
                
                
            ?>
                <div class="content">
                    <img src="php/images/<?php echo $row["img"] ?>" alt="">
                    <div class="details">
                        <span><?php echo $row["fname"]. " ". $row["lname"] ?></span>
                        <p><?php echo $row["status"]?></p>
                    </div>
                </div>
                <a href="php/logout.php?user_id=<?php echo $row["unique_id"]  ?>" class="logout">logout</a>
            </header>
            <div class="search">
                <span class="text">Select an user to start chat</span>
                <input type="text" placeholder="Enter name to seach...">
                <button><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            <div class="users-list">
              
               
            </div>
        </section>
    </div>


    <script src="javascript/users.js"></script>
</body>

</html>