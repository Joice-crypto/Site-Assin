<?php
    require_once("Connection.php");
    require_once('SearchModel.php');

    class SearchController {
        public function SearchFor($SearchText, $SearchLanguage) {
            global $pdo;

            $SearchArray = array();

            $SearchQuery = $pdo->prepare("SELECT Pages_ID, PagesTranslations_Title, PagesTranslations_Content FROM Pages INNER JOIN PagesTranslations ON Pages.Pages_ID = PagesTranslations.Pages_ID_FK WHERE PagesTranslations_Language = ? AND (PagesTranslations_Title LIKE ? OR PagesTranslations_Content LIKE ?);");
            $SearchQuery->bindValue(1, $SearchLanguage, PDO::PARAM_STR);
            $SearchQuery->bindValue(2, "%" . $SearchText . "%", PDO::PARAM_STR);
            $SearchQuery->bindValue(3, "%" . $SearchText . "%", PDO::PARAM_STR);

            if ($SearchQuery->execute()) {
                if ($SearchQuery->rowCount() > 0) {
                    while ($Row = $SearchQuery->fetch()) {
                        $SearchModel = new SearchModel();

                        $SearchModel->setSearchID($Row["Pages_ID"]);
                        $SearchModel->setSearchTitle($Row["PagesTranslations_Title"]);
                        $SearchModel->setSearchText(strip_tags($Row["PagesTranslations_Content"]));
                        $SearchModel->setSearchType("page");

                        array_push($SearchArray, $SearchModel);
                    }
                }
            }

            $SearchQuery = $pdo->prepare("SELECT Cards_ID, CardsTranslations_Name, CardsTranslations_Content FROM Cards INNER JOIN CardsTranslations ON Cards.Cards_ID = CardsTranslations.Cards_ID_FK WHERE CardsTranslations_Language = ? AND (CardsTranslations_Title LIKE ? OR CardsTranslations_Content LIKE ?);");
            $SearchQuery->bindValue(1, $SearchLanguage, PDO::PARAM_STR);
            $SearchQuery->bindValue(2, "%" . $SearchText . "%", PDO::PARAM_STR);
            $SearchQuery->bindValue(3, "%" . $SearchText . "%", PDO::PARAM_STR);

            if ($SearchQuery->execute()) {
                if ($SearchQuery->rowCount() > 0) {
                    while ($Row = $SearchQuery->fetch()) {
                        $SearchModel = new SearchModel();

                        $SearchModel->setSearchID($Row["Cards_ID"]);
                        $SearchModel->setSearchTitle($Row["CardsTranslations_Title"]);
                        $SearchModel->setSearchText(strip_tags($Row["CardsTranslations_Content"]));
                        $SearchModel->setSearchType("card");

                        array_push($SearchArray, $SearchModel);
                    }
                }
            }

            $SearchQuery = $pdo->prepare("SELECT Highlights_ID, HighlightsTranslations_Name, HighlightsTranslations_Content FROM Highlights INNER JOIN HighlightsTranslations ON Highlights.Highlights_ID = HighlightsTranslations.Highlights_ID_FK WHERE HighlightsTranslations_Language = ? AND (HighlightsTranslations_Title LIKE ? OR HighlightsTranslations_Content LIKE ?);");
            $SearchQuery->bindValue(1, $SearchLanguage, PDO::PARAM_STR);
            $SearchQuery->bindValue(2, "%" . $SearchText . "%", PDO::PARAM_STR);
            $SearchQuery->bindValue(3, "%" . $SearchText . "%", PDO::PARAM_STR);

            if ($SearchQuery->execute()) {
                if ($SearchQuery->rowCount() > 0) {
                    while ($Row = $SearchQuery->fetch()) {
                        $SearchModel = new SearchModel();

                        $SearchModel->setSearchID($Row["Highlights_ID"]);
                        $SearchModel->setSearchTitle($Row["HighlightsTranslations_Title"]);
                        $SearchModel->setSearchText(strip_tags($Row["HighlightsTranslations_Content"]));
                        $SearchModel->setSearchType("highlight");

                        array_push($SearchArray, $SearchModel);
                    }
                }
            }

            return $SearchArray;
        }
    }
?>
