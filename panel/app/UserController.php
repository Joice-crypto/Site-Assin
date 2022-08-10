<?php
  require_once("Connection.php");
  require_once("UserModel.php");
  require_once("Constants.php");

  if(!isset($_SESSION)) {
    session_start();
  }

  if(isset($_POST["action"]) && !is_numeric($_POST["action"]) && !empty($_POST["action"])) {
    $Action = strip_tags(trim(filter_input(INPUT_POST, "action", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW)));

    if($Action === "login") {
      if(isset($_POST["email"]) && !is_numeric($_POST["email"]) && !empty($_POST["email"]) &&
         isset($_POST["pw"]) && !empty($_POST["pw"]) && filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL) &&
         strlen($_POST["email"]) <= MAX_EMAIL_SIZE && strlen($_POST["pw"]) <= MAX_PASSWORD_SIZE) {
        $UserModel = new UserModel();
        $UserController = new UserController();
        $Email = strip_tags(trim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL)));
        $Pass = strip_tags(trim(filter_input(INPUT_POST, "pw", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW)));

        if(($UserModel = $UserController->loginUser($Email, $Pass)) != false) {
          $_SESSION["UserID"] = $UserModel->getUserID();
          $_SESSION["UserName"] = $UserModel->getUserName();
          echo json_encode(array('status' => 'success', 'message' => 'Login feito!'));
          exit();
        } else {
          echo json_encode(array('status' => 'failure', 'message' => 'Email e/ou senha incorretos!'));
          exit();
        }
      } else {
        echo json_encode(array('status' => 'failure', 'message' => 'Dados inconsistentes.'));
        exit();
      }
    } else if ($Action === "logout") {
      if (isset($_SESSION["UserID"]) && is_numeric($_SESSION["UserID"]) && !empty($_SESSION["UserID"])) {
        $UserController = new UserController();
        $UserController->logoutUser();
      }
    } else if ($Action === "create") {
      if (isset($_SESSION["UserID"]) && is_numeric($_SESSION["UserID"]) && !empty($_SESSION["UserID"]) &&
          isset($_POST["name"]) && !is_numeric($_POST["name"]) && !empty($_POST["name"]) &&
          isset($_POST["email"]) && !is_numeric($_POST["email"]) && !empty($_POST["email"]) && filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL) &&
          isset($_POST["confirmEmail"]) && !is_numeric($_POST["confirmEmail"]) && !empty($_POST["confirmEmail"]) && filter_input(INPUT_POST, "confirmEmail", FILTER_VALIDATE_EMAIL) &&
          isset($_POST["confirmPassword"]) && !empty($_POST["confirmPassword"]) && isset($_POST["pw"]) && !empty($_POST["pw"]) &&
          strlen($_POST["email"]) <= MAX_EMAIL_SIZE && strlen($_POST["name"]) <= MAX_USERNAME_SIZE && strlen($_POST["pw"]) <= MAX_PASSWORD_SIZE && strlen($_POST["confirmEmail"]) <= MAX_EMAIL_SIZE && strlen($_POST["confirmPassword"]) <= MAX_PASSWORD_SIZE) {

          if ($_POST["email"] !== $_POST["confirmEmail"]) {
            echo json_encode(array('status' => 'failure', 'message' => 'Os emails não coincidem.'));
            exit();
          }

          if ($_POST["pw"] !== $_POST["confirmPassword"]) {
            echo json_encode(array('status' => 'failure', 'message' => 'As senhas não coincidem.'));
            exit();
          }

	  if (strlen($_POST["pw"]) < 6) {
		echo json_encode(array('status' => 'failure', 'message' => 'Sua senha deve ter pelo menos 6 caracteres.'));
		exit();
	  }

          $UserModel = new UserModel();
          $UserController = new UserController();
          $UserModel->setUserName(strip_tags(trim(filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW))));
          $UserModel->setUserEmail(strip_tags(trim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL))));
          $UserModel->setUserPassword(strip_tags(trim(filter_input(INPUT_POST, "pw", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW))));

          if ($UserController->checkEmail($UserModel->getUserEmail())) {
            if ($UserController->createUser($UserModel)) {
              echo json_encode(array('status' => 'success', 'message' => 'Usuário cadastrado com sucesso!'));
              exit();
            } else {
              echo json_encode(array('status' => 'failure', 'message' => 'Não foi possível cadastrar o usuário.'));
              exit();
            }
          } else {
            echo json_encode(array('status' => 'failure', 'message' => 'Já existe uma conta cadastrada com esse email.'));
            exit();
          }
      } else {
        echo json_encode(array('status' => 'failure', 'message' => 'Dados inconsistentes.'));
        exit();
      }
    } else if ($Action === "edit") {
      if (isset($_SESSION["UserID"]) && is_numeric($_SESSION["UserID"]) && !empty($_SESSION["UserID"]) &&
          isset($_POST["subaction"]) && !is_numeric($_POST["subaction"]) && !empty($_POST["subaction"])) {
        $UserModel = new UserModel();
        $UserController = new UserController();
        $SubAction = strip_tags(trim(filter_input(INPUT_POST, "subaction", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW)));
        $UserModel->setUserID($_SESSION["UserID"]);

        if($SubAction === "name") {
          if (isset($_POST["name"]) && !is_numeric($_POST["name"]) && !empty($_POST["name"]) && strlen($_POST["name"]) <= MAX_USERNAME_SIZE) {
            $UserModel->setUserName(strip_tags(trim(filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW))));
            $FieldEdit = "UserName";
          } else {
            echo json_encode(array('status' => 'failure', 'message' => 'Dados inconsistentes.'));
            exit();
          }
        } else if ($SubAction === "email") {
          if (isset($_POST["email"]) && !is_numeric($_POST["email"]) && !empty($_POST["email"]) && filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL) && strlen($_POST["name"]) <= MAX_EMAIL_SIZE) {
            $UserModel->setUserEmail(strip_tags(trim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL))));
            $FieldEdit = "UserEmail";
          } else {
            echo json_encode(array('status' => 'failure', 'message' => 'Dados inconsistentes.'));
            exit();
          }
        } else if ($SubAction === "password") {
          if (isset($_POST["password"]) && !empty($_POST["password"]) &&
              isset($_POST["oldpassword"]) && !empty($_POST["oldpassword"]) && strlen($_POST["password"]) <= MAX_PASSWORD_SIZE) {
            $UserModel = $UserController->getUser($_SESSION["UserID"]);
            $UserModel->setUserPassword(strip_tags(trim(filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW))));
            $OldPass = strip_tags(trim(filter_input(INPUT_POST, "oldpassword", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW)));

	    if (strlen($UserModel->getUserPassword()) < 6) {
		echo json_encode(array('status' => 'failure', 'message' => 'Sua nova senha deve ter pelo menos 6 caracteres.'));
		exit();
	    }

            if($UserController->loginUser($UserModel->getUserEmail(), $OldPass) == NULL) {
              echo json_encode(array('status' => 'failure', 'message' => 'Senha incorreta.'));
              exit();
            }

            $FieldEdit = "UserPassword";
          } else {
            echo json_encode(array('status' => 'failure', 'message' => 'Dados inconsistentes.'));
            exit();
          }
        } else {
          echo json_encode(array('status' => 'failure', 'message' => 'Ação inválida.'));
          exit();
        }

        if($UserController->editUser($UserModel, $FieldEdit)) {
          echo json_encode(array('status' => 'success', 'message' => 'Conta editada com sucesso!'));
          exit();
        } else {
          echo json_encode(array('status' => 'failure', 'message' => 'Não foi possível editar a conta.'));
          exit();
        }
      } else {
        echo json_encode(array('status' => 'failure', 'message' => 'Dados inconsistentes.'));
        exit();
      }
    } else if ($Action === "resetpassword") {
      if (isset($_POST["email"]) && !is_numeric($_POST["email"]) && !empty($_POST["email"]) && filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL) && strlen($_POST["email"]) <= MAX_EMAIL_SIZE) {
        $UserModel = new UserModel();
        $UserController = new UserController();
        $UserModel->setUserEmail(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL));

        if ($UserController->checkUser($UserModel->getUserEmail())) {
          if ($UserController->rememberPassword($UserModel->getUserEmail())) {
            echo json_encode(array('status' => 'success', 'message' => 'Email enviado com sucesso.'));
            exit();
          } else {
            echo json_encode(array('status' => 'failure', 'message' => 'Não foi possível enviar o email.'));
            exit();
          }
        } else {
          echo json_encode(array('status' => 'failure', 'message' => 'Conta inexistente.'));
          exit();
        }
      } else {
        echo json_encode(array('status' => 'failure', 'message' => 'Dados inconsistentes.'));
        exit();
      }
    } else {
      exit();
    }
  }

  class UserController {
    // Retorna o objeto se o usuário for logado no sistema, false caso contrário
    public function loginUser($Email, $Pass) {
      global $pdo;

      $Login = $pdo->prepare("SELECT Users_ID, Users_Name, Users_Password FROM Users WHERE Users_Email = ?;");
      $Login->bindValue(1, $Email, PDO::PARAM_STR);

      if($Login->execute()) {
        $UserModel = new UserModel();

        if ($Login->rowCount() == 1) {
            while ($User = $Login->fetch(PDO::FETCH_ASSOC)) {
              $UserModel->setUserID($User["Users_ID"]);
              $UserModel->setUserName($User["Users_Name"]);
              $UserModel->setUserPassword($User["Users_Password"]);
            }

            if(password_verify($Pass, $UserModel->getUserPassword())) {
              return $UserModel;
            }
        }
      }

      return false;
    }

    public function checkUser($Email) {
      global $pdo;
      $CheckUser = $pdo->prepare("SELECT Users_ID FROM Users WHERE Users_Email = ?;");
      $CheckUser->bindValue(1, $Email, PDO::PARAM_STR);
      $CheckUser->execute();

      if($CheckUser->rowCount() > 0)
        return true;

      return false;
    }

    public function logoutUser() {
      session_destroy();
      exit();
    }

    public function createUser($User) {
      global $pdo;

      $UserTest = new UserController();
      if(!$UserTest->loginUser($User->getUserEmail(), $User->getUserPassword())) {
        $UserQuery = $pdo->prepare("INSERT INTO Users (Users_Name, Users_Email, Users_Password) VALUES (?,?,?);");
        $UserQuery->bindValue(1, $User->getUserName(), PDO::PARAM_STR);
        $UserQuery->bindValue(2, $User->getUserEmail(), PDO::PARAM_STR);
        $UserQuery->bindValue(3, password_hash($User->getUserPassword(), PASSWORD_DEFAULT), PDO::PARAM_STR);

        if($UserQuery->execute()) {
          return true;
        }
      }

      return false;
    }

    public function getUser($UserID) {
      global $pdo;

      $UserQuery = $pdo->prepare("SELECT Users_ID, Users_Name, Users_Email FROM Users WHERE Users_ID = ?;");
      $UserQuery->bindValue(1, $UserID, PDO::PARAM_INT);

      $UserQuery->execute();

      if($UserQuery->rowCount() == 1) {
        $Row = $UserQuery->fetch();

        $User = new UserModel();
        $User->setUserID($Row["Users_ID"]);
        $User->setUserName($Row["Users_Name"]);
        $User->setUserEmail($Row["Users_Email"]);
      } else {
        $User = NULL;
      }

      return $User;
    }

    public function editUser($User, $FieldEdit) {
      global $pdo;

      if($FieldEdit == "UserName") {
        $UserQuery = $pdo->prepare("UPDATE Users SET Users_Name = ? WHERE Users_ID = ?;");
        $UserQuery->bindValue(1, $User->getUserName(), PDO::PARAM_STR);
      } else if($FieldEdit == "UserEmail") {
        $UserQuery = $pdo->prepare("UPDATE Users SET Users_Email = ? WHERE Users_ID = ?;");
        $UserQuery->bindValue(1, $User->getUserEmail(), PDO::PARAM_STR);
      } else if($FieldEdit == "UserPassword") {
        $UserQuery = $pdo->prepare("UPDATE Users SET Users_Password = ? WHERE Users_ID = ?;");
        $UserQuery->bindValue(1, password_hash($User->getUserPassword(), PASSWORD_DEFAULT), PDO::PARAM_STR);
      }

      $UserQuery->bindValue(2, $User->getUserID(), PDO::PARAM_INT);

      if ($UserQuery->execute()) {
        if ($FieldEdit == "UserName") {
          $_SESSION["UserName"] = $User->getUserName();
        }

        return true;
      }

      return false;
    }

    public function checkEmail($UserEmail) {
      global $pdo;

      $UserQuery = $pdo->prepare("SELECT Users_ID FROM Users WHERE Users_Email = ?;");
      $UserQuery->bindValue(1, $UserEmail, PDO::PARAM_STR);

      if ($UserQuery->execute()) {
        if ($UserQuery->rowCount() > 0) {
          return false;
        }
      }

      return true;
    }

    public function rememberPassword($UserEmail) {
      return false;
    }
  }
?>
