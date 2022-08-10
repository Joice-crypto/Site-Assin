<?php
    class ServerFileModel {
        private $ServerFileID;
        private $User;
        private $ServerFileName;
        private $ServerFileDate;
        private $ServerFileURL;

        public function getServerFileID() {
            return $this->ServerFileID;
        }

        public function setServerFileID($ServerFileID) {
            $this->ServerFileID = $ServerFileID;
        }

        public function getUser() {
            return $this->User;
        }

        public function setUser($User) {
            $this->User = $User;
        }

        public function getServerFileName() {
            return $this->ServerFileName;
        }

        public function setServerFileName($ServerFileName) {
            $this->ServerFileName = $ServerFileName;
        }

        public function getServerFileDate() {
            return $this->ServerFileDate;
        }

        public function setServerFileDate($ServerFileDate) {
            $this->ServerFileDate = $ServerFileDate;
        }

        public function getServerFileURL() {
            return $this->ServerFileURL;
        }

        public function setServerFileURL($ServerFileURL) {
            $this->ServerFileURL = $ServerFileURL;
        }
    }
?>