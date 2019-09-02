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

                  <div class="col-lg-6">
                    <div class="card">
                      <div class="card-header">Add New Enrollment Packages</div>
                      <div class="card-body card-block">
                        
                        <form action="code/enrollment-packages.php" method="post" class="">
                          
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-book"></i></div>
                              <input type="text" id="enrollment_title" name="enrollment_title" placeholder="Enrollment Packages Title" class="form-control">
                            </div>
                          </div>
						              
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-rupee"></i></div>
                              <input type="number" id="enrollment_price" name="enrollment_price" placeholder="Enrollment Packages Price" class="form-control">
                            </div>
                          </div>            

                          <div class="form-actions form-group"><button type="submit" name="addnew" class="btn btn-success"><i class="fa fa-plus"></i> Add Enrollment Packages</button>
                          <a href="manage-enrollment-packages.php" class="btn btn-primary"><i class="fa fa-times"></i> Cancel</a></div>
                        </form>
                      </div>
                    </div>
                  </div>
<?php include('footer.php') ?>