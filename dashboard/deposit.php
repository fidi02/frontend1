<?php
include '../config/db.php';
if (isset($_SESSION['sname'],$_SESSION['type'])) {
    if ($_SESSION['type'] == 'biznes') {
        // vazhdo
    } elseif ($_SESSION['type'] == 'admin') {
        header('location:../admin/index.php');
        exit;
    } 
} else {
    header('location:logout.php');
    exit;
}
$userDetails = UserData($_SESSION['sname']);
?>
<?php include 'header.php';?>
<script src="assets/js/jquery-3.4.1.min.js"></script>
<div class="settings mtb15">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 col-lg-3">
          <div class="nav flex-column nav-pills settings-nav" id="v-pills-tab" role="tablist"
            aria-orientation="vertical">
            <a class="nav-link active" id="settings-wallet-tab" data-toggle="pill" href="#settings-wallet" role="tab"
              aria-controls="settings-wallet" aria-selected="false"><i class="icon ion-md-wallet"></i> Wallet</a>
          </div>
        </div>
        <div class="col-md-12 col-lg-9">
          <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="settings-wallet" role="tabpanel"
              aria-labelledby="settings-wallet-tab">
              <div class="wallet">
                <div class="row">
                  <div class="col-md-12 col-lg-4">
                    <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                      <?php
                        $coins = mysqli_query($conn, "SELECT * FROM coins") or die("mysqli error");
                        if (mysqli_num_rows($coins) != 0) {
                          while($data = mysqli_fetch_assoc($coins)){
                            $balance = mysqli_query($conn , "SELECT * FROM balance WHERE coin_id =  ".$data['id']." AND user_id = ".$userDetails['id']." ");
                            if(mysqli_num_rows($balance) != 0){
                              $balance = mysqli_fetch_assoc($balance);
                              $coin_balance = $balance['balance'];
                            }else {
                              $coin_balance = 0;
                            }
                            echo '<a class="nav-link d-flex justify-content-between align-items-center '.($data['short'] == "BTC" ? "active" : "").' " data-toggle="pill"
                              href="#coin'.$data['short'].'" role="tab" aria-selected="true">
                              <div class="d-flex">
                                <img src="assets/img/icon/'.$data['coin_img'].'" alt="btc">
                                <div>
                                  <h2>'.$data['short'].'</h2>
                                  <p>'.$data['name'].'</p>
                                </div>
                              </div>
                              <div>
                                <h3>'.$coin_balance.'</h3>
                                <p class="text-right"><i class="icon ion-md-lock"></i> 0.0000000</p>
                              </div>
                            </a>';
                          }
                        }
                        
                      ?>
                    </div>
                  </div>
                  <div class="col-md-12 col-lg-8">
                    <div class="tab-content">
                      <?php
                        $query = mysqli_query($conn, "SELECT * FROM coins") or die("mysqli error");
                          if (mysqli_num_rows($query) != 0) {
                            while($data = mysqli_fetch_assoc($query)){
                              $balance = mysqli_query($conn , "SELECT * FROM balance WHERE coin_id =  ".$data['id']." AND user_id = ".$userDetails['id']." ");
                              if(mysqli_num_rows($balance) != 0){
                                $balance = mysqli_fetch_assoc($balance);
                                $coin_noextention = $balance['balance'];
                                $coin_balance = $balance['balance']." ".$data['short'];
                              }else {
                                $coin_balance = 0.00." ".$data['short'];
                              }
                              echo '<div class="tab-pane fade '.($data['short']=="BTC"?"active show":"").'" id="coin'.$data['short'].'" role="tabpanel">
                                <div class="card modal-content">
                                  <div class="card-body">
                                    <h5 class="card-title">Balances</h5>
                                    <ul>
                                      <li class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                          <i class="icon ion-md-cash"></i>
                                          <h2>Total Equity</h2>
                                        </div>
                                        <div>
                                          <h3>'.$coin_balance.'</h3>
                                        </div>
                                      </li>
                                    </ul>
                                    <button type="button" class="btn green" data-toggle="modal" data-target="#deposit'.$data['short'].'">Deposit</button>
                                    <button type="button" class="btn red" data-toggle="modal" data-target="#withdraw'.$data['short'].'">Withdraw</button>
                                  </div>
                                </div>
                                <div class="modal fade" id="deposit'.$data['short'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-body">
                                      <div class="card modal-content">
                                        <div class="tab-'.$data['short'].'">
                                          <div class="card-body">
                                          <h5 class="card-title">Wallet Deposit Address</h5>
                                          <div class="row wallet-address">
                                            <div class="col-md-12">
                                              <label for="amount">How much would you like to deposit? ('.$data['short'].')</label>
                                              <div class="input-group pt-1 mb-3">
                                                <input type="number" name="amount-'.$data['short'].'" class="form-control">
                                                <div class="input-group-append" aria-describedby="addon">
                                                  <span class="input-group-text bg-dark border-0 text-light" id="addon">'.$data['short'].'</span>
                                                </div>
                                              </div>
                                              <label for="wallet">Write your '.$data['short'].' wallet here</label>
                                              <div class="input-group pt-1 mb-3">
                                                <input type="text" class="form-control" name="wallet-'.$data['short'].'">
                                              </div>
                                              <div class="alert alert-danger" id="danger-'.$data['short'].'" style="display:none;">All fields are required</div>
                                            </div>
                                          </div>
                                        </div>
                                        </div>
                                        <div class="tab-'.$data['short'].'" style="display:none;">
                                          <div class="card-body">
                                            <h5 class="card-title">Wallet Deposit Address</h5>
                                            <div class="row wallet-address">
                                              <div class="col-md-8">
                                                <p>Send only <span id="coin-'.$data['short'].'"></span> '.$data['short'].' to the address below. Then click complete</p>
                                                <div class="input-group">
                                                  <input type="text" class="form-control" value="'.$data['address'].'">
                                                  <div class="input-group-prepend copy">
                                                    <button class="btn btn-primary">COPY</button>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="col-md-4">
                                                <img src="assets/img/'.$data['qr_code'].'" alt="qr-code">
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div id="buttons" class="d-block mx-auto">
                                          <button class="btn red" id="back-'.$data['short'].'" style="display:none;" >Back</button>
                                          <button class="btn green" id="next-'.$data['short'].'" >Next</button>
                                          <button class="btn green" id="complete-'.$data['short'].'" style="display:none;">Complete</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <script>
                                    $("#next-'.$data['short'].'").click(function(){
                                      if($("input[name='."amount-".$data['short'].']").val().length != "" && $("input[name='."wallet-".$data['short'].']").val().length != ""){
                                        $(".tab-'.$data['short'].':nth-child(2)").show();
                                        $(".tab-'.$data['short'].':nth-child(1)").hide();
                                        $("#back-'.$data['short'].'").show();
                                        $("#complete-'.$data['short'].'").show();
                                        $(this).hide();
                                        $("#coin-'.$data['short'].'").text($("input[name='."amount-".$data['short'].']").val());
                                      } else {
                                        $("#danger-'.$data['short'].'").show();
                                      }
                                    });
                                    
                                    $("#back-'.$data['short'].'").click(function(){
                                      $(".tab-'.$data['short'].':nth-child(2)").hide();
                                      $(".tab-'.$data['short'].':nth-child(1)").show();
                                      $(this).hide();
                                      $("#complete-'.$data['short'].'").hide();
                                      $("#next-'.$data['short'].'").show();
                                      $("#danger-'.$data['short'].'").hide();
                                    });

                                    $("#complete-'.$data['short'].'").click(function(){
                                      var coin = "'.$data['id'].'";
                                      var from = $("input[name='."wallet-".$data['short'].']").val()
                                      var amount = $("input[name='."amount-".$data['short'].']").val()
                                      console.log(coin,from,amount);
                                      $.ajax({
                                        data: "GET",
                                        url: "add_transaction.php?method=deposit&coin="+coin+"&from="+from+"&amount="+amount,
                                        dataType: "html",
                                        success: function(res){
                                          if(res == 1){
                                            location.reload();
                                          }
                                        }
                                      });
                                    });
                                  </script>
                                </div>
                                <div class="modal fade" id="withdraw'.$data['short'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-body">
                                      <div class="card modal-content">
                                        <div class="card-body">
                                          <h5 class="card-title">Wallet Deposit Address</h5>
                                          <div class="row wallet-address">
                                            <div class="col-md-12">
                                              <select name="payment-method-'.$data['short'].'" class="form-control mb-3">
                                                <option value="Bank-'.$data['short'].'">Bank Transfer</option>
                                                <option value="Crypto-'.$data['short'].'">Crypto</option>
                                                <option value="Paypal-'.$data['short'].'">Paypal</option>
                                              </select>
                                              <label for="amount">How much would you like to withdraw?</label>
                                              <div class="input-group pt-1 mb-3">
                                                <input type="number" name="withdraw-'.$data['short'].'" class="form-control">
                                                <div class="input-group-append" aria-describedby="addon">
                                                  <span class="input-group-text bg-dark border-0 text-light" id="addon">'.$data['short'].'</span>
                                                </div>
                                              </div>
                                              <label for="wallet">Write your '.$data['short'].' wallet here</label>
                                              <div class="input-group pt-1 mb-3">
                                                <input type="text" class="form-control" name="address-'.$data['short'].'">
                                              </div>
                                              <div class="alert alert-danger" id="withdanger-'.$data['short'].'" style="display:none;">All fields are required</div>
                                              <div class="alert alert-danger" id="nocoin-'.$data['short'].'" style="display:none;">You cant withdraw more than '.$coin_balance.'</div>
                                            </div>
                                          </div>
                                        </div>
                                        <div id="buttons" class="d-block mx-auto">
                                          <button class="btn green" id="withdraw-w-'.$data['short'].'">Complete</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <script>
                                    $("#withdraw-w-'.$data['short'].'").click(function(){
                                      var coin = "'.$data['id'].'";
                                      var adress = $("input[name='."address-".$data['short'].']").val();
                                      var amount = $("input[name='."withdraw-".$data['short'].']").val();
                                      var method = $("select[name='."payment-method-".$data['short'].']").val();
                                      if(adress.length != "" && amount.length != ""){
                                        if(amount > '.$coin_noextention.'){
                                          $("#nocoin-'.$data['short'].'").show();
                                        } else {
                                            $.ajax({
                                              data: "GET",
                                              url: "add_transaction.php?method=withdraw&coin="+coin+"&address="+adress+"&amount="+amount+"&pay_method="+method,
                                              dataType: "html",
                                              success: function(res){
                                                if(res == 1){
                                                  location.reload();
                                                }
                                              }
                                            });
                                        }
                                      } else {
                                        $("#withdanger-'.$data['short'].'").show();
                                      }
                                    });
                                  </script>
                                </div>
                                <div class="card">
                                  <div class="card-body">
                                    <h5 class="card-title">Latest Transactions</h5>
                                    <div class="wallet-history">
                                      <table class="table">
                                        <thead>
                                          <tr>
                                            <th>No.</th>
                                            <th>Method</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Amount</th>
                                          </tr>
                                        </thead>
                                        <tbody>';
                                            $transactions = mysqli_query($conn, "SELECT * FROM transactions WHERE coin_id = ".$data['id']." ORDER BY id DESC") or die("mysqli error");
                                            if (mysqli_num_rows($transactions) != 0) {
                                            while($transaction = mysqli_fetch_assoc($transactions)){
                                              if($transaction['status'] == 0){
                                                $status = "yellow";
                                                $text = "Pending";
                                              } elseif($transaction['status'] == 1) {
                                                $status = "green";
                                                $text = "Approved";
                                              }else {
                                                $status = "red";
                                                $text = "Declined";
                                              }
                                              echo '<tr>
                                                <td>#'.$transaction['id'].'</td>
                                                <td>'.ucfirst($transaction['method']).'</td>
                                                <td>'.$transaction['created_at'].'</td>
                                                <td><i class="icon ion-md-checkmark-circle-outline '.$status.'"></i> '.$text.'</td>
                                                <td>'.$transaction['amount'].'</td>
                                              </tr>';
                                              }
                                            }
                                        echo'</tbody>
                                      </table>
                                    </div>
                                  </div>
                                </div>
                              </div>';
                            }
                          }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <!-- <script src="assets/js/amcharts-core.min.js"></script> -->
  <!-- <script src="assets/js/amcharts.min.js"></script> -->
  <!-- <script src="assets/js/jquery.mCustomScrollbar.js"></script> -->
  <script src="assets/js/custom.js"></script>
  <script>
    $(".copy").click(function(){
      $(this).siblings("input").select();
      document.execCommand("copy");
    });
  </script>