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
    <title>Blog home | Cyber</title>

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

                    <?php
                    //show message from add / edit page
                    if(isset($_GET['action'])){
                        echo '<h3>Post '.$_GET['action'].'.</h3>';
                    }
                    ?>

                    <table>
                        <tr>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        try {

                            $stmt = $db->query('SELECT postID, postTitle, postDate FROM blog_posts ORDER BY postID DESC');
                            while($row = $stmt->fetch()){

                                echo '<tr>';
                                echo '<td>'.$row['postTitle'].'</td>';
                                echo '<td>'.date('jS M Y', strtotime($row['postDate'])).'</td>';
                                ?>

                                <td>
                                    <a href="edit-post.php?id=<?php echo $row['postID'];?>">Edit</a> |
                                    <a href="javascript:delpost('<?php echo $row['postID'];?>','<?php echo $row['postTitle'];?>')">Delete</a>
                                </td>

                                <?php
                                echo '</tr>';

                            }

                        } catch(PDOException $e) {
                            echo $e->getMessage();
                        }
                        ?>
                    </table>

                    <p><a href='add-post.php'>Add Post</a></p>

                </div>



            </div>
        </div><!--/.container-->
</section><!--/#feature-->

<?php
include_once('../shortcodes/footer.php');
?>
</body>
</html>
