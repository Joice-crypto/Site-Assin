<?php
require_once "Connection.php";
require_once "File.php";
require_once "UserModel.php";
require_once "Constants.php";
require_once "DepoimentosModel.php";

if (!isset($_SESSION)) {
    session_start();
}
if (isset($_POST["actionDepoimento"]) && !is_numeric($_POST["actionDepoimento"]) && !empty($_POST["actionDepoimento"])) {
    $Action = strip_tags(trim(filter_input(INPUT_POST, "actionDepoimento", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW)));

    if ($Action === "delete") {
        if (isset($_POST["id"]) && is_numeric($_POST["id"]) && !empty($_POST["id"]) && filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT) &&
            isset($_SESSION["UserID"]) && is_numeric($_SESSION["UserID"]) && !empty($_SESSION["UserID"])) {
            $ID = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);
            $User = new UserModel();
            $DepoimentoController = new DepoimentoController();
            $User->setUserID($_SESSION["UserID"]);

            if ($DepoimentoController->deleteDepoimento($ID, $User)) { // AINDA TENHO QUE CRIAR O METODO DE DELETERA O DEOPOIMENTO
                echo json_encode(array('status' => 'success', 'message' => "Depoimento deletado com sucesso!"));
                exit();
            } else {
                echo json_encode(array('status' => 'failure', 'message' => "Não foi possível deletar o deletar."));
                exit();
            }
        }
    } else if ($Action === "create") {
        if (isset($_SESSION["UserID"]) && is_numeric($_SESSION["UserID"]) && !empty($_SESSION["UserID"]) &&
            isset($_POST["txtTitlePT-BR"]) && isset($_POST["txtContentPT-BR"]) &&
            isset($_POST["txtTitleEN-US"]) && isset($_POST["txtContentEN-US"]) &&
            isset($_POST["txtTitleES-ES"]) && isset($_POST["txtContentES-ES"]) &&
            isset($_POST["txtTitleFR-FR"]) && isset($_POST["txtContentFR-FR"]) &&
            isset($_FILES["fileThumb"]) && strlen($_FILES["fileThumb"]["name"]) <= MAX_FILE_NAME_SIZE &&
            strlen($_POST["txtTitlePT-BR"]) <= MAX_TITLE_SIZE && strlen($_POST["txtTitleEN-US"]) <= MAX_FILE_NAME_SIZE && strlen($_POST["txtTitleES-ES"]) <= MAX_FILE_NAME_SIZE && strlen($_POST["txtTitleFR-FR"]) <= MAX_FILE_NAME_SIZE &&
            strlen($_POST["txtDescriptionPT-BR"]) <= MAX_DESCRIPTION_SIZE && strlen($_POST["txtDescriptionEN-US"]) <= MAX_DESCRIPTION_SIZE && strlen($_POST["txtDescriptionES-ES"]) <= MAX_DESCRIPTION_SIZE && strlen($_POST["txtDescriptionFR-FR"]) <= MAX_DESCRIPTION_SIZE) {

            if ($_FILES["fileThumb"]["size"] != 0) {
                if (!checkExistence("../../assets/pictures/", $_FILES["fileThumb"]["name"])) {
                    if (uploadImage($_FILES["fileThumb"], "../../assets/pictures/")) {
                        $DepoimentosModel = new DepoimentosModel();
                        $UserModel = new UserModel();
                        $DepoimentoController = new DepoimentoController();
                        $DepoimentosModel->setDepoDate(date("Y-m-d"));
                        $DepoimentosModel->setDImage($_FILES["fileThumb"]["name"]);
                        $UserModel->setUserID($_SESSION["UserID"]);

                        $NameArray = array();
                        $ContentArray = array();

                        $NameArray["pt-br"] = strip_tags(trim(filter_input(INPUT_POST, "txtTitlePT-BR", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW)));
                        $ContentArray["pt-br"] = trim(filter_input(INPUT_POST, "txtContentPT-BR", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW));

                        $NameArray["en-us"] = strip_tags(trim(filter_input(INPUT_POST, "txtTitleEN-US", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW)));
                        $ContentArray["en-us"] = trim(filter_input(INPUT_POST, "txtContentEN-US", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW));

                        $NameArray["es-es"] = strip_tags(trim(filter_input(INPUT_POST, "txtTitleES-ES", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW)));
                        $ContentArray["es-es"] = trim(filter_input(INPUT_POST, "txtContentES-ES", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW));

                        $NameArray["fr-fr"] = strip_tags(trim(filter_input(INPUT_POST, "txtTitleFR-FR", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW)));
                        $ContentArray["fr-fr"] = trim(filter_input(INPUT_POST, "txtContentFR-FR", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW));

                        $DepoimentosModel->setDepoName($NameArray);
                        $DepoimentosModel->setDContent($ContentArray);
                        if ($DepoimentoController->createDepoimento($DepoimentosModel, $UserModel)) {
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
                } else {
                    echo json_encode(array("status" => "failure", "message" => "Já existe uma imagem com este nome no servidor."));
                    exit();
                }
            } else {
                echo json_encode(array('status' => 'failure', 'message' => "Você precisa selecionar uma imagem."));
                exit();
            }
        } else {
            echo json_encode(array('status' => 'failure', 'message' => "Dados inconsistentes."));
            exit();
        }
    } else if ($Action === "edit") {
      if (isset($_POST["DepoimentosID"]) && is_numeric($_POST["DepoimentosID"]) && isset($_SESSION["UserID"]) && 
          is_numeric($_SESSION["UserID"]) && !empty($_POST["DepoimentosID"]) && !empty($_SESSION["UserID"]) && 
          isset($_POST["txtTitlePT-BR"])  && isset($_POST["txtContentPT-BR"]) && 
          isset($_POST["txtTitleEN-US"])  && isset($_POST["txtContentEN-US"]) && 
          isset($_POST["txtTitleES-ES"])  && isset($_POST["txtContentES-ES"]) && 
          isset($_POST["txtTitleFR-FR"])  && isset($_POST["txtContentFR-FR"]) &&
          strlen($_POST["txtTitlePT-BR"]) <= MAX_TITLE_SIZE && strlen($_POST["txtTitleEN-US"]) <= MAX_FILE_NAME_SIZE && strlen($_POST["txtTitleES-ES"]) <= MAX_FILE_NAME_SIZE && strlen($_POST["txtTitleFR-FR"]) <= MAX_FILE_NAME_SIZE &&
          strlen($_POST["txtDescriptionPT-BR"]) <= MAX_DESCRIPTION_SIZE && strlen($_POST["txtDescriptionEN-US"]) <= MAX_DESCRIPTION_SIZE && strlen($_POST["txtDescriptionES-ES"]) <= MAX_DESCRIPTION_SIZE && strlen($_POST["txtDescriptionFR-FR"]) <= MAX_DESCRIPTION_SIZE) {

        $DepoimentosModel = new DepoimentosModel();
        $UserModel = new UserModel();
        $DepoimentosController = new DepoimentoController();
          
        $DepoimentosModel->setDepoimentoID(filter_input(INPUT_POST, "DepoimentosID", FILTER_SANITIZE_NUMBER_INT));
        $DepoimentosModel->setDepoLastEditionDate(date("Y-m-d"));
        $UserModel->setUserID($_SESSION["UserID"]);
  
        $TitleArray = array();
        $DescriptionArray = array();
        $ContentArray = array();
  
        $TitleArray["pt-br"] = strip_tags(trim(filter_input(INPUT_POST, "txtTitlePT-BR", FILTER_DEFAULT)));
        $ContentArray["pt-br"] = trim(filter_input(INPUT_POST, "txtContentPT-BR", FILTER_DEFAULT));
  
        $TitleArray["en-us"] = strip_tags(trim(filter_input(INPUT_POST, "txtTitleEN-US", FILTER_DEFAULT)));
        $ContentArray["en-us"] = trim(filter_input(INPUT_POST, "txtContentEN-US", FILTER_DEFAULT));
  
        $TitleArray["es-es"] = strip_tags(trim(filter_input(INPUT_POST, "txtTitleES-ES", FILTER_DEFAULT)));
        $ContentArray["es-es"] = trim(filter_input(INPUT_POST, "txtContentES-ES", FILTER_DEFAULT));
  
        $TitleArray["fr-fr"] = strip_tags(trim(filter_input(INPUT_POST, "txtTitleFR-FR", FILTER_DEFAULT)));
        $ContentArray["fr-fr"] = trim(filter_input(INPUT_POST, "txtContentFR-FR", FILTER_DEFAULT));
  
        $DepoimentosModel->setDepoName($TitleArray);
        $DepoimentosModel->setDContent($ContentArray);
        
        $NewImage = false;

        if($_FILES["fileThumb"]["size"] != 0) {
          if(!checkExistence("../../assets/pictures/", $_FILES["fileThumb"]["name"])) {
            if(uploadImage($_FILES["fileThumb"], "../../assets/pictures/")) {
              $DepoimentosModel->setDImage($_FILES["fileThumb"]["name"]);
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
  
        if($DepoimentosController->editDepoimento($DepoimentosModel, $NewImage)) {
          echo json_encode(array("status" => "success", "message" => "Depoimentos editado com sucesso!"));
          exit();
        } else {
          echo json_encode(array("status" => "failure", "message" => "Não foi possível editar o Depoimentos."));
          exit();
        }
      } else {
        echo json_encode(array("status" => "failure", "message" => "Dados inconsistentes."));
        exit();
      }
    }

}

class DepoimentoController
{

    public function createDepoimento($DepoimentosModel)
    {

        global $pdo;

        $DepoimentosQuery = $pdo->prepare("INSERT INTO Depoimentos(Depoimentos_Date, Depoimentos_Thumbnail, Users_ID_FK_Author,) VALUES (?, ?, ?);");
        $DepoimentosQuery->bindValue(1, $DepoimentosModel->getDepoimentosDate(), PDO::PARAM_STR);
        $DepoimentosQuery->bindValue(2, $DepoimentosModel->getDepoimentosLastEditionDate(), PDO::PARAM_STR);
        $DepoimentosQuery->bindValue(3, $DepoimentosModel->getDepoimentosThumbnail(), PDO::PARAM_STR);

        if ($DepoimentosQuery->execute()) {
            $DepoimentosLanguages = array("pt-br", "en-us", "es-es", "fr-fr");
            $ID = $pdo->lastInsertId();

            for ($i = 0; $i < count($DepoimentosLanguages); $i++) {
                $DepoimentosQuery = $pdo->prepare("INSERT INTO DepoimentosTranslations (DepoimentosTranslations_Language, DepoimentosTranslations_Title, DepoimentosTranslations_Content, Depoimentos_ID_FK) VALUES (?, ?, ?, ?);");
                $DepoimentosQuery->bindValue(1, $DepoimentosLanguages[$i], PDO::PARAM_STR);
                $DepoimentosQuery->bindValue(2, $DepoimentosModel->getDepoimentosTitle()[$DepoimentosLanguages[$i]], PDO::PARAM_STR);
                $DepoimentosQuery->bindValue(3, $DepoimentosModel->getDepoimentosContent()[$DepoimentosLanguages[$i]], PDO::PARAM_STR);
                $DepoimentosQuery->bindValue(4, $ID, PDO::PARAM_INT);

                if (!$DepoimentosQuery->execute()) {
                    return false;

                }
            }

            return true;
        }

        return false;

    }

    public function deleteDepoimento($DepoimentoID, $User)
    {
        global $pdo;

        $DepoimentosQuery = $pdo->prepare("DELETE FROM DepoimentossTranslations WHERE Depoimentoss_ID_FK = ?;");
        $DepoimentosQuery->bindValue(1, $DepoimentoID, PDO::PARAM_INT);

        if ($DepoimentosQuery->execute()) {
            $DepoimentosThumbnail = new DepoimentoController();

            $DepoimentosQuery = $pdo->prepare("DELETE FROM Depoimentoss WHERE Depoimentoss_ID = ?;");
            $DepoimentosQuery->bindValue(1, $DepoimentoID, PDO::PARAM_INT);

            deleteFile("../../assets/pictures/" . $DepoimentosThumbnail->getDepoimentAllLang($DepoimentoID)->getDImage());

            if ($DepoimentosQuery->execute()) {
                return true;
            }
        }

        return false;

    }
    public function editDepoimento($DepoimentosModel, $NewImage)
    {

        global $pdo;

        if ($NewImage) {
            $DepoimentosQuery = $pdo->prepare("UPDATE Depoimentos SET Depoimentos_LastEditonDate = ?, Depoimentos_Thumbnail = ?,  WHERE Depoimentoss_ID = ?;");
            $DepoimentosQuery->bindValue(1, $DepoimentosModel->getDepoimentosLastEditionDate(), PDO::PARAM_STR);
            $DepoimentosQuery->bindValue(2, $DepoimentosModel->getDepoimentosThumbnail(), PDO::PARAM_STR);
            $DepoimentosQuery->bindValue(3, $DepoimentosModel->getDepoimentosID(), PDO::PARAM_INT);
        } else {
            $DepoimentosQuery = $pdo->prepare("UPDATE Depoimentoss SET Depoimentos_LastEditonDate = ?, WHERE Depoimentoss_ID = ?;");
            $DepoimentosQuery->bindValue(1, $DepoimentosModel->getDepoimentosLastEditionDate(), PDO::PARAM_STR);
            $DepoimentosQuery->bindValue(3, $DepoimentosModel->getDepoimentosID(), PDO::PARAM_INT);
        }

        if ($DepoimentosQuery->execute()) {
            $DepoimentosLanguages = array("pt-br", "en-us", "es-es", "fr-fr");
            for ($i = 0; $i < count($DepoimentosLanguages); $i++) {
                $DepoimentosQuery = $pdo->prepare("UPDATE DepoimentosTranslations SET DepoimentosTranslations_Title = ?, DepoimentossTranslations_Content = ? WHERE DepoimentosTranslations_Language = ? AND Depoimentos_ID_FK = ?;");
                $DepoimentosQuery->bindValue(1, $DepoimentosModel->getDepoimentosTitle()[$DepoimentosLanguages[$i]], PDO::PARAM_STR);
                $DepoimentosQuery->bindValue(3, $DepoimentosModel->getDepoimentosContent()[$DepoimentosLanguages[$i]], PDO::PARAM_STR);
                $DepoimentosQuery->bindValue(4, $DepoimentosLanguages[$i], PDO::PARAM_STR);
                $DepoimentosQuery->bindValue(5, $DepoimentosModel->getDepoimentosID(), PDO::PARAM_INT);

                if (!$DepoimentosQuery->execute()) {
                    return false;
                }
            }
            return true;
        }

        return false;
    }


    public function getDepoimentAllLang($DepoimentoID) {
      global $pdo;

      $DepoimentoQuery = $pdo->prepare("SELECT Depoimentos_ID, Depoimentos_Date, Depoimentos_LastEditonDate, Depoimentos_Thumbnail FROM Depoimentos WHERE Depoimentos_ID = ?;");
      $DepoimentoQuery->bindValue(1, $DepoimentoID, PDO::PARAM_INT);

      $DepoimentoModel = null;
      
      if ($DepoimentoQuery->execute()) {
        if ($DepoimentoQuery->rowCount() == 1) {
          $Row = $DepoimentoQuery->fetch();
          $DepoimentoModel = new DepoimentosModel();

          $DepoimentoModel->setDepoimentoID($Row["Depoimentos_ID"]);
          $DepoimentoModel->setDepoDate($Row["Depoimentos_Date"]);
          $DepoimentoModel->setDImage($Row["Depoimentos_Thumbnail"]);

          $DepoimentoQuery = $pdo->prepare("SELECT DepoimentosTranslations_ID, DepoimentosTranslations_Language, DepoimentosTranslations_Title, DepoimentosTranslations_Description, DepoimentosTranslations_Content FROM DepoimentosTranslations WHERE Depoimentos_ID_FK = ?;");
          $DepoimentoQuery->bindValue(1, $DepoimentoID, PDO::PARAM_INT);

          if ($DepoimentoQuery->execute()) {
            if ($DepoimentoQuery->rowCount() == LANGUAGE_AMOUNT) {
              $TitleArray = array();
              $ContentArray = array();

              while ($Row = $DepoimentoQuery->fetch()) {
                $TitleArray[$Row["DepoimentosTranslations_Language"]] = $Row["DepoimentosTranslations_Title"];
                $ContentArray[$Row["DepoimentosTranslations_Language"]] = $Row["DepoimentosTranslations_Content"];
              }

              $DepoimentoModel->setDepoName($TitleArray);
              $DepoimentoModel->setDContent($ContentArray);
            }
          }
        }
      }

      return $DepoimentoModel;
    }

    public function getDepoimento($DepoimentoID, $DepoimentosLanguage) { // pega um depoimento especifico
      global $pdo;

      $DepoimentoQuery = $pdo->prepare("SELECT Depoimentos_ID, DepoimentosTranslations_Language, DepoimentosTranslations_Title, DepoimentosTranslations_Content, Depoimentos_Date, Depoimentos_Thumbnail FROM Depoimentos INNER JOIN DepoimentosTranslations ON Depoimentos.Depoimentos_ID = DepoimentosTranslations.Depoimentos_ID_FK WHERE Depoimentos_ID = ? AND DepoimentosTranslations_Language = ? LIMIT 1;");
      $DepoimentoQuery->bindValue(1, $DepoimentoID, PDO::PARAM_INT);
      $DepoimentoQuery->bindValue(2, $DepoimentosLanguage, PDO::PARAM_STR);

      $DepoimentoQuery->execute();

      $DepoimentoModel = NULL;

      if($DepoimentoQuery->rowCount() == 1) {
        $Row = $DepoimentoQuery->fetch();
        $DepoimentoModel = new DepoimentosModel();
        $DepoimentoModel->setDepoimentoID($Row["Depoimentos_ID"]);
        $DepoimentoModel->setDLanguage($Row["DepoimentosTranslations_Language"]);
        $DepoimentoModel->setDepoName($Row["DepoimentosTranslations_Title"]);
        $DepoimentoModel->setDContent($Row["DepoimentosTranslations_Content"]);
        $DepoimentoModel->setDepoDate($Row["Depoimentos_Date"]);
        $DepoimentoModel->setDImage($Row["Depoimentos_Thumbnail"]);
      }

      return $DepoimentoModel;
    }

    public function getAllDepoimentos($DepoimentosLanguage) {
      global $pdo;

      $DepoimentosQuery = $pdo->prepare("SELECT Depoimentos_ID, Depoimentos_Date, Depoimentos_Thumbnail, Users_ID_FK_Author, Users_ID_FK_LastEditionDate, IJ1.Users_Name, IJ2.Users_Name, 
      DepoimentosTranslations_Language, DepoimentosTranslations_Title,  DepoimentosTranslations_Content FROM Depoimentos INNER JOIN DepoimentosTranslations ON Depoimentos.Depoimentos_ID = DepoimentosTranslations.Depoimentos_ID_FK INNER JOIN
       Users AS IJ1 ON IJ1.Users_ID = Depoimentos.Users_ID_FK_Author INNER JOIN Users AS IJ2  WHERE DepoimentosTranslations.DepoimentosTranslations_Language = ?;");
      $DepoimentosQuery->bindValue(1, $DepoimentosLanguage, PDO::PARAM_STR);

      $DepoimentosArray = array();
     

      while($Row = $DepoimentosQuery ->fetch()) {
          $DepoimentosModel = new DepoimentosModel();
          $UserModel = new UserModel();
          $UserModelAuthor = new UserModel();

          $UserModelAuthor->setUserName($Row["Users_Name"]);

          $DepoimentosModel->setDImage($Row["CImages_ID"]);
          $DepoimentosModel->setDepoName($Row["CImages_Name"]);
          $DepoimentosModel->setDepoDate($Row["CImages_Date"]);

          $UserModel->setUserID($Row["Users_ID_FK"]);
          $UserModel->setUserName($Row["Users_Name"]);

          
        $DepoimentosModel->setDepoimentoID($Row["Depoimentos_ID"]);
        $DepoimentosModel->setDepoDate($Row["Depoimentos_Date"]);
        $DepoimentosModel->setDepoLastEditionDate($Row["Depoimentos_LastEditonDate"]);
        $DepoimentosModel->setDImage($Row["Depoimentos_Thumbnail"]);
        $DepoimentosModel->setDLanguage($Row["DepoimentosTranslations_Language"]);
        $DepoimentosModel->setDepoName($Row["DepoimentossTranslations_Title"]);
        $DepoimentosModel->setDContent($Row["DepoimentosTranslations_Content"]);
        $DepoimentosModel->setUserAuthor($UserModelAuthor);

        array_push($DepoimentosArray, $DepoimentosModel);
      }

      return $DepoimentosArray;
  }


}
