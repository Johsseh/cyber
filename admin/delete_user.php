<?php
include("../include/classes/session.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Delete user | Cyber</title>

    <!-- core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/prettyPhoto.css" rel="stylesheet">>
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
            <div class="row">

                
                    <table align="left" border="0" cellspacing="5" cellpadding="5">
                        <tr>
                            <td><hr></td>
                        </tr>
                        <tr>
                            <td>
                                <?php
                                /**
                                 * Delete User
                                 */
                                ?>
                                <h3>Delete User</h3>
                                <?php echo $form->error("deluser"); ?>
                                <form action="adminprocess.php" method="POST">
                                    Username:<br>
                                    <input type="text" name="deluser" maxlength="30" value="<?php echo $form->value("deluser"); ?>">
                                    <input type="hidden" name="subdeluser" value="1">
                                    <input type="submit" value="Delete User">
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td><hr></td>
                        </tr>
                    </table>

            </div>
        </div><!--/.container-->
</section><!--/#feature-->

<?php
include_once('../shortcodes/footer.php');
?>
</body>
</html>