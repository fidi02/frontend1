<?php include 'header.php';
$str = file_get_contents('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
$json = json_decode($str, true);
$btc_price = ($json['bpi']['USD']["rate"]);

?>
   
<section class="admin-content">
        <div class="bg-dark ">
            <div class="container-fluid m-b-30">
                <div class="row">
                    <div class="text-white col-lg-6">
                        <div class="p-all-15">
                            <div class="text-overline m-t-10 opacity-75">
                                BTC price
                            </div>
                            <div class="d-md-flex m-t-20 align-items-center">
                                <div class="avatar avatar-lg my-auto mr-2">
                                    <div class="avatar-title bg-warning rounded-circle">
                                        <i class="mdi mdi-bitcoin "></i>
                                    </div>
                                </div>
                                <h1 class="display-4">
                                    <?=$btc_price ?>
                                </h1>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-12 p-b-60">
                        <!-- <div id="chart-09" class="chart-canvas invert-colors"></div> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row d-none  pull-up d-lg-flex">
                <?php
                $query = mysqli_query($conn,"SELECT * FROM coins");
                while($coin = mysqli_fetch_assoc($query)){
                    $sum = 0;
                    $get_price = mysqli_query($conn, "SELECT * FROM balance WHERE coin_id = '".$coin['id']."'");
                    while($price = mysqli_fetch_assoc($get_price)){
                        $sum += $price['balance'];
                    }
                    echo '<div class="col m-b-30">
                        <div class="card ">

                            <div class="card-body">
                                <div class="text-center p-t-30 p-b-20">
                                    <div class="text-overline text-muted opacity-75"><img src="../dashboard/assets/img/icon/'.$coin['coin_img'].'" width="30" class="mx-2">'.$coin['name'].'</div>
                                    <h1 class="text-success">'.$sum.' '.$coin['short'].'</h1>
                                </div>
                            </div>
                        </div>
                    </div>';
                }
                ?>
                
                <div class="col visible-xlg   m-b-30">
                    <div class="card ">

                        <div class="card-body">
                            <div class="card-controls">
                                <a href="#" class="badge badge-soft-danger"> <i class="mdi mdi-arrow-down"></i> 10 %</a>
                            </div>
                            <div class="text-center p-t-30 p-b-20">
                                <div class="text-overline text-muted opacity-75">
                                    EOS
                                </div>
                                <h1 class="text-danger">$ 9,540</h1>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-12 m-b-30">
                    <div class="row">
                        <div class="col-md-6 m-b-10">
                            <h3>Transactions</h3>

                        </div>

                        </div>
                        <div class="col-md-12">
                            <div class="card m-b-30">
                                <div class="">
                                    <div class="table-responsive">
                                        <table class="table table-borderless table-hover ">
                                            <thead>
                                            <tr>
                                                <th scope="col">#Transaction ID</th>
                                                <th scope="col">#User ID</th>
                                                <th scope="col">Currency</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Time</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $query = mysqli_query($conn,"SELECT * FROM  transactions WHERE status != 0 ORDER BY id DESC LIMIT 10");
                                            while($transaction = mysqli_fetch_assoc($query)){
                                                $coin_q = mysqli_query($conn,"SELECT * FROM coins WHERE id = '".$transaction['coin_id']."'");
                                                $coin = mysqli_fetch_assoc($coin_q);
                                                echo '<tr>
                                                    <td class="border-left border-strong border-'.($transaction['method'] == "deposit" ? "success":"danger").'">#'.$transaction['id'].'</td>
                                                    <td class="">#'.$transaction['user_id'].'</td>
                                                    <td>'.$coin['name'].'</td>
                                                    <td>'.$coin['short'].' '.$transaction['amount'].'</td>
                                                    <td>'.$transaction['created_at'].'</td>
                                                </tr>';
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>





<?php include 'footer.php';?>