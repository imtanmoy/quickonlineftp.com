<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Quickonlineftp.com</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php include 'include_top.php'; ?>


    <style>
        div{
            text-align: center;
        }
        a{
            text-align: center;
            text-decoration: none;
            padding: 20px 30px;
            background-color: #1bbc9b;
            color: white;
            font-size: 25px;
            margin-bottom: 10px;
        }
        a:hover{
            text-decoration: none;
        }
    </style>

</head>
<body style="background:#ffffff;">

    <div class="row">
        <div class="col-sm-12">
                <h1 style="text-align: center; background-color: #5977B8; padding: 15px 0px; margin: 0;"> Quickonline Admin Panel</h1>
        </div>
    </div>
    <div style="width: 100%; height: 50px;"></div>

    <div class="row">
        <div class="col-sm-12">
            <a href="<?php echo base_url();?>admin/allmovie">All movie list</a>
        </div>
    </div>
    <div style="width: 100%; height: 50px;"></div>
    <div class="row">
        <div class="col-sm-12">
            <a href="<?php echo base_url();?>admin/alltvseries">All Tv Series list</a>
        </div>
    </div>
    <div style="width: 100%; height: 50px;"></div>
    <div class="row">
        <div class="col-sm-12">
            <a href="<?php echo base_url();?>admin/allbdix">All BDIX link list</a>
        </div>
    </div>
    <div style="width: 100%; height: 50px;"></div>
    <div class="row">
        <div class="col-sm-12">
            <a href="<?php echo base_url();?>admin/notice">Notice Board</a>
        </div>
    </div>
    <div style="width: 100%; height: 50px;"></div>


<?php include 'include_bottom.php' ?>


</body>
</html>