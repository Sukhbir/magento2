<?php include('header.php'); ?>
        
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Enrollment Packages</h1>
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
        if(isset($_SESSION['enrollment_action']))
        {
        ?>
        <div class="breadcrumbs bg-success">
            <div>
                <div class="page-header text-center text-white bg-success">
                    <div class="page-title">
                        <h1><?php echo $_SESSION['enrollment_action']; ?></h1>
                    </div>
                </div>
            </div>
        </div>
        <?php
        unset($_SESSION['enrollment_action']);
        }
        ?>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title col-sm-3">Menage Enrollment Packages</strong>
                                <a href="new-enrollment-packages.php" class="btn btn-success"><i class="fa fa-plus"></i> Add New Enrollment Packages</a>
                            </div>
                        <div class="card-body">
                  
                        <?php

                            $sql = "SELECT * FROM enrollment_pack";
                            $re = mysqli_query($con, $sql) or die (mysqli_error($con));

                        ?>

                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>Edit / Delete</th>
                                </tr>
                            </thead>
                    
                            <tbody>
                            <?php
                                while ($row=mysqli_fetch_assoc($re))
                                {
                            ?>
                            
                                <tr>
                                    <td><?php echo $row['enrollment_title']; ?></td>
                                    <td><i class="fa fa-dollar"></i> <?php echo $row['enrollment_price']; ?></td>
                                    <td><a href="edit-enrollment-packages.php?id=<?php echo $row['id']; ?>" class="btn btn-warning"><i class="fa fas fa-pencil"></i> Edit</a>
                                    <a href="code/enrollment-packages.php?action=delete&id=<?php echo $row['id']; ?>" class="btn btn-danger"><i class="fa fas fa-trash"></i> Delete</a></td>
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

    <!-- <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/pdfmake.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/lib/data-table/datatables-init.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
        } );
    </script> -->