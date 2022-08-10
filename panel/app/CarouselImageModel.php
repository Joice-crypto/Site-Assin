<?php
    class CarouselImageModel {
        private $CImageID;
        private $User;
        private $CImageName;
        private $CImageDate;

        public function getCImageID() {
            return $this->CImageID;
        }

        public function setCImageID($CImageID) {
            $this->CImageID = $CImageID;
        }

        public function getUser() {
            return $this->User;
        }

        public function setUser($User) {
            $this->User = $User;
        }

        public function getCImageName() {
            return $this->CImageName;
        }

        public function setCImageName($CImageName) {
            $this->CImageName = $CImageName;
        }

        public function getCImageDate() {
            return $this->CImageDate;
        }

        public function setCImageDate($CImageDate) {
            $this->CImageDate = $CImageDate;
        }
    }
?>