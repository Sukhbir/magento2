<?php include('header.php');
$userid=$_SESSION['userlogin'];
?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1> E-Wallet Transactions</h1>
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
        if(isset($_SESSION['deposit_fund']))
        {
        ?>
        <div class="breadcrumbs bg-success">
            <div>
                <div class="page-header text-center text-white bg-success">
                    <div class="page-title">
                        <h1><?php echo $_SESSION['deposit_fund']; ?></h1>
                    </div>
                </div>
            </div>
        </div>
        <?php
        unset($_SESSION['deposit_fund']);
        }
        ?>
                  
	       <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">E-Wallet Transactions</strong>
                                
                            </div>
							
							
							
                        <div class="card-body table-responsive">
                  
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Dedit/Credit</th>
									<th>Remark</th>
									
                                </tr>
                            </thead>
                    
                            <tbody>
                            	<?php
                                  $sql = "SELECT * FROM e_wallet_transactions WHERE user_id='$userid' order by id desc";
                                  $re = mysqli_query($con, $sql) or die (mysqli_error($con));
                                  if(mysqli_num_rows($re)>0)
                                  {
                                  $i=1;
                                  while ($row=mysqli_fetch_assoc($re))
                                    {
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
									                  <td><?php echo $row['date']; ?></td>
                                    <td><i class="fa fa-rupee"></i> <?php echo $row['amount']; ?></td>
                                    <td><?php echo ucfirst($row['debit_credit']); ?></td>
                                    <td><?php echo ucfirst($row['remark']); ?></td>
								</tr>
                      			<?php
                      				$i++;
                      				}
                      			  }
                      			 else
                      			  {
                      			?>
                      			<tr>
                      				<td colspan="5">You didn't do any E-Wallet Transaction</td>
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

    <script src="assets/js/lib/data-table/datatables.min.js"></script>
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
    </script>