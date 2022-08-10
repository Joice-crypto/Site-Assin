<?php
  session_start();
  //header('Cache-control: private'); // IE 6 FIX

  if(isSet($_GET['lang']))
  {
    $lang = $_GET['lang'];

    // register the session and set the cookie
    $_SESSION['lang'] = $lang;

    setcookie('lang', $lang, time() + (3600 * 24 * 30));
  }
  else if(isSet($_SESSION['lang']))
  {
    $lang = $_SESSION['lang'];
  }
  else if(isSet($_COOKIE['lang']))
  {
    $lang = $_COOKIE['lang'];
  }
  else
  {
    $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    $acceptLang = ['pt', 'en', 'es', 'fr'];
    $lang = in_array($lang, $acceptLang) ? $lang : 'en';
  }

  switch (substr($lang, 0, 2)) {
    case 'en':
      $lang_file = 'en_US.php';
      break;
    case 'pt':
      $lang_file = 'pt_BR.php';
      break;
    case 'es':
      $lang_file = 'es_ES.php';
      break;
    case 'fr':
      $lang_file = 'fr_FR.php';
      break;
    default:
      $lang_file = 'en_US.php';
  }

  include_once $lang_file;
?>
