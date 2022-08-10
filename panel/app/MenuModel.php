<?php
    class MenuModel {
        private $MenuID;
        private $MenuRedirection;
        private $MenuName;
        private $MenuSon;
        private $MenuGrandSon;

        public function getMenuID() {
            return $this->MenuID;
        }

        public function setMenuID($MenuID) {
            $this->MenuID = $MenuID;
        }

        public function getMenuRedirection() {
            return $this->MenuRedirection;
        }

        public function setMenuRedirection($MenuRedirection) {
            $this->MenuRedirection = $MenuRedirection;
        }

        public function getMenuName() {
            return $this->MenuName;
        }

        public function setMenuName($MenuName) {
            $this->MenuName = $MenuName;
        }

        public function getMenuSon() {
            return $this->MenuSon;
        }

        public function setMenuSon($MenuSon) {
            $this->MenuSon = $MenuSon;
        }
    }
?>