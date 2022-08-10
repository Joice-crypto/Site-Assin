<?php
    class SearchModel {
        private $SearchID; // ID do Item encontrado
        private $SearchTitle;
        private $SearchText;
        private $SearchType;

        public function getSearchID() {
            return $this->SearchID;
        }

        public function setSearchID($SearchID) {
            $this->SearchID = $SearchID;
        }

        public function getSearchTitle() {
            return $this->SearchTitle;
        }

        public function setSearchTitle($SearchTitle) {
            $this->SearchTitle = $SearchTitle;
        }

        public function getSearchText() {
            return $this->SearchText;
        }

        public function setSearchText($SearchText) {
            $this->SearchText = $SearchText;
        }

        public function getSearchType() {
            return $this->SearchType;
        }

        public function setSearchType($SearchType) {
            $this->SearchType = $SearchType;
        }
    }
?>