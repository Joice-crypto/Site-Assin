<?php
  require_once('lib/Mobile_Detect.php');
  require_once('lang/common.php');
  require_once('panel/app/SearchController.php');

  $Detection = new Mobile_Detect;

  if($Detection->isMobile()) {
    /*header('location: article_m.php');
    exit();*/
  }

  $SearchController = new SearchController();
  $SearchArray = $SearchController->SearchFor(filter_input(INPUT_GET, "query", FILTER_SANITIZE_URL), $lang["CURRENT_LANG_ISO"]);
?>
<!DOCTYPE html>
<html lang="<?php echo $lang['CURRENT_LANG_PREFIX']; ?>">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Assessoria Internacional UFSJ">
    <meta name="author" content="José Venâncio">

    <title><?php echo $lang['SITE_TITLE']; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/business-frontpage.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon">
  </head>

  <body>
      <?php if (!isset($_COOKIE["cookie_message"]) || $_COOKIE["cookie_message"] == "true") { ?>
      <div id="cookiemessage" class="cookie-message">
        <div class="cookie-text">
          <?php echo $lang['SITE_COOKIE']; ?>
          <a class="btn btn-primary position-absolute cookie-button" onclick="CookieMessage();"><?php echo $lang['GOT_IT']; ?></a>
        </div>
      </div>
      <?php } ?>
    <!-- Page Content -->
    <div class="container">
      <?php require_once("common/header.php"); ?>
      <div class="content">
        <h1 class="text-center mt-3 mb-4">Resultados da pesquisa</h1>
        <div class="w-100">
          <?php if (count($SearchArray) == 0) { ?>
            Nada foi encontrado
          <?php } else { ?>
            <?php for ($i = 0; $i < count($SearchArray); $i++) { ?>
              <div class="SearchItem rounded">
                <a href="#">
                  <div class="font-weight-bold float-left"><?php echo $SearchArray[$i]->getSearchTitle(); ?></div>
                  <div class="text-muted float-left mx-2"><?php echo $SearchArray[$i]->getSearchType(); ?></div>
                  <div class="w-100"><?php echo $SearchArray[$i]->getSearchText(); ?></div>
                </a>
              </div>
            <?php } ?>
          <?php } ?>
        </div>
      </div>
    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php include_once("common/footer.php"); ?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/base.js"></script>
  </body>

</html>
