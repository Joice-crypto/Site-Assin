<?php
  require_once("app/GeneralSettingController.php");

  $GeneralSettingController = new GeneralSettingController();

  $GeneralSettingModel = $GeneralSettingController->getGeneralSetting("institutional_video");
?>

<!DOCTYPE html>
<html lang="pt">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ASSIN - Vídeo Institucional</title>

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
            <li class="breadcrumb-item active">Vídeo Institucional</li>
          </ol>

          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Vídeo Atual
            </div>
            <div class="card-body text-center" style="height: 400px">
                <iframe class="h-100 w-50 rounded" src="<?php echo $GeneralSettingModel->getGeneralSettingValue(); ?>" frameborder="0" allow="encrypted-media" allowfullscreen></iframe>
            </div>
          </div>

          <!--<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Atualizar vídeo
            </div>
            <div class="card-body">
                <form id="videoForm" class="form-inline">
                    <div class="form-group mb-2">
                        <label for="inputLink">YouTube Link: </label>
                        <input type="text" class="form-control mx-3" name="inputLink" id="inputLink" value="<?php echo $GeneralSettingModel->getGeneralSettingValue(); ?>">
                    </div>
                    <button class="btn btn-primary mb-2" type="button" onclick="editVideoLink();">Salvar</button>     
                </form>
            </div>
          </div>-->
          
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Atualizar Vídeo Institucional
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-10 my-auto">
                  <form id="videoForm">
                    <input type="text" class="form-control mx-3 text-left" placeholder="YouTube Link" name="inputLink" id="inputLink" value="<?php echo $GeneralSettingModel->getGeneralSettingValue(); ?>">               
                  </form>
                </div>
                <div class="col-sm-2">
                  <button class="btn btn-primary w-100" type="button" onclick="editVideoLink();">Salvar</button>
                </div>
              </div>
            </div>
          </div>

          <div id="Alerts" class="mt-3">
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
    <script src="js/jquery-validation/dist/additional-methods.js"></script>
    <script src="js/validation.js"></script>
  </body>

</html>
