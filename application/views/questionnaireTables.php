<!DOCTYPE html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <Title>
        Viewing Questionnaire
    </Title>
    <h2>
        Questionnaire Results
    </h2>
</head>
<body>
<a href="<?php echo base_url("index.php/accept/{$userid}"); ?>">Accept</a>
<a href="<?php echo base_url("index.php/reject/{$userid}"); ?>">Reject</a>
<a href="<?php echo base_url("index.php/dashboard");?>">Dashboard</a>
    <?php

    $template = array(
    'table_open' => '<table border="1" class="table">'
     );

    $this->table->set_template($template);

   


    echo "<h3>Patient info:</h3>";
    echo $this->table->generate($patientInfo)."<br><br><br>";

     echo "<h3>AUDIT:</h3>";
     echo $this->table->generate($audit)."<br><br><br>";

     echo "<h3>Medication:</h3>";
     echo $this->table->generate($medication)."<br><br><br>";

     echo "<h3>Medical History:</h3>";
     echo $this->table->generate($medHistory)."<br><br><br>";

     echo "<h3>Smoking:</h3>";
     echo $this->table->generate($smoking)."<br><br><br>";

     echo "<h3>Allergies:</h3>";
     echo $this->table->generate($allergies)."<br><br><br>";

     echo "<h3>Lifestyle:</h3>";
     echo $this->table->generate($lifestyle)."<br><br><br>";
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>