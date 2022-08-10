<?php
    require_once("Connection.php");
    require_once("Constants.php");
    require_once("CardModel.php");
    require_once("UserModel.php");
    require_once("UserController.php");
    require_once("File.php");

    if(!isset($_SESSION)) {
        session_start();
    }

    if (isset($_POST["actionCard"]) && !is_numeric($_POST["actionCard"]) && !empty($_POST["actionCard"])) {
        $Action = strip_tags(trim(filter_input(INPUT_POST, "actionCard", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW)));

        if($Action === "delete") {
            if(isset($_POST["CardID"]) && is_numeric($_POST["CardID"]) && !empty($_POST["CardID"]) && filter_input(INPUT_POST, "CardID", FILTER_VALIDATE_INT) &&
               isset($_SESSION["UserID"]) && is_numeric($_SESSION["UserID"]) && !empty($_SESSION["UserID"])) {
              $ID = filter_input(INPUT_POST, "CardID", FILTER_SANITIZE_NUMBER_INT);
              $User = new UserModel();
              $CardController = new CardController();
              $User->setUserID($_SESSION["UserID"]);
      
              if($CardController->deleteCard($ID, $User)) {
                echo json_encode(array('status' => 'success', 'message' => "Card deletado com sucesso!"));
                exit();
              } else {
                echo json_encode(array('status' => 'failure', 'message' => "Não foi possível deletar o Card."));
                exit();
              } 
              
            }
          }

        if ($Action === "edit") {
            if (isset($_POST["CardID"]) && is_numeric($_POST["CardID"]) && !empty($_POST["CardID"]) &&
                isset($_SESSION["UserID"]) && is_numeric($_SESSION["UserID"]) && !empty($_SESSION["UserID"]) && 
                isset($_POST["txtTitlePT-BR"]) && !empty($_POST["txtTitlePT-BR"]) && isset($_POST["txtDescriptionPT-BR"]) && isset($_POST["txtContentPT-BR"]) && 
                isset($_POST["txtTitleEN-US"]) && !empty($_POST["txtTitleEN-US"]) && isset($_POST["txtDescriptionEN-US"]) && isset($_POST["txtContentEN-US"]) && 
                isset($_POST["txtTitleES-ES"]) && !empty($_POST["txtTitleES-ES"]) && isset($_POST["txtDescriptionES-ES"]) && isset($_POST["txtContentES-ES"]) && 
                isset($_POST["txtTitleFR-FR"]) && !empty($_POST["txtTitleFR-FR"]) && isset($_POST["txtDescriptionFR-FR"]) && isset($_POST["txtContentFR-FR"]) &&
                strlen($_POST["txtTitlePT-BR"]) <= MAX_TITLE_SIZE && strlen($_POST["txtTitleEN-US"]) <= MAX_TITLE_SIZE && strlen($_POST["txtTitleES-ES"]) <= MAX_TITLE_SIZE && strlen($_POST["txtTitleFR-FR"]) <= MAX_TITLE_SIZE &&
                strlen($_POST["txtDescriptionPT-BR"]) <= MAX_DESCRIPTION_SIZE && strlen($_POST["txtDescriptionEN-US"]) <= MAX_DESCRIPTION_SIZE && strlen($_POST["txtDescriptionES-ES"]) <= MAX_DESCRIPTION_SIZE && strlen($_POST["txtDescriptionFR-FR"]) <= MAX_DESCRIPTION_SIZE) {
                
                if(filter_input(INPUT_POST, "CardID", FILTER_VALIDATE_INT)) {
                    $CardModel = new CardModel();
                    $UserModel = new UserModel();
                    $CardController = new CardController();
                    
                    $CardModel->setCardID(filter_input(INPUT_POST, "CardID", FILTER_SANITIZE_NUMBER_INT));
                    $CardModel->setCardLastEditionDate(date("Y-m-d"));
                    $UserModel->setUserID($_SESSION["UserID"]);
                    $CardModel->setUserLastEditionAuthor($UserModel);

                    $NameArray = array();
                    $DescriptionArray = array();
                    $ContentArray = array();

                    $NameArray["pt-br"] = strip_tags(trim(filter_input(INPUT_POST, "txtTitlePT-BR", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW)));
                    $DescriptionArray["pt-br"] = strip_tags(trim(filter_input(INPUT_POST, "txtDescriptionPT-BR", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW)));
                    $ContentArray["pt-br"] = trim(filter_input(INPUT_POST, "txtContentPT-BR", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW));

                    $NameArray["en-us"] = strip_tags(trim(filter_input(INPUT_POST, "txtTitleEN-US", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW)));
                    $DescriptionArray["en-us"] = strip_tags(trim(filter_input(INPUT_POST, "txtDescriptionEN-US", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW)));
                    $ContentArray["en-us"] = trim(filter_input(INPUT_POST, "txtContentEN-US", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW));

                    $NameArray["es-es"] = strip_tags(trim(filter_input(INPUT_POST, "txtTitleES-ES", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW)));
                    $DescriptionArray["es-es"] = strip_tags(trim(filter_input(INPUT_POST, "txtDescriptionES-ES", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW)));
                    $ContentArray["es-es"] = trim(filter_input(INPUT_POST, "txtContentES-ES", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW));

                    $NameArray["fr-fr"] = strip_tags(trim(filter_input(INPUT_POST, "txtTitleFR-FR", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW)));
                    $DescriptionArray["fr-fr"] = strip_tags(trim(filter_input(INPUT_POST, "txtDescriptionFR-FR", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW)));
                    $ContentArray["fr-fr"] = trim(filter_input(INPUT_POST, "txtContentFR-FR", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW));

                    $CardModel->setCardName($NameArray);
                    $CardModel->setCardDescription($DescriptionArray);
                    $CardModel->setCardContent($ContentArray);

                    $NewImage = false;
                    
                    if ($_FILES["fileThumb"]["size"] != 0) {
                        if (!checkExistence("../../assets/pictures/cards/", $_FILES["fileThumb"]["name"])) {
                            if (uploadImage($_FILES["fileThumb"], "../../assets/pictures/cards/")) {
                                $CardModel->setCardThumbnail(strip_tags(trim($_FILES["fileThumb"]["name"])));
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

                    if ($CardController->editCard($CardModel, $NewImage)) {
                        echo json_encode(array("status" => "success", "message" => "Card editado com sucesso!"));
                        exit();
                    } else {
                        echo json_encode(array("status" => "failure", "message" => "Não foi possível editar o card."));
                        exit();
                    }
                } else {
                    echo json_encode(array("status" => "failure", "message" => "Não foi possível editar o card."));
                    exit();
                }
            } else {
                echo json_encode(array("status" => "failure", "message" => "Dados inconsistentes."));
                exit();
            }
        } 
    }

    class CardController {
        public function getCards($CardLanguage) {
            global $pdo;

            $CardQuery = $pdo->prepare("SELECT Cards_ID, Cards_Date, Cards_LastEditionDate, Cards_Thumbnail, Users_ID_FK_Author, Users_ID_FK_LastEditionAuthor, IJ1.Users_Name, IJ2.Users_Name, CardsTranslations_Language, CardsTranslations_Name, CardsTranslations_Description, CardsTranslations_Content FROM Cards INNER JOIN CardsTranslations ON Cards.Cards_ID = CardsTranslations.Cards_ID_FK INNER JOIN Users AS IJ1 ON IJ1.Users_ID = Cards.Users_ID_FK_Author INNER JOIN Users AS IJ2 ON IJ2.Users_ID = Cards.Users_ID_FK_LastEditionAuthor WHERE CardsTranslations.CardsTranslations_Language = ? ORDER BY Cards_ID DESC LIMIT 5;");
            $CardQuery->bindValue(1, $CardLanguage, PDO::PARAM_STR);

            $CardsArray = array();

            $CardQuery->execute();

            while($Row = $CardQuery->fetch()) {
                $CardModel = new CardModel();
                $UserModelAuthor = new UserModel();
                $UserModelLastEditionAuthor = new UserModel();

                $UserModelAuthor->setUserID($Row["Users_ID_FK_Author"]);
                $UserModelAuthor->setUserName($Row["Users_Name"]);

                $UserModelLastEditionAuthor->setUserID($Row["Users_ID_FK_LastEditionAuthor"]);
                $UserModelLastEditionAuthor->setUserName($Row["Users_Name"]);

                $CardModel->setCardID($Row["Cards_ID"]);
                $CardModel->setUserAuthor($UserModelAuthor);
                $CardModel->setUserLastEditionAuthor($UserModelLastEditionAuthor);
                $CardModel->setCardName($Row["CardsTranslations_Name"]);
                $CardModel->setCardDescription($Row["CardsTranslations_Description"]);
                $CardModel->setCardContent($Row["CardsTranslations_Content"]);
                $CardModel->setCardLanguage($Row["CardsTranslations_Language"]);
                $CardModel->setCardThumbnail($Row["Cards_Thumbnail"]);
                $CardModel->setCardDate($Row["Cards_Date"]);
                $CardModel->setCardLastEditionDate($Row["Cards_LastEditionDate"]);

                array_push($CardsArray, $CardModel);
            }

            return $CardsArray;
        }

        public function getCard($CardID, $CardLanguage) {
            global $pdo;

            $CardQuery = $pdo->prepare("SELECT Cards_ID, Cards_Date, Cards_LastEditionDate, Cards_Thumbnail, Users_ID_FK_Author, Users_ID_FK_LastEditionAuthor, IJ1.Users_Name, IJ2.Users_Name, CardsTranslations_Language, CardsTranslations_Name, CardsTranslations_Description, CardsTranslations_Content FROM Cards INNER JOIN CardsTranslations ON Cards.Cards_ID = CardsTranslations.Cards_ID_FK INNER JOIN Users AS IJ1 ON IJ1.Users_ID = Cards.Users_ID_FK_Author INNER JOIN Users AS IJ2 ON IJ2.Users_ID = Cards.Users_ID_FK_LastEditionAuthor WHERE Cards.Cards_ID = ? AND CardsTranslations.CardsTranslations_Language = ? LIMIT 1;");
            $CardQuery->bindValue(1, $CardID, PDO::PARAM_INT);
            $CardQuery->bindValue(2, $CardLanguage, PDO::PARAM_STR);

            $CardModel = null;

            if ($CardQuery->execute()) {
                if ($CardQuery->rowCount() == 1) {
                    $Row = $CardQuery->fetch();
                    $CardModel = new CardModel();
                    $UserModelAuthor = new UserModel();
                    $UserModelLastEditionAuthor = new UserModel();

                    $UserModelAuthor->setUserID($Row["Users_ID_FK_Author"]);
                    $UserModelAuthor->setUserName($Row["Users_Name"]);

                    $UserModelLastEditionAuthor->setUserID($Row["Users_ID_FK_LastEditionAuthor"]);
                    $UserModelLastEditionAuthor->setUserName($Row["Users_Name"]);

                    $CardModel->setCardID($Row["Cards_ID"]);
                    $CardModel->setUserAuthor($UserModelAuthor);
                    $CardModel->setUserLastEditionAuthor($UserModelLastEditionAuthor);
                    $CardModel->setCardName($Row["CardsTranslations_Name"]);
                    $CardModel->setCardDescription($Row["CardsTranslations_Description"]);
                    $CardModel->setCardContent($Row["CardsTranslations_Content"]);
                    $CardModel->setCardLanguage($Row["CardsTranslations_Language"]);
                    $CardModel->setCardThumbnail($Row["Cards_Thumbnail"]);
                    $CardModel->setCardDate($Row["Cards_Date"]);
                    $CardModel->setCardLastEditionDate($Row["Cards_LastEditionDate"]);
                }
            }

            return $CardModel;
        }

        public function getCardAllLang($CardID) {
            global $pdo;

            $CardQuery = $pdo->prepare("SELECT Cards_ID, Cards_Date, Cards_Thumbnail FROM Cards WHERE Cards_ID = ?;");
            $CardQuery->bindValue(1, $CardID, PDO::PARAM_INT);

            $CardModel = null;

            if ($CardQuery->execute()) {
                if ($CardQuery->rowCount() == 1) {
                    $Row = $CardQuery->fetch();
                    $CardModel = new CardModel();

                    $CardModel->setCardID($Row["Cards_ID"]);
                    $CardModel->setCardThumbnail($Row["Cards_Thumbnail"]);
                    $CardModel->setCardDate($Row["Cards_Date"]);

                    $CardTranslationQuery = $pdo->prepare("SELECT CardsTranslations_ID, CardsTranslations_Language, CardsTranslations_Name, CardsTranslations_Description, CardsTranslations_Content FROM CardsTranslations WHERE Cards_ID_FK = ?;");
                    $CardTranslationQuery->bindValue(1, $CardID, PDO::PARAM_INT);

                    if ($CardTranslationQuery->execute()) {
                        if ($CardTranslationQuery->rowCount() == LANGUAGE_AMOUNT) {
                            $TitleArray = array();
                            $DescriptionArray = array();
                            $ContentArray = array();

                            while ($Row = $CardTranslationQuery->fetch()) {
                                $TitleArray[$Row["CardsTranslations_Language"]] = $Row["CardsTranslations_Name"];
                                $DescriptionArray[$Row["CardsTranslations_Language"]] = $Row["CardsTranslations_Description"];
                                $ContentArray [$Row["CardsTranslations_Language"]] = $Row["CardsTranslations_Content"];
                            }

                            $CardModel->setCardName($TitleArray);
                            $CardModel->setCardDescription($DescriptionArray);
                            $CardModel->setCardContent($ContentArray);
                        }
                    }
                }
            }

            return $CardModel;
        }

        public function editCard($CardModel, $NewImage) {
            global $pdo;

            if ($NewImage) {
                $CardQuery = $pdo->prepare("UPDATE Cards SET Cards_Thumbnail = ?, Cards_LastEditionDate = ?, Users_ID_FK_LastEditionAuthor = ? WHERE Cards_ID = ?;");
                $CardQuery->bindValue(1, $CardModel->getCardThumbnail(), PDO::PARAM_STR);
                $CardQuery->bindValue(2, $CardModel->getCardLastEditionDate(), PDO::PARAM_STR);
                $CardQuery->bindValue(3, $CardModel->getUserLastEditionAuthor()->getUserID(), PDO::PARAM_INT);
                $CardQuery->bindValue(4, $CardModel->getCardID(), PDO::PARAM_INT);
            } else {
                $CardQuery = $pdo->prepare("UPDATE Cards SET Cards_LastEditionDate = ?, Users_ID_FK_LastEditionAuthor = ? WHERE Cards_ID = ?;");
                $CardQuery->bindValue(1, $CardModel->getCardLastEditionDate(), PDO::PARAM_STR);
                $CardQuery->bindValue(2, $CardModel->getUserLastEditionAuthor()->getUserID(), PDO::PARAM_INT);
                $CardQuery->bindValue(3, $CardModel->getCardID(), PDO::PARAM_INT);
            }

            if ($CardQuery->execute()) {
                $CardLanguages = array("pt-br", "en-us", "es-es", "fr-fr");
                for ($i = 0; $i < count($CardLanguages); $i++) {
                    $CardQuery = $pdo->prepare("UPDATE CardsTranslations SET CardsTranslations_Name = ?, CardsTranslations_Description = ?, CardsTranslations_Content = ? WHERE CardsTranslations_Language = ? AND Cards_ID_FK = ?;");
                    $CardQuery->bindValue(1, $CardModel->getCardName()[$CardLanguages[$i]], PDO::PARAM_STR);
                    $CardQuery->bindValue(2, $CardModel->getCardDescription()[$CardLanguages[$i]], PDO::PARAM_STR);
                    $CardQuery->bindValue(3, $CardModel->getCardContent()[$CardLanguages[$i]], PDO::PARAM_STR);
                    $CardQuery->bindValue(4, $CardLanguages[$i], PDO::PARAM_STR);
                    $CardQuery->bindValue(5, $CardModel->getCardID(), PDO::PARAM_INT);
                   
                   

                    if (!$CardQuery->execute()) {
                        return false;
                    }
                }

                return true;
            }

            return false;
        }

        public function createCard($CardModel) {
            global $pdo;

            $CardQuery = $pdo->prepare("INSERT INTO Cards (Cards_Date, Cards_LastEditionDate, Cards_Thumbnail, Users_ID_FK_Author, Users_ID_FK_LastEditionAuthor) VALUES (?, ?, ?, ?, ?);");
            $CardQuery->bindValue(1, $CardModel->getCardDate(), PDO::PARAM_STR);
            $CardQuery->bindValue(2, $CardModel->getCardLastEditionDate(), PDO::PARAM_STR);
            $CardQuery->bindValue(3, $CardModel->getCardThumbnail(), PDO::PARAM_STR);
            $CardQuery->bindValue(4, $CardModel->getUserAuthor()->getUserID(), PDO::PARAM_INT);
            $CardQuery->bindValue(5, $CardModel->getUserLastEditionAuthor()->getUserID(), PDO::PARAM_INT);

            if ($CardQuery->execute()) {
                $ID = $pdo->lastInsertID(); 

                $CardQuery = $pdo->prepare("INSERT INTO CardsTranslations (CardsTranslations_Language, CardsTranslations_Name, CardsTranslations_Description, CardsTranslations_Content, Cards_ID_FK) VALUES (?, ?, ?, ?, ?);");
                $CardQuery->bindValue(1, $CardModel->getCardLanguage(), PDO::PARAM_STR);
                $CardQuery->bindValue(2, $CardModel->getCardName(), PDO::PARAM_STR);
                $CardQuery->bindValue(3, $CardModel->getCardDescription(), PDO::PARAM_STR);
                $CardQuery->bindValue(4, $CardModel->getCardContent(), PDO::PARAM_STR);
                $CardQuery->bindValue(5, $ID, PDO::PARAM_INT);

                if ($CardQuery->execute()) {
                    return true;
                } else {
                    $CardQuery = $pdo->prepare("DELETE FROM Cards WHERE Cards_ID = ?;");
                    $CardQuery->bindValue(1, $ID, PDO::PARAM_INT);

                    $CardQuery->execute();

                    return false;
                }
            } else {
                return false;
            }
        }
        public function deleteCard($CardModel, $User) {
            global $pdo;
      
            $CardQuery = $pdo->prepare("DELETE FROM CardsTranslations WHERE Cards_ID_FK = ?;");
            $CardQuery->bindValue(1,$CardModel->getCardID(), PDO::PARAM_INT);
      
            if($CardQuery->execute()) {
              $CardThumbnail = new CardController();
      
              $CardQuery  = $pdo->prepare("DELETE FROM Cards WHERE Cards_ID = ?;");
              $CardQuery->bindValue(1, $CardModel->getCardID(), PDO::PARAM_INT);
      
              deleteFile("../../assets/pictures/" . $CardThumbnail->getCardAllLang($CardModel->getCardID())->getCardThumbnail());
      
              if ($CardQuery->execute()) {
                return true;
              }
            }
      
            return false;
          }
    }
?>
