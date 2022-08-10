<?php
  require_once("app/UserController.php");

  if(!isset($_SESSION)) {
    session_start();
  }

  if(!isset($_SESSION["UserID"])) {
    header("location: login.php");
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

    <title>ASSIN - Cadastro</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="text-center">
        <img src="../assets/images/menu-logo_menorainda.png" height="100px" class="rounded mt-4">
      </div>
      <div class="card card-register mx-auto mt-4">
        <div class="card-header">Cadastrar uma conta</div>
        <div class="card-body">
          <form id="registerUser">
            <input type="hidden" name="action" value="create">
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="firstName" name="name" class="form-control" placeholder="First name" required="required" autofocus="autofocus" maxlength="255">
                <label for="firstName">Nome</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Confirmar Email" required="required" maxlength="255">
                    <label for="inputEmail">Email</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="email" id="confirmEmail" name="confirmEmail" class="form-control" placeholder="Confirmar Email" required="required" maxlength="255">
                    <label for="confirmEmail">Confirmar Email</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="password" id="inputPassword" name="pw" class="form-control" placeholder="Senha" required="required" maxlength="255">
                    <label for="inputPassword">Senha</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" placeholder="Confirmar senha" required="required" maxlength="255">
                    <label for="confirmPassword">Confirmar senha</label>
                  </div>
                </div>
              </div>
            </div>
            <button type="button" class="btn btn-primary btn-block" onclick="registerUser();">Cadastrar</button>
          </form>
          <div id="Alerts" class="mt-4">
          </div>
          <div class="text-center">
            <a class="d-block small mt-3" href="index.php">Home</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <script src="js/front.js"></script>

    <!-- Validation plugin -->
    <script src="js/jquery-validation/dist/jquery.validate.js"></script>
    <script src="js/jquery-validation/dist/additional-methods.js"></script>
    <script src="js/validation.js"></script>
  </body>

</html>
