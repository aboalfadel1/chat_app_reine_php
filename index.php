<?php
session_start();
if(isset($_SESSION["unique_id"]))
{
    header("location:user.php");
}
?>
<?php include "header.php" ?>
<body>

    <div class="wrapper">
        <section class="form signup">
            <header>Realtime Chat App</header>
            <form action="" method="POST">
                <div class="error-text">This is an error message!</div>
                <div class="name-details">
                    <div class="field input">
                        <label for="">First Name</label>
                        <input type="text" placeholder="First Name" name="fname" required>
                    </div>
                    <div class="field input">
                        <label for="">Last Name</label>
                        <input type="text" placeholder="Last Name" name="lname" required>
                    </div>
                </div>
                <div class="field input">
                    <label for="">Email Address</label>
                    <input type="text" placeholder="Enter your email" name="email" required>
                </div>
                <div class="field input">
                    <label for="">Password</label>
                    <input type="password" placeholder="Enter new Password" name="password" required>
                    <i class="fa-solid fa-eye" id="eye"></i>

                </div>
                <div class="field image">
                    <label for="">Select Image</label>
                    <input type="file" name="image" required enctype="multipart/form-data">
                </div>
                <div class="field btn">
                    <input type="submit" value="Continue to Chat" name="submit">
                </div>

            </form>
            <div class="link">Already signed up? <a href="login.php">Login now</a></div>
        </section>
    </div>


<script src="javascript/pass-show-hide.js"></script>
<script src="javascript/signup.js"></script>
</body>

</html>