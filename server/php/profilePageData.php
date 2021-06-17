<?php

    session_start();
    include_once '../classes/clientes.php';
    include_once '../classes/tecnicos.php';

    $tipo = $_SESSION["tipo"];
    $email = $_SESSION['email'];

    if($tipo == "cliente") {
        $clienteClass = new Clients();
        $clienteClass->setClientEmail($email);

        $res = $clienteClass->getClientDataByEmail();

        $rtnData = array(
          "nome" => $res["nm_cliente"],
          "email" => $res["ds_email"],
          "telefone" => $res["ds_telefone"],
          "estado" => $res["sg_estado"],
          "cidade" => $res["nm_cidade"]
        );

    } else {
        $tecnicoClass = new Technicians();
        $tecnicoClass->setTechEmail($email);
        
        $res = $tecnicoClass->getTechDataByEmail();

        $rtnData = array(
          "tipo" => $_SESSION["tipo"],
          "nome" => $res["nm_tecnico"],
          "email" => $res["ds_email"],
          "telefone" => $res["ds_telefone"],
          "estado" => $res["sg_estado"],
          "cidade" => $res["nm_cidade"],
          "endereco" => $res["ds_endereco"],
          "numero_complementar" => intval($res["ds_numero_complementar"]),
          "descricao" => $res["ds_descricao_loja"],
          "premium" => intval($res["ic_premium"]),
          "licenciado" => intval($res["ic_licenciado"])
        );
    }
    
   

    if($res) {
      echo json_encode($rtnData);
    } else {
        $res;
    }

?>


        