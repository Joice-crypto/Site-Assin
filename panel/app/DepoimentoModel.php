<?php
    class DepoimentoModel {
        private $DepoID;
        private $DepoimentoThumbnail;
        private $User;
        private $DName;
        private $DepoDate;
        private $DContent;
        private $DLinguage;
        private $DepoLastEditionDate; 
        private $DepoimentoDescription;
        private $UserLastEditionAuthor;

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
          public function getDepoimentoLastEditionDate() {
            return $this->DepoLastEditionDate;
          }
      
          public function setDepoimentoLastEditionDate($DepoLastEditionDate) {
            $this->DepoLastEditionDate = $DepoLastEditionDate;
          }
         public function getDepoimentoTitle(){

          return $this->DName;

         }
         public function setDepoimentoTitle($DName){

          $this->DName = $DName;

         }
          public function getDepoimentoDescription() {
            return $this->DepoimentoDescription;
          }
      
          public function setDepoimentoDescription($DepoimentoDescription) {
            $this->DepoimentoDescription = $DepoimentoDescription;
          }
          public function getUserLastEditionAuthor() {
            return $this->UserLastEditionAuthor;
          }
      
          public function setUserLastEditionAuthor($UserLastEditionAuthor) {
            $this->UserLastEditionAuthor = $UserLastEditionAuthor;
          }
          public function getDepoDate(){
            return $this->DepoDate;
          }
          public function setDepoDate($DepoDate){
            $this->$DepoDate = $DepoDate;
          }
          public function getDepoimentoThumbnail(){
            return $this->DepoimentoThumbnail;
          }
          public function setDepoimentoThumbnail($DepoimentoThumbnail){
            $this->DepoimentoThumbnail = $DepoimentoThumbnail;
          }
          public function getDepoimentoContent() {
            return $this->DContent;
          }
      
          public function setDepoimentoContent($DContent) {
            $this->DContent = $DContent;
          }
          public function getDepoimentoLanguage(){
            return $this->DLinguage;
          }
          public function setDepoimentoLanguage($DLinguage){
            $this->$DLinguage = $DLinguage;
          }


    }
?>