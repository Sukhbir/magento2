<?php include('header.php'); 
$userid=$_SESSION['userlogin'];
?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Bank Details</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                    </div>
                </div>
            </div>
        </div>

        <?php
        if(isset($_SESSION['user_profile']))
        {
        ?>
        <div class="breadcrumbs bg-success">
            <div>
                <div class="page-header text-center text-white bg-success">
                    <div class="page-title">
                        <h1><?php echo $_SESSION['user_profile']; ?></h1>
                    </div>
                </div>
            </div>
        </div>
        <?php
        unset($_SESSION['user_profile']);
        }
        ?>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">                  
                            <?php
    
                            $sql = "SELECT * FROM bank WHERE user_id='$userid'";
                            $re = mysqli_query($con, $sql) or die (mysqli_error($con));
                            $row=mysqli_fetch_array($re)
                
                            ?>

                            <?php                                      
                              if(mysqli_num_rows($re)==0)
                                {
                            ?>
                                    <a href="bank-details-add.php" class="btn btn-success"><i class="fa fa-plus"> </i> Add Bank Account</a>
                            <?php
                                }
                                else
                                {
                                    echo "Bank Account Details";
                                }
                            ?>
                            
                            </div>
                        <div class="card-body table-responsive">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Address.</th>
                                    <th>Aadhar Nos.</th>
                                    <th>Pan Nos.</th>
                                    <th>Account Name</th>
                                    <th>Account Number</th>
                                    <th>Bank Name</th>
                                    <th>IFSC Code</th>
                                </tr>
                            </thead>
                    
                            <tbody>
                                <tr>

                            <?php                                      
                              if(mysqli_num_rows($re)==1)
                                {
                            ?>
                                    <td><?php echo $row['address']; ?></td>
                                    <td><?php echo $row[6]; ?></td>
                                    <td><?php echo $row[7]; ?></td>
                                    <td><?php echo ucfirst($row[2]); ?></td>
                                    <td><?php echo ucfirst($row[3]); ?></td>
                                    <td><?php echo ucfirst($row[4]); ?></td>
                                    <td><?php echo ucfirst($row[5]); ?></td>
                             <?php 
                                }
                                else
                                {
                            ?>
                                    <td colspan="7">Please Add Bank Account</td> 
                            <?php
                                }
                             ?>      
                                </tr>
                            </tbody>
                        </table>
                     </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

</div><!-- /#right-panel -->
<?php include('footer.php') ?>