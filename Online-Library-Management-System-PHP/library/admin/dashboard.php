<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
{ 
    header('location:index.php');
}
else{
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System | Admin Dashboard</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <style>
        body {
            background: linear-gradient(to right, #33ccff, #ff99cc);
            font-family: 'Open Sans', sans-serif;
        }

        .navbar {
            background-color: #d3d3d3 !important;
        }

        .navbar-nav > li > a {
            color: #000000 !important;
            text-transform: uppercase;
        }

        .navbar-nav > li > a:hover {
            background-color: #b0b0b0;
        }

        .dropdown-menu {
            background-color: #d3d3d3;
            border: none;
        }

        .dropdown-item {
            color: #000000;
        }

        .dropdown-item:hover {
            background-color: #b0b0b0;
        }

        .content-wrapper {
            margin-top: 40px;
            min-height: 800px;
            padding-bottom: 90px;
        }

        .header-line {
            font-weight: 900;
            padding-bottom: 25px;
            border-bottom: 1px solid #eeeeee;
            text-transform: uppercase;
        }

        .back-widget-set {
            background-color: transparent;
            border: none;
            box-shadow: none;
        }

        .alert {
            border-radius: 10px;
        }

        .carousel-inner img {
            max-height: 400px;
            object-fit: cover;
        }

        .carousel-control-prev-icon, .carousel-control-next-icon {
            background-color: #d3d3d3;
        }

        .alert-success { background-color: #81c784; }
        .alert-info { background-color: #64b5f6; }
        .alert-warning { background-color: #ffb74d; }
        .alert-danger { background-color: #e57373; }
    </style>
</head>
<body>
    <!-- MENU SECTION START-->
    <?php include('includes/header.php'); ?>
    <!-- MENU SECTION END-->
    
    <div class="content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <h4 class="header-line">ADMIN DASHBOARD</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="alert alert-success back-widget-set text-center">
                        <i class="fa fa-book fa-5x"></i>
                        <?php 
                            $sql = "SELECT id from tblbooks";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            $listdbooks = $query->rowCount();
                        ?>
                        <h3><?php echo htmlentities($listdbooks);?></h3>
                        Books Listed
                    </div>
                </div>

                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="alert alert-info back-widget-set text-center">
                        <i class="fa fa-bars fa-5x"></i>
                        <?php 
                            $sql1 = "SELECT id from tblissuedbookdetails";
                            $query1 = $dbh->prepare($sql1);
                            $query1->execute();
                            $results1 = $query1->fetchAll(PDO::FETCH_OBJ);
                            $issuedbooks = $query1->rowCount();
                        ?>
                        <h3><?php echo htmlentities($issuedbooks);?></h3>
                        Times Book Issued
                    </div>
                </div>

                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="alert alert-warning back-widget-set text-center">
                        <i class="fa fa-recycle fa-5x"></i>
                        <?php 
                            $status = 1;
                            $sql2 = "SELECT id from tblissuedbookdetails where RetrunStatus=:status";
                            $query2 = $dbh->prepare($sql2);
                            $query2->bindParam(':status', $status, PDO::PARAM_STR);
                            $query2->execute();
                            $results2 = $query2->fetchAll(PDO::FETCH_OBJ);
                            $returnedbooks = $query2->rowCount();
                        ?>
                        <h3><?php echo htmlentities($returnedbooks);?></h3>
                        Times Books Returned
                    </div>
                </div>

                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="alert alert-danger back-widget-set text-center">
                        <i class="fa fa-users fa-5x"></i>
                        <?php 
                            $sql3 = "SELECT id from tblstudents";
                            $query3 = $dbh->prepare($sql3);
                            $query3->execute();
                            $results3 = $query3->fetchAll(PDO::FETCH_OBJ);
                            $regstds = $query3->rowCount();
                        ?>
                        <h3><?php echo htmlentities($regstds);?></h3>
                        Registered Users
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="alert alert-success back-widget-set text-center">
                        <i class="fa fa-user fa-5x"></i>
                        <?php 
                            $sq4 = "SELECT id from tblauthors";
                            $query4 = $dbh->prepare($sq4);
                            $query4->execute();
                            $results4 = $query4->fetchAll(PDO::FETCH_OBJ);
                            $listdathrs = $query4->rowCount();
                        ?>
                        <h3><?php echo htmlentities($listdathrs);?></h3>
                        Authors Listed
                    </div>
                </div>

                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="alert alert-info back-widget-set text-center">
                        <i class="fa fa-file-archive-o fa-5x"></i>
                        <?php 
                            $sql5 = "SELECT id from tblcategory";
                            $query5 = $dbh->prepare($sql5);
                            $query5->execute();
                            $results5 = $query5->fetchAll(PDO::FETCH_OBJ);
                            $listdcats = $query5->rowCount();
                        ?>
                        <h3><?php echo htmlentities($listdcats);?></h3>
                        Listed Categories
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FOOTER SECTION REMOVED -->

    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/custom.js"></script>
</body>
</html>
<?php } ?>
