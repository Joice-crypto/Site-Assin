<?php
require_once("app/CardController.php");

$CardController = new CardController();
$CardsArray = $CardController->getCards("pt-br");
?>
<!DOCTYPE html>
<html lang="pt">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>ASSIN - Cards</title>

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
          <li class="breadcrumb-item active">Cards</li>
        </ol>

        <div class="row">
          <?php for ($i = 0; $i < 3 ; $i++) { // array que percorre todos os card e os imprime na tela 
          ?>
            <div class="col-sm-4 my-4">
              <div class="card h-100">
                <img class="card-img-top" src="../assets/pictures/cards/<?php echo $CardsArray[$i]->getCardThumbnail(); ?>" alt="">
                <div class="card-body">
                  <h4 class="card-title"><?php echo $CardsArray[$i]->getCardName(); ?></h4>
                  <p class="card-text"><?php echo $CardsArray[$i]->getCardDescription(); ?></p>
                </div>
                <div class="card-footer">
                  <a href="editCard.php?id=<?php echo $CardsArray[$i]->getCardID(); ?>" class="btn btn-primary">Editar</a>
                </div>
                
              </div>
            </div>
          <?php } ?>
        </div>
        <div id="Alerts"></div>
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
</body>

</html>