<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Quickonlineftp.com</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    td img{
        width: 100px;;
        height: 100px;;
    }

    td a{
        text-align: center;
        margin: 45% auto;
        vertical-align: middle;
    }
    button a, button a:hover{
        color: #ffffff;
        text-decoration: none;
    }

</style>



    <?php include 'include_top.php';?>



</head>
<body style="background:#ffffff;">

<div class="row">
    <div class="col-md-offset-3 col-md-6">
        <div class="registration-title">
            <h1>
                <?php echo $tvseries[0]->tvname?>
            </h1>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-offset-3 col-md-6">
        <div class="registration-title">
            <h1>
                <?php echo $seasons[0]->srname?>
            </h1>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-offset-3 col-md-6">
        <div class="col-md-4">
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                <a href="<?php echo base_url();?>admin/addepisode/<?php echo $seasons[0]->srid; ?>">Add New Episode</a>
            </button>
        </div>
    </div>
</div>

<br>

<div class="row col-md-offset-3 col-md-6">
    <div class="table">
        <table class="table table-responsive table-striped table-hover">
            <thead>
            <th>Sl. Num</th>
            <th>Name</th>
            <th>Action</th>
            </thead>
            <tbody>
            <?php
            $count=1;
            for ($i = 0; $i < count($episode); ++$i) { ?>
                <tr>
                    <td>
                        <?php echo $count; ?>
                    </td>

                    <td>
                        <a href="<?php echo base_url();?>tv/<?php echo $episode[$i]->epid;  ?>"><?php echo $episode[$i]->name; ?></a>
                    </td>
                    <td>
                        <a href="<?php echo base_url();?>admin/deleteepisode/<?php echo $episode[$i]->epid; ?>"><i style="font-size: 50px; color: red;" class="fa fa-times"></i></a>
                        <a style="margin-left: 10px;" href="<?php echo base_url();?>admin/editepisode/<?php echo $episode[$i]->epid; ?>"><i style="font-size: 40px; color: green;" class="fa fa-pencil-square-o"></i></a>
                    </td>
                </tr>
            <?php
             $count++;
            } ?>
            </tbody>
        </table>
    </div>
</div>






<?php include 'include_bottom.php'?>



</body>
</html>