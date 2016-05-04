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
        .registration-form-wrapper input{
            background-color: #ffffff;
            color: black;
        }
    </style>

</head>
<body style="background:#000000;">

<div class="row">
    <div class="col-lg-offset-3 col-lg-6">
        <div class="registration-title">
            <h1>
                Edit Form
            </h1>
        </div>
        <div class="registration-form-wrapper" style="background-color: #f9f9f9;">
            <div style="margin-top: 40px;" class="col-lg-offset-3 col-lg-6">
                <div class="col-lg-12 center-block text-center">
                    <form method="post" action="<?php echo base_url();?>admin/updateepisode" enctype="multipart/form-data">
                        <input type="hidden" name="mid" value="<?php echo $episode[0]->epid?>">
                        <input type="text" name="name" class="input-box" placeholder="<?php echo $episode[0]->name?>">
                        <input type="text" name="link" class="input-box" placeholder="<?php echo $episode[0]->link?>">
                        <input style="background-color: #1bbc9b; color: white!important;" type="submit" name="submit"
                               value="Submit">
                    </form>
                </div>
            </div>


        </div>

    </div>
</div>


<?php include 'include_bottom.php' ?>


</body>
</html>