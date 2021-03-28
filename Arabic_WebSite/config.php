<?php
  session_start();
//$goback = $_SERVER[HTTP_REFERER];
  if (!isset($_SESSION['lang']))
      $_SESSION['lang'] = "en";
  else if (isset($_GET['lang']) && $_SESSION['lang'] != $_GET['lang'] && !empty($_GET['lang']))
  {
      if ($_GET['lang'] == "en")
      {
         // include "languages/en.php";
          $_SESSION['lang'] = "en";
      }
      else if ($_GET['lang'] == "ar")
      {
          //include "languages/ar.php";
          $_SESSION['lang'] = "ar";
      }

  }

  require_once "languages/".$_SESSION['lang'].".php";
//  echo "choose languge: ".$_SESSION['lang'];

//header("location: $goback");
?>

