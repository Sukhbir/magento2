<?php include('header.php'); ?>


                  <div class="col-lg-6">
                    <div class="card">
                      <div class="card-header">E-Wallet Deposit Fund</div>
                      <div class="card-body card-block">
                        <form action="code/e-wallet.php" method="post" class="">
                              
                                <div class="form-group">
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-rupee"></i></div>
                                      <input type="number" id="fund" name="fund" placeholder="Deposit Fund" class="form-control">
                                    </div>
                                </div>
                         <div class="form-actions form-group"><button type="submit" class="btn btn-success" name="deposit_fund" id="deposit_fund"><i class="fa fa-plus"> </i> Deposit Fund</button></div>
                        </form>
                      </div>
                    </div>
                  </div>

<?php include('footer.php') ?>