<script src="<?php echo base_url();?>assets/js/jquery-2.2.0.min.js"></script>
<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->
<script>window.jQuery || document.write('<script src="<?php echo base_url();?>assets/js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
<script src="<?php echo base_url();?>assets/js/vendor/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/js/main.js"></script>

<script src="<?php echo base_url();?>assets/js/modernizr.custom.js"></script>
<script src="<?php echo base_url();?>assets/js/toucheffects.js"></script>
<script src="<?php echo base_url();?>assets/vendors/bootstrap-select/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/vendor/jquery-1.11.2.min.js"></script>
<script src="<?php echo base_url();?>assets/js/cbpFWTabs.js"></script>
<script src="<?php echo base_url();?>assets/js/modernizr.custom1.js"></script>
<script src="<?php echo base_url();?>assets/js/classie.js"></script>

<script>
    wow = new WOW(
        {
            boxClass:     'wow',      // default
            animateClass: 'animated', // default
            offset:       200,          // default
            mobile:       true,       // default
            live:         true        // default
        }
    )
    wow.init();
</script>

<script>
    var beepOne = $("#beep-one")[0];
    $("#navbar li")
        .mouseover(function() {
            beepOne.play();
        });
</script>

<script>
    var beepOne = $("#beep-one")[0];
    $(".hovercaption a")
        .mouseover(function() {
            beepOne.play();
        });
</script>

<script>
    var beepOne = $("#beep-one")[0];
    $(".dlbtn a")
        .mouseover(function() {
            beepOne.play();
        });
</script>