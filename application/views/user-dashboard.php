<!DOCTYPE html>
<header>
    <title>Dashboard</title>
    <h1>
        <?php echo "Welcome ".$name.".";?>
    </h1>
    <div>
        
        <?php 
        $questionnaire = base_url('index.php/questionnaire');
        if(isset($status))
        {
            echo "Application Status: ".$status."<br><br>";
            echo "<a href='{$questionnaire}'>Update your Questionnaire</a>";
        }
        else
        {
            echo "<a href='{$questionnaire}'>Complete your Questionnaire</a>";
        }
       ?>
 
    </div>
    <div>
        <a href="<?php echo base_url('index.php/logout'); ?>">Logout</a>
    </div>
</header>
</html>