<?php
  require_once("app/HighlightModel.php");
  require_once("app/HighlightController.php");

  $HighlightController = new HighlightController();

  if(isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $EditHighlight = $HighlightController->getHighlightAllLang($_GET["id"]);
    var_dump($EditHighlight);
  } else {
    header("location: 404.php");
    exit();
  }
?>
<!DOCTYPE html>
<html lang="pt">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ASSIN - Highlights</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <!-- RichText -->
    <link rel="stylesheet" href="js/Rich-Text-Editor-jQuery-RichText/src/richtext.min.css">
  </head>

  <body id="page-top">

    <!-- Navbar -->
    <?php require_once("common/header.php"); ?>

    <div id="wrapper">

      <!-- Sidebar -->
      <?php require_once("common/menu.php") ?>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Editar</li>
            <li class="breadcrumb-item active">Highlights</li>
            <li class="breadcrumb-item active"><?php  $EditHighlight->getHighlightTitle()["pt-br"]; ?></li>
          </ol>

          <form id="editHighlight">
            <input type="hidden" name="actionHighlight" value="edit">
            <input type="hidden" name="HighlightID" value="<?php echo $EditHighlight->getHighlightID(); ?>">
            <div class="form-group">
              <label for="InputTitle">T??tulo</label>
              <ul class="nav nav-tabs" id="Title" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="pt-BR-tab" data-toggle="tab" href="#title_portuguese" role="tab" aria-controls="portuguese" aria-selected="true">Portugu??s</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="en-US-tab" data-toggle="tab" href="#title_english" role="tab" aria-controls="english" aria-selected="false">Ingl??s</a>
                </li>
                <!-- <li class="nav-item">
                  <a class="nav-link" id="es-ES-tab" data-toggle="tab" href="#title_spanish" role="tab" aria-controls="spanish" aria-selected="false">Espanhol</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="fr-FR-tab" data-toggle="tab" href="#title_french" role="tab" aria-controls="french" aria-selected="false">Franc??s</a>
                </li> -->
              </ul>
              <div class="tab-content" id="TitleContent">
                <div class="tab-pane fade mt-1 show active" id="title_portuguese" role="tabpanel" aria-labelledby="pt-BR-tab">
                  <input type="text" name="txtTitlePT-BR" class="form-control" value="<?php echo $EditHighlight->getHighlightTitle()["pt-br"]; ?>">
                </div>
                <div class="tab-pane fade mt-1" id="title_english" role="tabpanel" aria-labelledby="en-US-tab">
                  <input type="text" name="txtTitleEN-US" class="form-control" value="<?php echo $EditHighlight->getHighlightTitle()["en-us"]; ?>">
                </div>
                <div class="tab-pane fade mt-1" id="title_spanish" role="tabpanel" aria-labelledby="es-ES-tab">
                  <input type="text" name="txtTitleES-ES" class="form-control" value="<?php echo $EditHighlight->getHighlightTitle()["es-es"]; ?>">
                </div>
                <div class="tab-pane fade mt-1" id="title_french" role="tabpanel" aria-labelledby="fr-FR-tab">
                  <input type="text" name="txtTitleFR-FR" class="form-control" value="<?php echo $EditHighlight->getHighlightTitle()["fr-fr"]; ?>">
                </div>
              </div>
            </div>
            <hr>
            <div class="form-group">
              <label for="InputDate">Data</label>
              <input type="text" name="txtDate" class="form-control" id="InputDate" value="<?php echo date('d/m/Y');?>" readonly>
            </div>
            <hr>
            <div class="form-group">
              <label for="InputDescription">Descri????o (M??x 512)</label>
              <ul class="nav nav-tabs" id="Description" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="pt-BR-tab" data-toggle="tab" href="#description_portuguese" role="tab" aria-controls="portuguese" aria-selected="true">Portugu??s</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="en-US-tab" data-toggle="tab" href="#description_english" role="tab" aria-controls="english" aria-selected="false">Ingl??s</a>
                </li>
                <!-- <li class="nav-item">
                  <a class="nav-link" id="es-ES-tab" data-toggle="tab" href="#description_spanish" role="tab" aria-controls="spanish" aria-selected="false">Espanhol</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="fr-FR-tab" data-toggle="tab" href="#description_french" role="tab" aria-controls="french" aria-selected="false">Franc??s</a>
                </li> -->
              </ul>
              <div class="tab-content" id="DescriptionContent">
                <div class="tab-pane fade mt-1 show active" id="description_portuguese" role="tabpanel" aria-labelledby="pt-BR-tab">
                  <textarea name="txtDescriptionPT-BR" class="form-control" maxlength="512"><?php echo $EditHighlight->getHighlightDescription()["pt-br"]; ?></textarea>
                </div>
                <div class="tab-pane fade mt-1" id="description_english" role="tabpanel" aria-labelledby="en-US-tab">
                  <textarea name="txtDescriptionEN-US" class="form-control" maxlength="512"><?php echo $EditHighlight->getHighlightDescription()["en-us"]; ?></textarea>
                </div>
                <div class="tab-pane fade mt-1" id="description_spanish" role="tabpanel" aria-labelledby="es-ES-tab">
                  <textarea name="txtDescriptionES-ES" class="form-control" maxlength="512"><?php echo $EditHighlight->getHighlightDescription()["es-es"]; ?></textarea>
                </div>
                <div class="tab-pane fade mt-1" id="description_french" role="tabpanel" aria-labelledby="fr-FR-tab">
                  <textarea name="txtDescriptionFR-FR" class="form-control" maxlength="512"><?php echo $EditHighlight->getHighlightDescription()["fr-fr"]; ?></textarea>
                </div>
              </div>
            </div>
            <hr>
            <div class="form-group">
              <div class="rounded">
                <img src="<?php echo "../assets/pictures/" . $EditHighlight->getHighlightThumbnail(); ?>" width="150px" height="100px">
              </div>
              <label for="InputThumb">Thumbnail</label>
              <input type="file" name="fileThumb" class="form-control-file" id="InputThumb">
            </div>
            <hr>
            <div class="form-group">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="pt-BR-tab" data-toggle="tab" href="#portuguese" role="tab" aria-controls="portuguese" aria-selected="true">Portugu??s</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="en-US-tab" data-toggle="tab" href="#english" role="tab" aria-controls="english" aria-selected="false">Ingl??s</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="es-ES-tab" data-toggle="tab" href="#spanish" role="tab" aria-controls="spanish" aria-selected="false">Espanhol</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="fr-FR-tab" data-toggle="tab" href="#french" role="tab" aria-controls="french" aria-selected="false">Franc??s</a>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade mt-1 show active" id="portuguese" role="tabpanel" aria-labelledby="pt-BR-tab">
                  <textarea id="txtContent-ptbr" name="txtContentPT-BR"><?php echo $EditHighlight->getHighlightContent()["pt-br"]; ?></textarea>
                </div>
                <div class="tab-pane fade mt-1" id="english" role="tabpanel" aria-labelledby="en-US-tab">
                  <textarea id="txtContent-enus" name="txtContentEN-US"><?php echo $EditHighlight->getHighlightContent()["en-us"]; ?></textarea>
                </div>
                <div class="tab-pane fade mt-1" id="spanish" role="tabpanel" aria-labelledby="es-ES-tab">
                  <textarea id="txtContent-eses" name="txtContentES-ES"><?php echo $EditHighlight->getHighlightContent()["es-es"]; ?></textarea>
                </div>
                <div class="tab-pane fade mt-1" id="french" role="tabpanel" aria-labelledby="fr-FR-tab">
                  <textarea id="txtContent-frfr" name="txtContentFR-FR"><?php echo $EditHighlight->getHighlightContent()["fr-fr"]; ?></textarea>
                </div>
              </div>
            </div>
          </form>

          <button type="button" class="btn btn-primary w-100 my-3" onclick="editHighlight();">Editar</button>

          <div id="Alerts">
          </div>
        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <?php require_once("common/footer.php"); ?>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php require_once("common/logoutmodal.php"); ?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <script src="js/front.js"></script>

    <!-- Validation plugin -->
    <script src="js/jquery-validation/dist/jquery.validate.js"></script>
    <script src="js/validation.js"></script>
    <script src="js/jquery-validation/dist/additional-methods.js"></script>
    
    <!-- RichText plugin -->
    <script src="js/Rich-Text-Editor-jQuery-RichText/src/jquery.richtext.js"></script>
    <script>
      $(document).ready(function() {
        $('#txtContent-ptbr').richText();
        $('#txtContent-enus').richText();
        $('#txtContent-eses').richText();
        $('#txtContent-frfr').richText();
        $(".topbox").prepend('<img src="../assets/images/menu-logo_menorainda.png" class="m-1 float-left" width="36px" height="36px">');
      });
    </script>
  </body>

</html>
