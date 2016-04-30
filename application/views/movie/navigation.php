<script>
    $(document).ready(function(){
        $("#search_text").keyup(function(){
            if($("#search_text").val().length>3){
                $.ajax({
                    type: "post",
//                    url: "http://localhost/ci/movie/search",
                    url: "<?php echo base_url();?>movie/search",
                    cache: false,
                    data:'search='+$("#search_text").val(),
                    success: function(data){
                        if (data.length > 0) {
                            $('#finalResult').html(data).show();
                        }


                    },
                    error: function(){
                        alert('Error while request..');
                    }
                });
            }
            return false;
        });
                $('#search_button').click(function(){
//
//            alert("Button");
            $("#searchform").submit();

        });
    });
</script>


<?php
require 'connect_db.php';
mysqli_query($conn,'SET CHARACTER SET utf8');
mysqli_query($conn,"SET SESSION collation_connection ='utf8_general_ci'");

$result = mysqli_query($conn, "SELECT notice FROM notice WHERE nid=1");

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $noticetext=$row['notice'];
    }
} else {
    $noticetext='no text';
}

mysqli_close($conn);
?>


















<div style="width: 100%; height: 10px;;"></div>
<style>
    .notice{
        margin: 0;
        padding: 0;
    }

    .notice{
        font-size: 25px;
    }
    @media screen and (max-width: 768px) {
        .notice{
            font-size: 17px;
        }
    }
</style>

<div class="row" style="margin: 0; padding: 0;">
    <div class="col-sm-12" style="margin: 0; padding: 0;">
        <div class="notice" style="color: whitesmoke;">
            <marquee scrollamount="10" onmouseover="this.stop()" onmouseout="this.start()"><?php echo $noticetext; ?></marquee>
        </div>

    </div>
</div>

<div class="row ">
    <div class="col-lg-12 col-sm-12 col-xs-12" style="margin: 0; padding: 0;">

        <div class="navigation-container navbar">
            <div class="nav-container">
                <a class="toggleMenu" href="#"><i class="fa fa-bars" aria-hidden="true"></i> Menu</a>
                <nav id="navbar" style="margin: 0; padding: 0;">
                        <ul>
                            <li id="play" class="li-first-child"><a href="<?php echo base_url(); ?>movie"><i class="fa fa-home"></i>
                                    Home</a></li>
                            <li><a class="has-children" href="#"><i class="fa fa-film"></i> Movie</a>
                                <ul>
                                    <li><a class="has-children-right"
                                           href="<?php echo base_url(); ?>movie/category/English">English</a><span
                                            class="dropRight"></span>
                                        <ul>
                                            <li><a href="<?php echo base_url(); ?>movie/subcategory/1">3D HSBS</a></li>
                                            <li><a href="<?php echo base_url(); ?>movie/subcategory/2">Bluray Movies</a></li>
                                            <li><a href="<?php echo base_url(); ?>movie/subcategory/3">Dvd Movies</a>
                                            <li><a href="<?php echo base_url(); ?>movie/subcategory/4">HDDVD-BRRips Movies</a>
                                            <li><a href="<?php echo base_url(); ?>movie/subcategory/5">War Movies</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="<?php echo base_url(); ?>movie/category/bangla">Bangla</a></li>
                                    <li><a class="has-children-right" href="<?php echo base_url(); ?>movie/category/Hindi">Hindi</a>
                                        <ul>
                                            <li><a href="<?php echo base_url(); ?>movie/subcategory/6">After 2007 Hindi Movies</a></li>
                                            <li><a href="<?php echo base_url(); ?>movie/subcategory/7">Before 2007 Hindi Movies</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="<?php echo base_url(); ?>movie/category/tamil">Tamil / Telegu</a></li>
                                    <li><a href="<?php echo base_url(); ?>movie/category/animation">Animation</a></li>
                                    <li><a href="<?php echo base_url(); ?>movie/category/horror">English And Hindi Horror
                                            Movies
                                        </a></li>
                                        <li><a href="<?php echo base_url(); ?>movie/category/OthersMovies">Others Movies</a></li>
                                </ul>
                            </li>
                            <li><a class="has-children" href="#"><i class="fa fa-film"></i> Natok/Serial</a>
                                <ul>
                                    <li><a href="<?php echo base_url(); ?>tvlist">English Serial</a></li>
<!--                                    <li><a href="--><?php //echo base_url(); ?><!--movie/category/HindiSerial">Hindi Serial</a></li>-->
                                    <li><a href="<?php echo base_url(); ?>movie/category/Natok">Bangla Natok</a></li>
                                    <li><a href="<?php echo base_url(); ?>movie/category/JapaneseAnimation">Japanese Animation/ Others</a></li>
                                </ul>
                            </li>
                            <li><a href="<?php echo base_url(); ?>movie/category/software"><i class="fa fa-desktop"></i>
                                    Software</a></li>
                            <li><a href="<?php echo base_url(); ?>movie/category/games"><i class="fa fa-gamepad"></i> Games</a>
                            </li>
<!--                            <li><a href="#"><i class="fa fa-modx"></i> About</a></li>-->
                            <li><a href="<?php echo base_url(); ?>movie/bdix"><i class="fa fa-envelope-o fa-fw"></i> BDIX Server</a></li>
                            <li id="search" class="li-last-child">
                                <form name="searchform" id="searchform" action="<?php echo base_url();?>movie/getsearch" method="POST">
                                    <input type="text" class="searchid" name="search" id="search_text" placeholder="Search" autocomplete="off"/>
                                    <input type="button" name="search_button" id="search_button"></a>
                                </form>
                                <ul id="finalResult"></ul>
                            </li>
                        </ul>
                </nav>
            </div>
        </div>
    </div>
</div>


<script>
    var ww = document.body.clientWidth;

    $(document).ready(function() {
        $(".nav-container nav li a").each(function() {
            if ($(this).next().length > 0) {
                $(this).addClass("parent");
            };
        })

        $(".nav-container .toggleMenu").click(function(e) {
            e.preventDefault();
            $(this).toggleClass("active");
            $(".nav-container nav").toggle();
        });
        adjustMenu();
    })

    $(window).bind('resize orientationchange', function() {
        ww = document.body.clientWidth;
        adjustMenu();
    });

    var adjustMenu = function() {
        if (ww < 768) {
            $(".nav-container .toggleMenu").css("display", "inline-block");
            if (!$(".nav-container .toggleMenu").hasClass("active")) {
                $(".nav-container nav").hide();
            } else {
                $(".nav").show();
            }
            $(".nav-container nav li").unbind('mouseenter mouseleave');
            $(".nav-container nav li a.parent").unbind('click').bind('click', function(e) {
                // must be attached to anchor element to prevent bubbling
                e.preventDefault();
                $(this).parent("li").toggleClass("hover");
            });
        }
        else if (ww >= 768) {
            $(".nav-container .toggleMenu").css("display", "none");
            $(".nav-container nav").show();
            $(".nav-container nav li").removeClass("hover");
            $(".nav-container nav li a").unbind('click');
            $(".nav-container nav li").unbind('mouseenter mouseleave').bind('mouseenter mouseleave', function() {
                // must be attached to li so that mouseleave is not triggered when hover over submenu
                $(this).toggleClass('hover');
            });
        }
    }

</script>


