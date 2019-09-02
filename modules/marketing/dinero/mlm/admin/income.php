<?php include('header.php'); ?>

<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>View E-Pin Request</h1>
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
        if(isset($_SESSION['send_payment']))
        {
        ?>
        <div class="breadcrumbs bg-success">
            <div>
                <div class="page-header text-center text-white bg-success">
                    <div class="page-title">
                        <h1><?php echo $_SESSION['send_payment']; ?></h1>
                    </div>
                </div>
            </div>
        </div>
        <?php
        unset($_SESSION['send_payment']);
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
                                    <th>Userid</th>
                                    <th>Amount</th>
                                    <th>Send</th>
                                    </tr>

                                </tr>
                            </thead>                    
                                <tbody>
                                <?php
                                    $query = mysqli_query($con,"select * from income where current_bal>=100");
                                    if(mysqli_num_rows($query)>0){
                                        $i=1;
                                        while($row=mysqli_fetch_array($query)){
                                            $userid = $row['user_id'];
                                            $amount = $row['current_bal'];
                                            ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $userid; ?></td>
                                                <td><?php echo $amount; ?></td>
                                                <td><a class="btn btn-success" href="code/income.php?action=sent_payment&<?php echo 'userid='.$userid.'&amount='.$amount ?>">Send</a></td>
                                            </tr>
                                        <?php
                                            $i++;
                                        }
                                    }
                                    else{
                                    ?>
                                        <tr>
                                            <td colspan="5">No Pending Payment</td>
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