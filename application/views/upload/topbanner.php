<style>
    .topadd {
        width: 100%;
        height: 100%;
        padding: 5px;
        /*background-color: #00aced;*/
    }

    .topadd img {
        width: 100%;
        max-height: 120px;

    }

    #pButton {
        height: 60px;
        width: 60px;
        border: none;
        background-size: 50% 50%;
        background-repeat: no-repeat;
        background-position: center;
        float: left;
        outline: none;
    }

    .play {
        background: url('<?php echo base_url();?>assets/img/453.png');
    }

    .pause {
        background: url('<?php echo base_url();?>assets/img/453.png');
    }
    .pull-left li{
        float: right;
    }

    @media screen and (max-width: 768px) {

        .topadd {
            display: none;
        }
        #pButton{
            height: 40px;
            width: 40px;
        }
        .pull-left{
            word-wrap: break-word;
            font-size: 14px;
        }
        .pull-left li{
            float: left;
        }
        .component{
            display: none;
        }

    }

</style>



<div class="row">
    <div class="col-sm-12 col-lg-12 col-md-12" style="max-height: 150px;">
        <div class="col-sm-offset-0 col-md-offset-0 col-md-2 col-lg-2 col-sm-12">
            <a class="logo" href="<?php echo base_url(); ?>movie">
                <img class="img-responsive img-rounded animated bounceInLeft"
                     src="<?php echo base_url(); ?>assets/img/logo.jpg"/>
            </a>
        </div>

        <div class="col-md-4 col-sm-12 col-lg-4 col-xs-12">
            <div class="top-info">
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                        <ul class="pull-left" style="color:#f0f0f0;">
                            <li><i class="fa fa-phone"></i> Call Us Admin: 01616108779,
                                01613115944, 01610502011
                            </li>
                            <li><i class="fa fa-phone"></i> Call Us Service:
                                01610502022, 01610502033, 01610502044
                            </li>
                            <!-- <li><i class="fa fa-envelope"></i>info@gfgdfgdfgd.com</li> -->
                        </ul>
                    </div>
                </div>

                <div class="component" style="float: right!important;">
                    <a href="https://www.facebook.com/QuickOnline-148083075232319"
                       class="icon icon-cube facebook animated bounceInRight">facebook</a>
                    <a href="#" class="icon icon-cube twitter animated bounceInUp">twitter</a>
                    <a href="#" class="icon icon-cube googleplus animated bounceInDown">google+</a>
                </div>

            </div>
        </div>
        <div class="col-sm-12 col-md-5 col-lg-5">
            <div class="topadd">
                <a href="http://allcardecor.com/" target="_blank">
                    <img src="<?php echo base_url(); ?>images/av/topbanner.jpg" alt="top add">
                </a>
            </div>
        </div>
    </div>
</div>

