<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>



<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Quickonline.com</title>
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
        <div class="col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-sm-12 col-xs-12">
            <div class="col-lg-12 col-md-12 col-xs-12" style="padding: 0; margin: 0;">
                <div class="imageview wow zoomIn" data-wow-duration="2s">
                    <div class="moviename">
                        <h1><?php echo $movie[0]->name ?></h1>
                        <div class="catname">
                            <h5><?php echo $movie[0]->cname ?></h5>
                        </div>
                    </div>
                    <img src="<?php echo base_url(); ?>posters/<?php echo $movie[0]->poster ?>" alt="Movie Name">
                </div>
                <div style="width: 100%; height: 40px;"></div>
                <div class="dlbtn animated" data-wow-duration="2s">
                    <a href="<?php echo $movie[0]->link ?>">
                        <button class="btn btn-5 btn-5b fa fa-download"><span>Download</span></button>
                    </a>
                </div>
                <div style="width: 100%; height: 10px;"></div>

                <?php
                if ($movie[0]->cid == 5 || $movie[0]->cid == 6) {
                    ?>

                    <?php
                } else {
                    ?>
                    <div class="dlbtn animated" data-wow-duration="2s">
                        <a onclick="videoPlay()" href="#openModal">
                            <button class="btn btn-5 btn-5b fa fa-youtube-play"><span>Watch Online</span></button>
                        </a>
                    </div>

                    <div id="openModal" class="modalDialog">
                        <div><a href="#close" onclick="videoCancel()" title="Close" class="close">X</a>

                            <video id="my-video" class="video-js" controls preload="auto" width="590" height="390"
                                   poster="<?php echo base_url(); ?>/posters/<?php echo $movie[0]->poster ?>"
                                   data-setup='{"playbackRates": [1, 1.5, 2, 4, 6, 8] }'>
                                <source src="<?php echo $movie[0]->link ?>" type='video/mp4'>
                                <source src="<?php echo $movie[0]->link ?>" type='video/webm'>
                                <p class="vjs-no-js">
                                    To view this video please enable JavaScript, and consider upgrading to a web browser
                                    that
                                    <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5
                                        video</a>
                                </p>
                            </video>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <div style="width: 100%;" class="break"></div>
            </div>
        </div>

        <div class="col-md-3 col-lg-3 col-sm-12">
            <div style="width: 100%; height: 10px;"></div>
            <div class="movieadd">
                <div class="col-xs-6 col-lg-12 col-md-12">
                    <a href="http://allcardecor.com/" target="_blank">
                        <img style="margin-bottom: 10px;" src="<?php echo base_url(); ?>images/av/right1.jpg" alt="">
                    </a>
                </div>

                <div class="col-xs-6 col-lg-12 col-md-12">
                    <a href="http://allcardecor.com/" target="_blank">
                        <img style="margin-bottom: 10px;" src="<?php echo base_url(); ?>images/av/right2.jpg" alt="">
                    </a>
                </div>


            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div id="tabs" class="tabs">
                <nav>
                    <ul>
                        <li><a href="#section-1"><span>Hindi</span></a></li>
                        <li><a href="#section-2"><span>English</span></a></li>
                        <li><a href="#section-3"><span>Bangla</span></a></li>
                        <li><a href="#section-4"><span>Tamil/Telegu</span></a></li>
                        <li><a href="#section-5"><span>Animation</span></a></li>
                    </ul>
                </nav>
                <div class="content">
                    <section id="section-1">
                        <?php for ($i = 0; $i < 5; ++$i) { ?>
                            <div class="mediabox wow flip" data-wow-duration="2s">
                                <a href="<?php echo base_url() . "movie/" . $hindi[$i]->mid ?>">
                                    <img style="height: 100%" class="img-responsive"
                                         src="<?php echo base_url(); ?>posters/<?php echo $hindi[$i]->poster ?>"
                                         alt="img01"/>
                                </a>
                                <h3 style="color: white; font-size: 18px; text-align: center;"><?php echo $hindi[$i]->name; ?></h3>
                            </div>
                        <?php } ?>
                    </section>
                    <section id="section-2">
                        <?php for ($i = 0; $i < 5; ++$i) { ?>
                            <div class="mediabox">
                                <a href="<?php echo base_url() . "movie/" . $english[$i]->mid ?>">
                                    <img style="height: 100%" class="img-responsive"
                                         src="<?php echo base_url(); ?>posters/<?php echo $english[$i]->poster ?>"
                                         alt="img01"/>
                                </a>
                                <h3 style="color: white; font-size: 18px; text-align: center;"><?php echo $english[$i]->name; ?></h3>
                            </div>
                        <?php } ?>
                    </section>
                    <section id="section-3">
                        <?php for ($i = 0; $i < 5; ++$i) { ?>
                            <div class="mediabox">
                                <a href="<?php echo base_url() . "movie/" . $bangla[$i]->mid ?>">
                                    <img style="height: 100%" class="img-responsive"
                                         src="<?php echo base_url(); ?>posters/<?php echo $bangla[$i]->poster ?>"
                                         alt="img01"/>
                                </a>
                                <h3 style="color: white; font-size: 18px; text-align: center;"><?php echo $bangla[$i]->name; ?></h3>
                            </div>
                        <?php } ?>
                    </section>
                    <section id="section-4">
                        <?php for ($i = 0; $i < 5; ++$i) { ?>
                            <div class="mediabox">
                                <a href="<?php echo base_url() . "movie/" . $tamil[$i]->mid ?>">
                                    <img style="height: 100%" class="img-responsive"
                                         src="<?php echo base_url(); ?>posters/<?php echo $tamil[$i]->poster ?>"
                                         alt="img01"/>
                                </a>
                                <h3 style="color: white; font-size: 18px; text-align: center;"><?php echo $tamil[$i]->name; ?></h3>
                            </div>
                        <?php } ?>
                    </section>
                    <section id="section-5">
                        <?php for ($i = 0; $i < 5; ++$i) { ?>
                            <div class="mediabox">
                                <a href="<?php echo base_url() . "movie/" . $animation[$i]->mid ?>">
                                    <img style="height: 100%" class="img-responsive"
                                         src="<?php echo base_url(); ?>posters/<?php echo $animation[$i]->poster ?>"
                                         alt="img01"/>
                                </a>
                                <h3 style="color: white; font-size: 18px; text-align: center;"><?php echo $animation[$i]->name; ?></h3>
                            </div>
                        <?php } ?>
                    </section>
                </div><!-- /content -->
            </div><!-- /tabs -->
        </div>
    </div>











     <?php
    if($music==1){
        ?>

        <script>
            var player = document.getElementById('back-sound');
            player.autoplay=false;
            $('#pButton').click(function(){
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
            player.autoplay=true;
            $('#pButton').click(function(){
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
</div>


<?php include 'include_bottom.php' ?>


<script>
    new CBPFWTabs(document.getElementById('tabs'));
</script>

<script>
    var myPlayer = videojs("my-video");
    function videoPlay() {
        myPlayer.play();
    }
    function videoCancel() {
//        if (myPlayer.paused()) {
//            myPlayer.play();
//        }
//        else {
//            myPlayer.pause();
//        }
        myPlayer.pause();
        myPlayer.currentTime(0);
        myPlayer.bigPlayButton.show();
        myPlayer.posterImage.show();
    }

    $(function() {                       //run when the DOM is ready
        $(".dlbtn").click(function() {  //use a class, since your ID gets mangled
            $(this).addClass("jello");      //add the class to the clicked element
        });
    });
</script>


</body>
</html>