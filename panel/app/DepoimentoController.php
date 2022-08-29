<?php
require_once "Connection.php";
require_once "UserModel.php";
require_once "Constants.php";
require_once "DepoimentoModel.php";
require_once("File.php");


if(!isset($_SESSION)) {
  session_start();

}

if (isset($_POST["actionDepoimento"]) && !is_numeric($_POST["actionDepoimento"]) && !empty($_POST["actionDepoimento"])) {
  $Action = strip_tags(trim(filter_input(INPUT_POST, "actionDepoimento", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW)));

  if ($Action === "create") {
    if (isset($_SESSION["UserID"]) && is_numeric($_SESSION["UserID"]) && !empty($_SESSION["UserID"]) && 
    isset($_POST["txtTitlePT-BR"]) && !is_numeric($_POST["txtTitlePT-BR"]) && !empty($_POST["txtTitlePT-BR"]) &&
    isset($_POST["txtTitleEN-US"]) && !is_numeric($_POST["txtTitleEN-US"]) && !empty($_POST["txtTitleEN-US"]) &&
    isset($_POST["txtContentPT-BR"]) && !is_numeric($_POST["txtContentPT-BR"]) && !empty($_POST["txtContentPT-BR"]) &&
    isset($_POST["txtContentEN-US"]) && !is_numeric($_POST["txtContentEN-US"]) && !empty($_POST["txtContentEN-US"]) &&
    isset($_FILES["fileThumb"]) && strlen($_FILES["fileThumb"]["name"]) <= MAX_FILE_NAME_SIZE &&
    strlen($_POST["txtTitlePT-BR"]) <= MAX_TITLE_SIZE && strlen($_POST["txtTitleEN-US"]) <= MAX_TITLE_SIZE ) { 
     
        if ($_FILES["fileThumb"]["size"] != 0) {
            if (!checkExistence("../../assets/pictures/", $_FILES["fileThumb"]["name"])) {
              if (uploadImage($_FILES["fileThumb"], "../../assets/pictures/")) {

                $DepoimentoModel = new DepoimentoModel();
                $UserModel = new UserModel();
                $DepoimentoController = new DepoimentoController();

                $UserModel->setUserID($_SESSION["UserID"]);

                $DepoimentoModel->setDepoDate(date("Y-m-d"));
                $DepoimentoModel->setDepoimentoLastEditionDate(date("Y-m-d"));
                $DepoimentoModel->setUserAuthor($UserModel);
                $DepoimentoModel->setDepoimentoThumbnail($_FILES["fileThumb"]["name"]);
                $UserModel->setUserID($_SESSION["UserID"]);
                $DepoimentoModel->setUserAuthor($UserModel);
                $DepoimentoModel->setUserLastEditionAuthor($UserModel);

                $TitleArray = array();
                $DescriptionArray = array();
                $ContentArray = array();

                $TitleArray["pt-br"] = strip_tags(trim(filter_input(INPUT_POST, "txtTitlePT-BR", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW)));
                $DescriptionArray["pt-br"] = strip_tags(trim(filter_input(INPUT_POST, "txtDescriptionPT-BR", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW)));
                $ContentArray["pt-br"] = trim(filter_input(INPUT_POST, "txtContentPT-BR", FILTER_DEFAULT));

                $TitleArray["en-us"] = strip_tags(trim(filter_input(INPUT_POST, "txtTitleEN-US", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW)));
                $DescriptionArray["en-us"] = strip_tags(trim(filter_input(INPUT_POST, "txtDescriptionEN-US", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW)));
                $ContentArray["en-us"] = trim(filter_input(INPUT_POST, "txtContentEN-US", FILTER_DEFAULT));

                $DepoimentoModel->setDepoimentoTitle($TitleArray);
                $DepoimentoModel->setDepoimentoDescription($DescriptionArray);
                $DepoimentoModel->setDepoimentoContent($ContentArray);

                if ($DepoimentoController->createDepoimento($DepoimentoModel)) {
                    echo json_encode(array("status" => "success", "message" => "Depoimento criado com sucesso!"));
                    exit();
                  } else {
                    deleteFile("../../assets/pictures/" . $_FILES["fileThumb"]["name"]);
                    echo json_encode(array("status" => "failure", "message" => "Não foi possível criar o Depoimento."));
                    exit();
                  }
                  } else {
                    echo json_encode(array("status" => "failure", "message" => "Não foi possível fazer o upload da imagem."));
                  exit();
                  }
               }  else {
                   echo json_encode(array("status" => "failure", "message" => "Já existe uma imagem com este nome no servidor."));
                   exit();
               }
            }else {
            echo json_encode(array("status" => "failure", "message" => "Você precisa selecionar uma imagem."));
            exit();
            }     
    } else {
            echo json_encode(array("status" => "failure", "message" => "Dados inconsistentes."));
            exit();
    }
          
  } else if ($Action === "edit") {
      if (isset($_SESSION["UserID"]) && is_numeric($_SESSION["UserID"]) && !empty($_SESSION["UserID"]) &&
          isset($_POST["DepoimentoID"]) && is_numeric($_POST["DepoimentoID"]) && !empty($_POST["DepoimentoID"]) &&
          isset($_POST["txtTitlePT-BR"]) && !is_numeric($_POST["txtTitlePT-BR"]) && !empty($_POST["txtTitlePT-BR"]) &&
          isset($_POST["txtTitleEN-US"]) && !is_numeric($_POST["txtTitleEN-US"]) && !empty($_POST["txtTitleEN-US"]) &&
          isset($_POST["txtContentPT-BR"]) && !is_numeric($_POST["txtContentPT-BR"]) && !empty($_POST["txtContentPT-BR"]) &&
          isset($_POST["txtContentEN-US"]) && !is_numeric($_POST["txtContentEN-US"]) && !empty($_POST["txtContentEN-US"]) &&
          strlen($_POST["txtTitlePT-BR"]) <= MAX_TITLE_SIZE && strlen($_POST["txtTitleEN-US"]) <= MAX_TITLE_SIZE && strlen($_POST["txtTitleES-ES"]) <= MAX_TITLE_SIZE && strlen($_POST["txtTitleFR-FR"]) <= MAX_TITLE_SIZE) {

          $DepoimentoModel = new DepoimentoModel();
          $UserModel = new UserModel();
          $DepoimentoController = new DepoimentoController();

          $UserModel->setUserID($_SESSION["UserID"]);

          $DepoimentoModel->setDepoimentoID(filter_input(INPUT_POST, "DepoimentoID", FILTER_SANITIZE_NUMBER_INT));
          $DepoimentoModel->setDepoDate(date("Y-m-d"));
          $DepoimentoModel->setDepoimentoLastEditionDate(date("Y-m-d"));
          $DepoimentoModel->setUserAuthor($UserModel);

          $TitleArray = array();
          $ContentArray = array();

          $TitleArray["pt-br"] = strip_tags(trim(filter_input(INPUT_POST, "txtTitlePT-BR", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW)));
          $ContentArray["pt-br"] = trim(filter_input(INPUT_POST, "txtContentPT-BR", FILTER_DEFAULT));

          $TitleArray["en-us"] = strip_tags(trim(filter_input(INPUT_POST, "txtTitleEN-US", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW)));
          $ContentArray["en-us"] = trim(filter_input(INPUT_POST, "txtContentEN-US", FILTER_DEFAULT));

          $TitleArray["es-es"] = strip_tags(trim(filter_input(INPUT_POST, "txtTitleES-ES", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW)));
          $ContentArray["es-es"] = trim(filter_input(INPUT_POST, "txtContentES-ES", FILTER_DEFAULT));

          $TitleArray["fr-fr"] = strip_tags(trim(filter_input(INPUT_POST, "txtTitleFR-FR", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW)));
          $ContentArray["fr-fr"] = trim(filter_input(INPUT_POST, "txtContentFR-FR", FILTER_DEFAULT));

          $DepoimentoModel->setDepoimentoTitle($TitleArray);
          $DepoimentoModel->setDepoimentoContent($ContentArray);

          if($DepoimentoController->editDepoimento($DepoimentoModel)) {
              echo json_encode(array("status" => "success", "message" => "Página editada com sucesso!"));
              exit();
          } else {
              echo json_encode(array("status" => "failure", "message" => "Não foi possível editar a Página."));
              exit();
          }
      } else {
          echo json_encode(array("status" => "failure", "message" => "Dados inconsistentes."));
          exit();
      }
  } else if ($Action === "delete") {
      if(isset($_SESSION["UserID"]) && is_numeric($_SESSION["UserID"]) && !empty($_SESSION["UserID"]) &&
         isset($_POST["id"]) && is_numeric($_POST["id"]) && !empty($_POST["id"])) {

          $ID = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);
          $User = new UserModel();
          $DepoimentoController = new DepoimentoController();
          $User->setUserID($_SESSION["UserID"]);
  
          if($DepoimentoController->deleteDepoimento($ID, $User)) {
            echo json_encode(array('status' => 'success', 'message' => "Página deletada com sucesso!"));
            exit();
          } else {
            echo json_encode(array('status' => 'failure', 'message' => "Não foi possível deletar a Página."));
            exit();
          }
      } else {
          echo json_encode(array('status' => 'failure', 'message' => "Dados inconsistentes."));
          exit();
      }
  } else {
      exit();
  }
}

 class DepoimentoController
{

   
    public function createDepoimento($DepoimentoModel)
    {

    
      global $pdo;

     
      $DepoimentoQuery = $pdo->prepare("INSERT INTO Depoimentos(Depoimentos_Date, Depoimentos_LastEditonDate, Depoimentos_Thumbnail, Users_ID_FK_Author, Users_ID_FK_LastEditionAuthor) VALUES (?, ?, ?, ?, ?);");
      $DepoimentoQuery->bindValue(1, $DepoimentoModel->getDepoDate(), PDO::PARAM_STR);
      $DepoimentoQuery->bindValue(2, $DepoimentoModel->getDepoimentoLastEditionDate(), PDO::PARAM_STR);
      $DepoimentoQuery->bindValue(3, $DepoimentoModel->getDepoimentoThumbnail(), PDO::PARAM_STR);
      $DepoimentoQuery->bindValue(4, $DepoimentoModel->getUserAuthor()->getUserID(), PDO::PARAM_INT);
      $DepoimentoQuery->bindValue(5, $DepoimentoModel->getUserLastEditionAuthor()->getUserID(), PDO::PARAM_INT);

      if ($DepoimentoQuery->execute()) {
        $DepoimentoLanguages = array("pt-br", "en-us", "es-es", "fr-fr");
        $ID = $pdo->lastInsertId();

        for ($i = 0; $i < count($DepoimentoLanguages); $i++) {
            $DepoimentoQuery = $pdo->prepare("INSERT INTO DepoimentosTranslations (DepoimentosTranslations_Language, DepoimentosTranslations_Title, DepoimentosTranslations_Description, DepoimentosTranslations_Content, Depoimentos_ID_FK) VALUES (?, ?, ?, ?, ?);");
            $DepoimentoQuery->bindValue(1, $DepoimentoLanguages[$i], PDO::PARAM_STR);
            $DepoimentoQuery->bindValue(2, $DepoimentoModel->getDepoimentoTitle()[$DepoimentoLanguages[$i]], PDO::PARAM_STR);
            $DepoimentoQuery->bindValue(3, $DepoimentoModel->getDepoimentoDescription()[$DepoimentoLanguages[$i]], PDO::PARAM_STR);
            $DepoimentoQuery->bindValue(4, $DepoimentoModel->getDepoimentoContent()[$DepoimentoLanguages[$i]], PDO::PARAM_STR);
            $DepoimentoQuery->bindValue(5, $ID, PDO::PARAM_INT);
  
            if (!$DepoimentoQuery->execute()) {
              return false;
             
            }
          }
        return true;
      }

      return false;

    }

    public function getAllDepoimentos($DepoimentosLanguage){ // vai pegar todos os depoimentos

      global $pdo;

      $DepoimentoQuery = $pdo->prepare("SELECT Depoimentos_ID, Depoimentos_Date, Depoimentos_Thumbnail, Users_ID_FK_Author, Users_ID_FK_LastEditionDate, IJ1.Users_Name, IJ2.Users_Name, 
      DepoimentosTranslations_Language, DepoimentosTranslations_Title,  DepoimentosTranslations_Content FROM Depoimentos INNER JOIN DepoimentosTranslations ON Depoimentos.Depoimentos_ID = DepoimentosTranslations.Depoimentos_ID_FK INNER JOIN
       Users AS IJ1 ON IJ1.Users_ID = Depoimentos.Users_ID_FK_Author INNER JOIN Users AS IJ2  WHERE DepoimentosTranslations.DepoimentosTranslations_Language = ?;");
      $DepoimentoQuery->bindValue(1, $DepoimentosLanguage, PDO::PARAM_STR);

      $DepoimentoArray = array();
     

      while ($Row = $DepoimentoQuery->fetch()) {
        $DepoimentoModel = new DepoimentoModel();
        $UserModelAuthor = new UserModel();
        $UserModelLastEditionAuthor = new UserModel();

        $UserModelAuthor->setUserID($Row["Users_ID_FK_Author"]);
        $UserModelAuthor->setUserName($Row["Users_Name"]);

        $UserModelLastEditionAuthor->setUserID($Row["Users_ID_FK_LastEditionAuthor"]);
        $UserModelLastEditionAuthor->setUserName($Row["Users_Name"]);

        $DepoimentoModel->setDepoimentoID($Row["Depoimentos_ID"]);
        $DepoimentoModel->setDepoDate($Row["Depoimentos_Date"]);
        $DepoimentoModel->setDepoimentoLastEditionDate($Row["Depoimentos_LastEditonDate"]);
        $DepoimentoModel->setDepoimentoThumbnail($Row["Depoimentos_Thumbnail"]);
        $DepoimentoModel->setDepoimentoLanguage($Row["DepoimentosTranslations_Language"]);
        $DepoimentoModel->setDepoimentoTitle($Row["DepoimentosTranslations_Title"]);
        $DepoimentoModel->setDepoimentoContent($Row["DepoimentosTranslations_Content"]);
        $DepoimentoModel->setUserAuthor($UserModelAuthor);

        array_push($DepoimentoArray, $DepoimentoModel);
      }

      return $DepoimentoArray;

    }

    public function deleteDepoimento(){


    }

    public function editDepoimento(){

    }
}



