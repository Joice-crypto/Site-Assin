<?php
  require_once("app/UserModel.php");
  require_once("app/UserController.php");

  if(!isset($_SESSION)) {
    session_start();
  }

  if(!isset($_SESSION["UserID"])) {
    header("location: login.php");
    exit();
  }

  $UserController = new UserController();

  $User = $UserController->getUser($_SESSION["UserID"]);

  if($User == NULL) {
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
        <div class="card-header">Editar conta de <?php echo $User->getUserName(); ?></div>
        <div class="card-body">
          <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#EditNameModal">Editar Nome</button>
          <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#EditEmailModal">Editar Email</button>
          <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#EditPasswordModal">Editar Senha</button>
          <hr/>
          <button type="button" class="btn btn-primary btn-block mt-3" onclick="javascript:history.back();">Voltar</button>
          <div id="Alerts" class="mt-4">
          </div>
          <div class="text-center">
            <a class="d-block small mt-3" href="index.php">Home</a>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="EditNameModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar nome</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="editNameForm">
              <label>Nome atual: <?php echo $User->getUserName(); ?></label>
              <div class="form-group row">
                <label for="txtNome" class="col-sm-3 col-form-label">Novo nome: </label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="txtNome" name="txtNome" maxlength="255">
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary" onclick="editUserName();">Salvar</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="EditEmailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar Email</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="editEmailForm">
              <label>Email atual: <?php echo $User->getUserEmail(); ?></label>
              <div class="form-group row">
                <label for="txtEmail" class="col-sm-3 col-form-label">Novo email: </label>
                <div class="col-sm-9">
                  <input type="email" class="form-control" id="txtEmail" name="txtEmail" maxlength="255" required>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary"  onclick="editUserEmail();">Salvar</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="EditPasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar Senha</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="editPasswordForm">
              <div class="form-group row">
                <label for="txtNewPassword" class="col-sm-3 col-form-label">Nova senha: </label>
                <div class="col-sm-9">
                  <input type="password" class="form-control" id="txtPassword" name="txtPassword" maxlength="255" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="txtPassword" class="col-sm-3 col-form-label">Senha atual: </label>
                <div class="col-sm-9">
                  <input type="password" class="form-control" id="txtOldPassword" name="txtOldPassword" maxlength="255" required>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary" onclick="editUserPassword();">Salvar</button>
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
    <script src="js/validation.js"></script>
    <script src="js/jquery-validation/dist/additional-methods.js"></script>
  </body>

</html>
