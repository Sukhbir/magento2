<?php include('header.php'); ?>

 <?php
        if(isset($_SESSION['new_e_pin_request']))
        {
        ?>
        <div class="breadcrumbs bg-danger">
            <div>
                <div class="page-header text-center text-white bg-danger">
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
                  <div class="col-lg-6">
                    <div class="card">
                      <div class="card-header">Add New E-Pin</div>
                      <div class="card-body card-block">
                        <form action="code/e-pin.php" method="post" class="">
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-dollar"></i></div>
                           
                              <select name="epinvalue" id="epinvalue" class="form-control">
                                <option selected value="0" disabled>Amount</option> 
                                <?php
                                  $sql = "SELECT * FROM e_pin_setting order by e_pin_values ASC";
                                  $re = mysqli_query($con, $sql) or die (mysqli_error($con));
                                  while ($row=mysqli_fetch_assoc($re))
                                    {
                                ?>
                                      
                                      <option value="<?php echo $row['e_pin_values']; ?>"><?php echo $row['e_pin_values']; ?></option>
                                <?php
                                    }
                                ?>
                              </select>
                            </div>
							           </div>
							
<!--						  <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-calculator"></i></div>
                              <input type="text" id="Count" name="count" placeholder="Count" class="form-control">
                            </div>
                          </div>
						  <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                              <input type="date" id="date" name="date" placeholder="" class="form-control">
                            </div>
                          </div>
-->						  
						 <div class="form-actions form-group"><button type="submit" class="btn btn-success" name="addnew_e_pin" id="addnew_e_pin"><i class="fa fa-plus"> </i> Add E-Pin</button></div>
                        </form>
                      </div>
                    </div>
                  </div>

<?php include('footer.php') ?>