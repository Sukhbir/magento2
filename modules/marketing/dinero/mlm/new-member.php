<?php include('header.php'); ?>
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
                    
                    <div class="card">
                      <div class="card-header">Add New Member</div>
                      <div class="card-body card-block">
                        <form action="code/member.php" method="post" class="">
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-user"></i></div>
                              <input type="text" id="fname" name="fname" placeholder="First name" class="form-control">
                            </div>
                          </div>

						              <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-user"></i></div>
                              <input type="text" id="sname" name="lname" placeholder="Lastname" class="form-control">
                            </div>
                          </div>
<!--                           <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-user"></i></div>
                              <input type="text" id="uname" name="uname" placeholder="Username" class="form-control">
                            </div>
                          </div> -->
                          
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                              <input type="email" id="email" name="email" placeholder="Email" class="form-control">
                            </div>
                          </div>
						  <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-phone-square"></i></div>
                              <input type="text" id="mnumber" name="mobile_number" placeholder="Mobile Number" class="form-control">
                            </div>
                          </div>
						  <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-rupee"></i></div>
                            
                            <?php
                            $sql = "SELECT * FROM enrollment_pack";
                            $re = mysqli_query($con, $sql) or die (mysqli_error($con));
                            ?>

                              <select name="enrollment_fee" id="select" class="form-control">
                                <option value="0">Enrollment Fee</option>
                            <?php
                                while ($row=mysqli_fetch_assoc($re))
                                {
                            ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['enrollment_title']; ?> (Rs. <?php echo $row['enrollment_price']; ?>)</option>
                            <?php
                                }
                            ?>
                              </select>
                            </div>
							       
              </div>
          
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-map-pin"></i></div>

                                <?php
                                  $user_id=$_SESSION['userlogin'];
                                  $sql = "SELECT * FROM e_pin where user_id='$user_id' and status='0'";
                                  $re = mysqli_query($con, $sql) or die (mysqli_error($con));
                                  ?>

                              <select name="e_pin" id="e_pin" class="form-control">
                                    <option value="0">E-Pin</option>
                                      
                                      <?php
                                          while ($row=mysqli_fetch_assoc($re))
                                          {
                                      ?>
                                              <option value="<?php echo $row['e_pin']; ?>"><?php echo $row['e_pin']; ?>
                                              </option>
                                    
                                      <?php
                                          }
                                      ?>
                                  </select>
                            </div>
                          </div>
					
          		<div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-users"></i></div>
                              <input type="text" id="sponsor" name="sponsor" placeholder="Sponsor" value="<?php echo strtoupper($_SESSION['userlogin']); ?>" class="form-control">
                            </div>
                          </div>
						  <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-location-arrow"></i></div>
                           
                              <select name="position" id="select" class="form-control">
                                <option value="0" disabled="" selected="">Position</option>
                                <option value="left">Left</option>
                                <option value="right">Right</option>
                              </select>
                            </div>
							</div>
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                              <input type="password" id="password" name="password" placeholder="Password" class="form-control">
                            </div>
                          </div>

						  <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                              <input type="password" id="cpassword" name="cpassword" placeholder="Confirm Password" class="form-control">
                            </div>
                          </div>
                          <div class="form-actions form-group"><button name="addnew_member" type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Add Member</button></div>
                        </form>
                      </div>
                    </div>
                  </div>
<?php include('footer.php') ?>