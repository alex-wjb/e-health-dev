<!DOCTYPE html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<header>
    <title>Admin Dashboard</title>
    <h1>
        <?php echo "Welcome ".$name.".";?>
    </h1>
    <div>
        <a href="<?php echo base_url('index.php/logout'); ?>">Logout</a>

        <div>
        <!--questionnaire list--> 
        <table>
            <tr>
                <th>First Name</th><th>surname</th><th>Application status</th><th colspan="2">Actions</th>
            </tr>
            <?php
            if (isset($applicationsList))
            {
                foreach($applicationsList->result() as $row)
              {
                $view = base_url('index.php/viewQuestionnaire'.'/'.$row->GUID);
                echo <<<_END
                <tr>
                <td>{$row->firstname}</td>
                <td>{$row->surname}</td>
                <td>{$row->status}</td>
                <td><a href="{$view}">View</a>
                </tr>

                _END;
              }
            }

            ?>
            </table>
        </div>
    </div>
</header>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>