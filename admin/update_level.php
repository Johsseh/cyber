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
    <title>Update level | Cyber</title>

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

                <?php
                /**
                 * displayUsers - Displays the users database table in
                 * a nicely formatted html table.
                 */


                /**
                 * User not an administrator, redirect to main page
                 * automatically.
                 */
                if(!$session->isAdmin()){
                    header("Location: ../index.php");
                }
                else{
                    /**
                     * Administrator is viewing page, so display all
                     * forms.
                     */
                    ?>


                    <?php
                    if($form->num_errors > 0){
                        echo "<font size=\"4\" color=\"#ff0000\">"
                            ."!*** Error with request, please fix</font><br><br>";
                    }
                    ?>
                    <table align="left" border="0" cellspacing="5" cellpadding="5">
                        <tr>
                            <td>
                                <br>
                                <?php
                                /**
                                 * Update User Level
                                 */
                                ?>
                                <h3>Update User Level</h3>
                                <?php echo $form->error("upduser"); ?>
                                <table>
                                    <form action="adminprocess.php" method="POST">
                                        <tr><td>
                                                Username:<br>
                                                <input type="text" name="upduser" maxlength="30" value="<?php echo $form->value("upduser"); ?>">
                                            </td>
                                            <td>
                                                Level:<br>
                                                <select name="updlevel">
                                                    <option value="2">2
                                                    <option value="1">1

                                                </select>
                                            </td>
                                            <td>
                                                <br>
                                                <input type="hidden" name="subupdlevel" value="1">
                                                <input type="submit" value="Update Level">
                                            </td></tr>
                                    </form>
                                </table>
                            </td>
                        </tr>
                    </table>

                    <?php
                }
                ?>


            </div>
        </div><!--/.container-->
</section><!--/#feature-->

<?php
include_once('../shortcodes/footer.php');
?>
</body>
</html>