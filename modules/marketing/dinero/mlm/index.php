<?php include('header.php');
$userid=$_SESSION['userlogin'];
?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

            <div class="col-lg-3 col-md-6">
                <div class="social-box facebook">
                    <i class="fa fa-user"></i>
                    <strong>DSA</strong>
                    <ul>
                    <?php
                    $query = mysqli_query($con,"select * from tree where user_id='$userid'");
                    $result = mysqli_fetch_array($query);
                    $data['leftcount'] = $result['leftcount'];
                    $data['rightcount'] = $result['rightcount'];
                    ?>
                        <li>
                            <strong><span class="count"><?php echo $data['leftcount']; ?></span></strong>
                            <span>Left</span>
                        </li>
                        <li>
                            <strong><span class="count"><?php echo $data['rightcount']; ?></span></strong>
                            <span>Right</span>
                        </li>
                    </ul>
                </div>
                <!--/social-box-->
            </div><!--/.col-->


            <div class="col-lg-3 col-md-6">
                <div class="social-box twitter">
                    <i class="fa fa-map-pin"></i>
                    <strong>E-Pin</strong>
                    <ul>
                    <?php
                    $query = mysqli_query($con,"select * from e_pin_request where user_id='$userid'");
                    $result = mysqli_num_rows($query);
                    $e_pin_request = $result;
                    ?>
                        <li>
                            <strong><span class="count"><?php echo $e_pin_request; ?></span></strong>
                            <span>Requested</span>
                        </li>
                    <?php
                    $query = mysqli_query($con,"select * from e_pin where user_id='$userid' and status='0'");
                    $result = mysqli_num_rows($query);
                    $e_pin = $result;
                    ?>
                        <li>
                            <strong><span class="count"><?php echo $e_pin; ?></span></strong>
                            <span>Active</span>
                        </li>
                    </ul>
                </div>
                <!--/social-box-->
            </div><!--/.col-->

            <div class="col-lg-3 col-md-6">
                <div class="social-box google-plus">
                    <i class="fa fa-money"></i>
                    <strong>E-Wallet</strong>
                    <ul>
                    <?php
                        $e_wallet_sql="select * from e_wallet where user_id='$userid'";
                        $e_wallet_res = mysqli_query($con, $e_wallet_sql) or die("error : ".mysqli_error($con));
                        $e_wallet_fund=mysqli_fetch_array($e_wallet_res);
                        $e_wallet=$e_wallet_fund['current_bal'];
                    ?>
                    <p style="color: #949CA0;font-size: 14px;font-weight: 500;text-transform: uppercase;">
                     <?php echo $e_wallet; ?> <br />
                    Balance
                    </p>
                    </ul>
                </div>
                <!--/social-box-->
            </div><!--/.col-->

            <div class="col-lg-3 col-md-6" style="height:250px;">
                <div class="social-box linkedin">
                    <i class="fa fa-rupee"></i>
                    <strong>Payment</strong>
                    <ul>
                    <?php
                    $pincome=0;
                    $query = mysqli_query($con,"select * from income where user_id='$userid'");
                    while ($row=mysqli_fetch_assoc($query))
                    {
                        $pincome=$pincome+$row['current_bal'];
                    }
                    ?>
                        <li>
                            <strong><span class="count"><?php echo $pincome; ?></span></strong>
                            <span>Pending</span>
                        </li>
                    <?php 
                        $rincome=0;
                        $sql = "SELECT * FROM income_received where user_id='$userid'";
                        $re = mysqli_query($con, $sql) or die (mysqli_error($con));
                        while ($row=mysqli_fetch_assoc($re))
                            {
                                $rincome=$rincome+$row['amount'];
                            }
                    ?>
                        <li>
                            <strong><span class="count"><?php echo $rincome; ?></span></strong>
                            <span>Received</span>
                        </li>
                    </ul>
                </div>
                <!--/social-box-->
            </div><!--/.col-->
        
                            <div class="card">
                                <div class="card-header">
                                    <strong> Quick Link </strong>
                                </div>
                                <div class="card-body">
                                    <button onclick="location.href='new-member.php'" type="button" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp; Add New DSA</button>
                                    
                                    <button onclick="location.href='genealogytree.php'" type="button" class="btn btn-success"><i class="fa fa-sitemap"></i>&nbsp; View DSA Tree</button>
                                    
                                    <button onclick="location.href='view-e-pin.php'" type="button" class="btn btn-warning"><i class="fa fa-map-pin"></i>&nbsp; My E-Pin</button>
                                    
                                    <button onclick="location.href='e-pin-request.php'" type="button" class="btn btn-danger"><i class="fa fa-map-pin"></i>&nbsp; E-pin Request</button>
                                    <button onclick="location.href='e-wallet-transactions.php'" type="button" class="btn btn-secondary"><i class="fa fa-exchange"></i>&nbsp; E-Wallet Transaction</button>
                                    <button onclick="location.href='income.php'" type="button" class="btn btn-primary"><i class="fa fa-rupee"></i>&nbsp; Income </button>
                                </div>
                            </div><!-- /# card -->
    
        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->
<?php include('footer.php') ?>