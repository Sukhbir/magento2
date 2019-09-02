<?php include('header.php');
$userid=$_SESSION['userlogin'];
?>

<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>View E-Pin</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Table</a></li>
                            <li class="active">Data table</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                        <div class="card-body table-responsive">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Pending Payment</th>
                                    <th>Received Payment</th>
                                </tr>
                            </thead>
                    
                            <tbody>
                                  <?php
                                  $sql = "SELECT * FROM income where user_id='$userid'";
                                  $re = mysqli_query($con, $sql) or die (mysqli_error($con));
                                  $pincome=0;
                                  $rincome=0;
                                  while ($row=mysqli_fetch_assoc($re))
                                    {
                                        $pincome=$pincome+$row['current_bal'];
                                    }
                                    ?>
                                    <tr>
                                    <td><?php echo $pincome; ?></td>
                                <?php  
                                  $sql = "SELECT * FROM income_received where user_id='$userid'";
                                  $re = mysqli_query($con, $sql) or die (mysqli_error($con));
                                  while ($row=mysqli_fetch_assoc($re))
                                    {
                                        $rincome=$rincome+$row['amount'];
                                    }
                                  ?>
                                    <td><?php echo $rincome; ?></td>
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