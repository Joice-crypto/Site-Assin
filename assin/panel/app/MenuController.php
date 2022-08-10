<?php
    require_once("Connection.php");
    require_once("MenuModel.php");
    require_once("Constants.php");

    if (!isset($_SESSION)) { // starta a seção
        session_start();
    }

    if (isset($_POST["actionMenu"]) && !is_numeric($_POST["actionMenu"]) && !empty($_POST["actionMenu"])) {
        $Action = strip_tags(trim(filter_input(INPUT_POST, "actionMenu", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW)));

        if ($Action === "create") { // criando os idiomas 
            if (isset($_POST["txtRedirection"]) && !is_numeric($_POST["txtRedirection"]) && !empty($_POST["txtRedirection"]) &&
                isset($_POST["txtNamePT-BR"]) && !is_numeric($_POST["txtNamePT-BR"]) && !empty($_POST["txtNamePT-BR"]) &&
                isset($_POST["txtNameEN-US"]) && !is_numeric($_POST["txtNameEN-US"]) && !empty($_POST["txtNameEN-US"]) &&
                isset($_POST["txtNameES-ES"]) && !is_numeric($_POST["txtNameES-ES"]) && !empty($_POST["txtNameES-ES"]) &&
                isset($_POST["txtNameFR-FR"]) && !is_numeric($_POST["txtNameFR-FR"]) && !empty($_POST["txtNameFR-FR"]) &&
                isset($_POST["MenuLevel"]) && is_numeric($_POST["MenuLevel"]) && isset($_POST["MenuSonOf"]) &&
                strlen($_POST["txtNamePT-BR"]) <= MAX_TITLE_SIZE && strlen($_POST["txtNameEN-US"]) <= MAX_TITLE_SIZE && strlen($_POST["txtNameES-ES"]) <= MAX_TITLE_SIZE && strlen($_POST["txtNameFR-FR"]) <= MAX_TITLE_SIZE) {

                if (!filter_input(INPUT_POST, "txtRedirection", FILTER_VALIDATE_URL)) {
                    echo json_encode(array("status" => "failure", "message" => "URL inválida."));
                    exit();
                }
                
                $MenuModel = new MenuModel();
                $MenuController = new MenuController();

                $MenuModel->setMenuRedirection(filter_input(INPUT_POST, "txtRedirection", FILTER_SANITIZE_URL));
    
                $NameArray = array();
    
                $NameArray["pt-br"] = strip_tags(trim(filter_input(INPUT_POST, "txtNamePT-BR", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW)));
                $NameArray["en-us"] = strip_tags(trim(filter_input(INPUT_POST, "txtNameEN-US", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW)));
                $NameArray["es-es"] = strip_tags(trim(filter_input(INPUT_POST, "txtNameES-ES", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW)));
                $NameArray["fr-fr"] = strip_tags(trim(filter_input(INPUT_POST, "txtNameFR-FR", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW)));
    
                $MenuModel->setMenuName($NameArray);
                $MenuLevel = filter_input(INPUT_POST, "MenuLevel", FILTER_SANITIZE_NUMBER_INT);
                $MenuSonOf = filter_input(INPUT_POST, "MenuSonOf", FILTER_SANITIZE_NUMBER_INT);
    
                if ($MenuController->createMenu($MenuModel, $MenuLevel, $MenuSonOf)) {
                    echo json_encode(array("status" => "success", "message" => "Item criado com sucesso!"));
                    exit();
                } else {
                    echo json_encode(array("status" => "failure", "message" => "Não foi possível criar o Item."));
                    exit();
                }
            } else {
                echo json_encode(array("status" => "failure", "message" => "Dados inconsistentes."));
                exit();
            }
        } else if ($Action === "edit") {
            if (isset($_POST["MenuID"]) && is_numeric($_POST["MenuID"]) && !empty($_POST["MenuID"]) &&
                isset($_POST["txtEditRedirection"]) && !is_numeric($_POST["txtEditRedirection"]) && !empty($_POST["txtEditRedirection"]) &&
                isset($_POST["txtNamePT-BR"]) && !is_numeric($_POST["txtNamePT-BR"]) && !empty($_POST["txtNamePT-BR"]) &&
                isset($_POST["txtNameEN-US"]) && !is_numeric($_POST["txtNameEN-US"]) && !empty($_POST["txtNameEN-US"]) &&
                isset($_POST["txtNameES-ES"]) && !is_numeric($_POST["txtNameES-ES"]) && !empty($_POST["txtNameES-ES"]) &&
                isset($_POST["txtNameFR-FR"]) && !is_numeric($_POST["txtNameFR-FR"]) && !empty($_POST["txtNameFR-FR"]) &&
                isset($_POST["MenuLevel"]) && is_numeric($_POST["MenuLevel"]) &&
                strlen($_POST["txtNamePT-BR"]) <= MAX_TITLE_SIZE && strlen($_POST["txtNameEN-US"]) <= MAX_TITLE_SIZE && strlen($_POST["txtNameES-ES"]) <= MAX_TITLE_SIZE && strlen($_POST["txtNameFR-FR"]) <= MAX_TITLE_SIZE) {

                if (!filter_input(INPUT_POST, "txtEditRedirection", FILTER_VALIDATE_URL)) {
                    echo json_encode(array("status" => "failure", "message" => "URL inválida."));
                    exit();
                }

                $MenuModel = new MenuModel();
                $MenuController = new MenuController();

                $MenuModel->setMenuID(filter_input(INPUT_POST, "MenuID", FILTER_SANITIZE_NUMBER_INT));
                $MenuModel->setMenuRedirection(filter_input(INPUT_POST, "txtEditRedirection", FILTER_SANITIZE_URL));

                $NameArray = array();

                $NameArray["pt-br"] = strip_tags(trim(filter_input(INPUT_POST, "txtNamePT-BR", FILTER_DEFAULT)));
                $NameArray["en-us"] = strip_tags(trim(filter_input(INPUT_POST, "txtNameEN-US", FILTER_DEFAULT)));
                $NameArray["es-es"] = strip_tags(trim(filter_input(INPUT_POST, "txtNameES-ES", FILTER_DEFAULT)));
                $NameArray["fr-fr"] = strip_tags(trim(filter_input(INPUT_POST, "txtNameFR-FR", FILTER_DEFAULT)));

                $MenuModel->setMenuName($NameArray);
                $MenuLevel = filter_input(INPUT_POST, "MenuLevel", FILTER_SANITIZE_NUMBER_INT);

                if ($MenuController->editMenu($MenuModel, $MenuLevel)) {
                    echo json_encode(array("status" => "success", "message" => "Item editado com sucesso!"));
                    exit();
                } else {
                    echo json_encode(array("status" => "failure", "message" => "Não foi possível editar o Item."));
                    exit();
                }
            } else {
                echo json_encode(array("status" => "failure", "message" => "Dados insconsistentes."));
                exit();
            }
        } else if ($Action === "delete") {
            if(isset($_POST["id"]) && is_numeric($_POST["id"]) && !empty($_POST["id"]) &&
               isset($_POST["level"]) && is_numeric($_POST["level"])) {
                $MenuController = new MenuController();

                $ID = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);
                $Level = filter_input(INPUT_POST, "level", FILTER_SANITIZE_NUMBER_INT);

                if (!$MenuController->hasSon($ID, $Level)) {
                    if ($MenuController->deleteMenu($ID, $Level)) {
                        echo json_encode(array("status" => "success", "message" => "Item deletado com sucesso!"));
                        exit();
                    } else {
                        echo json_encode(array("status" => "failure", "message" => "Não foi possível deletar o Item."));
                        exit();
                    }
                } else {
                    echo json_encode(array("status" => "failure", "message" => "Este item não pode ser deletado pois possui um ou mais dependentes."));
                    exit();
                }
            } else {
                echo json_encode(array("status" => "failure", "message" => "Dados inconsistentes."));
                exit();
            }
        } else {
            exit();
        }
    }

    class MenuController { 
        public function createMenu($MenuModel, $Level, $SonOf) {  // função de criar menu
            global $pdo;

            if ($Level == 0 && $SonOf == NULL) { // o nivel é 0 e nao tem nenhum filho
                $MenuQuery = $pdo->prepare("INSERT INTO Menus (Menus_Redirection) VALUES (?);");
                $MenuQuery->bindValue(1, $MenuModel->getMenuRedirection(), PDO::PARAM_STR);

                if ($MenuQuery->execute()) {
                    $ID = $pdo->lastInsertId();

                    $LanguageArray = SUPPORTED_LANGUAGES; // inserir o novo item em todos os menus de todas as linguas 
                    for ($i = 0; $i < LANGUAGE_AMOUNT; $i++) {
                        $MenuQuery = $pdo->prepare("INSERT INTO MenusTranslations (MenusTranslations_Language, MenusTranslations_Name, Menus_ID_FK, MenusChilds_ID_FK, MenusGrandChilds_ID_FK) VALUES (?, ?, ?, NULL, NULL);");
                        $MenuQuery->bindValue(1, $LanguageArray[$i] , PDO::PARAM_STR);
                        $MenuQuery->bindValue(2, $MenuModel->getMenuName()[$LanguageArray[$i]], PDO::PARAM_STR);
                        $MenuQuery->bindValue(3, $ID, PDO::PARAM_INT);

                        if (!$MenuQuery->execute()) {
                            return false;
                        }
                    }

                    return true;
                }
            } else if ($Level == 1 && !empty($SonOf)) { // nivel 1 é quando o menu é filho de alguem mas n  tem ngm dps dele
                $MenuQuery = $pdo->prepare("INSERT INTO MenusChilds (MenusChilds_Redirection, Menus_ID_FK) VALUES (?, ?);");
                $MenuQuery->bindValue(1, $MenuModel->getMenuRedirection(), PDO::PARAM_STR);
                $MenuQuery->bindValue(2, $SonOf, PDO::PARAM_INT);

                if ($MenuQuery->execute()) {
                    $ID = $pdo->lastInsertId();

                    $LanguageArray = SUPPORTED_LANGUAGES;
                    for ($i = 0; $i < LANGUAGE_AMOUNT; $i++) {
                        $MenuQuery = $pdo->prepare("INSERT INTO MenusTranslations (MenusTranslations_Language, MenusTranslations_Name, Menus_ID_FK, MenusChilds_ID_FK, MenusGrandChilds_ID_FK) VALUES (?, ?, NULL, ?, NULL);");
                        $MenuQuery->bindValue(1, $LanguageArray[$i], PDO::PARAM_STR);
                        $MenuQuery->bindValue(2, $MenuModel->getMenuName()[$LanguageArray[$i]], PDO::PARAM_STR);
                        $MenuQuery->bindValue(3, $ID, PDO::PARAM_INT);

                        if (!$MenuQuery->execute()) {
                            return false;
                        }
                    }
 
                    return true;
                }
            } else if ($Level == 2 && !empty($SonOf)) { // menu que é filho do filho (o ultimo na cascata)
                $MenuQuery = $pdo->prepare("INSERT INTO MenusGrandChilds (MenusGrandChilds_Redirection, MenusChilds_ID_FK) VALUES (?, ?);");
                $MenuQuery->bindValue(1, $MenuModel->getMenuRedirection(), PDO::PARAM_STR);
                $MenuQuery->bindValue(2, $SonOf, PDO::PARAM_INT);

                if ($MenuQuery->execute()) {
                    $ID = $pdo->lastInsertId();

                    $LanguageArray = SUPPORTED_LANGUAGES;
                    for ($i = 0; $i < LANGUAGE_AMOUNT; $i++) {
                        $MenuQuery = $pdo->prepare("INSERT INTO MenusTranslations (MenusTranslations_Language, MenusTranslations_Name, Menus_ID_FK, MenusChilds_ID_FK, MenusGrandChilds_ID_FK) VALUES (?, ?, NULL, NULL, ?);");
                        $MenuQuery->bindValue(1, $LanguageArray[$i], PDO::PARAM_STR);
                        $MenuQuery->bindValue(2, $MenuModel->getMenuName()[$LanguageArray[$i]], PDO::PARAM_STR);
                        $MenuQuery->bindValue(3, $ID, PDO::PARAM_INT);

                        if (!$MenuQuery->execute()) {
                            return false;
                        }
                    }

                    return true;
                }
            }

            return false;
        }

        public function editMenu($MenuModel, $Level) {
            global $pdo;

            if ($Level == 0) {
                $MenuQuery = $pdo->prepare("UPDATE Menus SET Menus_Redirection = ? WHERE Menus_ID = ?;");
                $MenuQuery->bindValue(1, $MenuModel->getMenuRedirection(), PDO::PARAM_STR);
                $MenuQuery->bindValue(2, $MenuModel->getMenuID(), PDO::PARAM_INT);

                if ($MenuQuery->execute()) {

                    $LanguageArray = SUPPORTED_LANGUAGES;
                    for ($i = 0; $i < LANGUAGE_AMOUNT; $i++) {
                        $MenuQuery = $pdo->prepare("UPDATE MenusTranslations SET MenusTranslations_Name = ? WHERE Menus_ID_FK = ? AND MenusTranslations_Language = ?;");
                        $MenuQuery->bindValue(1, $MenuModel->getMenuName()[$LanguageArray[$i]], PDO::PARAM_STR);
                        $MenuQuery->bindValue(2, $MenuModel->getMenuID(), PDO::PARAM_INT);
                        $MenuQuery->bindValue(3, $LanguageArray[$i], PDO::PARAM_STR);

                        if (!$MenuQuery->execute()) {
                            return false;
                        }
                    }

                    return true;
                }
            } else if ($Level == 1) {
                $MenuQuery = $pdo->prepare("UPDATE MenusChilds SET MenusChilds_Redirection = ? WHERE MenusChilds_ID = ?;");
                $MenuQuery->bindValue(1, $MenuModel->getMenuRedirection(), PDO::PARAM_STR);
                $MenuQuery->bindValue(2, $MenuModel->getMenuID(), PDO::PARAM_INT);

                if ($MenuQuery->execute()) {
                    $LanguageArray = SUPPORTED_LANGUAGES;
                    for ($i = 0; $i < LANGUAGE_AMOUNT; $i++) {

                        $MenuQuery = $pdo->prepare("UPDATE MenusTranslations SET MenusTranslations_Name = ? WHERE MenusChilds_ID_FK = ? AND MenusTranslations_Language = ?;");
                        $MenuQuery->bindValue(1, $MenuModel->getMenuName()[$LanguageArray[$i]], PDO::PARAM_STR);
                        $MenuQuery->bindValue(2, $MenuModel->getMenuID(), PDO::PARAM_INT);
                        $MenuQuery->bindValue(3, $LanguageArray[$i], PDO::PARAM_STR);

                        if (!$MenuQuery->execute()) {
                            return false;
                        }
                    }

                    return true;
                }
            } else if ($Level == 2) {
                $MenuQuery = $pdo->prepare("UPDATE MenusGrandChilds SET MenusGrandChilds_Redirection = ? WHERE MenusGrandChilds_ID = ?;");
                $MenuQuery->bindValue(1, $MenuModel->getMenuRedirection(), PDO::PARAM_STR);
                $MenuQuery->bindValue(2, $MenuModel->getMenuID(), PDO::PARAM_INT);

                if ($MenuQuery->execute()) {

                    $LanguageArray = SUPPORTED_LANGUAGES;
                    for ($i = 0; $i < LANGUAGE_AMOUNT; $i++) {
                        $MenuQuery = $pdo->prepare("UPDATE MenusTranslations SET MenusTranslations_Name = ? WHERE MenusGrandChilds_ID_FK = ? AND MenusTranslations_Language = ?;");
                        $MenuQuery->bindValue(1, $MenuModel->getMenuName()[$LanguageArray[$i]], PDO::PARAM_STR);
                        $MenuQuery->bindValue(2, $MenuModel->getMenuID(), PDO::PARAM_INT);
                        $MenuQuery->bindValue(3, $LanguageArray[$i], PDO::PARAM_STR);

                        if (!$MenuQuery->execute()) {
                            return false;
                        }
                    }

                    return true;
                }
            }

            return false;
        }

        public function deleteMenu($ID, $Level) {
            global $pdo;

            if (!is_numeric($Level) || !is_numeric($ID)) {
                return false;
            }

            if ($Level == 0) {
                $MenuQuery = $pdo->prepare("DELETE FROM Menus WHERE Menus_ID = ?;");
                $MenuQuery->bindValue(1, $ID, PDO::PARAM_INT);

                if ($MenuQuery->execute()) {
                    return true;
                }
            } else if ($Level == 1) {
                $MenuQuery = $pdo->prepare("DELETE FROM MenusChilds WHERE MenusChilds_ID = ?;");
                $MenuQuery->bindValue(1, $ID, PDO::PARAM_INT);

                if ($MenuQuery->execute()) {
                    return true;
                }
            } else if ($Level == 2) {
                $MenuQuery = $pdo->prepare("DELETE FROM MenusGrandChilds WHERE MenusGrandChilds_ID = ?;");
                $MenuQuery->bindValue(1, $ID, PDO::PARAM_INT);

                if ($MenuQuery->execute()) {
                    return true;
                }
            }

            return false;
        }

        public function getMenus($MenuLanguage) {
            global $pdo;

            $MenuQuery = $pdo->prepare("SELECT Menus_ID, Menus_Redirection, MenusTranslations_Name FROM Menus INNER JOIN MenusTranslations ON Menus.Menus_ID = MenusTranslations.Menus_ID_FK WHERE MenusTranslations_Language = ?;");
            $MenuQuery->bindValue(1, $MenuLanguage, PDO::PARAM_STR);

            $MenuArray = array();

            if ($MenuQuery->execute()) {
                while ($Row = $MenuQuery->fetch()) {
                    $MenuModel = new MenuModel();

                    $MenuModel->setMenuID($Row["Menus_ID"]);
                    $MenuModel->setMenuRedirection($Row["Menus_Redirection"]);
                    $MenuModel->setMenuName($Row["MenusTranslations_Name"]);

                    $MenuChildQuery = $pdo->prepare("SELECT MenusChilds_ID, MenusChilds_Redirection, MenusTranslations_Name FROM MenusChilds INNER JOIN MenusTranslations ON MenusChilds.MenusChilds_ID = MenusTranslations.MenusChilds_ID_FK WHERE MenusChilds.Menus_ID_FK = ? AND MenusTranslations_Language = ?;");
                    $MenuChildQuery->bindValue(1, $MenuModel->getMenuID(), PDO::PARAM_INT);
                    $MenuChildQuery->bindValue(2, $MenuLanguage, PDO::PARAM_STR);

                    $MenuChildArray = array();
                    if ($MenuChildQuery->execute()) {
                        while ($RowChild = $MenuChildQuery->fetch()) {
                            $MenuChildModel = new MenuModel();

                            $MenuChildModel->setMenuID($RowChild["MenusChilds_ID"]);
                            $MenuChildModel->setMenuRedirection($RowChild["MenusChilds_Redirection"]);
                            $MenuChildModel->setMenuName($RowChild["MenusTranslations_Name"]);

                            $MenuGrandChildQuery = $pdo->prepare("SELECT MenusGrandChilds_ID, MenusGrandChilds_Redirection, MenusTranslations_Name FROM MenusGrandChilds INNER JOIN MenusTranslations ON MenusGrandChilds.MenusGrandChilds_ID = MenusTranslations.MenusGrandChilds_ID_FK WHERE MenusGrandChilds.MenusChilds_ID_FK = ? AND MenusTranslations_Language = ?;");
                            $MenuGrandChildQuery->bindValue(1, $MenuChildModel->getMenuID(), PDO::PARAM_INT);
                            $MenuGrandChildQuery->bindValue(2, $MenuLanguage, PDO::PARAM_STR);

                            $MenuGrandChildArray = array();
                            if ($MenuGrandChildQuery->execute()) {
                                while ($RowGrandChild = $MenuGrandChildQuery->fetch()) {
                                    $MenuGrandChildModel = new MenuModel();

                                    $MenuGrandChildModel->setMenuID($RowGrandChild["MenusGrandChilds_ID"]);
                                    $MenuGrandChildModel->setMenuRedirection($RowGrandChild["MenusGrandChilds_Redirection"]);
                                    $MenuGrandChildModel->setMenuName($RowGrandChild["MenusTranslations_Name"]);

                                    array_push($MenuGrandChildArray, $MenuGrandChildModel);
                                }
                            }

                            $MenuChildModel->setMenuSon($MenuGrandChildArray);

                            array_push($MenuChildArray, $MenuChildModel);
                        }
                    }

                    $MenuModel->setMenuSon($MenuChildArray);

                    array_push($MenuArray, $MenuModel);
                }
            }

            return $MenuArray;
        }

        public function getMenusAllLang() {
            global $pdo;

            $MenuQuery = $pdo->query("SELECT Menus_ID, Menus_Redirection FROM Menus;");

            $MenuArray = array();

            while ($Row = $MenuQuery->fetch()) {
                $MenuModel = new MenuModel();
                $MenuModel->setMenuID($Row["Menus_ID"]);
                $MenuModel->setMenuRedirection($Row["Menus_Redirection"]);

                $MenuTranslationQuery = $pdo->prepare("SELECT MenusTranslations_Language, MenusTranslations_Name FROM MenusTranslations WHERE Menus_ID_FK = ?;");
                $MenuTranslationQuery->bindValue(1, $MenuModel->getMenuID(), PDO::PARAM_INT);

                if ($MenuTranslationQuery->execute()) {
                    if ($MenuTranslationQuery->rowCount() == LANGUAGE_AMOUNT) {
                        $MenuNameArray = array();

                        while ($RowMenuTranslation = $MenuTranslationQuery->fetch()) {
                            $MenuNameArray[$RowMenuTranslation["MenusTranslations_Language"]] = $RowMenuTranslation["MenusTranslations_Name"];
                        }

                        $MenuModel->setMenuName($MenuNameArray);
                    }
                }

                $MenuChildQuery = $pdo->prepare("SELECT MenusChilds_ID, MenusChilds_Redirection FROM MenusChilds WHERE MenusChilds.Menus_ID_FK = ?;");
                $MenuChildQuery->bindValue(1, $MenuModel->getMenuID(), PDO::PARAM_INT);

                $MenuChildArray = array();
                if ($MenuChildQuery->execute()) {
                    while ($RowChild = $MenuChildQuery->fetch()) {
                        $MenuChildModel = new MenuModel();
                        $MenuChildModel->setMenuID($RowChild["MenusChilds_ID"]);
                        $MenuChildModel->setMenuRedirection($RowChild["MenusChilds_Redirection"]);

                        $MenuChildTranslationsQuery = $pdo->prepare("SELECT MenusTranslations_Language, MenusTranslations_Name FROM MenusTranslations WHERE MenusChilds_ID_FK = ?;");
                        $MenuChildTranslationsQuery->bindValue(1, $MenuChildModel->getMenuID(), PDO::PARAM_INT);

                        if ($MenuChildTranslationsQuery->execute()) {
                            if ($MenuTranslationQuery->rowCount() == LANGUAGE_AMOUNT) {
                                $MenuChildNameArray = array();

                                while ($RowMenuChildTranslation = $MenuChildTranslationsQuery->fetch()) {
                                    $MenuChildNameArray[$RowMenuChildTranslation["MenusTranslations_Language"]] = $RowMenuChildTranslation["MenusTranslations_Name"];
                                }

                                $MenuChildModel->setMenuName($MenuChildNameArray);
                            }
                        }

                        $MenuGrandChildQuery = $pdo->prepare("SELECT MenusGrandChilds_ID, MenusGrandChilds_Redirection FROM MenusGrandChilds WHERE MenusChilds_ID_FK = ?;");
                        $MenuGrandChildQuery->bindValue(1, $MenuChildModel->getMenuID(), PDO::PARAM_INT);

                        $MenuGrandChildArray = array();
                        if ($MenuGrandChildQuery->execute()) {
                            while ($RowGrandChild = $MenuGrandChildQuery->fetch()) {
                                $MenuGrandChildModel = new MenuModel();
                                $MenuGrandChildModel->setMenuID($RowGrandChild["MenusGrandChilds_ID"]);
                                $MenuGrandChildModel->setMenuRedirection($RowGrandChild["MenusGrandChilds_Redirection"]);

                                $MenuGrandChildTranslationsQuery = $pdo->prepare("SELECT MenusTranslations_Language, MenusTranslations_Name FROM MenusTranslations WHERE MenusGrandChilds_ID_FK = ?;");
                                $MenuGrandChildTranslationsQuery->bindValue(1, $MenuGrandChildModel->getMenuID(), PDO::PARAM_INT);

                                if ($MenuGrandChildTranslationsQuery->execute()) {
                                    if ($MenuGrandChildTranslationsQuery->rowCount() == LANGUAGE_AMOUNT) {
                                        $MenuGrandChildNameArray = array();

                                        while ($RowMenuGrandChildTranslation = $MenuGrandChildTranslationsQuery->fetch()) {
                                            $MenuGrandChildNameArray[$RowMenuGrandChildTranslation["MenusTranslations_Language"]] = $RowMenuGrandChildTranslation["MenusTranslations_Name"];
                                        }

                                        $MenuGrandChildModel->setMenuName($MenuGrandChildNameArray);
                                    }
                                }

                                array_push($MenuGrandChildArray, $MenuGrandChildModel);
                            }
                        }

                        $MenuChildModel->setMenuSon($MenuGrandChildArray);

                        array_push($MenuChildArray, $MenuChildModel);
                    }
                }

                $MenuModel->setMenuSon($MenuChildArray);

                array_push($MenuArray, $MenuModel);
            }

            return $MenuArray;
        }

        public function hasSon($MenuID, $MenuLevel) {
            global $pdo;

            if (!is_numeric($MenuID) || !is_numeric($MenuLevel)) {
                return true;
            }

            if ($MenuLevel == 0) {
                $MenuQuery = $pdo->prepare("SELECT MenusChilds_ID FROM MenusChilds WHERE Menus_ID_FK = ?;");
                $MenuQuery->bindValue(1, $MenuID, PDO::PARAM_INT);

                if ($MenuQuery->execute()) {
                    // Não tem 'filhos'
                    if ($MenuQuery->rowCount() == 0) {
                        return false;
                    }
                }
            } else if ($MenuLevel == 1) {
                $MenuQuery = $pdo->prepare("SELECT MenusGrandChilds_ID FROM MenusGrandChilds WHERE MenusChilds_ID_FK = ?;");
                $MenuQuery->bindValue(1, $MenuID, PDO::PARAM_INT);

                if ($MenuQuery->execute()) {
                    // Não tem 'filhos'
                    if ($MenuQuery->rowCount() == 0) {
                        return false;
                    }
                }
            } else if ($MenuLevel == 2) {
                return false;
            }

            return true;
        }
    }
?>
