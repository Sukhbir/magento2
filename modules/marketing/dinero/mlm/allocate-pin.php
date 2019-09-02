<?php include('header.php'); ?>


                  <div class="col-lg-6">
                    <div class="card">
                      <div class="card-header">Allocate Pin To User
					  <a href="your link here" style="float:right;"><i class="fa fa-refresh"></i></a>
					  
					  </div>
                      <div class="card-body card-block">
                        <form action="" method="post" class="">
                          
						  <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-user"></i></div>
                              <input type="text" id="username" name="username" placeholder="Username" class="form-control">
                            </div>
                          </div>
						  
						  <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-dollar"></i></div>
                           
                              <select name="select" id="select" class="form-control">
                                <option value="0">Select Amount</option>
                                <option value="1">$1</option>
                                <option value="2">$5</option>
                                <option value="3">$10</option>
								<option value="4">$20</option>
								<option value="3">$50</option>
                              </select>
                            </div>
							</div>
							<div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-calculator"></i></div>
                              <input type="text" id="Count" name="count" placeholder="E-Pin Count" class="form-control">
                            </div>
                          </div>
						  
							
						  <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                              <input type="date" id="date" name="date" placeholder="Expire Date" class="form-control">
                            </div>
                          </div>
						  
						 <div class="form-actions form-group"><button type="submit" class="btn btn-success btn-sm">Submit</button></div>
                        </form>
                      </div>
                    </div>
                  </div>

<?php include('footer.php') ?>