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
<div class="container-fluid mtb15 symbol-info">
    <div class="row">
      <div class="col-md-12">
        <!-- TradingView Widget BEGIN -->
        <div class="tradingview-widget-container">
          <div class="tradingview-widget-container__widget"></div>
          <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-info.js"
            async>
              {
                "symbol": "NYSE:PFE",
                  "width": "100%",
                    "locale": "en",
                      "colorTheme": "dark",
                        "isTransparent": false
              }
            </script>
        </div>
        <!-- TradingView Widget END -->
      </div>
      <div class="col-md-12">
        <!-- TradingView Widget BEGIN -->
        <div class="tradingview-widget-container">
          <div class="tradingview-widget-container__widget"></div>
          <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-info.js"
            async>
              {
                "symbol": "NASDAQ:NFLX",
                  "width": "100%",
                    "locale": "en",
                      "colorTheme": "dark",
                        "isTransparent": false
              }
            </script>
        </div>
        <!-- TradingView Widget END -->
      </div>
      <div class="col-md-12">
        <!-- TradingView Widget BEGIN -->
        <div class="tradingview-widget-container">
          <div class="tradingview-widget-container__widget"></div>
          <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-info.js"
            async>
              {
                "symbol": "NASDAQ:PYPL",
                  "width": "100%",
                    "locale": "en",
                      "colorTheme": "dark",
                        "isTransparent": false
              }
            </script>
        </div>
        <!-- TradingView Widget END -->

      </div>
      <div class="col-md-12">
        <!-- TradingView Widget BEGIN -->
        <div class="tradingview-widget-container">
          <div class="tradingview-widget-container__widget"></div>
          <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-info.js"
            async>
              {
                "symbol": "NYSE:BABA",
                  "width": "100%",
                    "locale": "en",
                      "colorTheme": "dark",
                        "isTransparent": false
              }
            </script>
        </div>
        <!-- TradingView Widget END -->
      </div>
       <div class="col-md-12">
        <!-- TradingView Widget BEGIN -->
        <div class="tradingview-widget-container">
          <div class="tradingview-widget-container__widget"></div>
          <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-info.js"
            async>
              {
                "symbol": "NASDAQ:TSLA",
                  "width": "100%",
                    "locale": "en",
                      "colorTheme": "dark",
                        "isTransparent": false
              }
            </script>
        </div>
        <!-- TradingView Widget END -->
      </div>
      <div class="col-md-12">
        <!-- TradingView Widget BEGIN -->
        <div class="tradingview-widget-container">
          <div class="tradingview-widget-container__widget"></div>
          <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-info.js"
            async>
              {
                "symbol": "NYSE:NKE",
                  "width": "100%",
                    "locale": "en",
                      "colorTheme": "dark",
                        "isTransparent": false
              }
            </script>
        </div>
        <!-- TradingView Widget END -->
      </div>
      <div class="col-md-12">
        <!-- TradingView Widget BEGIN -->
        <div class="tradingview-widget-container">
          <div class="tradingview-widget-container__widget"></div>
          <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-info.js"
            async>
              {
                "symbol": "NASDAQ:AAPL",
                  "width": "100%",
                    "locale": "en",
                      "colorTheme": "dark",
                        "isTransparent": false
              }
            </script>
        </div>
        <!-- TradingView Widget END -->
      </div>
      <div class="col-md-12">
        <!-- TradingView Widget BEGIN -->
        <div class="tradingview-widget-container">
          <div class="tradingview-widget-container__widget"></div>
          <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-info.js"
            async>
              {
                "symbol": "NYSE:BA",
                  "width": "100%",
                    "locale": "en",
                      "colorTheme": "dark",
                        "isTransparent": false
              }
            </script>
        </div>
        <!-- TradingView Widget END -->
      </div>
      <div class="col-md-12">
        <!-- TradingView Widget BEGIN -->
        <div class="tradingview-widget-container">
          <div class="tradingview-widget-container__widget"></div>
          <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-info.js"
            async>
              {
                "symbol": "NASDAQ:AMZN",
                  "width": "100%",
                    "locale": "en",
                      "colorTheme": "dark",
                        "isTransparent": false
              }
            </script>
        </div>
        <!-- TradingView Widget END -->
      </div>
      <div class="col-md-12">
        <!-- TradingView Widget BEGIN -->
        <div class="tradingview-widget-container">
          <div class="tradingview-widget-container__widget"></div>
          <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-info.js"
            async>
              {
                "symbol": "NASDAQ:MSFT",
                  "width": "100%",
                    "locale": "en",
                      "colorTheme": "dark",
                        "isTransparent": false
              }
            </script>
        </div>
        <!-- TradingView Widget END -->
      </div>
      <div class="col-md-12">
        <!-- TradingView Widget BEGIN -->
        <div class="tradingview-widget-container">
          <div class="tradingview-widget-container__widget"></div>
          <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-info.js"
            async>
              {
                "symbol": "NASDAQ:AMD",
                  "width": "100%",
                    "locale": "en",
                      "colorTheme": "dark",
                        "isTransparent": false
              }
            </script>
        </div>
        <!-- TradingView Widget END -->
      </div>
      <div class="col-md-12">
        <!-- TradingView Widget BEGIN -->
        <div class="tradingview-widget-container">
          <div class="tradingview-widget-container__widget"></div>
          <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-info.js"
            async>
              {
                "symbol": "NASDAQ:NFLX",
                  "width": "100%",
                    "locale": "en",
                      "colorTheme": "dark",
                        "isTransparent": false
              }
            </script>
        </div>
        <!-- TradingView Widget END -->
      </div>
      <div class="col-md-12">
        <!-- TradingView Widget BEGIN -->
        <div class="tradingview-widget-container">
          <div class="tradingview-widget-container__widget"></div>
          <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-info.js"
            async>
              {
                "symbol": "NASDAQ:FB",
                  "width": "100%",
                    "locale": "en",
                      "colorTheme": "dark",
                        "isTransparent": false
              }
            </script>
        </div>
        <!-- TradingView Widget END -->
      </div>
      <div class="col-md-12">
        <!-- TradingView Widget BEGIN -->
        <div class="tradingview-widget-container">
          <div class="tradingview-widget-container__widget"></div>
          <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-info.js"
            async>
              {
                "symbol": "NYSE:CCL",
                  "width": "100%",
                    "locale": "en",
                      "colorTheme": "dark",
                        "isTransparent": false
              }
            </script>
        </div>
        <!-- TradingView Widget END -->
      </div>
      <div class="col-md-12">
        <!-- TradingView Widget BEGIN -->
        <div class="tradingview-widget-container">
          <div class="tradingview-widget-container__widget"></div>
          <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-info.js"
            async>
              {
                "symbol": "NYSE:TSE",
                  "width": "100%",
                    "locale": "en",
                      "colorTheme": "dark",
                        "isTransparent": false
              }
            </script>
        </div>
        <!-- TradingView Widget END -->
      </div>
      <div class="col-md-12">
        <!-- TradingView Widget BEGIN -->
        <div class="tradingview-widget-container">
          <div class="tradingview-widget-container__widget"></div>
          <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-info.js"
            async>
              {
                "symbol": "NYSE:BRK.A",
                  "width": "100%",
                    "locale": "en",
                      "colorTheme": "dark",
                        "isTransparent": false
              }
            </script>
        </div>
        <!-- TradingView Widget END -->
      </div>
      <div class="col-md-12">
        <!-- TradingView Widget BEGIN -->
        <div class="tradingview-widget-container">
          <div class="tradingview-widget-container__widget"></div>
          <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-info.js"
            async>
              {
                "symbol": "NYSE:MA",
                  "width": "100%",
                    "locale": "en",
                      "colorTheme": "dark",
                        "isTransparent": false
              }
            </script>
        </div>
        <!-- TradingView Widget END -->
      </div>
      <div class="col-md-12">
        <!-- TradingView Widget BEGIN -->
        <div class="tradingview-widget-container">
          <div class="tradingview-widget-container__widget"></div>
          <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-info.js"
            async>
              {
                "symbol": "NYSE:DIS",
                  "width": "100%",
                    "locale": "en",
                      "colorTheme": "dark",
                        "isTransparent": false
              }
            </script>
        </div>
        <!-- TradingView Widget END -->
      </div>
      <div class="col-md-12">
        <!-- TradingView Widget BEGIN -->
        <div class="tradingview-widget-container">
          <div class="tradingview-widget-container__widget"></div>
          <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-info.js"
            async>
              {
                "symbol": "NYSE:BAC",
                  "width": "100%",
                    "locale": "en",
                      "colorTheme": "dark",
                        "isTransparent": false
              }
            </script>
        </div>
        <!-- TradingView Widget END -->
      </div>
      <div class="col-md-12">
        <!-- TradingView Widget BEGIN -->
        <div class="tradingview-widget-container">
          <div class="tradingview-widget-container__widget"></div>
          <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-info.js"
            async>
              {
                "symbol": "NYSE:HD",
                  "width": "100%",
                    "locale": "en",
                      "colorTheme": "dark",
                        "isTransparent": false
              }
            </script>
        </div>
        <!-- TradingView Widget END -->
      </div>
      <div class="col-md-12">
        <!-- TradingView Widget BEGIN -->
        <div class="tradingview-widget-container">
          <div class="tradingview-widget-container__widget"></div>
          <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-info.js"
            async>
              {
                "symbol": "NASDAQ:NVDA",
                  "width": "100%",
                    "locale": "en",
                      "colorTheme": "dark",
                        "isTransparent": false
              }
            </script>
        </div>
        <!-- TradingView Widget END -->
      </div>
      <div class="col-md-12">
        <!-- TradingView Widget BEGIN -->
        <div class="tradingview-widget-container">
          <div class="tradingview-widget-container__widget"></div>
          <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-info.js"
            async>
              {
                "symbol": "NYSE:DAL",
                  "width": "100%",
                    "locale": "en",
                      "colorTheme": "dark",
                        "isTransparent": false
              }
            </script>
        </div>
        <!-- TradingView Widget END -->
      </div>
      <div class="col-md-12">
        <!-- TradingView Widget BEGIN -->
        <div class="tradingview-widget-container">
          <div class="tradingview-widget-container__widget"></div>
          <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-info.js"
            async>
              {
                "symbol": "NYSE:BABA",
                  "width": "100%",
                    "locale": "en",
                      "colorTheme": "dark",
                        "isTransparent": false
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