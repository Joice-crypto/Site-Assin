<?php
  require_once('lib/Mobile_Detect.php');
  require_once('lang/common.php');
  require_once('panel/app/GalleryImageController.php');

  $GalleryImageController = new GalleryImageController();
  $GalleryImagesArray = $GalleryImageController->getGalleryImages();

  $Detection = new Mobile_Detect;

  if($Detection->isMobile()) {
    /*header('location: gallery_m.php');
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
      <div class="content">
        <h1 class="text-center mt-3 mb-4">Galeria</h1>
        <div class="container">
          <?php for ($i = 0; $i < count($GalleryImagesArray); $i++) { ?>
            <div class="float-left mr-2 mb-2 img-gallery"><a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="" data-caption="<?php echo $GalleryImagesArray[$i]->getGImageDescription(); ?>" data-image="assets/pictures/gallery/<?php echo $GalleryImagesArray[$i]->getGImageName(); ?>" data-target="#image-gallery"><img class="img-responsive" src="assets/pictures/gallery/<?php echo $GalleryImagesArray[$i]->getGImageName(); ?>" height="100%"></a></div>
          <?php } ?>
        </div>
      </div>
    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php include_once("common/footer.php"); ?>

    <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="image-gallery-title"></h4>
          </div>
          <div class="modal-body">
            <img id="image-gallery-image" class="img-responsive" src="">
          </div>
          <div class="modal-footer">
            <!--<div class="col-md-2">
              <button type="button" class="btn btn-primary" id="show-previous-image">Anterior</button>
            </div>-->
            <div class="col-md-12 text-justify" id="image-gallery-caption">
              This text will be overwritten by jQuery
            </div>
            <!--<div class="col-md-2">
              <button type="button" id="show-next-image" class="btn btn-default">Próximo</button>
            </div>-->
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/base.js"></script>
  </body>

</html>
