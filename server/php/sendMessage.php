<?php
  session_start();
  include_once '../classes/conversas.php';

  $tipo = $_SESSION["tipo"];
  $mainUsu = $_SESSION["codigo"];
  $mensagem = $_GET["message"];
  $idConversa = $_GET["idConv"];
  $otherUsu = $_GET["cdUser"];
  
  // echo $tipo . "<br>";
  // echo $mainUsu . "<br>";
  // echo $mensagem . "<br>";
  // echo $idConversa . "<br>";
  // echo $otherUsu . "<br>";

  if(isset($mensagem) && isset($idConversa) && isset($otherUsu)) {
    $mensagens = new Messages();
    $mensagens->setUserType($tipo);
    $mensagens->setMainUserCode($mainUsu);
    $mensagens->setOtherUserCode($otherUsu);
    $mensagens->setConvCode($idConversa);
    $mensagens->setChatCode();

    // echo $mensagens->chatId;

    // // print_r($mensagens->sendMessage($mensagem));
    $res = $mensagens->sendMessage($mensagem);
    // print_r($res);



  }
?>