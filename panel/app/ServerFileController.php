<?php
    require_once("Connection.php");
    require_once("UserModel.php");
    require_once("ServerFileModel.php");
    require_once("Constants.php");
    require_once("File.php");

    if(!isset($_SESSION)) {
        session_start();
    }

    if(isset($_POST["actionServerFile"]) && !is_numeric($_POST["actionServerFile"]) && !empty($_POST["actionServerFile"])) {
        $Action = strip_tags(trim(filter_input(INPUT_POST, "actionServerFile", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW)));

        if($Action === "create") {
            if (isset($_FILES["fileServer"]) && strlen($_FILES["fileServer"]["name"]) <= MAX_FILE_NAME_SIZE &&
                isset($_SESSION["UserID"]) && is_numeric($_SESSION["UserID"]) && !empty($_SESSION["UserID"])) {
                if ($_FILES["fileServer"]["size"] != 0) {
                    if (!checkExistence("../../assets/files/", $_FILES["fileServer"]["name"])) {
                        if ($_FILES["fileServer"]["size"] < MAX_FILE_SIZE) {
                            if (uploadFile($_FILES["fileServer"] , "../../assets/files/")) {
                                $ServerFileModel = new ServerFileModel();
                                $User = new UserModel();
                                $ServerFileController = new ServerFileController();

                                $User->setUserID($_SESSION["UserID"]);
                                $ServerFileModel->setUser($User);
                                $ServerFileModel->setServerFileName($_FILES["fileServer"]["name"]);
                                $ServerFileModel->setServerFileDate(date("Y-m-d"));

                                if($ServerFileController->createServerFile($ServerFileModel)) {
                                    echo json_encode(array("status" => "success", "message" => "Upload feito com sucesso!"));
                                    exit();
                                } else {
                                    deleteFile("../../assets/files/" . $_FILES["fileServer"]["name"]);
                                    echo json_encode(array("status" => "failure", "message" => "Não foi possível subir o arquivo " . $_FILES["fileServer"]["name"] . " para o servidor."));
                                    exit();
                                }
                            } else {
                                echo json_encode(array("status" => "failure", "message" => "Não foi possível fazer o upload do arquivo."));
                                exit();
                            }
                        } else {
                            echo json_encode(array("status" => "failure", "message" => "O arquivo é muito grande. O tamanho máximo é de " . MAX_FILE_SIZE));
                            exit();
                        }
                    } else {
                        echo json_encode(array('status' => 'failure', 'message' => "Arquivo já existente no servidor."));
                        exit();
                    }
                } else {
                    echo json_encode(array("status" => "failure", "message" => "Você precisa selecionar um arquivo."));
                    exit();
                }
            } else {
                echo json_encode(array("status" => "failure", "message" => "Acesso negado."));
                exit();
            }
        } else if ($Action === "delete") {
            if(isset($_SESSION["UserID"]) && is_numeric($_SESSION["UserID"]) && !empty($_SESSION["UserID"]) &&
               isset($_POST["id"]) && is_numeric($_POST["id"]) && !empty($_POST["id"])) {
                $ID = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);
                $User = new UserModel();
                $ServerFileController = new ServerFileController();
                $User->setUserID($_SESSION["UserID"]);

                if($ServerFileController->deleteServerFile($ID, $User)) {
                  echo json_encode(array('status' => 'success', 'message' => "Arquivo deletado com sucesso!"));
                  exit();
                } else {
                  echo json_encode(array('status' => 'failure', 'message' => "Não foi possível deletar o arquivo."));
                  exit();
                }
              }
        }
    }
    
    class ServerFileController {
        public function getServerFiles() {
            global $pdo;

            $ServerFileQuery = $pdo->query("SELECT ServerFiles_ID, Users_ID_FK, Users_Name, ServerFiles_Name, ServerFiles_Date FROM ServerFiles INNER JOIN Users ON Users_ID_FK = Users_ID;");

            $ServerFilesArray = array();

            while($Row = $ServerFileQuery->fetch()) {
                $ServerFileModel = new ServerFileModel();
                $UserModel = new UserModel();

                $ServerFileModel->setServerFileID($Row["ServerFiles_ID"]);

                $UserModel->setUserID($Row["Users_ID_FK"]);
                $UserModel->setUserName($Row["Users_Name"]);

                $ServerFileModel->setUser($UserModel);
                $ServerFileModel->setServerFileName($Row["ServerFiles_Name"]);
                $ServerFileModel->setServerFileDate($Row["ServerFiles_Date"]);
                $ServerFileModel->setServerFileURL((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/assets/files/" . $ServerFileModel->getServerFileName());

                array_push($ServerFilesArray, $ServerFileModel);
            }

            return $ServerFilesArray;
        }

        public function getServerFile($ServerFileID) {
            global $pdo;

            $ServerFileQuery = $pdo->prepare("SELECT ServerFiles_ID, Users_ID_FK, Users_Name, ServerFiles_Name, ServerFiles_Date FROM ServerFiles INNER JOIN Users ON Users_ID_FK = Users_ID WHERE ServerFiles_ID = ? LIMIT 1;");
            $ServerFileQuery->bindValue(1, $ServerFileID, PDO::PARAM_INT);

            $ServerFileModel = NULL;

            if ($ServerFileQuery->execute()) {
                $Row = $ServerFileQuery->fetch();

                $ServerFileModel = new ServerFileModel();
                $UserModel = new UserModel();

                $ServerFileModel->setServerFileID($Row["ServerFiles_ID"]);

                $UserModel->setUserID($Row["Users_ID_FK"]);
                $UserModel->setUserName($Row["Users_Name"]);

                $ServerFileModel->setUser($UserModel);
                $ServerFileModel->setServerFileName($Row["ServerFiles_Name"]);
                $ServerFileModel->setServerFileDate($Row["ServerFiles_Date"]);
                $ServerFileModel->setServerFileURL((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/assets/files/" . $ServerFileModel->getServerFileName());
            }

            return $ServerFileModel;
        }

        public function createServerFile($ServerFileModel) {
            global $pdo;

            $ServerFileQuery = $pdo->prepare("INSERT INTO ServerFiles (Users_ID_FK, ServerFiles_Name, ServerFiles_Date) VALUES (?, ?, ?);");
            $ServerFileQuery->bindValue(1, $ServerFileModel->getUser()->getUserID(), PDO::PARAM_INT);
            $ServerFileQuery->bindValue(2, $ServerFileModel->getServerFileName(), PDO::PARAM_STR);
            $ServerFileQuery->bindValue(3, $ServerFileModel->getServerFileDate(), PDO::PARAM_STR);

            if ($ServerFileQuery->execute()) {
                return true;
            }

            return false;
        }

        public function deleteServerFile($ServerFileID, $User) {
            global $pdo;

            $ServerFileQuery = $pdo->prepare("DELETE FROM ServerFiles WHERE ServerFiles_ID = ?;");
            $ServerFileQuery->bindValue(1, $ServerFileID, PDO::PARAM_INT);

            $ServerFileController = new ServerFileController();
            $ServerFileModel = $ServerFileController->getServerFile($ServerFileID);

            deleteFile("../../assets/files/" . $ServerFileModel->getServerFileName());

            if ($ServerFileQuery->execute()) {
                return true;
            }

            return false;
        }
    }
?>
