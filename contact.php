<?php
//include config
require_once('include/classes/database.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Contact | Cyber</title>

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
    <?php
    if(isset($_POST['submit'])){

    $_POST = array_map( 'stripslashes', $_POST );

    //collect form data
    extract($_POST);

    //very basic validation
        if($telephone ==''){
            $error[] = 'Please enter the Phone number.';
        }
    if($email ==''){
    $error[] = 'Please enter the email.';
    }

    if($issue ==''){
    $error[] = 'Please enter the description.';
    }

    if(!isset($error)){

    try {

    //insert into database
    $stmt = $db->prepare('INSERT INTO contact (telephone, email, issue) VALUES (:telephone, :email, :issue)') ;
    $stmt->execute(array(
        ':telephone' => $telephone,
    ':email' => $email,
    ':issue' => $issue
    ));

    //redirect to index page
    header('Location: contact.php?action=added');
    exit;

    } catch(PDOException $e) {
    echo $e->getMessage();
    }

    }

    }
?>
    <div class="container">
                <form action=" " method="POST" class="form-group">
 <div class="form-group">
                    <label for="phone" class="col-sm-2 control-label">Telephone</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="telephone" placeholder="Enter phone no">
                    </div>
        </div>

                    <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" placeholder="Email">
                    </div>
        </div>
        <div class="form-group">
            <label for="complain" class="col-sm-2 control-label">Issue</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="issue" placeholder="Please enter your complains here" rows="5"></textarea
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="hidden" name="submit" value="1">
                <input type="submit" value="Submit!">
            </div>
        </div>
        </form>
    </div><!--/.container-->
</section><!--/#feature-->

<footer id="footer" class="midnight-blue">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                &copy; 2016 <a target="_blank" href="index.php/" title="Get knowledge on Cisco easily">Cisco training</a>. All Rights Reserved.
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



