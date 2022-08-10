<?php
    class GeneralSettingModel {
        private $GeneralSettingID;
        private $GeneralSettingKey;
        private $GeneralSettingValue;

        public function getGeneralSettingID() {
            return $this->GeneralSettingID;
        }

        public function setGeneralSettingID($GeneralSettingID) {
            $this->GeneralSettingID = $GeneralSettingID;
        }

        public function getGeneralSettingKey() {
            return $this->GeneralSettingKey;
        }

        public function setGeneralSettingKey($GeneralSettingKey) {
            $this->GeneralSettingKey = $GeneralSettingKey;
        }

        public function getGeneralSettingValue() {
            return $this->GeneralSettingValue;
        }

        public function setGeneralSettingValue($GeneralSettingValue) {
            $this->GeneralSettingValue = $GeneralSettingValue;
        }
    }
?>