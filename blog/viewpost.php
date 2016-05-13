<?php require('../include/classes/database.php');

$stmt = $db->prepare('SELECT postID, postTitle, postCont, postDate FROM blog_posts WHERE postID = :postID');
$stmt->execute(array(':postID' => $_GET['id']));
$row = $stmt->fetch();

//if post does not exists redirect user.
if($row['postID'] == ''){
    header('Location: ./');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Blog | Cyber</title>

    <!-- core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/prettyPhoto.css" rel="stylesheet">>
    <link href="../css/animate.min.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/normalize.css">
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
include_once('../shortcodes/header2.php');
?>
<section id="feature" >
    <div class="container">
        <div class="row">
            <?php
            include_once('../shortcodes/sidebar.php');
            ?>
            <div class="col-md-10">
                <div class="features">
                    <div id="wrapper">

                      <h2><p><a href="./">Blog Posts</a></p></h2>


                        <?php
                        echo '<div>';
                        echo '<h2>'.$row['postTitle'].'</h2>';
                        echo '<p>Posted on '.date('jS M Y', strtotime($row['postDate'])).'</p>';
                        echo '<p>'.$row['postCont'].'</p>';
                        echo '</div>';
                        ?>

                    </div>


                </div><!--/.services-->
            </div><!--/.row-->
        </div>
    </div><!--/.container-->
</section><!--/#feature-->

<?php
include_once('../shortcodes/footer.php');
?>
</body>
</html>



