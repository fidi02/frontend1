<?php include 'header.php';?>
<section class="admin-content ">
        <div class="bg-dark m-b-30">
            <div class="container">
                <div class="row p-b-60 p-t-60">

                    <div class="col-md-6 text-white p-b-30">
                        <div class="media">
                            <div class="avatar avatar mr-3">
                                <div class="avatar-title bg-success rounded-circle mdi mdi-currency-usd  ">

                                </div>
                            </div>
                            <div class="media-body">
                                <h1>Transactions List </h1>
                                <p class="opacity-75"></p>
                            </div>
                        </div>

                    </div>
                    </div>
            </div>
        </div>
        <div class="pull-up">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row m-b-20">
                                    <div class="col-md-6 my-auto">
                                        <h4 class="m-0">Summary</h4>
                                    </div>
                                    <!-- <div class="col-md-6 text-right my-auto">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-white shadow-none js-datepicker"><i
                                                        class="mdi mdi-calendar"></i> Pick Date
                                            </button>

                                            <button type="button" class="btn btn-white shadow-none">All</button>
                                            <button type="button" class="btn btn-white shadow-none">Paid</button>
                                            <button type="button" class="btn btn-white shadow-none">UnPaid</button>
                                        </div>

                                    </div> -->
                                </div>
                                <?php
                                if(isset($_SESSION['error'])){
                                    echo "<div class='alert alert-danger'>".$_SESSION['error']."</div>";
                                    unset($_SESSION['error']);
                                }
                                ?>
                                <div class="row ">
                                    <div class="col-md-12 p-0">

                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead class="">
                                                <tr>
                                                    <th scope="col">No.</th>
                                                    <th scope="col"> Name</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Method</th>
                                                    <th scope="col">Payment Method</th>
                                                    <th scope="col">Amount</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col"></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                
                                                    <?php
                                                    $show = 10;
                                                    $count = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM transactions"));
                                                    $total = ceil($count / $show);
                                                    if (isset($_GET['page']) AND !empty($_GET['page']) AND is_numeric($_GET['page'])) {
                                                        $page = $_GET['page'];
                                                    } else {
                                                        $page = 1;
                                                    }
                                                    $page = ($page - 1) * $show;
                                                    $transactions = mysqli_query($conn, "SELECT * FROM transactions ORDER BY id DESC LIMIT ".$page.",".$show."" ) or die("mysqli error");
                                                    if (mysqli_num_rows($transactions) != 0) {
                                                        while($transaction = mysqli_fetch_assoc($transactions)){
                                                            if($transaction['status'] == 0){
                                                                $status = "warning";
                                                                $text = "Pending";
                                                            } elseif($transaction['status'] == 1) {
                                                                $status = "success";
                                                                $text = "Approved";
                                                            }else {
                                                                $status = "danger";
                                                                $text = "Declined";
                                                            }
                                                            $user = UserDataId($transaction['user_id']);
                                                            $coin = CoinData($transaction['coin_id']);

                                                            echo '<tr>
                                                                <td class="align-middle">'.$transaction['id'].'</td>
                                                                <td class="align-middle">'.$user['emri'].' '.$user['mbiemri'].'</td>
                                                                <td class="align-middle">'.$transaction['created_at'].'</td>
                                                                <td class="align-middle"><h6 class=" m-0">'.ucfirst($transaction['method']).'</h6></td>
                                                                <td class="align-middle"><h6 class=" m-0">'.explode("-",$transaction['payment_method'])[0].'</h6></td>
                                                                <td class="align-middle"><h6 class=" m-0">'.$transaction['amount'].' '.$coin['short'].'</h6></td>
                                                                <td class="align-middle"><h6 class=" m-0"><span class="text-'.$status.'"><i
                                                                class="mdi mdi-check-circle "></i>'.$text.'</h6></td>
                                                                <td class="align-middle">
                                                                    <div class="input-group ">
                                                                        <div class="input-group-prepend '.($transaction['status'] > 0 ? "d-none" : "s").' ">
                                                                            <a href="aproveprocess.php?action=approve&id='.$transaction['id'].'" class="mx-1 rounded btn btn-outline-success">Approve</a>
                                                                            <a href="aproveprocess.php?action=decline&id='.$transaction['id'].'" class="mx-1 rounded btn btn-outline-danger">Decline</a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>';
                                                        }
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-auto ml-auto">
                                        <div>
                                            <nav class="">
                                                <ul class="pagination">
                                                    <?php
                                                        if(isset($_GET['page'])){
                                                            $this_page = $_GET['page'];
                                                            
                                                        } else {
                                                            $this_page = 1;
                                                        }
                                                        $next = $this_page + 1;
                                                        $prev = $this_page - 1;
                                                    ?>
                                                    <li class="page-item <?php echo ($this_page == 1 ? "disabled":"") ?>">
                                                        <a class="page-link" href="transactions.php?page=<?php echo ($this_page > 1 ? $prev:"") ?>" tabindex="-1">Previous</a>
                                                    </li>
                                                    <?php
                                                        for ($i=1; $i <= $total; $i++) { 
                                                            if($this_page == $i){
                                                                echo '<li class="page-item active"><a class="page-link" href="transactions.php?page='.$i.'">'.$i.'</a></li>';
                                                            } else {
                                                                echo '<li class="page-item"><a class="page-link" href="transactions.php?page='.$i.'">'.$i.'</a></li>';

                                                            }
                                                        }
                                                    ?>
                                                    <li class="page-item <?php echo ($this_page == $total ? "disabled":"") ?>">
                                                        <a class="page-link" href="transactions.php?page=<?php echo ($this_page != $total ? $next:"") ?>">Next</a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
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