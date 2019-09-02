<?php include('header.php'); ?>

 <?php
        if(isset($_SESSION['e_wallet_transfer']))
        {
        ?>
        <div class="breadcrumbs bg-danger">
            <div>
                <div class="page-header text-center text-white bg-danger">
                    <div class="page-title">
                        <h1><?php echo $_SESSION['e_wallet_transfer']; ?></h1>
                    </div>
                </div>
            </div>
        </div>
        <?php
        unset($_SESSION['e_wallet_transfer']);
        }
        ?>
                  <div class="col-lg-6">
                    <div class="card">
                      <div class="card-header">Add New Member</div>
                      <div class="card-body card-block">
                        <form action="code/e-wallet.php" method="post" class="">
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-user"></i></div>
                              <input type="text" id="username" name="username" placeholder="Enter User Name" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-rupee"></i></div>
                              <input type="number" id="amount" name="amount" placeholder="Enter Amount" class="form-control">
                            </div>
                          </div>
                          <div class="form-actions form-group"><button name="e_wallet_transfer" type="submit" class="btn btn-success"><i class="fa fa-exchange"></i> Transfer Fund</button></div>
                        </form>
                      </div>
                    </div>
                  </div>
<?php include('footer.php') ?>