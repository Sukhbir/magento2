<?php 
    require('config.php'); 
    @session_start();
    if(!isset($_SESSION['userlogin']))
    {
        header('location:login.php');
    }
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ourdinero</title>
    <meta name="description" content="Sakar Sales Corporation">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="images/small-logo.png">
    <link rel="shortcut icon" href="images/small-logo.png">
    <link rel="icon" href="images/small-logo.png" type="image/gif" sizes="16x16">


    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">
    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="hfttps://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>


        <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="images/small-logo.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                   <!--  <h3 class="menu-title">Fashion Hub</h3> --><!-- /.menu-title -->
                    <!-- <li class="active">
                        <a href=""> <i class="menu-icon fa fa-laptop"></i>E-Commerce Store</a>
                    </li> -->
                   <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-sitemap"></i>Network</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-user"></i><a href="new-member.php">Add New DSA</a></li>
 <!--                           <li><i class="fa fa-table"></i><a href="tables-data.html">Network Explorer</a></li> -->
                            <li><i class="fa fa-users"></i><a href="down-line-members.php">DSA Down-Line</a></li>
                            <li><i class="fa fa-users"></i><a href="referred-members.php">Referred DSA</a></li>
                            <li><i class="fa fa-sitemap"></i><a href="genealogytree.php">DSA Tree</a></li>
                        <!--    <li><i class="fa fa-table"></i><a href="tables-data.html">Team View</a></li>
                            <li><i class="fa fa-table"></i><a href="tables-data.html">Membership Upgrade</a></li> -->
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-money"></i>E-Wallet</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-credit-card"></i><a href="e-wallet-transactions.php">Transactions</a></li> 
                            <!--<li><i class="menu-icon fa fa-th"></i><a href="forms-basic.html">E-Wallet Summary</a></li>
                            
                            <li><i class="menu-icon fa fa-th"></i><a href="forms-advanced.html">E-Wallet Debits</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="forms-advanced.html">Withdrawal Funds</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="forms-advanced.html">My Withdrawal Requests</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="forms-advanced.html">Payment Preferrence</a></li> -->
                            <li><i class="menu-icon fa fa-plus"></i><a href="e-wallet-deposit-fund.php">Deposit Fund</a></li>
                            <li><i class="menu-icon fa fa-exchange"></i><a href="e-wallet-transfer-fund.php">Tranfer fund to others</a></li>
                        </ul>
                    </li>

                    <!-- <h3 class="menu-title">Fashion Hub</h3> --> <!-- /.menu-title --> 

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-map-pin"></i>E-Pin</a>
                        <ul class="sub-menu children dropdown-menu">
<!--                            <li><i class="menu-icon fa fa-fort-awesome"></i><a href="new-epin.php">Generate E-Pin</a></li> -->
                            <li><i class="menu-icon fa fa-map-pin"></i><a href="view-e-pin.php">My E-Pins</a></li>
                        <!--    <li><i class="menu-icon ti-themify-logo"></i><a href="font-themify.html">E-Pin History</a></li> -->
                            <li><i class="menu-icon fa fa-paper-plane"></i><a href="e-pin-request.php">E-Pins Request</a></li>
                            <!-- <li><i class="menu-icon ti-themify-logo"></i><a href="font-themify.html">All E-Pins</a></li>
                            <li><i class="menu-icon ti-themify-logo"></i><a href="font-themify.html">Deleted Refunded E-Pins</a></li> -->
                        </ul>
                    </li>
                   <!--  <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bar-chart"></i>Business</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-line-chart"></i><a href="charts-chartjs.html">B-Wallet Summary</a></li>
                            <li><i class="menu-icon fa fa-area-chart"></i><a href="charts-flot.html">Business Transactions</a></li>
                            <li><i class="menu-icon fa fa-pie-chart"></i><a href="charts-peity.html">Business Authorizatuions</a></li>
                            <li><i class="menu-icon fa fa-pie-chart"></i><a href="charts-peity.html">Transfer Funds To Business</a></li>
                            <li><i class="menu-icon fa fa-pie-chart"></i><a href="charts-peity.html">Business Expenses</a></li>
                            <li><i class="menu-icon fa fa-pie-chart"></i><a href="charts-peity.html">Business Income</a></li>
                            <li><i class="menu-icon fa fa-pie-chart"></i><a href="charts-peity.html">Member Transactions</a></li>
                            <li><i class="menu-icon fa fa-pie-chart"></i><a href="charts-peity.html">Member E-Wallet</a></li>
                            
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-area-chart"></i>Manage Members</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-map-o"></i><a href="maps-gmap.html">Blocked Members</a></li>
                            <li><i class="menu-icon fa fa-street-view"></i><a href="maps-vector.html">Unverified Members</a></li>
                            <li><i class="menu-icon fa fa-street-view"></i><a href="maps-vector.html">Cancel User Account</a></li>
                            <li><i class="menu-icon fa fa-street-view"></i><a href="maps-vector.html">Manage Other Members</a></li>
                            <li><i class="menu-icon fa fa-street-view"></i><a href="maps-vector.html">Find Members</a></li>
                            <li><i class="menu-icon fa fa-street-view"></i><a href="maps-vector.html">Unverified Bank Payments</a></li>
                            <li><i class="menu-icon fa fa-street-view"></i><a href="maps-vector.html">Excluded Members</a></li>
                        </ul>
                    </li>
                    <h3 class="menu-title">Fashion Hub</h3> --> <!-- /.menu-title -->
                     <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-rupee"></i>Payments Reports</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-rupee"></i><a href="income.php">Income</a></li>
                            <!-- <li><i class="menu-icon fa fa-sign-in"></i><a href="page-register.html">Active Payouts</a></li> -->
                            <li><i class="menu-icon fa fa-rupee"></i><a href="pending-payment.php">Pending Payout</a></li>
                            <li><i class="menu-icon fa fa-rupee"></i><a href="completed-payments.php">Completed Payments</a></li>
                        </ul>
                    </li>
                    <!--
                    <li class="active">
                        <a href=""> <i class="menu-icon fa fa-laptop"></i>General Help</a>
                    </li>
                    <li class="active">
                        <a href=""> <i class="menu-icon fa fa-laptop"></i>E-Commerce</a>
                    </li>
                    -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tags"></i>Promotion Tools</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="referral-promotion.php">Referral Promotion</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>My Profile</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-user"></i><a href="my-profile.php">My Profile</a></li>
                            <li><i class="menu-icon fa fa-bank"></i><a href="bank-details.php">Bank Details</a></li>
                        </ul>
                    </li>
                    <li class="">
                        <a href="logout.php"> <i class="menu-icon fa fa-sign-out"></i>Logout</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                                <a class="nav-link" href="my-profile.php"><i class="fa fa- user"></i>My Profile</a>
                                <a class="nav-link" href="bank-details.php"><i class="fa fa- user"></i>Bank Details</a>

                                <!-- <a class="nav-link" href="#"><i class="fa fa- user"></i>Notifications <span class="count">13</span></a>

                                <a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a> -->

                                <a class="nav-link" href="logout.php"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->
