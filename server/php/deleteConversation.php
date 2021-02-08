<?php
    session_start();
    
    include_once '../classes/conversas.php';

    $idConversa = $_POST["idConv"];

    if(isset($idConversa)) {
        $mensagens = new Messages();

        $mensagens->setConvCode($idConversa);

        $exist = $mensagens->getConv(true);
        
        
        if($exist) {
            $res = $mensagens->deleteConv();

            return $res;
        } else {
            return die(header("HTTP/1.0 422 Conversa não existe"));
        }
    } else {
        return die(header("HTTP/1.0 422 Falha deletar conversa"));
    }

?>