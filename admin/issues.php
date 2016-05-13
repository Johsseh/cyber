<?php
include("../include/classes/database.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>All issues | Cyber</title>
<style type="text/css">
    table,th,td{border:1px solid black};
</style>
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
             <div class="col-md-10">
                <div class="features">
                    <div id="wrapper">
                        <p>
                        <?php
try{
                        // Define and perform the SQL SELECT query
                        $sql = "SELECT * FROM `contact`";
                        print"<table>\n";
                        $result = $db->query($sql);

                        // This returns only the first row (nataka field names)
                        $row = $result->fetch(PDO::FETCH_ASSOC);

                        print "<tr>\n";
                        foreach ($row as $field => $value){
                            print "<th> $field</th> \n";
                        } //end of foreach
                        print "</tr> \n";

                        //get the data now
                        $data=$db->query($sql);
                        $data->setFetchMode(PDO::FETCH_ASSOC);
                        foreach($data as $row){
                            print "<tr>\n";
                            foreach($row as $name=>$value){
                                print "<td> $value</td> \n";
                            }//end field loop
                            print "</tr> \n";
                        }//end record loop
                        print "</table \n";
                        }catch(PDOEXCEPTION $e){
                            echo 'ERROR: '.
$e->getMessage();
                        }//end try
                        ?></p>
                    </div><!--/.feature-->
                </div><!--/.wrapper-->
                </div><!--/.col-md-10-->

            </div><!--/.row-->
        </div><!--/.container-->
</section><!--/#feature-->
<?php
include_once('../shortcodes/footer.php');
?>
</body>
</html>