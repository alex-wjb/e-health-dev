<!DOCTYPE html>

<head>
    <title>e-health Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
<div style="text-align:center;">
    <img src="<?php echo base_url() . '/assets/images/medical-logo.png'; ?> " style="width:250px;" alt="...">
  </div>
<div class="mx-auto my-3 p-3" style="width: 300px;">
<?php echo validation_errors();?>
    <h2 style="font-size:2em!important"class="text-center mb-3">Registration</h2>
    <!-- login form - sends login data to function in Login controller -->
    <form method="post" action="<?php echo base_url('index.php/create-account');?>">
    <div class="mb-3">
        <label for="username" class="form-label">Username:</label>
        <input type="text" name="username" placeholder="Minimum 3 characters" class="form-control"  minlength="3" maxlength="20" required value="<?php echo set_value('username');?>">
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input type="password" name="password" class="form-control" minlength="3" maxlength="20" required>
      </div>
        <button class="btn btn-primary" type="submit">Register</button>
    </form>
    <div class="mb-3">
      <?php
      if(isset($_SESSION['signupError']))
      {
          echo $_SESSION['signupError'];
          unset($_SESSION['signupError']);
      }
      ?>
    </div>

    <div>
        Already have an account?
        <a href = "<?php echo base_url('index.php/login');?>">Sign in.</a>
    </div>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>