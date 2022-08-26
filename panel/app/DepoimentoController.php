<?php
    require_once("Connection.php");
    require_once("Constants.php");
    require_once("UserModel.php");
    require_once("PageModel.php");

    if (!isset($_SESSION)) {
        session_start();
    }

    if (isset($_POST["actionPage"]) && !is_numeric($_POST["actionPage"]) && !empty($_POST["actionPage"])) {
        $Action = strip_tags(trim(filter_input(INPUT_POST, "actionPage", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW)));

        if ($Action === "create") {
            if (isset($_SESSION["UserID"]) && is_numeric($_SESSION["UserID"]) && !empty($_SESSION["UserID"]) &&
                isset($_POST["txtTitlePT-BR"]) && !is_numeric($_POST["txtTitlePT-BR"]) && !empty($_POST["txtTitlePT-BR"]) &&
                isset($_POST["txtTitleEN-US"]) && !is_numeric($_POST["txtTitleEN-US"]) && !empty($_POST["txtTitleEN-US"]) &&
                // isset($_POST["txtTitleES-ES"]) && !is_numeric($_POST["txtTitleES-ES"]) && !empty($_POST["txtTitleES-ES"]) &&
                // isset($_POST["txtTitleFR-FR"]) && !is_numeric($_POST["txtTitleFR-FR"]) && !empty($_POST["txtTitleFR-FR"]) &&
                isset($_POST["txtContentPT-BR"]) && !is_numeric($_POST["txtContentPT-BR"]) && !empty($_POST["txtContentPT-BR"]) &&
                isset($_POST["txtContentEN-US"]) && !is_numeric($_POST["txtContentEN-US"]) && !empty($_POST["txtContentEN-US"]) &&
                // isset($_POST["txtContentES-ES"]) && !is_numeric($_POST["txtContentES-ES"]) && !empty($_POST["txtContentES-ES"]) &&
                // isset($_POST["txtContentFR-FR"]) && !is_numeric($_POST["txtContentFR-FR"]) && !empty($_POST["txtContentFR-FR"]) &&
                strlen($_POST["txtTitlePT-BR"]) <= MAX_TITLE_SIZE && strlen($_POST["txtTitleEN-US"]) <= MAX_TITLE_SIZE && strlen($_POST["txtTitleES-ES"]) <= MAX_TITLE_SIZE && strlen($_POST["txtTitleFR-FR"]) <= MAX_TITLE_SIZE) {
                
                $PageModel = new PageModel();
                $UserModel = new UserModel();
                $DepoimentoController = new DepoimentoController();

                $UserModel->setUserID($_SESSION["UserID"]);

                $PageModel->setPageDate(date("Y-m-d"));
                $PageModel->setPageLastEditionDate(date("Y-m-d"));
                $PageModel->setUserAuthor($UserModel);
                $PageModel->setUserLastEditionAuthor($UserModel);

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

                $PageModel->setPageTitle($TitleArray);
                $PageModel->setPageContent($ContentArray);

                if ($DepoimentoController->createDepoimento($PageModel)) {
                    echo json_encode(array("status" => "success", "message" => "Página criada com sucesso!"));
                    exit();
                } else {
                    echo json_encode(array("status" => "failure", "message" => "Não foi possível criar a Página."));
                    exit();
                }
            } else {
                echo json_encode(array("status" => "failure", "message" => "Dados inconsistentes."));
                exit();
            }
        } else if ($Action === "edit") {
            if (isset($_SESSION["UserID"]) && is_numeric($_SESSION["UserID"]) && !empty($_SESSION["UserID"]) &&
                isset($_POST["PageID"]) && is_numeric($_POST["PageID"]) && !empty($_POST["PageID"]) &&
                isset($_POST["txtTitlePT-BR"]) && !is_numeric($_POST["txtTitlePT-BR"]) && !empty($_POST["txtTitlePT-BR"]) &&
                isset($_POST["txtTitleEN-US"]) && !is_numeric($_POST["txtTitleEN-US"]) && !empty($_POST["txtTitleEN-US"]) &&
                // isset($_POST["txtTitleES-ES"]) && !is_numeric($_POST["txtTitleES-ES"]) && !empty($_POST["txtTitleES-ES"]) &&
                // isset($_POST["txtTitleFR-FR"]) && !is_numeric($_POST["txtTitleFR-FR"]) && !empty($_POST["txtTitleFR-FR"]) &&
                isset($_POST["txtContentPT-BR"]) && !is_numeric($_POST["txtContentPT-BR"]) && !empty($_POST["txtContentPT-BR"]) &&
                isset($_POST["txtContentEN-US"]) && !is_numeric($_POST["txtContentEN-US"]) && !empty($_POST["txtContentEN-US"]) &&
                // isset($_POST["txtContentES-ES"]) && !is_numeric($_POST["txtContentES-ES"]) && !empty($_POST["txtContentES-ES"]) &&
                // isset($_POST["txtContentFR-FR"]) && !is_numeric($_POST["txtContentFR-FR"]) && !empty($_POST["txtContentFR-FR"]) &&
                strlen($_POST["txtTitlePT-BR"]) <= MAX_TITLE_SIZE && strlen($_POST["txtTitleEN-US"]) <= MAX_TITLE_SIZE && strlen($_POST["txtTitleES-ES"]) <= MAX_TITLE_SIZE && strlen($_POST["txtTitleFR-FR"]) <= MAX_TITLE_SIZE) {

                $PageModel = new PageModel();
                $UserModel = new UserModel();
                $DepoimentoController = new DepoimentoController();
    
                $UserModel->setUserID($_SESSION["UserID"]);
    
                $PageModel->setPageID(filter_input(INPUT_POST, "PageID", FILTER_SANITIZE_NUMBER_INT));
                $PageModel->setPageDate(date("Y-m-d"));
                $PageModel->setPageLastEditionDate(date("Y-m-d"));
                $PageModel->setUserAuthor($UserModel);
                $PageModel->setUserLastEditionAuthor($UserModel);
    
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
    
                $PageModel->setPageTitle($TitleArray);
                $PageModel->setPageContent($ContentArray);
    
                if($DepoimentoController->editPage($PageModel)) {
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
        
                if($DepoimentoController->deletePage($ID, $User)) {
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

    class DepoimentoController {


        public function createDepoimento($PageModel) {
            global $pdo;

            $PageQuery = $pdo->prepare("INSERT INTO Pages (Pages_Date, Pages_LastEditionDate, Users_ID_FK_Author, Users_ID_FK_LastEditionAuthor) VALUES (?, ?, ?, ?);");
            $PageQuery->bindValue(1, $PageModel->getPageDate(), PDO::PARAM_STR);
            $PageQuery->bindValue(2, $PageModel->getPageLastEditionDate(), PDO::PARAM_STR);
            $PageQuery->bindValue(3, $PageModel->getUserAuthor()->getUserID(), PDO::PARAM_INT);
            $PageQuery->bindValue(4, $PageModel->getUserLastEditionAuthor()->getUserID(), PDO::PARAM_INT);

            if ($PageQuery->execute()) {
                $PageLanguages = array("pt-br", "en-us", "es-es", "fr-fr");
                $ID = $pdo->lastInsertId();

                for ($i = 0; $i < count($PageLanguages); $i++) {
                    $PageQuery = $pdo->prepare("INSERT INTO PagesTranslations (PagesTranslations_Language, PagesTranslations_Title, PagesTranslations_Content, Pages_ID_FK) VALUES (?, ?, ?, ?);");
                    $PageQuery->bindValue(1, $PageLanguages[$i], PDO::PARAM_STR);
                    $PageQuery->bindValue(2, $PageModel->getPageTitle()[$PageLanguages[$i]], PDO::PARAM_STR);
                    $PageQuery->bindValue(3, $PageModel->getPageContent()[$PageLanguages[$i]], PDO::PARAM_STR);
                    $PageQuery->bindValue(4, $ID, PDO::PARAM_INT);

                    if (!$PageQuery->execute()) {
                        return false;
                    }
                }

                return true;
            }

            return false;
        }
        

        public function editPage($PageModel) {
            global $pdo;

            $PageQuery = $pdo->prepare("UPDATE Pages SET Pages_LastEditionDate = ?, Users_ID_FK_LastEditionAuthor = ? WHERE Pages_ID = ?;");
            $PageQuery->bindValue(1, $PageModel->getPageLastEditionDate(), PDO::PARAM_STR);
            $PageQuery->bindValue(2, $PageModel->getUserLastEditionAuthor()->getUserID(), PDO::PARAM_INT);
            $PageQuery->bindValue(3, $PageModel->getPageID(), PDO::PARAM_INT);

            if ($PageQuery->execute()) {
                $PageLanguages = array("pt-br", "en-us", "es-es", "fr-fr");

                for ($i = 0; $i < count($PageLanguages); $i++) {
                    $PageQuery = $pdo->prepare("UPDATE PagesTranslations SET PagesTranslations_Title = ?, PagesTranslations_Content = ? WHERE PagesTranslations_Language = ? AND Pages_ID_FK = ?;");
                    $PageQuery->bindValue(1, $PageModel->getPageTitle()[$PageLanguages[$i]], PDO::PARAM_STR);
                    $PageQuery->bindValue(2, $PageModel->getPageContent()[$PageLanguages[$i]], PDO::PARAM_STR);
                    $PageQuery->bindValue(3, $PageLanguages[$i], PDO::PARAM_STR);
                    $PageQuery->bindValue(4, $PageModel->getPageID(), PDO::PARAM_INT);

                    if (!$PageQuery->execute()) {
                        return false;
                    }
                }

                return true;
            }

            return false;
        }

        public function deletePage($PageID, $UserModel) {
            global $pdo;

            $PageQuery = $pdo->prepare("DELETE FROM PagesTranslations WHERE Pages_ID_FK = ?;");
            $PageQuery->bindValue(1, $PageID, PDO::PARAM_INT);

            if ($PageQuery->execute()) {
                $PageQuery = $pdo->prepare("DELETE FROM Pages WHERE Pages_ID = ?;");
                $PageQuery->bindValue(1, $PageID, PDO::PARAM_INT);

                if ($PageQuery->execute()) {
                    return true;
                }
            }

            return false;
        }

        public function getPages($PageLanguage) {
            global $pdo;

            $PageQuery = $pdo->prepare("SELECT Pages_ID, Pages_Date, Pages_LastEditionDate, Users_ID_FK_Author, Users_ID_FK_LastEditionAuthor, PagesTranslations_Language, PagesTranslations_Title, PagesTranslations_Content, IJ1.Users_Name AS Users_Name_Author, IJ2.Users_Name AS Users_Name_LastEditionAuthor FROM Pages INNER JOIN PagesTranslations ON Pages.Pages_ID = PagesTranslations.Pages_ID_FK INNER JOIN Users AS IJ1 ON IJ1.Users_ID = Pages.Users_ID_FK_Author INNER JOIN Users AS IJ2 ON IJ2.Users_ID = Pages.Users_ID_FK_LastEditionAuthor WHERE PagesTranslations_Language = ?;");
            $PageQuery->bindValue(1, $PageLanguage, PDO::PARAM_STR);

            $PagesArray = array();

            if ($PageQuery->execute()) {
                if ($PageQuery->rowCount() > 0) {
                    while ($Row = $PageQuery->fetch()) {
                        $UserModelAuthor = new UserModel();
                        $UserModelLastEditionAuthor = new UserModel();
                        $PageModel = new PageModel();

                        $UserModelAuthor->setUserID($Row["Users_ID_FK_Author"]);
                        $UserModelAuthor->setUserName($Row["Users_Name_Author"]);

                        $UserModelLastEditionAuthor->setUserID($Row["Users_ID_FK_LastEditionAuthor"]);
                        $UserModelLastEditionAuthor->setUserName($Row["Users_Name_LastEditionAuthor"]);

                        $PageModel->setPageID($Row["Pages_ID"]);
                        $PageModel->setPageDate($Row["Pages_Date"]);
                        $PageModel->setPageLastEditionDate($Row["Pages_LastEditionDate"]);
                        $PageModel->setUserAuthor($UserModelAuthor);
                        $PageModel->setUserLastEditionAuthor($UserModelLastEditionAuthor);
                        $PageModel->setPageURL((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/page.php?type=3&id=" . $PageModel->getPageID());
                        $PageModel->setPageLanguage($Row["PagesTranslations_Language"]);
                        $PageModel->setPageTitle($Row["PagesTranslations_Title"]);
                        $PageModel->setPageContent($Row["PagesTranslations_Content"]);

                        array_push($PagesArray, $PageModel);
                    }
                }
            }

            return $PagesArray;
        }

        public function getPage($PageID, $PageLanguage) {
            global $pdo;

            $PageQuery = $pdo->prepare("SELECT Pages_ID, Pages_Date, Pages_LastEditionDate, Users_ID_FK_Author, Users_ID_FK_LastEditionAuthor, PagesTranslations_Language, PagesTranslations_Title, PagesTranslations_Content, IJ1.Users_Name AS Users_Name_Author, IJ2.Users_Name AS Users_Name_LastEditionAuthor FROM Pages INNER JOIN PagesTranslations ON Pages.Pages_ID = PagesTranslations.Pages_ID_FK INNER JOIN Users AS IJ1 ON IJ1.Users_ID = Pages.Users_ID_FK_Author INNER JOIN Users AS IJ2 ON IJ2.Users_ID = Pages.Users_ID_FK_LastEditionAuthor WHERE PagesTranslations_Language = ? AND Pages_ID = ? LIMIT 1;");
            $PageQuery->bindValue(1, $PageLanguage, PDO::PARAM_STR);
            $PageQuery->bindValue(2, $PageID, PDO::PARAM_INT);

            $PageModel = null;

            if ($PageQuery->execute()) {
                if ($PageQuery->rowCount() == 1) {
                    $Row = $PageQuery->fetch();

                    $UserModelAuthor = new UserModel();
                    $UserModelLastEditionAuthor = new UserModel();
                    $PageModel = new PageModel();

                    $UserModelAuthor->setUserID($Row["Users_ID_FK_Author"]);
                    $UserModelAuthor->setUserName($Row["Users_Name_Author"]);

                    $UserModelLastEditionAuthor->setUserID($Row["Users_ID_FK_LastEditionAuthor"]);
                    $UserModelLastEditionAuthor->setUserName($Row["Users_Name_LastEditionAuthor"]);

                    $PageModel->setPageID($Row["Pages_ID"]);
                    $PageModel->setPageDate($Row["Pages_Date"]);
                    $PageModel->setPageLastEditionDate($Row["Pages_LastEditionDate"]);
                    $PageModel->setUserAuthor($UserModelAuthor);
                    $PageModel->setUserLastEditionAuthor($UserModelLastEditionAuthor);
                    $PageModel->setPageURL((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/page.php?type=3&id=" . $PageModel->getPageID());
                    $PageModel->setPageLanguage($Row["PagesTranslations_Language"]);
                    $PageModel->setPageTitle($Row["PagesTranslations_Title"]);
                    $PageModel->setPageContent($Row["PagesTranslations_Content"]);
                }
            }

            return $PageModel;
        }

        public function getPageAllLang($PageID) {
            global $pdo;

            $PageQuery = $pdo->prepare("SELECT Pages_ID, Pages_Date, Pages_LastEditionDate FROM Pages WHERE Pages_ID = ? LIMIT 1;");
            $PageQuery->bindValue(1, $PageID, PDO::PARAM_INT);

            $PageModel = null;

            if ($PageQuery->execute()) {
                if ($PageQuery->rowCount() == 1) {
                    $Row = $PageQuery->fetch();
                    $PageModel = new PageModel();

                    $PageModel->setPageID($Row["Pages_ID"]);
                    $PageModel->setPageDate($Row["Pages_Date"]);
                    $PageModel->setPageLastEditionDate($Row["Pages_LastEditionDate"]);

                    $PageQuery = $pdo->prepare("SELECT PagesTranslations_ID, PagesTranslations_Language, PagesTranslations_Title, PagesTranslations_Content FROM PagesTranslations WHERE Pages_ID_FK = ?;");
                    $PageQuery->bindValue(1, $PageID, PDO::PARAM_INT);

                    if ($PageQuery->execute()) {
                        if ($PageQuery->rowCount() == LANGUAGE_AMOUNT) {
                            $TitleArray = array();
                            $ContentArray = array();

                            while ($Row = $PageQuery->fetch()) {
                                $TitleArray[$Row["PagesTranslations_Language"]] = $Row["PagesTranslations_Title"];
                                $ContentArray[$Row["PagesTranslations_Language"]] = $Row["PagesTranslations_Content"];
                            }

                            $PageModel->setPageTitle($TitleArray);
                            $PageModel->setPageContent($ContentArray);
                        }
                    }
                }
            }

            return $PageModel;
        }
    }
?>
