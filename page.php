<?php
  require_once('lib/Mobile_Detect.php');
  require_once('lang/common.php');
  require_once('panel/app/HighlightController.php');
  require_once('panel/app/CardController.php');
  require_once('panel/app/PageController.php');

  if(!isset($_GET["type"]) || !isset($_GET["id"]) || !is_numeric($_GET["type"]) || !is_numeric($_GET["id"])) {
    header("location: 404.php");
    exit();
  }

  $Detection = new Mobile_Detect;

  if($Detection->isMobile()) {
    /*header('location: article_m.php');
    exit();*/
  }

  if($_GET["type"] === "1") {
    $HighlightController = new HighlightController();
    $Highlight = $HighlightController->getHighlight($_GET["id"], $lang["CURRENT_LANG_ISO"]);
    if(!is_null($Highlight)) {
      $LoadData = array("title"       => $Highlight->getHighlightTitle(),
                        "content"     => $Highlight->getHighlightContent(),
                        "date"        => $Highlight->getHighlightDate(),
                        "lastedition" => $Highlight->getHighlightLastEditionDate());
    } else {
      header("location: 404.php");
      exit();
    }
  } else if ($_GET["type"] === "2") {
    $CardController = new CardController();
    $CardModel = $CardController->getCard($_GET["id"], $lang["CURRENT_LANG_ISO"]);
    if (!is_null($CardModel)) {
      $LoadData = array("title"       => $CardModel->getCardName(),
                        "content"     => $CardModel->getCardContent(),
                        "date"        => $CardModel->getCardDate(),
                        "lastedition" => $CardModel->getCardLastEditionDate());
    } else {
      header("location: 404.php");
      exit();
    }
  } else if ($_GET["type"] === "3") {
    $PageController = new PageController();
    $PageModel = $PageController->getPage($_GET["id"], $lang["CURRENT_LANG_ISO"]);

    if (!is_null($PageModel)) {
      $LoadData = array("title"       => $PageModel->getPageTitle(),
                        "content"     => $PageModel->getPageContent(),
                        "date"        => $PageModel->getPageDate(),
                        "lastedition" => $PageModel->getPageLastEditionDate());
    } else {
      header("location: 404.php");
      exit();
    }
  } else {
    header("location: 404.php");
    exit();
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
      <div class="content">
        <h1 class="text-center mt-3 mb-4"><?php echo $LoadData["title"]; // CARD DO IDIOMAS SEM FRONTEIRAS ?></h1>  
        
        <div style="word-break: break-all;">
          <?php echo $LoadData["content"]; ?>
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
