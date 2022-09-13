<!DOCTYPE html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Submission Successful</title>

</head>
<body>


    <div class="card mx-auto shadow mt-3" style="width: 500px;">
    <div class="mx-auto mt-3 p-3 text-center" style="width: 500px;">
    <h2>
    Your application has been submited.
</h2>
   </div>

    <div class="mx-auto mb-3 p-3" style="width: 300px; ">


       <div class="mb-3">
    <a class='btn btn-primary' href='<?php echo base_url("index.php/dashboard"); ?>' role='button'>Return to dashboard</a>
    </div>

    <div>
    <a class='btn btn-secondary' href='<?php echo base_url("index.php/logout"); ?>' role='button'>Logout</a>
    </div>
</div>
</div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>