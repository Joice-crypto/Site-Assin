<?php
  class GalleryImageModel {
    private $GImageID;
    private $User;
    private $GImageName;
    private $GImageDate;
    private $GImageDescription;

    public function getGImageID() {
      return $this->GImageID;
    }

    public function setGImageID($GImageID) {
      $this->GImageID = $GImageID;
    }

    public function getUser() {
      return $this->User;
    }

    public function setUser($User) {
      $this->User = $User;
    }

    public function getGImageName() {
      return $this->GImageName;
    }

    public function setGImageName($GImageName) {
      $this->GImageName = $GImageName;
    }

    public function getGImageDate() {
      return $this->GImageDate;
    }

    public function setGImageDate($GImageDate) {
      $this->GImageDate = $GImageDate;
    }

    public function getGImageDescription() {
      return $this->GImageDescription;
    }

    public function setGImageDescription($GImageDescription) {
      $this->GImageDescription = $GImageDescription;
    }
  }
?>
