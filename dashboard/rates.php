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
  <div class="container-fluid mtb15">
    <div class="row">
      <div class="col-md-12">
        <!-- TradingView Widget BEGIN -->
        <div class="tradingview-widget-container">
          <div class="tradingview-widget-container__widget"></div>
          <script type="text/javascript"
            src="https://s3.tradingview.com/external-embedding/embed-widget-forex-cross-rates.js" async>
              {
                "width": "100%",
                  "height": 900,
                    "currencies": [
                      "EUR",
                      "USD",
                      "JPY",
                      "GBP",
                      "CHF",
                      "AUD",
                      "CAD",
                      "NZD",
                      "CNY",
                      "TRY",
                      "SEK",
                      "NOK",
                      "DKK",
                      "ZAR",
                      "HKD"
                    ],
                      "isTransparent": false,
                        "colorTheme": "dark",
                          "locale": "en"
              }
            </script>
        </div>
        <!-- TradingView Widget END -->
      </div>
    </div>
  </div>

  <script src="assets/js/jquery-3.4.1.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/amcharts-core.min.js"></script>
  <script src="assets/js/amcharts.min.js"></script>
  <script src="assets/js/Chart.bundle.min.js"></script>
  <script src="assets/js/custom.js"></script>
</body>

</html>