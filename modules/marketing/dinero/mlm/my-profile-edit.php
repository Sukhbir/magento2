<?php include('header.php'); ?>

                <?php
                $username=$_SESSION['userlogin'];
                $sql = "SELECT * FROM member WHERE uname='$username'";
                $re = mysqli_query($con, $sql) or die (mysqli_error($con));
                $row=mysqli_fetch_array($re);
                ?>

                  <div class="col-lg-6">
                    <div class="card">
                      <div class="card-header">Edit Profile</div>
                      <div class="card-body card-block">
                        <form action="code/member.php" method="post" class="">
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-user"></i></div>
                              <input type="text" id="fname" name="fname" placeholder="First name" class="form-control" value="<?php echo $row[1]; ?>">
                            </div>
                          </div>
						              
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-user"></i></div>
                              <input type="text" id="sname" name="lname" placeholder="Lastname" class="form-control" value="<?php echo $row[2]; ?>">
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                              <input type="email" id="email" name="email" placeholder="Email" class="form-control" value="<?php echo $row[4]; ?>">
                            </div>
                          </div>
						
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-phone-square"></i></div>
                              <input type="text" id="mnumber" name="mobile_number" placeholder="Mobile Number" class="form-control" value="<?php echo $row[5]; ?>">
                            </div>
                          </div>
        					
                          <div class="form-actions form-group"><button name="edit_profile" type="submit" class="btn btn-success"><i class="fa fa-pencil"> </i> Edit Profile</button></div>
                        </form>
                      </div>
                    </div>
                  </div>
<?php include('footer.php') ?>