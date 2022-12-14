<!DOCTYPE html>
<head>
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <style>



@media screen and (max-width: 500px){
  .mainCard{
    width: 380px!important;

  }
}

</style>
  </head>
    <body>
      <div class="card mx-auto shadow mt-3 mainCard" style="width: 500px;">
    <div class="mx-auto mt-3 p-3 text-center mainCard" style="width: 500px;">
      <h2 style="font-size:2em!important"class="text-center mb-3">
          <?php echo "Welcome, ".$name;?>
      </h2>

      <p>Please complete your application questionnaire. </p>
      <p>Your application will then be reviewed.</p>
   </div>

    <div class="mx-auto mb-3 p-3 text-center" style="width: 300px; ">

        <div class="mb-3">
        <?php 
        $questionnaire = base_url('index.php/questionnaire');
        if(isset($status))
        {
            echo "Application Status: "."<b>".$status."</b>"."<br><br>";
            echo "<a class='btn btn-primary' href='{$questionnaire}' role='button'>Update Your Questionnaire</a>";
        }
        else
        {
            echo "<a class='btn btn-primary' href='{$questionnaire}' role='button'>Complete Patient Questionnaire</a>";
        }
       ?>
       </div>
 

    <div>
    <a class='btn btn-secondary' href='<?php echo base_url("index.php/logout"); ?>' role='button'>Logout</a>
    </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>