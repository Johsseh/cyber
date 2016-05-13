
<?php
//include config
require_once('../include/classes/database.php');


//show message from add / edit page
if(isset($_GET['delpost'])){

    $stmt = $db->prepare('DELETE FROM blog_posts WHERE postID = :postID') ;
    $stmt->execute(array(':postID' => $_GET['delpost']));

    header('Location: index.php?action=deleted');
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
    <title>Edit Post | Cyber</title>

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
<script language="JavaScript" type="text/javascript">
    function delpost(id, title)
    {
        if (confirm("Are you sure you want to delete '" + title + "'"))
        {
            window.location.href = 'index.php?delpost=' + id;
        }
    }
</script>
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
            <div class="row">
                <div id="wrapper">

                    <p><a href="index.php">Blog Admin Dashboard</a></p>

                    <p><h2>Click to edit another post</h2>
                    <h2><p><a href="index.php">Edit Post</a></p></h2></p>


                    <?php

                    //if form has been submitted process it
                    if(isset($_POST['submit'])){

                        $_POST = array_map( 'stripslashes', $_POST );

                        //collect form data
                        extract($_POST);

                        //very basic validation
                        if($postID ==''){
                            $error[] = 'This post is missing a valid id!.';
                        }

                        if($postTitle ==''){
                            $error[] = 'Please enter the title.';
                        }

                        if($postDesc ==''){
                            $error[] = 'Please enter the description.';
                        }

                        if($postCont ==''){
                            $error[] = 'Please enter the content.';
                        }

                        if(!isset($error)){

                            try {

                                //insert into database
                                $stmt = $db->prepare('UPDATE blog_posts SET postTitle = :postTitle, postDesc = :postDesc, postCont = :postCont WHERE postID = :postID') ;
                                $stmt->execute(array(
                                    ':postTitle' => $postTitle,
                                    ':postDesc' => $postDesc,
                                    ':postCont' => $postCont,
                                    ':postID' => $postID
                                ));

                                //redirect to index page
                                header('Location: index.php?action=updated');
                                exit;

                            } catch(PDOException $e) {
                                echo $e->getMessage();
                            }

                        }

                    }

                    ?>


                    <?php
                    //check for any errors
                    if(isset($error)){
                        foreach($error as $error){
                            echo $error.'<br />';
                        }
                    }

                    try {

                        $stmt = $db->prepare('SELECT postID, postTitle, postDesc, postCont FROM blog_posts WHERE postID = :postID') ;
                        $stmt->execute(array(':postID' => $_GET['id']));
                        $row = $stmt->fetch();

                    } catch(PDOException $e) {
                        echo $e->getMessage();
                    }

                    ?>

                    <form action='' method='post'>
                        <input type='hidden' name='postID' value='<?php echo $row['postID'];?>'>

                        <p><label>Title</label><br />
                            <input type='text' name='postTitle' value='<?php echo $row['postTitle'];?>'></p>

                        <p><label>Description</label><br />
                            <textarea name='postDesc' cols='60' rows='10'><?php echo $row['postDesc'];?></textarea></p>

                        <p><label>Content</label><br />
                            <textarea name='postCont' cols='60' rows='10'><?php echo $row['postCont'];?></textarea></p>

                        <p><input type='submit' name='submit' value='Update'></p>

                    </form>



            </div>
        </div><!--/.container-->
</section><!--/#feature-->

<?php
include_once('../shortcodes/footer.php');
?>
</body>
</html>

</html>