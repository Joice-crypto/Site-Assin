<?php
  require_once("Connection.php");
  require_once("Constants.php");
  require_once("UserModel.php");
  require_once("File.php");
  require_once("HighlightModel.php");

  if(!isset($_SESSION)) {
    session_start();
  }

  if(isset($_POST["actionHighlight"]) && !is_numeric($_POST["actionHighlight"]) && !empty($_POST["actionHighlight"])) {
    $Action = strip_tags(trim(filter_input(INPUT_POST, "actionHighlight", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW)));

    if($Action === "delete") {
      if(isset($_POST["id"]) && is_numeric($_POST["id"]) && !empty($_POST["id"]) && filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT) &&
         isset($_SESSION["UserID"]) && is_numeric($_SESSION["UserID"]) && !empty($_SESSION["UserID"])) {
        $ID = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);
        $User = new UserModel();
        $HighlightController = new HighlightController();
        $User->setUserID($_SESSION["UserID"]);

        if($HighlightController->deleteHighlight($ID, $User)) {
          echo json_encode(array('status' => 'success', 'message' => "Highlight deletado com sucesso!"));
          exit();
        } else {
          echo json_encode(array('status' => 'failure', 'message' => "Não foi possível deletar o Highlight."));
          exit();
        } 
        
      }
    } else if ($Action === "create") {
      if (isset($_SESSION["UserID"]) && is_numeric($_SESSION["UserID"]) && !empty($_SESSION["UserID"]) && 
          isset($_POST["txtTitlePT-BR"]) && isset($_POST["txtDescriptionPT-BR"]) && isset($_POST["txtContentPT-BR"]) && 
          isset($_POST["txtTitleEN-US"]) && isset($_POST["txtDescriptionEN-US"]) && isset($_POST["txtContentEN-US"]) && 
          isset($_POST["txtTitleES-ES"]) && isset($_POST["txtDescriptionES-ES"]) && isset($_POST["txtContentES-ES"]) && 
          isset($_POST["txtTitleFR-FR"]) && isset($_POST["txtDescriptionFR-FR"]) && isset($_POST["txtContentFR-FR"]) && 
          isset($_FILES["fileThumb"]) && strlen($_FILES["fileThumb"]["name"]) <= MAX_FILE_NAME_SIZE &&
          strlen($_POST["txtTitlePT-BR"]) <= MAX_TITLE_SIZE && strlen($_POST["txtTitleEN-US"]) <= MAX_FILE_NAME_SIZE && strlen($_POST["txtTitleES-ES"]) <= MAX_FILE_NAME_SIZE && strlen($_POST["txtTitleFR-FR"]) <= MAX_FILE_NAME_SIZE &&
          strlen($_POST["txtDescriptionPT-BR"]) <= MAX_DESCRIPTION_SIZE && strlen($_POST["txtDescriptionEN-US"]) <= MAX_DESCRIPTION_SIZE && strlen($_POST["txtDescriptionES-ES"]) <= MAX_DESCRIPTION_SIZE && strlen($_POST["txtDescriptionFR-FR"]) <= MAX_DESCRIPTION_SIZE) {
          
           

          if ($_FILES["fileThumb"]["size"] != 0) {
            if (!checkExistence("../../assets/pictures/", $_FILES["fileThumb"]["name"])) {
              if (uploadImage($_FILES["fileThumb"], "../../assets/pictures/")) {
                $HighlightModel = new HighlightModel();
                $UserModel = new UserModel();
                $HighlightController = new HighlightController();
                $HighlightModel->setHighlightDate(date("Y-m-d"));
                $HighlightModel->setHighlightLastEditionDate(date("Y-m-d"));
                $HighlightModel->setHighlightThumbnail($_FILES["fileThumb"]["name"]);
                $UserModel->setUserID($_SESSION["UserID"]);
                $HighlightModel->setUserAuthor($UserModel);
                $HighlightModel->setUserLastEditionAuthor($UserModel);
    
                $TitleArray = array();
                $DescriptionArray = array();
                $ContentArray = array();
    
                $TitleArray["pt-br"] = strip_tags(trim(filter_input(INPUT_POST, "txtTitlePT-BR", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW)));
                $DescriptionArray["pt-br"] = strip_tags(trim(filter_input(INPUT_POST, "txtDescriptionPT-BR", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW)));
                $ContentArray["pt-br"] = trim(filter_input(INPUT_POST, "txtContentPT-BR", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW));
    
                $TitleArray["en-us"] = strip_tags(trim(filter_input(INPUT_POST, "txtTitleEN-US", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW)));
                $DescriptionArray["en-us"] = strip_tags(trim(filter_input(INPUT_POST, "txtDescriptionEN-US", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW)));
                $ContentArray["en-us"] = trim(filter_input(INPUT_POST, "txtContentEN-US", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW));
    
                $TitleArray["es-es"] = strip_tags(trim(filter_input(INPUT_POST, "txtTitleES-ES", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW)));
                $DescriptionArray["es-es"] = strip_tags(trim(filter_input(INPUT_POST, "txtDescriptionES-ES", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW)));
                $ContentArray["es-es"] = trim(filter_input(INPUT_POST, "txtContentES-ES", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW));
    
                $TitleArray["fr-fr"] = strip_tags(trim(filter_input(INPUT_POST, "txtTitleFR-FR", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW)));
                $DescriptionArray["fr-fr"] = strip_tags(trim(filter_input(INPUT_POST, "txtDescriptionFR-FR", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW)));
                $ContentArray["fr-fr"] = trim(filter_input(INPUT_POST, "txtContentFR-FR", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW));
    
                $HighlightModel->setHighlightTitle($TitleArray);
                $HighlightModel->setHighlightDescription($DescriptionArray);
                $HighlightModel->setHighlightContent($ContentArray);
                
                if ($HighlightController->createHighlight($HighlightModel, $UserModel)) {
                  echo json_encode(array("status" => "success", "message" => "Highlight criado com sucesso!"));
                  exit();
                } else {
                  deleteFile("../../assets/pictures/" . $_FILES["fileThumb"]["name"]);
                  echo json_encode(array("status" => "failure", "message" => "Não foi possível criar o Highlight."));
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
           }  else {
             echo json_encode(array('status' => 'failure', 'message' => "Você precisa selecionar uma imagem."));
             exit();
           }
      } else {
        echo json_encode(array('status' => 'failure', 'message' => "Dados inconsistentes."));
        exit();
      }
    } else if ($Action === "edit") {
      if (isset($_POST["HighlightID"]) && is_numeric($_POST["HighlightID"]) && isset($_SESSION["UserID"]) && 
          is_numeric($_SESSION["UserID"]) && !empty($_POST["HighlightID"]) && !empty($_SESSION["UserID"]) && 
          isset($_POST["txtTitlePT-BR"]) && isset($_POST["txtDescriptionPT-BR"]) && isset($_POST["txtContentPT-BR"]) && 
          isset($_POST["txtTitleEN-US"]) && isset($_POST["txtDescriptionEN-US"]) && isset($_POST["txtContentEN-US"]) && 
          isset($_POST["txtTitleES-ES"]) && isset($_POST["txtDescriptionES-ES"]) && isset($_POST["txtContentES-ES"]) && 
          isset($_POST["txtTitleFR-FR"]) && isset($_POST["txtDescriptionFR-FR"]) && isset($_POST["txtContentFR-FR"]) &&
          strlen($_POST["txtTitlePT-BR"]) <= MAX_TITLE_SIZE && strlen($_POST["txtTitleEN-US"]) <= MAX_FILE_NAME_SIZE && strlen($_POST["txtTitleES-ES"]) <= MAX_FILE_NAME_SIZE && strlen($_POST["txtTitleFR-FR"]) <= MAX_FILE_NAME_SIZE &&
          strlen($_POST["txtDescriptionPT-BR"]) <= MAX_DESCRIPTION_SIZE && strlen($_POST["txtDescriptionEN-US"]) <= MAX_DESCRIPTION_SIZE && strlen($_POST["txtDescriptionES-ES"]) <= MAX_DESCRIPTION_SIZE && strlen($_POST["txtDescriptionFR-FR"]) <= MAX_DESCRIPTION_SIZE) {

        $HighlightModel = new HighlightModel();
        $UserModel = new UserModel();
        $HighlightController = new HighlightController();
          
        $HighlightModel->setHighlightID(filter_input(INPUT_POST, "HighlightID", FILTER_SANITIZE_NUMBER_INT));
        $HighlightModel->setHighlightLastEditionDate(date("Y-m-d"));
        $UserModel->setUserID($_SESSION["UserID"]);
        $HighlightModel->setUserLastEditionAuthor($UserModel);
  
        $TitleArray = array();
        $DescriptionArray = array();
        $ContentArray = array();
  
        $TitleArray["pt-br"] = strip_tags(trim(filter_input(INPUT_POST, "txtTitlePT-BR", FILTER_DEFAULT)));
        $DescriptionArray["pt-br"] = strip_tags(trim(filter_input(INPUT_POST, "txtDescriptionPT-BR", FILTER_DEFAULT)));
        $ContentArray["pt-br"] = trim(filter_input(INPUT_POST, "txtContentPT-BR", FILTER_DEFAULT));
  
        $TitleArray["en-us"] = strip_tags(trim(filter_input(INPUT_POST, "txtTitleEN-US", FILTER_DEFAULT)));
        $DescriptionArray["en-us"] = strip_tags(trim(filter_input(INPUT_POST, "txtDescriptionEN-US", FILTER_DEFAULT)));
        $ContentArray["en-us"] = trim(filter_input(INPUT_POST, "txtContentEN-US", FILTER_DEFAULT));
  
        $TitleArray["es-es"] = strip_tags(trim(filter_input(INPUT_POST, "txtTitleES-ES", FILTER_DEFAULT)));
        $DescriptionArray["es-es"] = strip_tags(trim(filter_input(INPUT_POST, "txtDescriptionES-ES", FILTER_DEFAULT)));
        $ContentArray["es-es"] = trim(filter_input(INPUT_POST, "txtContentES-ES", FILTER_DEFAULT));
  
        $TitleArray["fr-fr"] = strip_tags(trim(filter_input(INPUT_POST, "txtTitleFR-FR", FILTER_DEFAULT)));
        $DescriptionArray["fr-fr"] = strip_tags(trim(filter_input(INPUT_POST, "txtDescriptionFR-FR", FILTER_DEFAULT)));
        $ContentArray["fr-fr"] = trim(filter_input(INPUT_POST, "txtContentFR-FR", FILTER_DEFAULT));
  
        $HighlightModel->setHighlightTitle($TitleArray);
        $HighlightModel->setHighlightDescription($DescriptionArray);
        $HighlightModel->setHighlightContent($ContentArray);
        
        $NewImage = false;
  
        if($_FILES["fileThumb"]["size"] != 0) {
          if(!checkExistence("../../assets/pictures/", $_FILES["fileThumb"]["name"])) {
            if(uploadImage($_FILES["fileThumb"], "../../assets/pictures/")) {
              $HighlightModel->setHighlightThumbnail($_FILES["fileThumb"]["name"]);
              $NewImage = true;
            } else {
              echo json_encode(array("status" => "failure", "message" => "Não foi possível fazer o upload da imagem."));
              exit();
            }
          } else {
            echo json_encode(array("status" => "failure", "message" => "Já existe uma imagem com este nome no servidor."));
            exit();
          }
        } 
  
        if($HighlightController->editHighlight($HighlightModel, $NewImage)) {
          echo json_encode(array("status" => "success", "message" => "Highlight editado com sucesso!"));
          exit();
        } else {
          echo json_encode(array("status" => "failure", "message" => "Não foi possível editar o Highlight."));
          exit();
        }
      } else {
        echo json_encode(array("status" => "failure", "message" => "Dados inconsistentes."));
        exit();
      }
    }
  }

  class HighlightController {
    public function getLastestHighlights($HighlightLanguage) {
      global $pdo;

      $HighlightsQuery = $pdo->prepare("SELECT Highlights_ID, HighlightsTranslations_Language, HighlightsTranslations_Title, HighlightsTranslations_Description, HighlightsTranslations_Content, Highlights_Date, Highlights_Thumbnail FROM Highlights INNER JOIN HighlightsTranslations ON Highlights.Highlights_ID = HighlightsTranslations.Highlights_ID_FK WHERE HighlightsTranslations_Language = ? ORDER BY Highlights_ID DESC LIMIT 3;");
      $HighlightsQuery->bindValue(1, $HighlightLanguage, PDO::PARAM_STR);

      $arr_Highlights = array();

      if ($HighlightsQuery->execute()) {
        while($Row = $HighlightsQuery->fetch()) {
          $Highlight = new HighlightModel();
          $Highlight->setHighlightID($Row["Highlights_ID"]);
          $Highlight->setHighlightLanguage($Row["HighlightsTranslations_Language"]);
          $Highlight->setHighlightTitle($Row["HighlightsTranslations_Title"]);
          $Highlight->setHighlightDescription($Row["HighlightsTranslations_Description"]);
          $Highlight->setHighlightContent($Row["HighlightsTranslations_Content"]);
          $Highlight->setHighlightDate($Row["Highlights_Date"]);
          $Highlight->setHighlightThumbnail($Row["Highlights_Thumbnail"]);

          array_push($arr_Highlights, $Highlight);
        }
      }

      return $arr_Highlights;
    }

    public function getHighlight($HighlightID, $HighlightLanguage) {
      global $pdo;

      $HighlightQuery = $pdo->prepare("SELECT Highlights_ID, HighlightsTranslations_Language, HighlightsTranslations_Title, HighlightsTranslations_Description, HighlightsTranslations_Content, Highlights_Date, Highlights_Thumbnail FROM Highlights INNER JOIN HighlightsTranslations ON Highlights.Highlights_ID = HighlightsTranslations.Highlights_ID_FK WHERE Highlights_ID = ? AND HighlightsTranslations_Language = ? LIMIT 1;");
      $HighlightQuery->bindValue(1, $HighlightID, PDO::PARAM_INT);
      $HighlightQuery->bindValue(2, $HighlightLanguage, PDO::PARAM_STR);

      $HighlightQuery->execute();

      $HighlightModel = NULL;

      if($HighlightQuery->rowCount() == 1) {
        $Row = $HighlightQuery->fetch();
        $HighlightModel = new HighlightModel();
        $HighlightModel->setHighlightID($Row["Highlights_ID"]);
        $HighlightModel->setHighlightLanguage($Row["HighlightsTranslations_Language"]);
        $HighlightModel->setHighlightTitle($Row["HighlightsTranslations_Title"]);
        $HighlightModel->setHighlightDescription($Row["HighlightsTranslations_Description"]);
        $HighlightModel->setHighlightContent($Row["HighlightsTranslations_Content"]);
        $HighlightModel->setHighlightDate($Row["Highlights_Date"]);
        $HighlightModel->setHighlightThumbnail($Row["Highlights_Thumbnail"]);
      }

      return $HighlightModel;
    }

    public function getHighlightAllLang($HighlightID) {
      global $pdo;

      $HighlightQuery = $pdo->prepare("SELECT Highlights_ID, Highlights_Date, Highlights_LastEditonDate, Highlights_Thumbnail FROM Highlights WHERE Highlights_ID = ?;");
      $HighlightQuery->bindValue(1, $HighlightID, PDO::PARAM_INT);

      $HighlightModel = null;
      
      if ($HighlightQuery->execute()) {
        if ($HighlightQuery->rowCount() == 1) {
          $Row = $HighlightQuery->fetch();
          $HighlightModel = new HighlightModel();

          $HighlightModel->setHighlightID($Row["Highlights_ID"]);
          $HighlightModel->setHighlightDate($Row["Highlights_Date"]);
          $HighlightModel->setHighlightLastEditionDate($Row["Highlights_LastEditonDate"]);
          $HighlightModel->setHighlightThumbnail($Row["Highlights_Thumbnail"]);

          $HighlightQuery = $pdo->prepare("SELECT HighlightsTranslations_ID, HighlightsTranslations_Language, HighlightsTranslations_Title, HighlightsTranslations_Description, HighlightsTranslations_Content FROM HighlightsTranslations WHERE Highlights_ID_FK = ?;");
          $HighlightQuery->bindValue(1, $HighlightID, PDO::PARAM_INT);

          if ($HighlightQuery->execute()) {
            if ($HighlightQuery->rowCount() == LANGUAGE_AMOUNT) {
              $TitleArray = array();
              $DescriptionArray = array();
              $ContentArray = array();

              while ($Row = $HighlightQuery->fetch()) {
                $TitleArray[$Row["HighlightsTranslations_Language"]] = $Row["HighlightsTranslations_Title"];
                $DescriptionArray[$Row["HighlightsTranslations_Language"]] = $Row["HighlightsTranslations_Description"];
                $ContentArray[$Row["HighlightsTranslations_Language"]] = $Row["HighlightsTranslations_Content"];
              }

              $HighlightModel->setHighlightTitle($TitleArray);
              $HighlightModel->setHighlightDescription($DescriptionArray);
              $HighlightModel->setHighlightContent($ContentArray);
            }
          }
        }
      }

      return $HighlightModel;
    }

    public function getHighlights($HighlightLanguage) {
      global $pdo;

      $HighlightQuery = $pdo->prepare("SELECT Highlights_ID, Highlights_Date, Highlights_LastEditonDate, Highlights_Thumbnail, Users_ID_FK_Author, Users_ID_FK_LastEditionAuthor, IJ1.Users_Name, IJ2.Users_Name, HighlightsTranslations_Language, HighlightsTranslations_Title, HighlightsTranslations_Description, HighlightsTranslations_Content FROM Highlights INNER JOIN HighlightsTranslations ON Highlights.Highlights_ID = HighlightsTranslations.Highlights_ID_FK INNER JOIN Users AS IJ1 ON IJ1.Users_ID = Highlights.Users_ID_FK_Author INNER JOIN Users AS IJ2 ON IJ2.Users_ID = Highlights.Users_ID_FK_LastEditionAuthor WHERE HighlightsTranslations.HighlightsTranslations_Language = ?;");
      $HighlightQuery->bindValue(1, $HighlightLanguage, PDO::PARAM_STR);       

      $HighlightsArray = array();

      $HighlightQuery->execute();

      while ($Row = $HighlightQuery->fetch()) {
        $HighlightModel = new HighlightModel();
        $UserModelAuthor = new UserModel();
        $UserModelLastEditionAuthor = new UserModel();

        $UserModelAuthor->setUserID($Row["Users_ID_FK_Author"]);
        $UserModelAuthor->setUserName($Row["Users_Name"]);

        $UserModelLastEditionAuthor->setUserID($Row["Users_ID_FK_LastEditionAuthor"]);
        $UserModelLastEditionAuthor->setUserName($Row["Users_Name"]);

        $HighlightModel->setHighlightID($Row["Highlights_ID"]);
        $HighlightModel->setHighlightDate($Row["Highlights_Date"]);
        $HighlightModel->setHighlightLastEditionDate($Row["Highlights_LastEditonDate"]);
        $HighlightModel->setHighlightThumbnail($Row["Highlights_Thumbnail"]);
        $HighlightModel->setHighlightLanguage($Row["HighlightsTranslations_Language"]);
        $HighlightModel->setHighlightTitle($Row["HighlightsTranslations_Title"]);
        $HighlightModel->setHighlightDescription($Row["HighlightsTranslations_Description"]);
        $HighlightModel->setHighlightContent($Row["HighlightsTranslations_Content"]);
        $HighlightModel->setUserAuthor($UserModelAuthor);
        $HighlightModel->setUserLastEditionAuthor($UserModelLastEditionAuthor);

        array_push($HighlightsArray, $HighlightModel);
      }

      return $HighlightsArray;
    }

    public function deleteHighlight($HighlightID, $User) {
      global $pdo;

      $HighlightQuery = $pdo->prepare("DELETE FROM HighlightsTranslations WHERE Highlights_ID_FK = ?;");
      $HighlightQuery->bindValue(1, $HighlightID, PDO::PARAM_INT);

      if($HighlightQuery->execute()) {
        $HighlightThumbnail = new HighlightController();

        $HighlightQuery = $pdo->prepare("DELETE FROM Highlights WHERE Highlights_ID = ?;");
        $HighlightQuery->bindValue(1, $HighlightID, PDO::PARAM_INT);

        deleteFile("../../assets/pictures/" . $HighlightThumbnail->getHighlightAllLang($HighlightID)->getHighlightThumbnail());

        if ($HighlightQuery->execute()) {
          return true;
        }
      }

      return false;
    }

    // ERRO NESTA FUNÇÃO

    public function createHighlight($HighlightModel) {
      global $pdo;

      $HighlightQuery = $pdo->prepare("INSERT INTO Highlights(Highlights_Date, Highlights_LastEditonDate, Highlights_Thumbnail, Users_ID_FK_Author, Users_ID_FK_LastEditionAuthor) VALUES (?, ?, ?, ?, ?);");
      $HighlightQuery->bindValue(1, $HighlightModel->getHighlightDate(), PDO::PARAM_STR);
      $HighlightQuery->bindValue(2, $HighlightModel->getHighlightLastEditionDate(), PDO::PARAM_STR);
      $HighlightQuery->bindValue(3, $HighlightModel->getHighlightThumbnail(), PDO::PARAM_STR);
      $HighlightQuery->bindValue(4, $HighlightModel->getUserAuthor()->getUserID(), PDO::PARAM_INT);
      $HighlightQuery->bindValue(5, $HighlightModel->getUserLastEditionAuthor()->getUserID(), PDO::PARAM_INT);

      if ($HighlightQuery->execute()) {
        $HighlightLanguages = array("pt-br", "en-us", "es-es", "fr-fr");
        $ID = $pdo->lastInsertId();

        for ($i = 0; $i < count($HighlightLanguages); $i++) {
          $HighlightQuery = $pdo->prepare("INSERT INTO HighlightsTranslations (HighlightsTranslations_Language, HighlightsTranslations_Title, HighlightsTranslations_Description, HighlightsTranslations_Content, Highlights_ID_FK) VALUES (?, ?, ?, ?, ?);");
          $HighlightQuery->bindValue(1, $HighlightLanguages[$i], PDO::PARAM_STR);
          $HighlightQuery->bindValue(2, $HighlightModel->getHighlightTitle()[$HighlightLanguages[$i]], PDO::PARAM_STR);
          $HighlightQuery->bindValue(3, $HighlightModel->getHighlightDescription()[$HighlightLanguages[$i]], PDO::PARAM_STR);
          $HighlightQuery->bindValue(4, $HighlightModel->getHighlightContent()[$HighlightLanguages[$i]], PDO::PARAM_STR);
          $HighlightQuery->bindValue(5, $ID, PDO::PARAM_INT);

          if (!$HighlightQuery->execute()) {
            return false;
           
          }
        }

        return true;
      }

      return false;
    }

    public function editHighlight($HighlightModel, $NewImage) {
      global $pdo;

      if($NewImage) {
        $HighlightQuery = $pdo->prepare("UPDATE Highlights SET Highlights_LastEditonDate = ?, Highlights_Thumbnail = ?, Users_ID_FK_LastEditionAuthor = ? WHERE Highlights_ID = ?;");
        $HighlightQuery->bindValue(1, $HighlightModel->getHighlightLastEditionDate(), PDO::PARAM_STR);
        $HighlightQuery->bindValue(2, $HighlightModel->getHighlightThumbnail(), PDO::PARAM_STR);
        $HighlightQuery->bindValue(3, $HighlightModel->getUserLastEditionAuthor()->getUserID(), PDO::PARAM_INT);
        $HighlightQuery->bindValue(4, $HighlightModel->getHighlightID(), PDO::PARAM_INT);
      } else {
        $HighlightQuery = $pdo->prepare("UPDATE Highlights SET Highlights_LastEditonDate = ?, Users_ID_FK_LastEditionAuthor = ? WHERE Highlights_ID = ?;");
        $HighlightQuery->bindValue(1, $HighlightModel->getHighlightLastEditionDate(), PDO::PARAM_STR);
        $HighlightQuery->bindValue(2, $HighlightModel->getUserLastEditionAuthor()->getUserID(), PDO::PARAM_INT);
        $HighlightQuery->bindValue(3, $HighlightModel->getHighlightID(), PDO::PARAM_INT);
      }

      if($HighlightQuery->execute()) {
        $HighlightLanguages = array("pt-br", "en-us", "es-es", "fr-fr");
        for ($i = 0; $i < count($HighlightLanguages); $i++) {
          $HighlightQuery = $pdo->prepare("UPDATE HighlightsTranslations SET HighlightsTranslations_Title = ?, HighlightsTranslations_Description = ?, HighlightsTranslations_Content = ? WHERE HighlightsTranslations_Language = ? AND Highlights_ID_FK = ?;");
          $HighlightQuery->bindValue(1, $HighlightModel->getHighlightTitle()[$HighlightLanguages[$i]], PDO::PARAM_STR);
          $HighlightQuery->bindValue(2, $HighlightModel->getHighlightDescription()[$HighlightLanguages[$i]], PDO::PARAM_STR);
          $HighlightQuery->bindValue(3, $HighlightModel->getHighlightContent()[$HighlightLanguages[$i]], PDO::PARAM_STR);
          $HighlightQuery->bindValue(4, $HighlightLanguages[$i], PDO::PARAM_STR);
          $HighlightQuery->bindValue(5, $HighlightModel->getHighlightID(), PDO::PARAM_INT);

          if (!$HighlightQuery->execute()) {
            return false;
          }
        }
        return true;
      }

      return false;
    }
  }
?>
