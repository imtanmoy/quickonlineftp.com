
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.ico" type="image/x-icon" />
    <title>Quickonlineftp.com</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php include 'include_top.php' ?>


    <style>
        .bdix{
            width: 100%;
            height: 120px;
            background-color: #5E6D81;
            padding: 2px;
            margin: 10px;
            text-align: center;
        }
        .bdix img{
            width: 100%;
            height: 90px;
        }
        .bdix p{
            margin: 0 auto;
            font-size: 17px;
            text-decoration: none;
        }
        .bdix a{
            text-decoration: none;
        }
        .bdix a:hover{
            color: white;
        }
    </style>

</head>
<body  style="padding: 0; margin: 0; background: url('<?php echo base_url();?>assets/img/back.jpg')repeat-x center center fixed;" class="col-md-12">
    <?php include 'topbanner.php' ?>
    <?php include "navigation.php"; ?>
<br>
    <div class="row">
        <div class="col-sm-offset-1 col-sm-10">
            <?php for ($i = 0; $i < count($bdix); ++$i) { ?>
            <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                <div class="bdix wow jello">
                    <a href="<?php echo $bdix[$i]->bdix_link?>" target="_blank">
                        <img src="<?php echo base_url(); ?>posters/bdix/<?php echo $bdix[$i]->bdix_image; ?>" alt="">
                        <p><?php echo $bdix[$i]->bdix_name; ?></p>
                    </a>
                </div>
            </div>
            <?php } ?>
        </div>

    </div>

    <br>

    <?php include 'footer.php' ?>

    <?php include 'include_bottom.php' ?>
</body>
</html>