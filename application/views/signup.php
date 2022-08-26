<!DOCTYPE html>

<header>
    <title>e-health Registration</title>
</header>

<body>
<?php echo validation_errors();?>
    <h2>Please create your account:</h2>
    <!-- login form - sends login data to function in Login controller -->
    <form method="post" action="<?php echo base_url('index.php/create-account');?>">
        <input type="text" name ="username" placeholder="Username" value="<?php echo set_value('username');?>" minlength= "3" maxlength="20" required></input><br><br>
        <input type="text" name ="password" placeholder="Password" value="<?php echo set_value('password');?>" minlength= "3" maxlength="20" required></input><br><br>
        <button type="submit">Register</button>
    </form><br>
    <?php
    if(isset($_SESSION['signupError']))
    {
        echo $_SESSION['signupError'];
        unset($_SESSION['signupError']);
    }
    ?>

    <div>
        <br>Already have an account?
        <a href = "<?php echo base_url('index.php/login');?>">Sign in.</a>
    </div>
   
</body>

</html>