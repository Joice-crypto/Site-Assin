<?php
  require_once('app/DepoimentoModel.php');
  require_once('app/DepoimentoController.php');

  $DepoimentoController = new DepoimentoController();
  $DepoimentosArray = $DepoimentoController->getAllDepoimentos("pt-br");
?>

<!DOCTYPE html>
<html lang="pt">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ASSIN - Depoimento</title>

    <!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
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
            <li class="breadcrumb-item active">Depoimentos</li>
          </ol>

          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Depoimentos
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Título</th>
                      <th>Data do Depoimento</th>
                      <th>Data Última Atualização</th>
                      <th>Autor Original</th>
                      <th>Autor Última Atualização</th>
                      <th>Controles</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if(count($DepoimentosArray) == 0) {
                      ?>
                      <td colspan="6" class="text-center">Não há depoimentos.</td>
                      <?php
                    } else {
                      foreach ($DepoimentosArray as $Depoimento) {
                        ?>
                        <tr>
                          <td><?php echo $Depoimento->getDepoimentoTitle(); ?></td>
                          <td><?php echo date_format(date_create($Depoimento->getDepoDate()), 'd/m/Y'); ?></td>
                          <td><?php echo date_format(date_create($Depoimento->getDepoimentoLastEditionDate()), 'd/m/Y'); ?></td>
                          <td><?php echo $Depoimento->getUserAuthor()->getUserName(); ?></td>
                          <td><?php echo $Depoimento->getUserLastEditionAuthor()->getUserName(); ?></td>
                          <td class="text-center"><a href="editDepoimento.php?id=<?php echo $Depoimento->getDepoimentoID(); ?>"><i class="fas fa-fw fa-edit"></i></a><a class="text-danger" onclick="deleteDepoimento(<?php echo $Depoimento->getDepoimentoID(); ?>);"><i class="fas fa-fw fa-trash-alt"></i></a><a class="text-danger"></tr>
                        </tr>
                        <?php
                      }
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted"><?php echo count($DepoimentosArray); ?> resultado(s). Atualizado hoje <?php echo date('H:i'); ?></div>
          </div>
          <button type="button" onclick="window.location.href='createDepoimento.php'" class="btn btn-primary w-100 mb-3">Criar Depoimento</button>
          <div id="Alerts"></div>
        </div>
</div>
<?php require_once("common/footer.php"); ?>
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



<!-- Custom scripts for all pages-->
<script src="js/sb-admin.min.js"></script>
<script src="js/front.js"></script>
</body>

</html>