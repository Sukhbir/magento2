<?php include('header.php') ?>
                            <?php
                            $uname=$_SESSION['userlogin'];

                            function tree($userid){
                                global $con;
                                $data = array();
                                $query = mysqli_query($con,"select * from tree where user_id='$userid'");
                                $result = mysqli_fetch_array($query);
                                $data['left'] = $result['left'];
                                $data['right'] = $result['right'];                                
                                return $data;
                            }

                            function tree2($userid2){
                                global $con;
                                $data = array();
                                $query = mysqli_query($con,"select * from tree where user_id='$userid2'");
                                $result = mysqli_fetch_array($query);
                                $data2['left'] = $result['left'];
                                $data2['right'] = $result['right'];                                
                                return $data2;
                            }

                            $uname2='';

                            $total_count=10;
                            while($total_count>0)
                            {
                                $data=tree($uname);
                                $data2=tree2($uname2);

                                if($data['left']=='' && $data['right']=='' && $data2['left']=='' && $data2['right']=='')
                                {
                                    $total_count=0;
                                }
                                else
                                {
                                    if($data['left']!='' || $data['left']!='')
                                    {
                                        $downline[]= array ($data['left']);
                                        $downline[]= array ($data['right']);
                                    }

                                    if($data2['left']!='' || $data2['left']!='')
                                    {
                                        $downline[]= array ($data2['left']);
                                        $downline[]= array ($data2['right']);
                                    }

                                    $uname=$data['left'];
                                    $uname2=$data['right'];
                                }

                            }
                    ?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dwon-Line Members </h1>
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
        if(isset($_SESSION['user_action']))
        {
        ?>
        <div class="breadcrumbs bg-success">
            <div>
                <div class="page-header text-center text-white bg-success">
                    <div class="page-title">
                        <h1><?php echo $_SESSION['user_action']; ?></h1>
                    </div>
                </div>
            </div>
        </div>
        <?php
        unset($_SESSION['user_action']);
        }
        ?>
                  
	       <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Down-Line Members</strong>
                                
                            </div>
							
							
							
                        <div class="card-body table-responsive">
                  
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Member</th>
                                    <th>Position</th>
									<th>Enrollment Amount</th>
								    <th>Joined Date</th>
									<th>Title/Rank/Status</th>
                                </tr>
                            </thead>
                    
                            <tbody>
                            <?php
                            $i=1;
                            foreach ($downline as $downline) 
                            {
                                    $getuserid=$downline[0];
                                    $getusername= mysqli_query($con,"SELECT * FROM member where uname='$getuserid'") or die ("Error : ".mysqli_error($con));       
                                    $usernamerow=mysqli_fetch_array($getusername);
                            ?>
                                 <tr>
                                    <td><?php echo $i; ?></td>
									<td><?php echo $downline[0]; ?></td>
                                    <td><?php echo $usernamerow['fname']; ?></td>
                            <?php

                            $id=$usernamerow['enrollement_fee'];

                            $sql1 = "SELECT * FROM enrollment_pack where id='$id'";
                            $re1 = mysqli_query($con, $sql1) or die (mysqli_error($con));

                            $row1=mysqli_fetch_assoc($re1);     
                            ?>
                                    <td><?php echo $row1['enrollment_title']; ?> (Rs. <?php echo $row1['enrollment_price']; ?>)</td>
									<td><?php echo $usernamerow['datetime']; ?></td>
									<td><?php if($usernamerow['status']=='1') { echo "<a class='btn btn-success text-white'> Active </a>"; } ?> </td>
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