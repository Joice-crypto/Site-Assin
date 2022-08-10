<?php
    class CardModel {
        private $CardID;
        private $UserAuthor;
        private $UserLastEditionAuthor;
        private $CardName;
        private $CardDescription;
        private $CardContent;
        private $CardLanguage;
        private $CardThumbnail;
        private $CardDate;
        private $CardLastEditionDate;

        public function getCardID() {
            return $this->CardID;
        }

        public function setCardID($CardID) {
            $this->CardID = $CardID;
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

        public function getCardName() {
            return $this->CardName;
        }

        public function setCardName($CardName) {
            $this->CardName = $CardName;
        }

        public function getCardDescription() {
            return $this->CardDescription;
        }

        public function setCardDescription($CardDescription) {
            $this->CardDescription = $CardDescription;
        }

        public function getCardContent() {
            return $this->CardContent;
        }

        public function setCardContent($CardContent) {
            $this->CardContent = $CardContent;
        }

        public function getCardLanguage() {
            return $this->CardLanguage;
        }

        public function setCardLanguage($CardLanguage) {
            $this->CardLanguage = $CardLanguage;
        }

        public function getCardThumbnail() {
            return $this->CardThumbnail;
        }

        public function setCardThumbnail($CardThumbnail) {
            $this->CardThumbnail = $CardThumbnail;
        }

        public function getCardDate() {
            return $this->CardDate;
        }

        public function setCardDate($CardDate) {
            $this->CardDate = $CardDate;
        }

        public function getCardLastEditionDate() {
            return $this->CardLastEditionDate;
        }

        public function setCardLastEditionDate($CardLastEditionDate) {
            $this->CardLastEditionDate = $CardLastEditionDate;
        }
    }
?>