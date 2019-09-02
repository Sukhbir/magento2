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
                               <li><a href="#">Add New Enrollment Packages</a></li>
                                <li><a href="#">Table</a></li>
                                <li class="active">Data table</li>
                           </ol>
                        </div>
                      </div>
                  </div>
              
              </div>

                        <?php

                            $id=$_GET['id'];

                            $sql = "SELECT * FROM enrollment_pack where id='$id'";
                            $re = mysqli_query($con, $sql) or die (mysqli_error($con));
                            $row=mysqli_fetch_assoc($re);
                        ?>

                  <div class="col-lg-6">
                    <div class="card">
                      <div class="card-header">Edit Enrollment Packages</div>
                      <div class="card-body card-block">
                        
                        <form action="code/enrollment-packages.php" method="post" class="">
                          
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-book"></i></div>
                              <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                              <input type="text" id="enrollment_title" name="enrollment_title" placeholder="Enrollment Packages Title" value="<?php echo $row['enrollment_title']; ?>" class="form-control">
                            </div>
                          </div>
						              
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-rupee"></i></div>
                              <input type="number" id="enrollment_price" name="enrollment_price" placeholder="Enrollment Packages Price" value="<?php echo $row['enrollment_price']; ?>" class="form-control">
                            </div>
                          </div>            

                          <div class="form-actions form-group"><button type="submit" name="edit" class="btn btn-success"><i class="fa fa-refresh"></i> Edit Enrollment Packages</button>
                          <a href="manage-enrollment-packages.php" class="btn btn-primary"><i class="fa fa-times"></i> Cancel</a></div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
<?php include('footer.php') ?>