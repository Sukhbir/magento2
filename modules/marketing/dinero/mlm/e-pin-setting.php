<?php include('header.php') ?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>E-Pin Setting</h1>
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
        if(isset($_SESSION['e_pin_action']))
        {
        ?>
        <div class="breadcrumbs bg-success">
            <div>
                <div class="page-header text-center text-white bg-success">
                    <div class="page-title">
                        <h1><?php echo $_SESSION['e_pin_action']; ?></h1>
                    </div>
                </div>
            </div>
        </div>
        <?php
        unset($_SESSION['e_pin_action']);
        }
        ?>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title col-sm-3">E-Pin Setting</strong>
                                <a href="add-new-e-pin-setting.php" class="btn btn-success"><i class="fa fa-plus"></i> Add New</a>
                        <div class="card-body">
                        <?php

                            $sql = "SELECT * FROM e_pin_setting order by e_pin_values ASC";
                            $re = mysqli_query($con, $sql) or die (mysqli_error($con));

                        ?>
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>E-pin Values</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                    
                            <tbody>
                                <?php
                                while ($row=mysqli_fetch_assoc($re))
                                {
                                ?>
                                <tr>
                                    <td><?php echo $row['e_pin_values']; ?></td>
                                    <td><a href="code/e-pin.php?action=delete&id=<?php echo $row['id']; ?>" class="btn btn-danger"><i class="fa fas fa-trash"></i> Delete</a></td> 
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