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

    echo $mensagens->chatId;

    // print_r($mensagens->sendMessage($mensagem));
    $res = $mensagens->sendMessage($mensagem);
    print_r($res);

  }

  // if(isset($mensagem)) {

  //   if($tipo == "usuario") {
  //       $outro = "tecnico";
  //   } else {
  //       $outro = "usuario";
  //   }
    
  //   $sql = "SELECT cd_" . $tipo . " FROM tb_" . $tipo . "s WHERE ds_email LIKE '$email' ";

    
  //   $query = mysqli_query($conexao,$sql);
  //   $codigo = $query->fetch_assoc();

  //   $codigoMain  = $codigo['cd_'. $tipo];
    
  //   $sql = "SELECT cd_other FROM tb_chats WHERE fk_conversa = '$idConversa'";

    
  //   $query = mysqli_query($conexao,$sql);
  //   $codigo = $query->fetch_assoc();


  //   $codigoOther = $codigo["cd_other"];



  //   $cd_chat = crc32(uniqid());

  //   $sql = "INSERT INTO tb_chats (
  //               cd_chat,
  //               ds_message,
  //               dt_creation,
  //               cd_main,
  //               cd_other,
  //               fk_conversa
  //           ) VALUES (
  //               '$cd_chat',
  //               '$mensagem',
  //               NOW(),
  //               $codigoMain,
  //               $codigoOther,
  //               $idConversa
  //           )";
  //   // echo $sql;

  //   $query = mysqli_query($conexao,$sql);
  //   echo $query;
  //   // $count = mysqli_num_rows($query);

    

  // } else {
  //   echo "Erro ao connectar";
  // }
  // mysqli_close();
?>