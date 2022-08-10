<?php
    require_once("Connection.php");
    require_once("GeneralSettingModel.php");
    require_once("Constants.php");

    if (!isset($_SESSION)) {
        session_start();
    }

    if (isset($_POST["actionGeneralSetting"]) && !is_numeric($_POST["actionGeneralSetting"]) && !empty($_POST["actionGeneralSetting"])) {
        $Action = filter_input(INPUT_POST, "actionGeneralSetting", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);

        if ($Action === "edit") {
            if (isset($_POST["VideoLink"]) && !is_numeric($_POST["VideoLink"]) && !empty($_POST["VideoLink"]) && filter_input(INPUT_POST, "VideoLink", FILTER_VALIDATE_URL) &&
                isset($_SESSION["UserID"]) && is_numeric($_SESSION["UserID"]) && !empty($_SESSION["UserID"]) &&
                strlen($_POST["VideoLink"]) <= MAX_SETTING_VALUE_SIZE) {

                $GeneralSettingModel = new GeneralSettingModel();
                $GeneralSettingController = new GeneralSettingController();
                $GeneralSettingModel->setGeneralSettingKey("institutional_video");
                $GeneralSettingModel->setGeneralSettingValue(strip_tags(trim(filter_input(INPUT_POST, "VideoLink", FILTER_SANITIZE_URL))));

                if ($GeneralSettingController->editGeneralSetting($GeneralSettingModel)) {
                    echo json_encode(array("status" => "success", "message" => "Vídeo institucional atualizado com sucesso!"));
                    exit();
                } else {
                    echo json_encode(array("status" => "failure", "message" => "Não foi possível atualizar o vídeo institucional."));
                    exit();    
                }
            } else {
                echo json_encode(array("status" => "failure", "message" => "Link inválido."));
                exit();
            }
        } else {
            exit();
        }
    }

    class GeneralSettingController {
        public function editGeneralSetting($GeneralSettingModel) {
            global $pdo;

            $GeneralSettingQuery = $pdo->prepare("UPDATE GeneralSettings SET GeneralSettings_Value = ? WHERE GeneralSettings_Key = ?;");
            $GeneralSettingQuery->bindValue(1, "https://www.youtube.com/embed/" . substr(strrchr($GeneralSettingModel->getGeneralSettingValue(),'='),1), PDO::PARAM_STR);
            $GeneralSettingQuery->bindValue(2, $GeneralSettingModel->getGeneralSettingKey(), PDO::PARAM_STR);

            if ($GeneralSettingQuery->execute()) {
                return true;
            }

            return false;
        }

        public function getGeneralSetting($GeneralSettingKey) {
            global $pdo;

            $GeneralSettingQuery = $pdo->prepare("SELECT GeneralSettings_ID, GeneralSettings_Key, GeneralSettings_Value FROM GeneralSettings WHERE GeneralSettings_Key = ?;");
            $GeneralSettingQuery->bindValue(1, $GeneralSettingKey, PDO::PARAM_STR);

            $GeneralSettingModel = NULL;

            if ($GeneralSettingQuery->execute()) {
                $Row = $GeneralSettingQuery->fetch();

                $GeneralSettingModel = new GeneralSettingModel();

                $GeneralSettingModel->setGeneralSettingID($Row["GeneralSettings_ID"]);
                $GeneralSettingModel->setGeneralSettingKey($Row["GeneralSettings_Key"]);
                $GeneralSettingModel->setGeneralSettingValue($Row["GeneralSettings_Value"]);
            }

            return $GeneralSettingModel;
        }
    }
?>
