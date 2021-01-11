<?php include 'header.php';
if(!isset($_GET['id']) || empty($_GET['id'])){
    header("Location: users.php");
} else{
    $user = UserDataId($_GET['id']);
}
?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<section class="admin-content">
        <div class="bg-dark">
            <div class="container  m-b-30">
                <div class="row">
                    <div class="col-12 text-white p-t-40 p-b-90">

                        <h4 class="">
                            Balance for <?php echo $user['emri']." ".$user['mbiemri'] ?>
                        </h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="container  pull-up">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-body">
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-outline-danger mx-1" onclick="location.reload()">Reset</button>
                                <button class="btn btn-outline-success mx-1" id="save">Save</button>
                            </div>
                            <div class="table-responsive p-t-10">
                                    
                                <table id="example-multi" class="table   " style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Coin</th>
                                        <th>Amount</th>
                                        <th>New balance</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $query = mysqli_query($conn,"SELECT * FROM coins");
                                    while($coin = mysqli_fetch_assoc($query)){
                                        $get_balance = mysqli_query($conn, "SELECT * FROM balance WHERE user_id = '".$user['id']."' AND coin_id = '".$coin['id']."' LIMIT 1");
                                        if(mysqli_num_rows($get_balance)){
                                            $balance = mysqli_fetch_assoc($get_balance);
                                            $balance = $balance['balance']." ".$coin['short'];
                                        } else {
                                            $balance = 0.00." ".$coin['short'];
                                        }
                                        echo '
                                        <tr>
                                        <td>
                                            <img src="../dashboard/assets/img/icon/'.$coin['coin_img'].'" width="30">
                                            '.$coin['name'].' ('.$coin['short'].')
                                        </td>
                                        <td>'.$balance.'</td>
                                        <td class="text-center">
                                            <div class="input-group mb-3">
                                                <input type="number" value="'.explode(" ", $balance)[0].'" id="amount-'.$coin['short'].'" class="form-control" aria-describedby="addon-'.$coin['short'].'">
                                                <div class="input-group-append">
                                                <span class="input-group-text" id="addon-'.$coin['short'].'">'.$coin['short'].'</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>';
                                    }
                                    
                                    echo "<script>
                                    $('#save').click(function(){";
                                    $query = mysqli_query($conn,"SELECT * FROM coins");
                                    while($coin = mysqli_fetch_assoc($query)){
                                        echo "var ".$coin['short']." = $('#amount-".$coin['short']."').val();".PHP_EOL;
                                    }
                                    echo "var url = 'editBalance.php?user_id=".$user['id'];
                                    $query = mysqli_query($conn,"SELECT * FROM coins");
                                    $coins_num = mysqli_num_rows($query);
                                    $i = 1;
                                    while($coin = mysqli_fetch_assoc($query)){
                                        if($i == $coins_num){
                                            echo "&".$coin['short']."='+".$coin['short'];
                                        } else {
                                            echo "&".$coin['short']."='+".$coin['short']."+'";
                                        }
                                        $i++;
                                    }
                                    echo "

                                    $.ajax({
                                        data: 'GET',
                                        url: url,
                                        dataType: 'html',
                                        success:function(res){
                                            if(res == 0){
                                                location.href = 'users.php';
                                            } else {
                                                location.href = 'users.php';
                                            }
                                        }
                                    });
                                
                                    });</script>";
                                    ?>
                                    
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<div class="modal modal-slide-left  fade" id="siteSearchModal" tabindex="-1" role="dialog" aria-labelledby="siteSearchModal"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body p-all-0" id="site-search">
                <button type="button" class="close light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="form-dark bg-dark text-white p-t-60 p-b-20 bg-dots" >
                    <h3 class="text-uppercase    text-center  fw-300 "> Search</h3>

                    <div class="container-fluid">
                        <div class="col-md-10 p-t-10 m-auto">
                            <input type="search" placeholder="Search Something"
                                   class=" search form-control form-control-lg">

                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="bg-dark text-muted container-fluid p-b-10 text-center text-overline">
                        results
                    </div>
                    <div class="list-group list  ">


                        <div class="list-group-item d-flex  align-items-center">
                            <div class="m-r-20">
                                <div class="avatar avatar-sm "><img class="avatar-img rounded-circle"   src="assets/img/users/user-3.jpg" alt="user-image"></div>
                            </div>
                            <div class="">
                                <div class="name">Eric Chen</div>
                                <div class="text-muted">Developer</div>
                            </div>


                        </div>
                        <div class="list-group-item d-flex  align-items-center">
                            <div class="m-r-20">
                                <div class="avatar avatar-sm "><img class="avatar-img rounded-circle"
                                                                    src="assets/img/users/user-4.jpg" alt="user-image"></div>
                            </div>
                            <div class="">
                                <div class="name">Sean Valdez</div>
                                <div class="text-muted">Marketing</div>
                            </div>


                        </div>
                        <div class="list-group-item d-flex  align-items-center">
                            <div class="m-r-20">
                                <div class="avatar avatar-sm "><img class="avatar-img rounded-circle"
                                                                    src="assets/img/users/user-8.jpg" alt="user-image"></div>
                            </div>
                            <div class="">
                                <div class="name">Marie Arnold</div>
                                <div class="text-muted">Developer</div>
                            </div>


                        </div>
                        <div class="list-group-item d-flex  align-items-center">
                            <div class="m-r-20">
                                <div class="avatar avatar-sm ">
                                    <div class="avatar-title bg-dark rounded"><i class="mdi mdi-24px mdi-file-pdf"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <div class="name">SRS Document</div>
                                <div class="text-muted">25.5 Mb</div>
                            </div>


                        </div>
                        <div class="list-group-item d-flex  align-items-center">
                            <div class="m-r-20">
                                <div class="avatar avatar-sm ">
                                    <div class="avatar-title bg-dark rounded"><i
                                                class="mdi mdi-24px mdi-file-document-box"></i></div>
                                </div>
                            </div>
                            <div class="">
                                <div class="name">Design Guide.pdf</div>
                                <div class="text-muted">9 Mb</div>
                            </div>


                        </div>
                        <div class="list-group-item d-flex  align-items-center">
                            <div class="m-r-20">
                                <div class="avatar avatar-sm ">
                                    <div class="avatar avatar-sm  ">
                                        <div class="avatar-title bg-primary rounded"><i
                                                    class="mdi mdi-24px mdi-code-braces"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <div class="name">response.json</div>
                                <div class="text-muted">15 Kb</div>
                            </div>


                        </div>
                        <div class="list-group-item d-flex  align-items-center">
                            <div class="m-r-20">
                                <div class="avatar avatar-sm ">
                                    <div class="avatar avatar-sm ">
                                        <div class="avatar-title bg-info rounded"><i
                                                    class="mdi mdi-24px mdi-file-excel"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <div class="name">June Accounts.xls</div>
                                <div class="text-muted">6 Mb</div>
                            </div>


                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<?php include 'footer.php';?>