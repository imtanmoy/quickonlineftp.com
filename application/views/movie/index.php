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
    style="padding: 0; margin: 0; background: url('<?php echo base_url(); ?>assets/img/back.jpg')repeat-x center center fixed;"
    class="col-md-12">
<div class="container-fluid">
    <?php include 'topbanner.php' ?>
    <?php include "navigation.php"; ?>
    <?php include 'slider.php' ?>
    <div style="height: 100%; height: 1em;"></div>

    <div class="row">
        <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
            <div class="col-md-offset-1 col-md-10 col-sm-offset-0 col-sm-12 col-xs-offset-0 col-xs-12">
                <div class="crawler" id="mycrawler">
                    <?php for ($i = 0; $i < 20; ++$i) { ?>
                        <div class="crawler-item">
                            <?php
                            if ($movie_list[$i]->xxx == 1) {
                                ?>
                                <a href="<?php echo base_url() . "movie/" . $movie_list[$i]->mid ?>">
                                    <img height="300px" width="200px"
                                         src="<?php echo base_url(); ?>posters/<?php echo $movie_list[$i]->poster ?>"
                                         alt="gdfg">
                                </a>
                                <?php
                            }
                            if ($movie_list[$i]->xxx == 2) {
                                ?>
                                <a href="<?php echo base_url() . "tv/" . $movie_list[$i]->mid ?>">
                                    <img height="300px" width="200px"
                                         src="<?php echo base_url(); ?>posters/<?php echo $movie_list[$i]->poster ?>"
                                         alt="gdfg">
                                </a>
                                <?php
                            }
                            ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <div style="width: 100%; height: 1em;"></div>
    <div class="row">
        <div class="col-md-offset-1 col-md-10 col-xs-12 col-sm-offset-1 col-sm-10 green-border" style="padding: 0;">
            <div class="recent-content">
                <div class="recent-content-header">
                    <h2>Recently Added</h2>
                </div>
                <?php for ($i = 0; $i < 8; ++$i) { ?>
                    <div class="col-md-3 col-lg-3 col-sm-6 col-xs-6" style="overflow: hidden; padding: 2px;">
                        <div class="itembox wow zoomIn" data-wow-duration="2s">
                            <div class="inneritem">
                                <img class="zoom_image" width="100%"
                                     src="<?php echo base_url(); ?>posters/<?php echo $movie_list[$i]->poster ?>"
                                     alt="gdgd">
                                <div class="hovercaption">
                                    <?php
                                    if ($movie_list[$i]->xxx == 1) {
                                        ?>
                                        <a class="button"
                                           href="<?php echo base_url() . "movie/" . $movie_list[$i]->mid ?>">Details</a>
                                        <?php
                                    }
                                    if ($movie_list[$i]->xxx == 2) {
                                        ?>
                                        <a class="button"
                                           href="<?php echo base_url() . "tv/" . $movie_list[$i]->mid ?>">Details</a>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="nametext">
                                <h4><?php echo $movie_list[$i]->name; ?></h4>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div style="width: 100%; height: 30px;;"></div>
    <div class="row">
        <div class="col-md-offset-1 col-md-10 col-xs-12 col-sm-offset-1 col-sm-10 green-border" style="padding: 0;">
            <div class="recent-content">
                <div class="recent-content-header">
                    <h2>Movies</h2>
                </div>

                <div class="recent-content-container">

                    <div style="width: 100%;overflow: hidden;">
                        <h2>
                            <a href="#">English Movie</a>
                        </h2>
                        <?php for ($i = 0; $i < 4; ++$i) { ?>
                            <div class="col-md-3 col-lg-3 col-sm-6 col-xs-6" style="overflow: hidden; padding: 2px;">
                                <div class="itembox wow zoomIn" data-wow-duration="2s">
                                    <div class="inneritem">
                                        <img class="zoom_image" width="100%"
                                             src="<?php echo base_url(); ?>posters/<?php echo $english[$i]->poster ?>"
                                             alt="gdgd">
                                        <div class="hovercaption">
                                            <a class="button"
                                               href="<?php echo base_url() . "movie/" . $english[$i]->mid ?>">Details</a>
                                        </div>
                                    </div>

                                    <div class="nametext">
                                        <h4><?php echo $english[$i]->name; ?></h4>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="recent-content-container">

                    <div style="width: 100%;overflow: hidden;">
                        <h2>
                            <a href="#">Hindi Movie</a>
                        </h2>
                        <?php for ($i = 0; $i < 4; ++$i) { ?>
                            <div class="col-md-3 col-lg-3 col-sm-6 col-xs-6" style="overflow: hidden; padding: 2px;">
                                <div class="itembox wow zoomIn" data-wow-duration="2s">
                                    <div class="inneritem">
                                        <img class="zoom_image" width="100%"
                                             src="<?php echo base_url(); ?>posters/<?php echo $hindi[$i]->poster ?>"
                                             alt="gdgd">
                                        <div class="hovercaption">
                                            <a class="button"
                                               href="<?php echo base_url() . "movie/" . $hindi[$i]->mid ?>">Details</a>
                                        </div>
                                    </div>

                                    <div class="nametext">
                                        <h4><?php echo $hindi[$i]->name; ?></h4>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="recent-content-container">

                    <div style="width: 100%;overflow: hidden;">
                        <h2>
                            <a href="#">Bangla Movie</a>
                        </h2>
                        <?php for ($i = 0; $i < 4; ++$i) { ?>
                            <div class="col-md-3 col-lg-3 col-sm-6 col-xs-6" style="overflow: hidden; padding: 2px;">
                                <div class="itembox wow zoomIn" data-wow-duration="2s">
                                    <div class="inneritem">
                                        <img class="zoom_image" width="100%"
                                             src="<?php echo base_url(); ?>posters/<?php echo $bangla[$i]->poster ?>"
                                             alt="gdgd">
                                        <div class="hovercaption">
                                            <a class="button"
                                               href="<?php echo base_url() . "movie/" . $bangla[$i]->mid ?>">Details</a>
                                        </div>
                                    </div>

                                    <div class="nametext">
                                        <h4><?php echo $bangla[$i]->name; ?></h4>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="recent-content-container">

                    <div style="width: 100%;overflow: hidden;">
                        <h2>
                            <a href="#">Tamil Movie</a>
                        </h2>
                        <?php for ($i = 0; $i < 4; ++$i) { ?>
                            <div class="col-md-3 col-lg-3 col-sm-6 col-xs-6" style="overflow: hidden; padding: 2px;">
                                <div class="itembox wow zoomIn" data-wow-duration="2s">
                                    <div class="inneritem">
                                        <img class="zoom_image" width="100%"
                                             src="<?php echo base_url(); ?>posters/<?php echo $tamil[$i]->poster ?>"
                                             alt="gdgd">
                                        <div class="hovercaption">
                                            <a class="button"
                                               href="<?php echo base_url() . "movie/" . $tamil[$i]->mid ?>">Details</a>
                                        </div>
                                    </div>

                                    <div class="nametext">
                                        <h4><?php echo $tamil[$i]->name; ?></h4>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="recent-content-container">

                    <div style="width: 100%;overflow: hidden;">
                        <h2>
                            <a href="#">Animation Movie</a>
                        </h2>
                        <?php for ($i = 0; $i < 4; ++$i) { ?>
                            <div class="col-md-3 col-lg-3 col-sm-6 col-xs-6" style="overflow: hidden; padding: 2px;">
                                <div class="itembox wow zoomIn" data-wow-duration="2s">
                                    <div class="inneritem">
                                        <img class="zoom_image" width="100%"
                                             src="<?php echo base_url(); ?>posters/<?php echo $animation[$i]->poster ?>"
                                             alt="gdgd">
                                        <div class="hovercaption">
                                            <a class="button"
                                               href="<?php echo base_url() . "movie/" . $animation[$i]->mid ?>">Details</a>
                                        </div>
                                    </div>

                                    <div class="nametext">
                                        <h4><?php echo $animation[$i]->name; ?></h4>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div style="width: 100%; height: 30px;;"></div>
    <div class="row">
        <div class="col-md-offset-1 col-md-10 col-xs-12 col-sm-offset-1 col-sm-10 green-border" style="padding: 0;">
            <div class="recent-content">
                <div class="recent-content-header">
                    <h2>English Tv Series</h2>
                </div>
                <?php for ($i = 0; $i < 4; ++$i) { ?>
                    <div class="col-md-3 col-lg-3 col-sm-6 col-xs-6" style="overflow: hidden; padding: 2px;">
                        <div class="itembox wow zoomIn" data-wow-duration="2s">
                            <div class="inneritem">
                                <img class="zoom_image" width="100%"
                                     src="<?php echo base_url(); ?>posters/<?php echo $tv[$i]->srposter ?>" alt="gdgd">
                                <div class="hovercaption">
                                    <a class="button"
                                       href="<?php echo base_url() . "tv/" . $tv[$i]->epid ?>">Details</a>
                                </div>
                            </div>

                            <div class="nametext">
                                <h4><?php echo $tv[$i]->name; ?></h4>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div style="width: 100%; height: 30px;;"></div>
    <div class="row">
        <div class="col-md-offset-1 col-md-10 col-xs-12 col-sm-offset-1 col-sm-10 green-border" style="padding: 0;">
            <!--            <div class="recent-content" style="border: 1px solid #5CC08A; height: 420px;">-->
            <div class="recent-content">
                <div class="recent-content-header">
                    <h2>Games</h2>
                </div>
                <?php for ($i = 0; $i < 4; ++$i) { ?>
                    <div class="col-md-3 col-lg-3 col-sm-6 col-xs-6" style="overflow: hidden; padding: 2px;">
                        <div class="itembox wow zoomIn" data-wow-duration="2s">
                            <div class="inneritem">
                                <img class="zoom_image" width="100%"
                                     src="<?php echo base_url(); ?>posters/<?php echo $Games[$i]->poster ?>" alt="gdgd">
                                <div class="hovercaption">
                                    <a class="button" href="<?php echo base_url() . "movie/" . $Games[$i]->mid ?>">Details</a>
                                </div>
                            </div>

                            <div class="nametext">
                                <h4><?php echo $Games[$i]->name; ?></h4>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div style="width: 100%; height: 30px;;"></div>

    <div style="width: 100%; height: 30px;;"></div>
    <div class="row">
        <div class="col-md-offset-1 col-md-10 col-xs-12 col-sm-offset-1 col-sm-10 green-border" style="padding: 0;">
            <!--            <div class="recent-content" style="border: 1px solid #5CC08A; height: 420px;">-->
            <div class="recent-content">
                <div class="recent-content-header">
                    <h2>Software</h2>
                </div>
                <?php for ($i = 0; $i < 4; ++$i) { ?>
                    <div class="col-md-3 col-lg-3 col-sm-6 col-xs-6" style="overflow: hidden; padding: 2px;">
                        <div class="itembox wow zoomIn" data-wow-duration="2s">
                            <div class="inneritem">
                                <img class="zoom_image" width="100%"
                                     src="<?php echo base_url(); ?>posters/<?php echo $Software[$i]->poster ?>"
                                     alt="gdgd">
                                <div class="hovercaption">
                                    <a class="button" href="<?php echo base_url() . "movie/" . $Software[$i]->mid ?>">Details</a>
                                </div>
                            </div>

                            <div class="nametext">
                                <h4><?php echo $Software[$i]->name; ?></h4>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div style="width: 100%; height: 30px;;"></div>


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


    <?php include 'footer.php' ?>

    <?php include 'include_bottom.php' ?>
</body>
</html>