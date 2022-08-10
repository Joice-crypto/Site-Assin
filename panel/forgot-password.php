<!DOCTYPE html>
<html lang="pt">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ASSIN - Esqueci minha senha</title>

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
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Resetar senha</div>
        <div class="card-body">
          <div class="text-center mb-4">
            <h4>Esqueceu sua senha?</h4>
            <p>Insira o email da sua conta.</p>
          </div>
          <form>
            <div class="form-group">
              <div class="form-label-group">
                <input type="email" id="inputEmail" class="form-control" placeholder="Email" required="required" autofocus="autofocus">
                <label for="inputEmail">Email</label>
              </div>
            </div>
            <a class="btn btn-primary btn-block" href="#" onclick="resetPassword();">Enviar email para resetar</a>
          </form>
          <div id="Alerts" class="mt-3"></div>
          <div class="text-center">
            <a class="d-block small mt-3" href="login.php">Página de Login</a>
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
  </body>

</html>
