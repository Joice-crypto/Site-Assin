<?php
  class UserModel {
    private $UserID;
    private $UserName;
    private $UserEmail;
    private $UserPassword;

    public function getUserID() {
      return $this->UserID;
    }

    public function setUserID($UserID) {
      $this->UserID = $UserID;
    }

    public function getUserName() {
      return $this->UserName;
    }

    public function setUserName($UserName) {
      $this->UserName = $UserName;
    }

    public function getUserEmail() {
      return $this->UserEmail;
    }

    public function setUserEmail($UserEmail) {
      $this->UserEmail = $UserEmail;
    }

    public function getUserPassword() {
      return $this->UserPassword;
    }

    public function setUserPassword($UserPassword) {
      $this->UserPassword = $UserPassword;
    }
  }
 ?>
