<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Quickonlineftp.com</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        td img {
            width: 100px;;
            height: 100px;;
        }

        td a {
            text-align: center;
            margin: 45% auto;
            vertical-align: middle;
        }

        button a, button a:hover {
            color: #ffffff;
            text-decoration: none;
        }


    </style>


    <?php include 'include_top.php'; ?>


</head>
<body style="background:#ffffff;">

<div class="row">
    <div class="col-md-offset-3 col-md-6">
        <div class="registration-title">
            <h1>
                All Movies
            </h1>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-offset-3 col-md-6">
        <div class="col-md-4">
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                <a href="<?php echo base_url(); ?>admin/bdix">Add New Bdix Link</a>
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
            <th>Poster</th>
            <th>Action</th>
            </thead>
            <tbody>
            <?php
            $count = 1;
            for ($i = 0; $i < count($bdix); ++$i) { ?>
                <tr>
                    <td>
                        <?php echo $count; ?>
                    </td>

                    <td>
                        <?php echo $bdix[$i]->bdix_name; ?>
                    </td>
                    <td>
                        <img src="<?php echo base_url(); ?>posters/bdix/<?php echo $bdix[$i]->bdix_image ?>"
                             alt="">
                    </td>
                    <td>
                        <a href="<?php echo base_url();?>admin/deletebdix/<?php echo $bdix[$i]->bid; ?>"><i style="font-size: 50px; color: red;" class="fa fa-times"></i></a>
                    </td>
                </tr>
                <?php
                $count++;
            } ?>
            </tbody>
        </table>
    </div>
</div>


<?php include 'include_bottom.php' ?>


</body>
</html>