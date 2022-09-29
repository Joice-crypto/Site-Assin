<?php
  require_once("Connection.php");
  require_once("Constants.php");
  require_once("UserModel.php");
  require_once("File.php");
  require_once("DepoimentoModel.php");

  if(!isset($_SESSION)) {
    session_start();
  }

  if(isset($_POST["actionDepoimento"]) && !is_numeric($_POST["actionDepoimento"]) && !empty($_POST["actionDepoimento"])) {
    $Action = strip_tags(trim(filter_input(INPUT_POST, "actionDepoimento", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW)));

    if($Action === "delete") {
      if(isset($_POST["id"]) && is_numeric($_POST["id"]) && !empty($_POST["id"]) && filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT) &&
         isset($_SESSION["UserID"]) && is_numeric($_SESSION["UserID"]) && !empty($_SESSION["UserID"])) {
        $ID = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);
        $User = new UserModel();
        $DepoimentoController = new DepoimentoController();
        $User->setUserID($_SESSION["UserID"]);

        if($DepoimentoController->deleteDepoimento($ID, $User)) {
          echo json_encode(array('status' => 'success', 'message' => "Depoimento deletado com sucesso!"));
          exit();
        } else {
          echo json_encode(array('status' => 'failure', 'message' => "Não foi possível deletar o Depoimento."));
          exit();
        } 
        
      }
    } else if ($Action === "create") {
      if (isset($_SESSION["UserID"]) && is_numeric($_SESSION["UserID"]) && !empty($_SESSION["UserID"]) && 
          isset($_POST["txtTitlePT-BR"]) && isset($_POST["txtDescriptionPT-BR"]) && isset($_POST["txtContentPT-BR"]) && 
          isset($_POST["txtTitleEN-US"]) && isset($_POST["txtDescriptionEN-US"]) && isset($_POST["txtContentEN-US"]) && 
          isset($_FILES["fileThumb"]) && strlen($_FILES["fileThumb"]["name"]) <= MAX_FILE_NAME_SIZE &&
          isset($_FILES["fileArq"]) && strlen($_FILES["fileArq"]["name"]) <= MAX_FILE_NAME_SIZE &&
          strlen($_POST["txtTitlePT-BR"]) <= MAX_TITLE_SIZE && strlen($_POST["txtTitleEN-US"]) <= MAX_FILE_NAME_SIZE &&
          strlen($_POST["txtDescriptionPT-BR"]) <= MAX_DESCRIPTION_SIZE && strlen($_POST["txtDescriptionEN-US"]) <= MAX_DESCRIPTION_SIZE) {
          
           

          if ($_FILES["fileThumb"]["size"] != 0) {
            if (!checkExistence("../../assets/pictures/fotos/", $_FILES["fileThumb"]["name"]) && !checkExistence("../../assets/files/", $_FILES["fileArq"]["name"])) {
              if (uploadImage($_FILES["fileThumb"], "../../assets/pictures/fotos/") && uploadFile($_FILES["fileArq"], "../../assets/files/")) {
                $DepoimentoModel = new DepoimentoModel();
                $UserModel = new UserModel();
                $DepoimentoController = new DepoimentoController();
                $DepoimentoModel->setDepoDate(date("Y-m-d"));
                $DepoimentoModel->setDepoimentoLastEditionDate(date("Y-m-d"));
                $DepoimentoModel->setDepoimentoThumbnail($_FILES["fileThumb"]["name"]);
                $DepoimentoModel->setDepoimentoFile($_FILES["fileArq"]["name"]);
                $UserModel->setUserID($_SESSION["UserID"]);
                $DepoimentoModel->setUserAuthor($UserModel);
                $DepoimentoModel->setUserLastEditionAuthor($UserModel);
    
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
    
                $DepoimentoModel->setDepoimentoTitle($TitleArray);
                $DepoimentoModel->setDepoimentoDescription($DescriptionArray);
                $DepoimentoModel->setDepoimentoContent($ContentArray);
                
                if ($DepoimentoController->createDepoimento($DepoimentoModel, $UserModel)) {
                  echo json_encode(array("status" => "success", "message" => "Depoimento criado com sucesso!"));
                  exit();
                } else {
                  deleteFile("../../assets/pictures/" . $_FILES["fileThumb"]["name"]);
                  deleteFile("../../assets/files/" . $_FILES["fileArq"]["name"]);
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
           }  else {
             echo json_encode(array('status' => 'failure', 'message' => "Você precisa selecionar uma imagem."));
             exit();
           }
      } else {
        echo json_encode(array('status' => 'failure', 'message' => "Dados inconsistentes."));
        exit();
      }
    } else if ($Action === "edit") {
      if (isset($_POST["DepoimentoID"]) && is_numeric($_POST["DepoimentoID"]) && isset($_SESSION["UserID"]) && 
          is_numeric($_SESSION["UserID"]) && !empty($_POST["DepoimentoID"]) && !empty($_SESSION["UserID"]) && 
          isset($_POST["txtTitlePT-BR"]) && isset($_POST["txtDescriptionPT-BR"]) && isset($_POST["txtContentPT-BR"]) && 
          isset($_POST["txtTitleEN-US"]) && isset($_POST["txtDescriptionEN-US"]) && isset($_POST["txtContentEN-US"]) && 
          isset($_POST["txtTitleES-ES"]) && isset($_POST["txtDescriptionES-ES"]) && isset($_POST["txtContentES-ES"]) && 
          isset($_POST["txtTitleFR-FR"]) && isset($_POST["txtDescriptionFR-FR"]) && isset($_POST["txtContentFR-FR"]) &&
          strlen($_POST["txtTitlePT-BR"]) <= MAX_TITLE_SIZE && strlen($_POST["txtTitleEN-US"]) <= MAX_FILE_NAME_SIZE && strlen($_POST["txtTitleES-ES"]) <= MAX_FILE_NAME_SIZE && strlen($_POST["txtTitleFR-FR"]) <= MAX_FILE_NAME_SIZE &&
          strlen($_POST["txtDescriptionPT-BR"]) <= MAX_DESCRIPTION_SIZE && strlen($_POST["txtDescriptionEN-US"]) <= MAX_DESCRIPTION_SIZE && strlen($_POST["txtDescriptionES-ES"]) <= MAX_DESCRIPTION_SIZE && strlen($_POST["txtDescriptionFR-FR"]) <= MAX_DESCRIPTION_SIZE) {

        $DepoimentoModel = new DepoimentoModel();
        $UserModel = new UserModel();
        $DepoimentoController = new DepoimentoController();
          
        $DepoimentoModel->setDepoimentoID(filter_input(INPUT_POST, "DepoimentoID", FILTER_SANITIZE_NUMBER_INT));
        $DepoimentoModel->setDepoimentoLastEditionDate(date("Y-m-d"));
        $UserModel->setUserID($_SESSION["UserID"]);
        $DepoimentoModel->setUserLastEditionAuthor($UserModel);
  
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
  
        $DepoimentoModel->setDepoimentoTitle($TitleArray);
        $DepoimentoModel->setDepoimentoDescription($DescriptionArray);
        $DepoimentoModel->setDepoimentoContent($ContentArray);
        
        $NewImage = false;
  
        if($_FILES["fileThumb"]["size"] != 0) {
          if(!checkExistence("../../assets/pictures/fotos/", $_FILES["fileThumb"]["name"]) || !checkExistence("../../assets/files/", $_FILES["fileArq"]["name"])) {
            if(uploadImage($_FILES["fileThumb"], "../../assets/pictures/fotos/") || uploadFile($_FILES["fileArq"], "../../assets/files/")) {
              $DepoimentoModel->setDepoimentoThumbnail($_FILES["fileThumb"]["name"]);
              $DepoimentoModel->setDepoimentoFile($_FILES["fileArq"]["name"]);
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
  
        if($DepoimentoController->editDepoimento($DepoimentoModel, $NewImage)) {
          echo json_encode(array("status" => "success", "message" => "Depoimento editado com sucesso!"));
          exit();
        } else {
          echo json_encode(array("status" => "failure", "message" => "Não foi possível editar o Depoimento."));
          exit();
        }
      } else {
        echo json_encode(array("status" => "failure", "message" => "Dados inconsistentes."));
        exit();
      }
    }
  }

  class DepoimentoController {
    public function getLastestDepoimentos($DepoimentoLanguage) {
      global $pdo;

      $DepoimentosQuery = $pdo->prepare("SELECT DepoimentosID, DepoimentosTranslations_Language, DepoimentosTranslations_Title, Depoimentos_Arquivo, DepoimentosTranslations_Description, DepoimentosTranslations_Content, Depoimentos_Date, Depoimentos_Thumbnail FROM Depoimentos INNER JOIN DepoimentosTranslations ON Depoimentos.DepoimentosID = DepoimentosTranslations.DepoimentosID_FK WHERE DepoimentosTranslations_Language = ? ORDER BY DepoimentosID DESC LIMIT 3;");
      $DepoimentosQuery->bindValue(1, $DepoimentoLanguage, PDO::PARAM_STR);

      $arr_Depoimentos = array();

      if ($DepoimentosQuery->execute()) {
        while($Row = $DepoimentosQuery->fetch()) {
          $Depoimento = new DepoimentoModel();
          $Depoimento->setDepoimentoID($Row["DepoimentosID"]);
          $Depoimento->setDepoimentoLanguage($Row["DepoimentosTranslations_Language"]);
          $Depoimento->setDepoimentoTitle($Row["DepoimentosTranslations_Title"]);
          $Depoimento->setDepoimentoFile($Row["Depoimentos_Arquivo"]);
          $Depoimento->setDepoimentoDescription($Row["DepoimentosTranslations_Description"]);
          $Depoimento->setDepoimentoContent($Row["DepoimentosTranslations_Content"]);
          $Depoimento->setDepoDate($Row["Depoimentos_Date"]);
          $Depoimento->setDepoimentoThumbnail($Row["Depoimentos_Thumbnail"]);

          array_push($arr_Depoimentos, $Depoimento);
        }
      }

      return $arr_Depoimentos;
    }

    public function getDepoimento($DepoimentoID, $DepoimentoLanguage) {
      global $pdo;

      $DepoimentoQuery = $pdo->prepare("SELECT DepoimentosID, DepoimentosTranslations_Language, DepoimentosTranslations_Title,Depoimentos_Arquivo, DepoimentosTranslations_Description, DepoimentosTranslations_Content, Depoimentos_Date, Depoimentos_Thumbnail FROM Depoimentos INNER JOIN DepoimentosTranslations ON Depoimentos.DepoimentosID = DepoimentosTranslations.DepoimentosID_FK WHERE DepoimentosID = ? AND DepoimentosTranslations_Language = ? LIMIT 1;");
      $DepoimentoQuery->bindValue(1, $DepoimentoID, PDO::PARAM_INT);
      $DepoimentoQuery->bindValue(2, $DepoimentoLanguage, PDO::PARAM_STR);

      $DepoimentoQuery->execute();

      $DepoimentoModel = NULL;

      if($DepoimentoQuery->rowCount() == 1) {
        $Row = $DepoimentoQuery->fetch();
        $DepoimentoModel = new DepoimentoModel();
        $DepoimentoModel->setDepoimentoID($Row["DepoimentosID"]);
        $DepoimentoModel->setDepoimentoLanguage($Row["DepoimentosTranslations_Language"]);
        $DepoimentoModel->setDepoimentoTitle($Row["DepoimentosTranslations_Title"]);
        $DepoimentoModel->setDepoimentoDescription($Row["DepoimentosTranslations_Description"]);
        $DepoimentoModel->setDepoimentoContent($Row["DepoimentosTranslations_Content"]);
        $DepoimentoModel->setDepoDate($Row["Depoimentos_Date"]);
        $DepoimentoModel->setDepoimentoThumbnail($Row["Depoimentos_Thumbnail"]);
        $DepoimentoModel->setDepoimentoFile($Row["Depoimentos_Arquivo"]);
      }

      return $DepoimentoModel;
    }

    public function getDepoimentoAllLang($DepoimentoID) {
      global $pdo;

      $DepoimentoQuery = $pdo->prepare("SELECT DepoimentosID, Depoimentos_Date, Depoimentos_LastEditonDate, Depoimentos_Thumbnail,Depoimentos_Arquivo FROM Depoimentos WHERE DepoimentosID = ?;");
      $DepoimentoQuery->bindValue(1, $DepoimentoID, PDO::PARAM_INT);

      $DepoimentoModel = null;
      
      if ($DepoimentoQuery->execute()) {
        if ($DepoimentoQuery->rowCount() == 1) {
          $Row = $DepoimentoQuery->fetch();
          $DepoimentoModel = new DepoimentoModel();

          $DepoimentoModel->setDepoimentoID($Row["DepoimentosID"]);
          $DepoimentoModel->setDepoDate($Row["Depoimentos_Date"]);
          $DepoimentoModel->setDepoimentoLastEditionDate($Row["Depoimentos_LastEditonDate"]);
          $DepoimentoModel->setDepoimentoThumbnail($Row["Depoimentos_Thumbnail"]);
          $DepoimentoModel->setDepoimentoFile($Row["Depoimentos_Arquivo"]);

          $DepoimentoQuery = $pdo->prepare("SELECT DepoimentosTranslations_ID, DepoimentosTranslations_Language, DepoimentosTranslations_Title, DepoimentosTranslations_Description, DepoimentosTranslations_Content FROM DepoimentosTranslations WHERE DepoimentosID_FK = ?;");
          $DepoimentoQuery->bindValue(1, $DepoimentoID, PDO::PARAM_INT);

          if ($DepoimentoQuery->execute()) {
            if ($DepoimentoQuery->rowCount() == LANGUAGE_AMOUNT) {
              $TitleArray = array();
              $DescriptionArray = array();
              $ContentArray = array();

              while ($Row = $DepoimentoQuery->fetch()) {
                $TitleArray[$Row["DepoimentosTranslations_Language"]] = $Row["DepoimentosTranslations_Title"];
                $DescriptionArray[$Row["DepoimentosTranslations_Language"]] = $Row["DepoimentosTranslations_Description"];
                $ContentArray[$Row["DepoimentosTranslations_Language"]] = $Row["DepoimentosTranslations_Content"];
              }

              $DepoimentoModel->setDepoimentoTitle($TitleArray);
              $DepoimentoModel->setDepoimentoDescription($DescriptionArray);
              $DepoimentoModel->setDepoimentoContent($ContentArray);
            }
          }
        }
      }

      return $DepoimentoModel;
    }

    public function getDepoimentos($DepoimentoLanguage) {
      global $pdo;

      $DepoimentoQuery = $pdo->prepare("SELECT DepoimentosID, Depoimentos_Date, Depoimentos_LastEditonDate, Depoimentos_Thumbnail,Depoimentos_Arquivo, Users_ID_FK_Author, Users_ID_FK_LastEditionAuthor, IJ1.Users_Name, IJ2.Users_Name, DepoimentosTranslations_Language, DepoimentosTranslations_Title, DepoimentosTranslations_Description, DepoimentosTranslations_Content FROM Depoimentos INNER JOIN DepoimentosTranslations ON Depoimentos.DepoimentosID = DepoimentosTranslations.DepoimentosID_FK INNER JOIN Users AS IJ1 ON IJ1.Users_ID = Depoimentos.Users_ID_FK_Author INNER JOIN Users AS IJ2 ON IJ2.Users_ID = Depoimentos.Users_ID_FK_LastEditionAuthor WHERE DepoimentosTranslations.DepoimentosTranslations_Language = ?;");
      $DepoimentoQuery->bindValue(1, $DepoimentoLanguage, PDO::PARAM_STR);       

      $DepoimentosArray = array();

      $DepoimentoQuery->execute();

      while ($Row = $DepoimentoQuery->fetch()) {
        $DepoimentoModel = new DepoimentoModel();
        $UserModelAuthor = new UserModel();
        $UserModelLastEditionAuthor = new UserModel();

        $UserModelAuthor->setUserID($Row["Users_ID_FK_Author"]);
        $UserModelAuthor->setUserName($Row["Users_Name"]);

        $UserModelLastEditionAuthor->setUserID($Row["Users_ID_FK_LastEditionAuthor"]);
        $UserModelLastEditionAuthor->setUserName($Row["Users_Name"]);

        $DepoimentoModel->setDepoimentoID($Row["DepoimentosID"]);
        $DepoimentoModel->setDepoDate($Row["Depoimentos_Date"]);
        $DepoimentoModel->setDepoimentoLastEditionDate($Row["Depoimentos_LastEditonDate"]);
        $DepoimentoModel->setDepoimentoThumbnail($Row["Depoimentos_Thumbnail"]);
        $DepoimentoModel->setDepoimentoFile($Row["Depoimentos_Arquivo"]);
        $DepoimentoModel->setDepoimentoLanguage($Row["DepoimentosTranslations_Language"]);
        $DepoimentoModel->setDepoimentoTitle($Row["DepoimentosTranslations_Title"]);
        $DepoimentoModel->setDepoimentoDescription($Row["DepoimentosTranslations_Description"]);
        $DepoimentoModel->setDepoimentoContent($Row["DepoimentosTranslations_Content"]);
        $DepoimentoModel->setUserAuthor($UserModelAuthor);
        $DepoimentoModel->setUserLastEditionAuthor($UserModelLastEditionAuthor);

        array_push($DepoimentosArray, $DepoimentoModel);
      }

      return $DepoimentosArray;
    }

    public function deleteDepoimento($DepoimentoID, $User) {
      global $pdo;

      $DepoimentoQuery = $pdo->prepare("DELETE FROM DepoimentosTranslations WHERE DepoimentosID_FK = ?;");
      $DepoimentoQuery->bindValue(1, $DepoimentoID, PDO::PARAM_INT);

      if($DepoimentoQuery->execute()) {
        $DepoimentoThumbnail = new DepoimentoController();

        $DepoimentoQuery = $pdo->prepare("DELETE FROM Depoimentos WHERE DepoimentosID = ?;");
        $DepoimentoQuery->bindValue(1, $DepoimentoID, PDO::PARAM_INT);

        deleteFile("../../assets/pictures/fotos/" . $DepoimentoThumbnail->getDepoimentoAllLang($DepoimentoID)->getDepoimentoThumbnail());
        deleteFile("../../assets/files/" . $DepoimentoThumbnail->getDepoimentoAllLang($DepoimentoID)->getDepoimentoFile());

        if ($DepoimentoQuery->execute()) {
          return true;
        }
      }

      return false;
    }


    public function createDepoimento($DepoimentoModel) {
      global $pdo;

      $DepoimentoQuery = $pdo->prepare("INSERT INTO Depoimentos(Depoimentos_Date, Depoimentos_LastEditonDate, Depoimentos_Thumbnail,Depoimentos_Arquivo, Users_ID_FK_Author, Users_ID_FK_LastEditionAuthor) VALUES (?, ?, ?, ?,?, ?);");
      $DepoimentoQuery->bindValue(1, $DepoimentoModel->getDepoDate(), PDO::PARAM_STR);
      $DepoimentoQuery->bindValue(2, $DepoimentoModel->getDepoimentoLastEditionDate(), PDO::PARAM_STR);
      $DepoimentoQuery->bindValue(3, $DepoimentoModel->getDepoimentoThumbnail(), PDO::PARAM_STR);
      $DepoimentoQuery->bindValue(4, $DepoimentoModel->getDepoimentoFile(), PDO::PARAM_STR);
      $DepoimentoQuery->bindValue(5, $DepoimentoModel->getUserAuthor()->getUserID(), PDO::PARAM_INT);
      $DepoimentoQuery->bindValue(6, $DepoimentoModel->getUserLastEditionAuthor()->getUserID(), PDO::PARAM_INT);

      if ($DepoimentoQuery->execute()) {
        $DepoimentoLanguages = array("pt-br", "en-us");
        $ID = $pdo->lastInsertId();

        for ($i = 0; $i < count($DepoimentoLanguages); $i++) {
          $DepoimentoQuery = $pdo->prepare("INSERT INTO DepoimentosTranslations (DepoimentosTranslations_Language, DepoimentosTranslations_Title, DepoimentosTranslations_Description, DepoimentosTranslations_Content, DepoimentosID_FK) VALUES (?, ?, ?, ?, ?);");
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

    public function editDepoimento($DepoimentoModel, $NewImage) {
      global $pdo;

      if($NewImage) {
        $DepoimentoQuery = $pdo->prepare("UPDATE Depoimentos SET Depoimentos_LastEditonDate = ?, Depoimentos_Thumbnail = ?,Depoimentos_Arquivo = ?, Users_ID_FK_LastEditionAuthor = ? WHERE DepoimentosID = ?;");
        $DepoimentoQuery->bindValue(1, $DepoimentoModel->getDepoimentoLastEditionDate(), PDO::PARAM_STR);
        $DepoimentoQuery->bindValue(2, $DepoimentoModel->getDepoimentoThumbnail(), PDO::PARAM_STR);
        $DepoimentoQuery->bindValue(3, $DepoimentoModel->getDepoimentoFile(), PDO::PARAM_STR);
        $DepoimentoQuery->bindValue(4, $DepoimentoModel->getUserLastEditionAuthor()->getUserID(), PDO::PARAM_INT);
        $DepoimentoQuery->bindValue(5, $DepoimentoModel->getDepoimentoID(), PDO::PARAM_INT);
      } else {
        $DepoimentoQuery = $pdo->prepare("UPDATE Depoimentos SET Depoimentos_LastEditonDate = ?, Users_ID_FK_LastEditionAuthor = ? WHERE DepoimentosID = ?;");
        $DepoimentoQuery->bindValue(1, $DepoimentoModel->getDepoimentoLastEditionDate(), PDO::PARAM_STR);
        $DepoimentoQuery->bindValue(2, $DepoimentoModel->getUserLastEditionAuthor()->getUserID(), PDO::PARAM_INT);
        $DepoimentoQuery->bindValue(3, $DepoimentoModel->getDepoimentoID(), PDO::PARAM_INT);
      }

      if($DepoimentoQuery->execute()) {
        $DepoimentoLanguages = array("pt-br", "en-us");
        for ($i = 0; $i < count($DepoimentoLanguages); $i++) {
          $DepoimentoQuery = $pdo->prepare("UPDATE DepoimentosTranslations SET DepoimentosTranslations_Title = ?, DepoimentosTranslations_Description = ?, DepoimentosTranslations_Content = ? WHERE DepoimentosTranslations_Language = ? AND DepoimentosID_FK = ?;");
          $DepoimentoQuery->bindValue(1, $DepoimentoModel->getDepoimentoTitle()[$DepoimentoLanguages[$i]], PDO::PARAM_STR);
          $DepoimentoQuery->bindValue(2, $DepoimentoModel->getDepoimentoDescription()[$DepoimentoLanguages[$i]], PDO::PARAM_STR);
          $DepoimentoQuery->bindValue(3, $DepoimentoModel->getDepoimentoContent()[$DepoimentoLanguages[$i]], PDO::PARAM_STR);
          $DepoimentoQuery->bindValue(4, $DepoimentoLanguages[$i], PDO::PARAM_STR);
          $DepoimentoQuery->bindValue(5, $DepoimentoModel->getDepoimentoID(), PDO::PARAM_INT);

          if (!$DepoimentoQuery->execute()) {
            return false;
          }
        }
        return true;
      }

      return false;
    }
  }
?>
