<?php 
@session_start();
include('header.php'); ?>
                  <div class="col-lg-6">
                    
                    <?php
                        if(isset($_SESSION['errors']))
                        {
                    ?>
                        <div class='alert alert-danger'>
                             <?php echo $_SESSION['errors']; 
                                 unset($_SESSION['errors']);
                             ?>   
                        </div>  
                    <?php
                        }
                    ?>

                    <?php
                        if(isset($_SESSION['success']))
                        {
                    ?>
                        <div class='alert alert-success'>
                             <?php echo $_SESSION['success']; 
                                 unset($_SESSION['success']);
                             ?>   
                        </div>  
                    <?php
                        }
                    ?>

                    <div class="card">
                    <div class="card-header">Change Password</div>
                      <div class="card-body card-block">
                        <form action="code/change-password.php" method="post" class="">
                          
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-key"></i></div>
                              <input type="password" id="old_password" name="old_password" placeholder="Enter Old Password" class="form-control">
                            </div>
                          </div>

						              <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-key"></i></div>
                              <input type="password" id="new_password" name="new_password" placeholder="Enter New Password" class="form-control">
                            </div>
                          </div>                          
                          <div class="form-actions form-group"><button name="btn_password" type="submit" class="btn btn-success"><i class="fa fa-refresh"> </i> Change Password</button></div>
                        </form>
                      </div>
                    </div>
                  </div>
<?php include('footer.php') ?>