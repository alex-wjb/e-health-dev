<!DOCTYPE html>
<?php
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
    {
        redirect(base_url('index.php/dashboard'));
    }
?>
<header>
    <title>e-health Login</title>
</header>

<body>
    <?php echo validation_errors();?>
    <h2>Please sign in:</h2>
    <!-- login form - sends login data to function in Login controller -->
    <form method="post" action="<?php echo base_url('index.php/check-login');?>">
        <input type="text" name ="username" placeholder="Username" value="<?php echo set_value('username');?>" minlength= "3" maxlength="20" required></input><br><br>
        <input type="text" name ="password" placeholder="Password" value="<?php echo set_value('password');?>" minlength= "3" maxlength="20" required></input><br><br>
        <button type="submit">Sign in</button>
    </form><br>
    <?php
    // displays error message if invalid credentials
    if(isset($_SESSION['loginError']))
    {
        echo $_SESSION['loginError'];
        unset($_SESSION['loginError']);
    }
    if(isset($_SESSION['accountCreated']))
    {
        echo $_SESSION['accountCreated'];
        unset($_SESSION['accountCreated']);
    }
    ?>
    <div>
        <br>Don't have an account?
        <a href = "<?php echo base_url('index.php/signup');?>">Sign up.</a>
    </div>
</body>

</html>