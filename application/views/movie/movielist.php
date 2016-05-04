<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.ico" type="image/x-icon"/>
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
                    <?php echo $cname[0]->catname; ?>
                </div>
            </div>

        </div>
    </div>

    <div style="width: 100%; height: 30px;;"></div>

    <div class="row">
        <div class="col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8 col-xs-12 col-sm-12">


            <?php

            if ($tv_list == null) {
                for ($i = 0; $i < count($movie_list); ++$i) { ?>


                    <div class="col-md-3 col-lg-3 col-sm-6 col-xs-6" style="overflow: hidden; padding: 2px;">
                        <div class="itembox wow zoomIn" data-wow-duration="2s">
                            <div class="inneritem">
                                <a href="<?php echo base_url() . "movie/" . $movie_list[$i]->mid ?>"><img
                                        class="zoom_image"
                                        width="100%"
                                        src="<?php echo base_url(); ?>posters/<?php echo $movie_list[$i]->poster ?>"
                                        alt="gdgd"></a>

                                <div class="hovercaption">
                                    <a class="button" href="<?php echo base_url() . "movie/" . $movie_list[$i]->mid ?>">Details</a>
                                </div>
                            </div>

                            <div class="nametext">
                                <h4><?php echo $movie_list[$i]->name; ?></h4>
                            </div>
                        </div>
                    </div>

                <?php }
            } ?>


            <?php

            if ($tv_list != null) {
                for ($i = 0; $i < count($tv_list); ++$i) { ?>


                    <div class="col-md-3 col-lg-3 col-sm-6 col-xs-6" style="overflow: hidden; padding: 2px;">
                        <div class="itembox wow zoomIn" data-wow-duration="2s">
                            <div class="inneritem">
                                <img class="zoom_image" width="100%"
                                     src="<?php echo base_url(); ?>posters/<?php echo $tv_list[$i]->poster ?>"
                                     alt="gdgd">
                                <div class="hovercaption">
                                    <a class="button" href="<?php echo base_url() . "tv/" . $tv_list[$i]->mid ?>">Details</a>
                                </div>
                            </div>

                            <div class="nametext">
                                <h4><?php echo $tv_list[$i]->name; ?></h4>
                            </div>
                        </div>
                    </div>

                <?php }
            } ?>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                <?php echo $pagination; ?>
            </div>
        </div>


        <?php include 'footer.php' ?>
    </div>


    <?php include 'include_bottom.php' ?>






    <?php
    if ($music == 1) {
        ?>

        <script>
            var player = document.getElementById('back-sound');
            player.autoplay = false;
            $('#pButton').click(function () {
//                player.pause()
                if (player.paused) {
                    player.play();
                    // remove play, add pause
                    pButton.className = "";
                    pButton.className = "pause";

                } else { // pause music
                    player.pause();
                    // remove pause, add play
                    pButton.className = "";
                    pButton.className = "play";
                }
            });
        </script>

    <?php
    }else{
    ?>

        <script>
            var player = document.getElementById('back-sound');
            player.autoplay = true;
            $('#pButton').click(function () {
//                player.pause()
                if (player.paused) {
                    player.play();
                    // remove play, add pause
                    pButton.className = "";
                    pButton.className = "pause";

                } else { // pause music
                    player.pause();
                    // remove pause, add play
                    pButton.className = "";
                    pButton.className = "play";
                }
            });
        </script>
        <?php
    }
    ?>


</body>
</html>