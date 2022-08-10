<?php
  class HighlightModel {
    private $HighlightID;
    private $UserAuthor;
    private $UserLastEditionAuthor;
    private $HighlightTitle;
    private $HighlightDescription;
    private $HighlightContent;
    private $HighlightLanguage;
    private $HighlightDate; // As datas aqui são sempre consideradas no padrão Y-m-d
    private $HighlightLastEditionDate;
    private $HighlightThumbnail;

    public function getHighlightID() {
      return $this->HighlightID;
    }

    public function setHighlightID($HighlightID) {
      $this->HighlightID = $HighlightID;
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

    public function getHighlightTitle() {
      return $this->HighlightTitle;
    }

    public function setHighlightTitle($HighlightTitle) {
      $this->HighlightTitle = $HighlightTitle;
    }

    public function getHighlightDescription() {
      return $this->HighlightDescription;
    }

    public function setHighlightDescription($HighlightDescription) {
      $this->HighlightDescription = $HighlightDescription;
    }

    public function getHighlightContent() {
      return $this->HighlightContent;
    }

    public function setHighlightContent($HighlightContent) {
      $this->HighlightContent = $HighlightContent;
    }

    public function getHighlightLanguage() {
      return $this->HighlightLanguage;
    }

    public function setHighlightLanguage($HighlightLanguage) {
      $this->HighlightLanguage = $HighlightLanguage;
    }

    public function getHighlightDate() {
      return $this->HighlightDate;
    }

    public function setHighlightDate($HighlightDate) {
      $this->HighlightDate = $HighlightDate;
    }

    public function getHighlightLastEditionDate() {
      return $this->HighlightLastEditionDate;
    }

    public function setHighlightLastEditionDate($HighlightLastEditionDate) {
      $this->HighlightLastEditionDate = $HighlightLastEditionDate;
    }

    public function getHighlightThumbnail() {
      return $this->HighlightThumbnail;
    }

    public function setHighlightThumbnail($HighlightThumbnail) {
      $this->HighlightThumbnail = $HighlightThumbnail;
    }
  }
 ?>
