<?php
  define("MAX_IMAGE_SIZE", 5145728); // 4,9MiB
  define("MAX_FILE_SIZE", 5145728); // 4,9MiB
  define("CONTENT_IMAGE_PATH", dirname(dirname(__DIR__)) . "/assets/pictures" . DIRECTORY_SEPARATOR);
  define("IMAGE_PLACEHOLDER", "iconfinder_Camera-01_1976059.png");
  define("SUPPORTED_LANGUAGES", array("pt-br", "en-us", "es-es", "fr-fr"));
  define("LANGUAGE_AMOUNT", count(SUPPORTED_LANGUAGES));
  define("SUPPORTED_IMAGES", array('jpeg', 'jpg', 'png'));
  define("SUPPORTED_FILES", array('jpeg', 'jpg', 'png', 'doc', 'docx', 'pdf', 'txt'));
  define("MAX_TITLE_SIZE", 255);
  define("MAX_DESCRIPTION_SIZE", 512);
  define("MAX_SETTING_VALUE_SIZE", 512);
  define("MAX_FILE_NAME_SIZE", 512);
  define("MAX_EMAIL_SIZE", 255);
  define("MAX_PASSWORD_SIZE", 255);
  define("MAX_USERNAME_SIZE", 255);
 ?>
