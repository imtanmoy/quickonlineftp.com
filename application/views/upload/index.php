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
<body style="padding: 0; margin: 0; background: url('<?php echo base_url(); ?>assets/img/back.jpg')repeat-x center center fixed;" sclass="col-md-12">
<div class="container-fluid">
    <?php include 'topbanner.php' ?>

    <div class="col-lg-offset-5 col-lg-2 col-xs-12" style="margin-top: 10px;">
        <div class="row">
            <form class="form-signin">
                <h2 class="form-signin-heading">Please sign in</h2>
                <label for="inputEmail" class="sr-only">Email address</label>
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            </form>s
        </div>
    </div>

</div>
    <?php include 'footer.php' ?>

    <?php include 'include_bottom.php' ?>
</body>
</html>