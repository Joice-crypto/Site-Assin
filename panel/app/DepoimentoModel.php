<?php
    class DepoimentoModel {
        private $DepoID;
        private $DImage;
        private $User;
        private $DName;
        private $DepoDate;
        private $DContent;
        private $DLinguage;
        private $DepoLastEditionDate; 

        public function getDepoimentoID() {
            return $this->DepoID;
          }
      
          public function setDepoimentoID($DepoID) {
            $this->DepoID = $DepoID;
          }
      
          public function getUserAuthor() {
            return $this->User;
          }
      
          public function setUserAuthor($User) {
            $this->User = $User;
          }
          public function getDepoLastEditionDate() {
            return $this->DepoLastEditionDate;
          }
      
          public function setDepoLastEditionDate($DepoLastEditionDate) {
            $this->DepoLastEditionDate = $DepoLastEditionDate;
          }
          public function getDepoimentoTitle() {
            return $this->DName;
          }

          public function setDepoimentoTitle($DName){
            $this->DName = $DName;
          }
          public function getDepoDate(){
            return $this->DepoDate;
          }
          public function setDepoDate($DepoDate){
            $this->$DepoDate = $DepoDate;
          }
          public function getDepoimentoThumbnail(){
            return $this->DImage;
          }
          public function setDepoimentoThumbnail($DImage){
            $this->$DImage = $DImage;
          }
          public function getDepoimentoContent(){
            return $this->DContent;
          }
          public function setDepoimentoContent($DContent){
            $this->$DContent = $DContent;
          }
          public function getDepoimentoLanguage(){
            return $this->DLinguage;
          }
          public function setDepoimentoLanguage($DLinguage){
            $this->$DLinguage = $DLinguage;
          }


    }
?>