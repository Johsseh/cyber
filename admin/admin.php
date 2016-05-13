<?php
/**
 * admin.php
 *
 * This is an example of the main page of a website. Here
 * users will be able to login. However, like on most sites
 * the login form doesn't just have to be on the main page,
 * but re-appear on subsequent pages, depending on whether
 * the master has logged in or not.
 */
include("../include/classes/session.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Dashboard | Cyber</title>

    <!-- core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/prettyPhoto.css" rel="stylesheet">
    <link href="../css/animate.min.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/responsive.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="../js/html5shiv.js"></script>
    <script src="../js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="../ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->
<body>

<?php
include_once('../shortcodes/header.php');
?>
<section id="feature" >
    <div class="container">
        <div class="row">

            <div class="col-md-2">
                <a href="admin.php" class="btn btn-success btn-block">Home</a>
                
                <a href="../useredit.php" class="btn btn-success btn-block">Settings</a>
                <a href="issues.php" class="btn btn-success btn-block">Complains</a>
                <a href="../master_register.php?user=$session->username" class="btn btn-success btn-block">Add member</a>
            </div>
            <div class="col-md-10">
                <div class="features">
                    <div class="row">
                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <a href="all_users.php"><i class="fa fa-list-ol"></i></a>
                            <h2>All Users</h2>
                            <h3>Get all registered users</h3>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <a href="update_level.php"><i class="fa fa-shield"></i></a>
                            <h2>Update user level</h2>
                            <h3>Make a user an admin or demote </h3>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <a href="delete_user.php"><i class="fa fa-scissors"></i></a>
                            <h2>Delete user</h2>
                            <h3>Want delete a user?</h3>
                        </div>
                    </div><!--/.col-md-4-->
                    </div>

                    <div class="row">
                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <a href="inactive_user.php"><i class="fa fa-rocket"></i></a>
                            <h2>Delete inactive users</h2>
                            <h3>Boring guys should go</h3>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <a href="ban_user.php"><i class="fa fa-gavel"></i></a>
                            <h2>Ban a users</h2>
                            <h3>Just ban the guy</h3>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <a href="banned_users.php"><i class="fa fa-chain-broken"></i></a>
                            <h2>Banned user</h2>
                            <h3>See banned user  and delete </h3>
                        </div>
                    </div><!--/.col-md-4-->
</div>

                </div><!--/.services-->
            </div>
        </div><!--/.row-->
    </div><!--/.container-->
</section><!--/#feature-->

<?php
include_once('../shortcodes/footer.php');
?>
</body>
</html>