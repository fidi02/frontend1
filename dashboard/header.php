<?php include("language.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Crypo</title>
  <link rel="icon" href="assets/img/favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body id="dark">
  <header class="dark-bb">
    <nav class="navbar navbar-expand-lg">
      <a class="navbar-brand" href="index.php"><img src="assets/img/logo-light.png" alt="logo"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#headerMenu"
        aria-controls="headerMenu" aria-expanded="false" aria-label="Toggle navigation">
        <i class="icon ion-md-menu"></i>
      </button>

      <div class="collapse navbar-collapse" id="headerMenu">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown">
            <a class="nav-link" href="index.php" role="button" aria-haspopup="true"
              aria-expanded="false">
              <?= lang("Dashboard")?>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="stock.php" role="button"  aria-haspopup="true"
              aria-expanded="false">
              <?= lang("Stock")?>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="rates.php" role="button"  aria-haspopup="true"
              aria-expanded="false">
              <?= lang("Stock")?>
            </a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item header-custom-icon">
            <a class="nav-link" href="#" id="clickFullscreen">
              <i class="icon ion-md-expand"></i>
            </a>
          </li>
          <li class="nav-item dropdown header-custom-icon">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">
              <img src="assets/img/<?= $_SESSION['lang']?>.png" width="20"alt="">
              <!-- <span class="circle-pulse"></span> -->
            </a>
            <div class="dropdown-menu">
              <div class="dropdown-body">
                <a href="?lang=en" class="dropdown-item">
                  <div class="icon">
                    <img src="assets/img/en.png">
                  </div>
                  <div class="content">
                    <p>English</p>
                  </div>
                </a>
                <a href="?lang=de" class="dropdown-item">
                  <div class="icon">
                    <img src="assets/img/de.png">
                  </div>
                  <div class="content">
                    <p>German</p>
                  </div>
                </a>
              </div>
            </div>
          </li>
          <li class="nav-item dropdown header-img-icon">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">
              <img src="../uploads/<?php echo $userDetails['avatar'];?>"  style="border-radius: 50%;width:35px;"  alt="avatar">
            </a>
            <div class="dropdown-menu">
              <div class="dropdown-header d-flex flex-column align-items-center">
                <div class="figure mb-3">
                  <img src="../uploads/<?php echo $userDetails['avatar'];?>"  style="border-radius: 50%;width:150px;" alt="">
                </div>
                <div class="info text-center">
                  <p class="name font-weight-bold mb-0"><?php echo $userDetails['emri']." ".$userDetails['mbiemri'];?></p>
                  <p class="email text-muted mb-3"><?php echo $userDetails['email'];?></p>
                </div>
              </div>
              <div class="dropdown-body">
                <ul class="profile-nav">
                  <li class="nav-item">
                    <a href="profile.php" class="nav-link">
                      <i class="icon ion-md-person"></i>
                      <span><?= lang("Profile")?></span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="deposit.php" class="nav-link">
                      <i class="icon ion-md-wallet"></i>
                      <span><?= lang("My Wallet")?></span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="settings.php" class="nav-link">
                      <i class="icon ion-md-settings"></i>
                      <span><?= lang("Settings")?></span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="logout.php" class="nav-link red">
                      <i class="icon ion-md-power"></i>
                      <span><?= lang("Log Out")?></span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </nav>
  </header>