<?php
    class PageModel {
        private $PageID;
        private $PageDate;
        private $PageLastEditionDate;
        private $UserAuthor;
        private $UserLastEditionAuthor;
        private $PageURL;
        private $PageLanguage;
        private $PageTitle;
        private $PageContent;

        public function getPageID() {
            return $this->PageID;
        }

        public function setPageID($PageID) {
            $this->PageID = $PageID;
        }

        public function getPageDate() {
            return $this->PageDate;
        }

        public function setPageDate($PageDate) {
            $this->PageDate = $PageDate;
        }

        public function getPageLastEditionDate() {
            return $this->PageLastEditionDate;
        }

        public function setPageLastEditionDate($PageLastEditionDate) {
            $this->PageLastEditionDate = $PageLastEditionDate;
        }

        public function getUserAuthor() {
            return $this->UserAuthor;
        }

        public function setUserAuthor($UserAuthor) {
            $this->UserAuthor = $UserAuthor;
        }

        public function getUserLastEditionAuthor() {
            return $this->UserLastEditionAuthor;
        }

        public function setUserLastEditionAuthor($UserLastEditionAuthor) {
            $this->UserLastEditionAuthor = $UserLastEditionAuthor;
        }

        public function getPageURL() {
            return $this->PageURL;
        }

        public function setPageURL($PageURL) {
            $this->PageURL = $PageURL;
        }

        public function getPageLanguage() {
            return $this->PageLanguage;
        }

        public function setPageLanguage($PageLanguage) {
            $this->PageLanguage = $PageLanguage;
        }

        public function getPageTitle() {
            return $this->PageTitle;
        }

        public function setPageTitle($PageTitle) {
            $this->PageTitle = $PageTitle;
        }

        public function getPageContent() {
            return $this->PageContent;
        }

        public function setPageContent($PageContent) {
            $this->PageContent = $PageContent;
        }
    }
?>