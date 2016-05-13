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
                            <td><hr></td>
                        </tr>
                        <tr>
                            <td>
                                <?php
                                /**
                                 * Delete Inactive Users
                                 */
                                ?>
                                <h3>Delete Inactive Users</h3>
                                This will delete all users (not administrators), who have not logged in to the site<br>
                                within a certain time period. You specify the days spent inactive.<br><br>
                                <table>
                                    <form action="adminprocess.php" method="POST">
                                        <tr><td>
                                                Days:<br>
                                                <select name="inactdays">
                                                    <option value="3">3
                                                    <option value="7">7
                                                    <option value="14">14
                                                    <option value="30">30
                                                    <option value="100">100
                                                    <option value="365">365
                                                </select>
                                            </td>
                                            <td>
                                                <br>
                                                <input type="hidden" name="subdelinact" value="1">
                                                <input type="submit" value="Delete All Inactive">
                                            </td>
                                    </form>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td><hr></td>
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