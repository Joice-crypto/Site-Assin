<?php
  require_once("app/GalleryImageController.php");

  $GalleryImageController = new GalleryImageController();

  $GalleryImagesArray = $GalleryImageController->getGalleryImages();
?>
<!DOCTYPE html>
<html lang="pt">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ASSIN - Galeria</title>

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

    <link href="js/dist/summernote-bs4.css" rel="stylesheet">
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
            <li class="breadcrumb-item active">Galeria</li>
          </ol>

          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Nova Foto
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-7 my-auto">
                  <form id="createGalleryImage">
                    <input type="hidden" name="actionGalleryImage" value="create">
                    <input type="file" id="uploadImage" name="fileGalleryImage">
                    <input type="text" name="txtDescription" class="form-control mt-2 mb-0" id="InputDescription" maxlength="512" placeholder="Descrição">
                  </form>
                </div>
                <div class="col-sm-5">
                  <button type="button" id="btnUploadImage" class="btn btn-primary w-100 h-100" onclick="uploadGalleryPhoto();" disabled>Subir foto para a galeria</button>
                </div>
              </div>
            </div>
          </div>

          <div id="Alerts" class="my-3">
          </div>

          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Fotos
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Foto</th>
                      <th>Data</th>
                      <th>Autor</th>
                      <th>Nome</th>
                      <th>Descrição</th>
                      <th>Controles</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if(count($GalleryImagesArray) == 0) {
                      ?>
                      <td colspan="6" class="text-center">Não há fotos na galeria.</td>
                      <?php
                    } else {
                      foreach($GalleryImagesArray as $Image) { ?>
                      <tr>
                        <td class="text-center"><img src="../assets/pictures/gallery/<?php echo $Image->getGImageName(); ?>" class="rounded" height="100px"></td>
                        <td class="text-center align-middle"><?php echo date_format(date_create($Image->getGImageDate()), 'd/m/Y'); ?></td>
                        <td class="text-center align-middle"><?php echo $Image->getUser()->getUserName(); ?></td>
                        <td class="text-center align-middle"><?php echo $Image->getGImageName(); ?></td>
                        <td class="text-center align-middle"><?php echo $Image->getGImageDescription(); ?></td>
                        <td class="text-center align-middle"><a class="text-danger" style="cursor: pointer;" onclick="deleteGalleryImage(<?php echo $Image->getGImageID(); ?>);"><i class="fas fa-fw fa-trash-alt"></i></a></td>
                      </tr>
                    <?php }
                    } ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted"><?php echo count($GalleryImagesArray); ?> resultado(s). Atualizado hoje <?php echo date('H:i'); ?></div>
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
