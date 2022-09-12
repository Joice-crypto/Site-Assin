<?php
require_once('lib/Mobile_Detect.php');
require_once('common/cookie_message.php');
require_once('lang/common.php');
require_once('panel/app/CarouselImageController.php');
require_once('panel/app/HighlightController.php');
require_once('panel/app/CardController.php');
require_once('panel/app/DepoimentoController.php');
require_once('panel/app/GeneralSettingController.php');

$Detection = new Mobile_Detect;

if ($Detection->isMobile()) {
  /*header('location: index_m.php');
    exit();*/
}

$CarouselImageController = new CarouselImageController();
$CarouselImagesArray = $CarouselImageController->getCarouselImages();

$HighlightController = new HighlightController();
$HighlightsArray = $HighlightController->getLastestHighlights($lang["CURRENT_LANG_ISO"]);

$CardController = new CardController();
$CardsArray = $CardController->getCards($lang["CURRENT_LANG_ISO"]);

$GeneralSettingController = new GeneralSettingController();
$GeneralSettingModel = $GeneralSettingController->getGeneralSetting("institutional_video");
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
        <button type="button" class="btn btn-primary position-absolute cookie-button" onclick="CookieMessage();"><?php echo $lang['GOT_IT']; ?></button>
      </div>
    </div>
  <?php } ?>
  <!-- Page Content -->
  <div class="container">

    <?php require_once("common/header.php"); ?>

    <!-- Header -->
    <header class="business-header">
      <div id="carouselExampleControls" class="carousel slide h-100" data-ride="carousel">
        <div class="carousel-inner h-100">
          <?php for ($i = 0; $i < count($CarouselImagesArray); $i++) {
            if ($i == 0) { ?>
              <div class="carousel-item active">
                <img class="d-block w-100 carousel-img" src="assets/pictures/slides/<?php echo $CarouselImagesArray[$i]->getCImageName(); ?>">
              </div>
            <?php } else { ?>
              <div class="carousel-item">
                <img class="d-block w-100 carousel-img" src="assets/pictures/slides/<?php echo $CarouselImagesArray[$i]->getCImageName(); ?>">
              </div>
          <?php }
          } ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </header>

    <div class="row" style="min-height: 350px;">
      <div class="col-sm-8">
        <h2 class="mt-4">Highlights</h2>
        <div class="highlights-container rounded">
          <?php $LenHighlights = count($HighlightsArray);
          if ($LenHighlights == 0) {
          ?>
            <div class="row">
              <div class="col">
                <?php echo $lang['NO_HIGHLIGHTS']; ?>
              </div>
            </div>
            <?php
          }
          for ($i = 0; $i < $LenHighlights; $i++) {
            if ($LenHighlights - $i != 1) { ?>
              <div class="row mb-2">
              <?php } else { ?>
                <div class="row">
                <?php } ?>
                <div class="col-sm-3" height="30px">
                  <img src="assets/pictures/<?php echo $HighlightsArray[$i]->getHighlightThumbnail(); ?>" class="img-fluid rounded" />
                </div>
                <div class="col-sm-9" style="max-height: 160px;">
                  <p class="highlight-text a-dark"><?php echo substr($HighlightsArray[$i]->getHighlightDescription(), 0, 265) . " - <a href='page.php?type=1&id=" . $HighlightsArray[$i]->getHighlightID() . "'>" . $lang['READ_MORE'] . "</a>" ?></p>
                </div>
                </div>
              <?php } ?>
              </div>
        </div>
        <div class="col-sm-4">
        <div class="depoi-pagInicial">
        
        </div>
          <h2 class="mt-4"><?php echo $lang['INSTITUTIONAL_VIDEO']; ?></h2>
          <iframe class="h-75 w-100 rounded" src="<?php echo $GeneralSettingModel->getGeneralSettingValue(); ?>" frameborder="0" allow="encrypted-media" allowfullscreen></iframe>
        </div>
       
      




      </div>
      <!-- /.row -->

      

      <div class="row">

        <?php for ($i = 0; $i < 2; $i++) {  // controla quantos cards vao aparecer na tela 
        ?>
          <div class="col-sm-4 my-4">
            <div class="card">
              <img class="card-img-top" src="assets/pictures/cards/<?php echo $CardsArray[$i]->getCardThumbnail(); ?>" alt="">
              <div class="card-body">

                <h4 class="card-title"><?php echo $CardsArray[$i]->getCardName(); ?></h4>
                <p class="card-text"><?php echo  $CardsArray[$i]->getCardDescription(); ?></p>

              </div>
              <div class="card-footer">

                <a href="page.php?type=2&id=<?php echo $CardsArray[$i]->getCardID(); ?>" class="btn btn-primary"><?php echo $lang['READ_MORE']; ?></a>
              </div>
              

            </div>
           
          </div>
        <?php } ?>
        <?php require_once("./aaa.php")   ?>
        
      </div>
      
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php include_once("common/footer.php"); ?>

    <!-- Bootstrap core JavaScript -->
    
</body>

</html>