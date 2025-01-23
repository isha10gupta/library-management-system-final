<?php
// Start the session to maintain user data
session_start();

// Disable error reporting (can be enabled during development for debugging)
error_reporting(0);

// Include the database configuration file for connecting to the database
include('includes/config.php');

// Check if the user is logged in by verifying the session variable
if (strlen($_SESSION['login']) == 0) {
    // If the user is not logged in, redirect to the login page
    header('location:index.php');
} else { ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!-- Meta tags for responsive design and additional information -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System | User Dashboard</title>
    <!-- Linking external CSS files for styling -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" /> <!-- Bootstrap framework -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" /> <!-- Font Awesome icons -->
    <link href="assets/css/style.css" rel="stylesheet" /> <!-- Custom styling -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' /> <!-- Google Fonts -->
</head>
<body>
    <!-- Include the header file for the navigation menu -->
    <?php include('includes/header.php'); ?>

    <div class="content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <!-- Section title -->
                    <h4 class="header-line">ADMIN DASHBOARD</h4>
                </div>
            </div>
             
            <div class="row">
                <!-- Display the number of books issued to the user -->
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="alert alert-info back-widget-set text-center">
                        <!-- Icon for visual representation -->
                        <i class="fa fa-bars fa-5x"></i>
                        <?php 
                        // Get the student ID from the session
                        $sid = $_SESSION['stdid'];

                        // Query to count the number of books issued to the student
                        $sql1 = "SELECT id from tblissuedbookdetails where StudentID=:sid";
                        $query1 = $dbh->prepare($sql1);
                        $query1->bindParam(':sid', $sid, PDO::PARAM_STR);
                        $query1->execute();
                        $results1 = $query1->fetchAll(PDO::FETCH_OBJ);
                        $issuedbooks = $query1->rowCount(); // Count the results
                        ?>
                        <h3><?php echo htmlentities($issuedbooks); ?> </h3>
                        Book Issued
                    </div>
                </div>
             
                <!-- Display the number of books not returned yet -->
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="alert alert-warning back-widget-set text-center">
                        <!-- Icon for visual representation -->
                        <i class="fa fa-recycle fa-5x"></i>
                        <?php 
                        // Define the return status as 0 (not returned)
                        $rsts = 0;

                        // Query to count the number of books not returned by the student
                        $sql2 = "SELECT id from tblissuedbookdetails where StudentID=:sid and RetrunStatus=:rsts";
                        $query2 = $dbh->prepare($sql2);
                        $query2->bindParam(':sid', $sid, PDO::PARAM_STR);
                        $query2->bindParam(':rsts', $rsts, PDO::PARAM_STR);
                        $query2->execute();
                        $results2 = $query2->fetchAll(PDO::FETCH_OBJ);
                        $returnedbooks = $query2->rowCount(); // Count the results
                        ?>
                        <h3><?php echo htmlentities($returnedbooks); ?></h3>
                        Books Not Returned Yet
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include the footer file -->
    <?php include('includes/footer.php'); ?>

    <!-- Include external JavaScript files -->
    <script src="assets/js/jquery-1.10.2.js"></script> <!-- jQuery library -->
    <script src="assets/js/bootstrap.js"></script> <!-- Bootstrap scripts -->
    <script src="assets/js/custom.js"></script> <!-- Custom JavaScript -->
</body>
</html>
<?php } ?>
