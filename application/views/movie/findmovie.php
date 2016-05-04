<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Quickonlineftp.com</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php include 'include_top.php' ?>

</head>
<body
    style="background: url('<?php echo base_url(); ?>assets/img/back.jpg')repeat-x center center fixed; padding: 0; margin: 0;"
    class="col-md-12">
<div class="container-fluid">
    <?php include 'topbanner.php' ?>
    <?php include "navigation.php"; ?>


    <div class="row">
        <div class="col-md-12 col-xs-12 pagename-container">
            <div class="col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8 col-xs-12">
                <div class="pagename">
                    <?php echo $pagename; ?>
                </div>
            </div>

        </div>
    </div>

    <div style="width: 100%; height: 30px;;"></div>

    <div class="row">
        <div class="col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8 col-xs-12 col-sm-12">

            <?php
            if (count($movie_search) > 0) {
                for ($i = 0; $i < count($movie_search); ++$i) {
                    ?>

                    <div class="col-md-3 col-lg-3 col-sm-6 col-xs-6" style="overflow: hidden; padding: 2px;">
                        <div class="itembox wow zoomIn" data-wow-duration="2s">
                            <div class="inneritem">
                                <img class="zoom_image" width="100%"
                                     src="<?php echo base_url(); ?>posters/<?php echo $movie_search[$i]->poster ?>"
                                     alt="gdgd">
                                <div class="hovercaption">
                                    <a class="button"
                                       href="<?php echo base_url() . "movie/" . $movie_search[$i]->mid ?>">Details</a>
                                </div>
                            </div>

                            <div class="nametext">
                                <h4><?php echo $movie_search[$i]->name; ?></h4>
                            </div>
                        </div>
                    </div>

                <?php }
            } ?>
        </div>


        <?php include 'footer.php' ?>
    </div>


    <?php include 'include_bottom.php' ?>


</body>
</html>