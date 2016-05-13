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
    <title>All Users | Cyber</title>

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
            <div class="row">

<?php
                    /**
                     * displayUsers - Displays the users database table in
                     * a nicely formatted html table.
                     */
                    function displayUsers(){
                        global $database;
                        $q = "SELECT username, userlevel, email, timestamp, parent_directory "
                            ."FROM ".TBL_USERS." ORDER BY userlevel DESC, username";
                        $result = $database->query($q);
                        /* Error occurred, return given name by default */
                        $num_rows = mysqli_num_rows($result);
                        if(!$result || ($num_rows < 0)){
                            echo "Error displaying info";
                            return;
                        }
                        if($num_rows == 0){
                            echo "Database table empty";
                            return;
                        }
                        /* Display table contents */
                        echo "<table align=\"left\" border=\"1\" cellspacing=\"0\" cellpadding=\"3\">\n";
                        echo "<tr><td><b>Username</b></td><td><b>Level</b></td><td><b>Email</b></td><td><b>Last Active</b></td><td><b>Group</b></td></tr>\n";

                        for($i=0; $i<$num_rows; $i++){
                            mysqli_data_seek($result, $i);
                            $row=mysqli_fetch_row($result);
                            $uname  = $row[0]; //username
                            $ulevel = $row[1]; //userlevel
                            $email  = $row[2]; //email
                            $time   = $row[3]; //timestamp
                            $parent = $row[4]; //parent directory
                            echo "<tr><td>$uname</td><td>$ulevel</td><td>$email</td><td>$time</td><td>$parent</td></tr>\n";
                        }
                        echo "</table><br>\n";


                    }



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
                            <tr><td>
                                    <?php
                                    /**
                                     * Display Users Table
                                     */
                                    ?>
                                    <h3>All registered users</h3>
                                    <?php
                                    displayUsers();
                                    ?>
                                </td></tr>
                            <tr>
                                <td>
                                    <br>
                                    <?php
                                    /**
                                     * Update User Level
                                     */
                                    ?>

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