<?php
  session_start();
  include_once '../classes/conversas.php';

  $tipo = $_SESSION["tipo"];
  $mainUsu = $_SESSION["codigo"];
  $idConversa = $_POST["idConv"];
  $otherUsu = $_POST["cdUser"];

  if(
    isset($idConversa) && 
    isset($otherUsu) && 
    $_SERVER['REQUEST_METHOD'] == 'POST'
  ) 
  {

    $imagename = $_FILES['arquivo']['name'];
    $imagetemp = $_FILES['arquivo']['tmp_name'];
    $imagePath = "../uploads/" . $idConversa . "/";
    $imagePathReturn = "/server/uploads/" . $idConversa . "/";

    if (!is_dir($imagePath)) {
        mkdir($imagePath, 0777, true);
    }

    if(is_uploaded_file($imagetemp)) {

        if(move_uploaded_file($imagetemp, $imagePath.$imagename)) {

          $mensagens = new Messages();
          $mensagens->setMainUserCode($mainUsu);
          $mensagens->setOtherUserCode($otherUsu);
          $mensagens->setConvCode($idConversa);
          $mensagens->setChatCode();
      
          $res = $mensagens->sendFile($imagename);
          echo $imagePathReturn.$imagename;
        }
    }
    else {
      die(header("HTTP/1.0 401 Erro no upload do arquivo"));
    }
  } 
?>