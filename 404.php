<?php
  require_once('lib/Mobile_Detect.php');
  require_once('lang/common.php');

  $Detection = new Mobile_Detect;

  if($Detection->isMobile()) {
    /*header('location: 404_m.php');
    exit();*/
  }
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
      <div class="content text-center">
          <h1 class="display-1">404</h1><p class="lead">Página não encontrada. Você pode <a href="javascript:history.back()">voltar</a> para a página anterior, ou <a href="index.php">voltar para a home</a>.</p>        
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
