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
 <div class="settings mtb15">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 col-lg-3">
          <div class="nav flex-column nav-pills settings-nav" id="v-pills-tab" role="tablist"
            aria-orientation="vertical">
            <a class="nav-link active" id="settings-profile-tab" data-toggle="pill" href="#settings-profile" role="tab"
              aria-controls="settings-profile" aria-selected="true"><i class="icon ion-md-person"></i> <?= lang("Profile")?></a>
          </div>
        </div>
        <div class="col-md-12 col-lg-9">
          <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="settings-profile" role="tabpanel"
              aria-labelledby="settings-profile-tab">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title"><?= lang("General Information")?></h5>
                  <div class="settings-profile">
                    <form method="POST" action="profileprocess.php" enctype="multipart/form-data">
                      <img src="../uploads/<?php echo $userDetails['avatar'];?>" style="border-radius: 50%;width:150px;" alt="avatar">
                      <div class="custom-file">
                        <input type="file" name="foto" class="custom-file-input" id="fileUpload">
                        <label class="custom-file-label" for="fileUpload"><?= lang("Choose avatar")?></label>
                      </div>
                      <div class="form-row mt-4">
                        <div class="col-md-6">
                          <label for="formFirst"><?= lang("First name")?></label>
                          <input id="formFirst" type="text" name="fname" class="form-control" value="<?php echo $userDetails['emri'];?>">
                        </div>
                        <div class="col-md-6">
                          <label for="formLast"><?= lang("Last name")?></label>
                          <input id="formLast" type="text" name="lname" class="form-control" value="<?php echo $userDetails['mbiemri'];?>">
                        </div>
                        <div class="col-md-6">
                          <label for="emailAddress"><?= lang("Email")?></label>
                          <input id="emailAddress" type="email" name="email" class="form-control" value="<?php echo $userDetails['email'];?>" readonly>
                        </div>
                        <div class="col-md-6">
                          <label for="phoneNumber"><?= lang("Phone")?></label>
                          <input id="phoneNumber" type="text" name="phone" class="form-control" value="<?php echo $userDetails['phone'];?>">
                        </div>
                        <div class="col-md-6">
                          <label for="selectLanguage"><?= lang("Language")?></label>
                          <select id="selectLanguage" name="language" class="custom-select">
                            <option selected><?= lang("English")?></option>
                            <option><?= lang("German")?></option>
                            
                          </select>
                        </div>
                        <div class="col-md-6">
                          <label for="selectCurrency"><?= lang("Currency")?></label>
                          <select id="selectCurrency" class="custom-select">
                            <option selected>USD</option>
                            <option>EUR</option>
                            <option>GBP</option>
                            <option>CHF</option>
                          </select>
                        </div>
                        <div class="col-md-12">
                          <input type="submit" value="<?= lang("Update")?>">
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title"><?= lang("Security Information")?></h5>
                  <div class="settings-profile">
                    <form method="POST" action="passwordprocess.php">
                      <div class="form-row">
                        <div class="col-md-6">
                          <label for="currentPass"><?= lang("Current password")?></label>
                          <input id="currentPass" type="password" class="form-control" placeholder="Enter your password">
                        </div>
                        <div class="col-md-6">
                          <label for="newPass"><?= lang("New password")?></label>
                          <input id="newPass" type="password" name="password" class="form-control" placeholder="Enter new password">
                        </div>
                        <div class="col-md-6">
                          <label for="securityOne"><?= lang("Security questions #1")?></label>
                          <select id="securityOne" class="custom-select">
                            <option selected><?= lang("What was the name of your first pet?")?></option>
                            <option><?= lang("What's your Mother's middle name?")?></option>
                            <option><?= lang("What was the name of your first school?")?></option>
                            <option><?= lang("Where did you travel for the first time?")?></option>
                          </select>
                        </div>
                        <div class="col-md-6">
                          <label for="securityAnsOne"><?= lang("Answer")?></label>
                          <input id="securityAnsOne" type="text" class="form-control" placeholder="Enter your answer">
                        </div>
                        <div class="col-md-6">
                          <label for="securityTwo"><?= lang("Security questions #2")?></label>
                          <select id="securityTwo" class="custom-select">
                            <option selected><?= lang("Choose...")?></option>
                            <option><?= lang("What was the name of your first pet?")?></option>
                            <option><?= lang("What's your Mother's middle name?")?></option>
                            <option><?= lang("What was the name of your first school?")?></option>
                            <option><?= lang("Where did you travel for the first time?")?></option>
                          </select>
                        </div>
                        <div class="col-md-6">
                          <label for="securityAnsTwo"><?= lang("Answer")?></label>
                          <input id="securityAnsTwo" type="text" class="form-control" placeholder="Enter your answer">
                        </div>
                        <div class="col-md-6">
                          <label for="securityThree"><?= lang("Security questions #3")?></label>
                          <select id="securityThree" class="custom-select">
                            <option selected><?= lang("Choose...")?></option>
                            <option><?= lang("What was the name of your first pet?")?></option>
                            <option><?= lang("What's your Mother's middle name?")?></option>
                            <option><?= lang("What was the name of your first school?")?></option>
                            <option><?= lang("Where did you travel for the first time?")?></option>
                          </select>
                        </div>
                        <div class="col-md-6">
                          <label for="securityFore"><?= lang("Answer")?></label>
                          <input id="securityFore" type="text" class="form-control" placeholder="Enter your answer">
                        </div>
                        <div class="col-md-12">
                          <input type="submit" value="<?= lang("Update")?>">
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
  </div>

  <script src="assets/js/jquery-3.4.1.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/amcharts-core.min.js"></script>
  <script src="assets/js/amcharts.min.js"></script>
  <script src="assets/js/custom.js"></script>
</body>

</html>