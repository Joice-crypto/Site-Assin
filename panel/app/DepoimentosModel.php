<?php

use JetBrains\PhpStorm\Internal\ReturnTypeContract;

    class DepoimentosModel {
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
      
          public function getUser() {
            return $this->User;
          }
      
          public function setUserAuthor($User) {
            $this->User = $User;
          }
          public function getDEpoLastEditionDate() {
            return $this->HighlightLastEditionDate;
          }
      
          public function setDepoLastEditionDate($DepoLastEditionDate) {
            $this->DepoLastEditionDate = $DepoLastEditionDate;
          }
          public function getDepoName() {
            return $this->DName;
          }

          public function setDepoName($DName){
            $this->DName = $DName;
          }
          public function getDepoDate(){
            return $this->DepoDate;
          }
          public function setDepoDate($DepoDate){
            $this->$DepoDate = $DepoDate;
          }
          public function getDImage(){
            return $this->DImage;
          }
          public function setDImage($DImage){
            $this->$DImage = $DImage;
          }
          public function getDContent(){
            return $this->DContent;
          }
          public function setDContent($DContent){
            $this->$DContent = $DContent;
          }
          public function getDLanguage(){
            return $this->DLinguage;
          }
          public function setDLanguage($DLinguage){
            $this->$DLinguage = $DLinguage;
          }


    }