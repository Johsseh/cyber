<?php
/**
 * Main.php
 *
 * This is an example of the main page of a website. Here
 * users will be able to login. However, like on most sites
 * the login form doesn't just have to be on the main page,
 * but re-appear on subsequent pages, depending on whether
 * the master has logged in or not.
 */
include("include/classes/session.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login| Cyber</title>

    <!-- core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">>
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->
<body>
<header id="header">
    <nav class="navbar navbar-inverse" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="logo"></a>
            </div>

            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php">Contact</a></li>

                </ul>
                <ul class="nav navbar-nav navbar-right">

                    <li><a href="login.php">Login</a></li>
                </ul>
            </div>
        </div><!--/.container-->
    </nav><!--/nav-->
</header><!--/header-->
<section id="feature" >
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <a href="login.php" class="btn btn-success btn-block">Home</a>
                <a href="about.php" class="btn btn-success btn-block">About</a>
                <a href="contact.php" class="btn btn-success btn-block">Contact</a>
                <a href="faq.php" class="btn btn-success btn-block">FAQ</a>
                <a href="help.php" class="btn btn-success btn-block">Help</a>

            </div>
            <div class="col-md-10">
                <?php
                /**
                 * User has already logged in, so display relevant links, including
                 * a link to the admin center if the master is an administrator.
                 */


                if (($session->logged_in) && ($session->isMaster())) {
                    header("Location: master/land.php");
                } elseif (($session->logged_in) && ($session->isAdmin())) {
                        header("Location: admin/admin.php");

                } else {

                ?>

        <h2>Please login</h2>

                <?php
                /**
                 * User not logged in, display the login form.
                 * If master has already tried to login, but errors were
                 * found, display the total number of errors.
                 * If errors occurred, they will be displayed.
                 */
                if($form->num_errors > 0){
                    echo "<font size=\"2\" color=\"#ff0000\">".$form->num_errors." error(s) found</font>";
                }
                ?>
                <form action="process.php" method="POST" class="form-horizontal">
                    <div class="form-group">
                        <label for="inputusername" class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Username" name="user" value="<?php echo $form->value("master"); ?>"><?php echo $form->error("master"); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" placeholder="Password" name="pass" value="<?php echo $form->value("pass"); ?>"><?php echo $form->error("pass"); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" <?php if($form->value("remember") != ""){ echo "checked"; } ?>>
                                    <font size="2">Remember me next time</font>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="hidden" name="sublogin" value="1">
                            <input type="submit" value="Login">
                        </div>
                    </div>
                    <div> <b>Don't have an account?</b>
                        <a href="register.php">SignUp</a></div>


            </div>
            </form>
            <br />
            <?php
            }
            echo "<br />";
            echo "<br />";
            echo "Admin: admin password: admin <br />";
            echo "User: master1 password: master1<br />";
            ?>


        </div>
    </div><!--/.container-->
</section><!--/#feature-->

<footer id="footer" class="midnight-blue">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                &copy; 2016 <a target="_blank" href="../index.php/" title="Get knowledge on Cisco easily">Cisco training</a>. All Rights Reserved.
            </div>
            <div class="col-sm-6">
                <ul class="pull-right">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="faq.php">Faq</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer><!--/#footer-->

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/jquery.isotope.min.js"></script>
<script src="js/main.js"></script>
<script src="js/wow.min.js"></script>

</body>
</html>