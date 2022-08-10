<?php
    require_once("Connection.php");
    require_once("File.php");
    require_once("CarouselImageModel.php");
    require_once("UserModel.php");
    require_once("Constants.php");

    if(!isset($_SESSION)) {
        session_start();
    }

    if(isset($_POST["actionCarouselImage"]) && !is_numeric($_POST["actionCarouselImage"]) && !empty($_POST["actionCarouselImage"])) {
        $Action = strip_tags(trim(filter_input(INPUT_POST, "actionCarouselImage", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW)));

        if($Action === "create") {
            if (isset($_FILES["fileCarouselImage"]) && isset($_SESSION["UserID"]) && is_numeric($_SESSION["UserID"]) && !empty($_SESSION["UserID"])) {
                $CarouselImageModel = new CarouselImageModel();
                $CarouselImageController = new CarouselImageController();
                $User = new UserModel();
                if ($_FILES["fileCarouselImage"]["size"] != 0) {
                    if (!checkExistence("../../assets/pictures/slides/", $_FILES["fileCarouselImage"]["name"])) {
                        if ($_FILES["fileCarouselImage"]["size"] < MAX_IMAGE_SIZE) { 
                            if (uploadImage($_FILES["fileCarouselImage"] , "../../assets/pictures/slides/")) {
                                $CarouselImageModel->setCImageName(strip_tags(trim($_FILES["fileCarouselImage"]["name"])));
                                $CarouselImageModel->setCImageDate(date("Y-m-d"));
                                $User->setUserID($_SESSION["UserID"]);
                                $CarouselImageModel->setUser($User);
        
                                if($CarouselImageController->createCarouselImage($CarouselImageModel)) {
                                    echo json_encode(array("status" => "success", "message" => "Foto postada com sucesso!"));
                                    exit();
                                } else {
                                    deleteFile("../../assets/pictures/slides/" . $_FILES["fileCarouselImage"]["name"]);
                                    echo json_encode(array("status" => "failure", "message" => "Não foi possível subir a foto " . $_FILES["fileCarouselImage"]["name"] . " para o carrossel."));
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
                        echo json_encode(array('status' => 'failure', 'message' => "Imagem já existente no carrossel."));
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
               isset($_SESSION["UserID"]) && is_numeric($_SESSION["UserID"]) && !empty($_SESSION["UserID"])) {

                $CarouselImageController = new CarouselImageController();

                $ID = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);
                $User = new UserModel();
                $User->setUserID($_SESSION["UserID"]);
        
                if($CarouselImageController->deleteCarouselImage($ID, $User)) {
                    echo json_encode(array('status' => 'success', 'message' => "Imagem deletada com sucesso!"));
                    exit();
                } else {
                    echo json_encode(array('status' => 'failure', 'message' => "Não foi possível deletar a Imagem."));
                    exit();
                }
            } else {
                echo json_encode(array('status' => 'failure', 'message' => "Não foi possível deletar a Imagem."));
                exit();
            }
        } else {
            exit();
        }
    }

    class CarouselImageController {

        public function createCarouselImage($CarouselImageModel) {
            global $pdo;

            $CarouselImageQuery = $pdo->prepare("INSERT INTO CarouselImages (Users_ID_FK, CImages_Name, CImages_Date) VALUES (?, ?, ?);");
            $CarouselImageQuery->bindValue(1, $CarouselImageModel->getUser()->getUserID(), PDO::PARAM_INT);
            $CarouselImageQuery->bindValue(2, $CarouselImageModel->getCImageName(), PDO::PARAM_STR);
            $CarouselImageQuery->bindValue(3, $CarouselImageModel->getCImageDate(), PDO::PARAM_STR);

            if($CarouselImageQuery->execute()) {
                return true;
            }

            return false;
        }

        public function getCarouselImages() {
            global $pdo;

            $CarouselImageQuery = $pdo->query("SELECT CImages_ID, Users_ID_FK, Users_Name, CImages_Name, CImages_Date FROM CarouselImages INNER JOIN Users ON Users.Users_ID = CarouselImages.Users_ID_FK ORDER BY CImages_ID DESC;");

            $CarouselImagesArray = array();

            while($Row = $CarouselImageQuery->fetch()) {
                $CarouselImageModel = new CarouselImageModel();
                $UserModel = new UserModel();

                $CarouselImageModel->setCImageID($Row["CImages_ID"]);
                $CarouselImageModel->setCImageName($Row["CImages_Name"]);
                $CarouselImageModel->setCImageDate($Row["CImages_Date"]);

                $UserModel->setUserID($Row["Users_ID_FK"]);
                $UserModel->setUserName($Row["Users_Name"]);

                $CarouselImageModel->setUser($UserModel);

                array_push($CarouselImagesArray, $CarouselImageModel);
            }

            return $CarouselImagesArray;
        }

        public function getCarouselImage($CImageID) {
            global $pdo;

            $CarouselImageQuery = $pdo->prepare("SELECT CImages_ID, Users_ID_FK, Users_Name, CImages_Name, CImages_Date FROM CarouselImages INNER JOIN Users ON Users.Users_ID = CarouselImages.Users_ID_FK WHERE CImages_ID = ?;");
            $CarouselImageQuery->bindValue(1, $CImageID, PDO::PARAM_INT);

            $CarouselImageQuery->execute();

            if($CarouselImageQuery->rowCount() == 1) {
                $Row = $CarouselImageQuery->fetch();
                $CarouselImageModel = new CarouselImageModel();
                $UserModel = new UserModel();

                $CarouselImageModel->setCImageID($Row["CImages_ID"]);
                $CarouselImageModel->setCImageName($Row["CImages_Name"]);
                $CarouselImageModel->setCImageDate($Row["CImages_Date"]);

                $UserModel->setUserID($Row["Users_ID_FK"]);
                $UserModel->setUserName($Row["Users_Name"]);

                $CarouselImageModel->setUser($UserModel);
            } else {
                $CarouselImageModel = NULL;
            }

            return $CarouselImageModel;
        }

        public function deleteCarouselImage($CImageID, $User) {
            global $pdo;

            $CarouselImageQuery = $pdo->prepare("DELETE FROM CarouselImages WHERE CImages_ID = ?;");
            $CarouselImageQuery->bindValue(1, $CImageID, PDO::PARAM_INT);

            $CarouselImageController = new CarouselImageController();
            $CarouselImage = $CarouselImageController->getCarouselImage($CImageID);

            deleteFile("../../assets/pictures/slides/" . $CarouselImage->getCImageName());

            if($CarouselImageQuery->execute()) {
                return true;
            }

            return false;
        }
    }
?>
