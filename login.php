<?php include "header.php" ?>
<?php
session_start();
if(isset($_SESSION["unique_id"]))
{
    header("location:user.php");
}
?>
<body>

    <div class="wrapper">
        <section class="form login">
            <header>Realtime Chat App</header>
            <form action="">
                <div class="error-text"></div>
               
                <div class="field input">
                    <label for="">Email Address</label>
                    <input type="text" placeholder="Enter your email" name="email">
                </div>
                <div class="field input">
                    <label for="">Password</label>
                    <input type="password" placeholder="Enter your password" name="password">
                    <i class="fa-solid fa-eye"></i>
                </div>
                
                <div class="field btn">
                    <input type="Submit" value="Continue to Chat" name="submit">
                </div>

            </form>
            <div class="link">Not yet signed up? <a href="./index.php">Signup now</a></div>
        </section>
    </div>


    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/login.js"></script>

</body>

</html>