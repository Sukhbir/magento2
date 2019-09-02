<?php include('header.php'); ?>

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

        <?php
        if(isset($_SESSION['new_e_pin_request']))
        {
        ?>
        <div class="breadcrumbs bg-success">
            <div>
                <div class="page-header text-center text-white bg-success">
                    <div class="page-title">
                        <h1><?php echo $_SESSION['new_e_pin_request']; ?></h1>
                    </div>
                </div>
            </div>
        </div>
        <?php
        unset($_SESSION['new_e_pin_request']);
        }
        ?>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
<!--                                <button type="button" class="btn btn-primary">Active</button>
                                    <button type="button" class="btn btn-primary">Inactive</button> -->
                                    <a href="add-new-e-pin.php" class="btn btn-success"><i class="fa fa-plus"> </i> Add New E-Pin Request</a>
                                    
                            </div>
                        <div class="card-body table-responsive">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Epin</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                    
                            <tbody>
                                  <?php
                                  $username=$_SESSION['userlogin'];
                                  $sql = "SELECT * FROM e_pin WHERE user_id='$username'";
                                  $re = mysqli_query($con, $sql) or die (mysqli_error($con));
                                  $i=1;
                                  while ($row=mysqli_fetch_assoc($re))
                                    {
                                  ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row['e_pin']; ?></td>
                                    <td><?php if($row['status']=='0') { echo "Active"; } elseif($row['status']=='1') { echo "Used"; } else { echo "Inactive"; } ; ?></td>
                                </tr>
                                  <?php
                                  $i++;
                                  }
                                  ?>
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