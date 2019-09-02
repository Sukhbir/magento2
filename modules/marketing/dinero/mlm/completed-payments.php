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
                        <div class="card-body table-responsive">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                    
                            <tbody>
                            <?php 
                            $i=1;
                            $query = mysqli_query($con,"select * from income_received where user_id='$userid' order by id desc");
                            if(mysqli_num_rows($query)>0)
                            {
                                
                                while($row=mysqli_fetch_array($query))
                                {
                                    $amount = $row['amount'];
                                    $date = $row['date'];
                                ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $amount; ?></td>
                                        <td><?php echo $date; ?></td>
                                    </tr>
                                <?php
                                    $i++;
                                }
                            }
                            else
                            {
                            ?>
                                    <tr>
                                        <td colspan="4">You did'nt completed any payment yet.</td>
                                    </tr>
                            <?php
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