<?php
  require_once("Connection.php");
  require_once("File.php");
  require_once("GalleryImageModel.php");
  require_once("Constants.php");
  require_once("UserModel.php");

  if(!isset($_SESSION))
    session_start();

  if (isset($_POST["actionGalleryImage"]) && !is_numeric($_POST["actionGalleryImage"]) && !empty($_POST["actionGalleryImage"])) {
    $Action = strip_tags(trim(filter_input(INPUT_POST, "actionGalleryImage", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW)));

    if ($Action === "create") {
      if (isset($_FILES["fileGalleryImage"]) && isset($_SESSION["UserID"]) && is_numeric($_SESSION["UserID"]) && !empty($_SESSION["UserID"]) &&
          isset($_POST["txtDescription"]) && strlen($_POST["txtDescription"]) <= MAX_DESCRIPTION_SIZE && strlen($_FILES["fileGalleryImage"]["name"]) <= MAX_FILE_NAME_SIZE && $_SESSION["UserID"] > 0) {
        $GalleryImageModel = new GalleryImageModel();
        $User = new UserModel();

        if ($_FILES["fileGalleryImage"]["size"] != 0) {
          if (!checkExistence("../../assets/pictures/gallery/", $_FILES["fileGalleryImage"]["name"])) {
            if ($_FILES["fileGalleryImage"]["size"] < MAX_IMAGE_SIZE) {
              if (uploadImage($_FILES["fileGalleryImage"], "../../assets/pictures/gallery/")) {
                $GalleryImageController = new GalleryImageController();
                $GalleryImageModel->setGImageName(strip_tags(trim($_FILES["fileGalleryImage"]["name"])));
                $GalleryImageModel->setGImageDate(date("Y-m-d"));
                $GalleryImageModel->setGImageDescription(strip_tags(trim(filter_input(INPUT_POST, "txtDescription", FILTER_DEFAULT))));
                $User->setUserID($_SESSION["UserID"]);
                $GalleryImageModel->setUser($User);

                if ($GalleryImageController->createGalleryImage($GalleryImageModel)) {
                  echo json_encode(array("status" => "success", "message" => "Foto postada com sucesso!"));
                  exit();
                } else {
                  deleteFile("../../assets/pictures/gallery/" . $_FILES["fileGalleryImage"]["name"]);
                  echo json_encode(array("status" => "failure", "message" => "Não foi possível subir a foto " . $_FILES["fileGalleryImage"]["name"] . " para a galeria."));
                  exit();
                }
              } else {
                echo json_encode(array("status" => "failure", "message" => "Não foi possível fazer o upload da imagem."));
                exit();
              }
            } else {
              echo json_encode(array("status" => "failure", "message" => "A imagem é muito grande. O tamanho máximo é de " . MAX_IMAGE_SIZE));
              exit();
            }
          } else {
            echo json_encode(array('status' => 'failure', 'message' => "Imagem já existente na galeria."));
            exit();
          }
        } else {
          echo json_encode(array('status' => 'failure', 'message' => "Você precisa selecionar uma imagem."));
          exit();
        }
      } else {
        echo json_encode(array("status" => "failure", "message" => "Não foi possível fazer o upload da imagem."));
        exit();
      }
    } else if($Action === "delete") {
      if(isset($_POST["id"]) && is_numeric($_POST["id"]) && !empty($_POST["id"]) && filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT) &&
         isset($_SESSION["UserID"]) && is_numeric($_SESSION["UserID"]) && !empty($_SESSION["UserID"]) && 
         $_POST["id"] > 0 && $_SESSION["UserID"] > 0) {
        $ID = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);
        $User = new UserModel();
        $GalleryImageController = new GalleryImageController();
        $User->setUserID($_SESSION["UserID"]);

        if($GalleryImageController->deleteGalleryImage($ID, $User)) {
          echo json_encode(array('status' => 'success', 'message' => "Imagem deletada com sucesso!"));
          exit();
        } else {
          echo json_encode(array('status' => 'failure', 'message' => "Não foi possível deletar a Imagem."));
          exit();
        }
      }
    } else {
      exit();
    }
  }

  class GalleryImageController {
    public function createGalleryImage($GalleryImageModel) {
      global $pdo;

      $GalleryImageQuery = $pdo->prepare("INSERT INTO GalleryImages (Users_ID_FK, GImages_Name, GImages_Date, GImages_Description) VALUES (?, ?, ?, ?);");
      $GalleryImageQuery->bindValue(1, $GalleryImageModel->getUser()->getUserID(), PDO::PARAM_INT);
      $GalleryImageQuery->bindValue(2, $GalleryImageModel->getGImageName(), PDO::PARAM_STR);
      $GalleryImageQuery->bindValue(3, $GalleryImageModel->getGImageDate(), PDO::PARAM_STR);
      $GalleryImageQuery->bindValue(4, $GalleryImageModel->getGImageDescription(), PDO::PARAM_STR);

      if($GalleryImageQuery->execute()) {
        return true;
      }

      return false;
    }

    public function deleteGalleryImage($GImageID, $User) {
      global $pdo;

      $GalleryImageQuery = $pdo->prepare("DELETE FROM GalleryImages WHERE GImages_ID = ?;");
      $GalleryImageQuery->bindValue(1, $GImageID, PDO::PARAM_INT);

      $GalleryImageController = new GalleryImageController();
      $GalleryImage = $GalleryImageController->getGalleryImage($GImageID);

      deleteFile("../../assets/pictures/gallery/" . $GalleryImage->getGImageName());

      if($GalleryImageQuery->execute()) {
        return true;
      }

      return false;
    }

    public function getGalleryImages() {
      global $pdo;

      $GalleryImageQuery = $pdo->query("SELECT GImages_ID, Users_ID, Users_Name, GImages_Name, GImages_Date, GImages_Description FROM GalleryImages INNER JOIN Users ON GalleryImages.Users_ID_FK = Users.Users_ID ORDER BY GImages_ID DESC;");

      $GalleryImagesArray = array();

      while($Row = $GalleryImageQuery->fetch()) {
        $GalleryImageModel = new GalleryImageModel();
        $UserModel = new UserModel();
        $GalleryImageModel->setGImageID($Row["GImages_ID"]);
        $GalleryImageModel->setGImageName($Row["GImages_Name"]);
        $GalleryImageModel->setGImageDate($Row["GImages_Date"]);
        $GalleryImageModel->setGImageDescription($Row["GImages_Description"]);
        $UserModel->setUserID($Row["Users_ID"]);
        $UserModel->setUserName($Row["Users_Name"]);
        $GalleryImageModel->setUser($UserModel);

        array_push($GalleryImagesArray, $GalleryImageModel);
      }

      return $GalleryImagesArray;
    }

    public function getLastestGalleryImages() {
      global $pdo;

      $GalleryImageQuery = $pdo->query("SELECT GImages_ID, GImages_Name, GImages_Description FROM GalleryImages ORDER BY GImages_ID DESC LIMIT 9;");

      $GalleryImagesArray = array();

      while($Row = $GalleryImageQuery->fetch()) {
        $GalleryImageModel = new GalleryImageModel();
        $GalleryImageModel->setGImageID($Row["GImages_ID"]);
        $GalleryImageModel->setGImageName($Row["GImages_Name"]);
        $GalleryImageModel->setGImageDescription($Row["GImages_Description"]);

        array_push($GalleryImagesArray, $GalleryImageModel);
      }

      return $GalleryImagesArray;
    }

    public function getGalleryImage($GImageID) {
      global $pdo;

      $GalleryImageQuery = $pdo->prepare("SELECT GImages_ID, Users_ID, Users_Name, GImages_Name, GImages_Date, GImages_Description FROM GalleryImages INNER JOIN Users ON GalleryImages.Users_ID_FK = Users.Users_ID WHERE GImages_ID = ?;");
      $GalleryImageQuery->bindValue(1, $GImageID, PDO::PARAM_INT);

      $GalleryImageQuery->execute();

      if($GalleryImageQuery->rowCount() == 1) {
        $Row = $GalleryImageQuery->fetch();
        $GalleryImage = new GalleryImageModel();
        $User = new UserModel();

        $GalleryImage->setGImageID($Row["GImages_ID"]);
        $GalleryImage->setGImageName($Row["GImages_Name"]);
        $GalleryImage->setGImageDate($Row["GImages_Date"]);
        $GalleryImage->setGImageDescription($Row["GImages_Description"]);

        $User->setUserID($Row["Users_ID"]);
        $User->setUserName($Row["Users_Name"]);

        $GalleryImage->setUser($User);
      } else {
        $GalleryImage = NULL;
      }

      return $GalleryImage;
    }
  }
 ?>
