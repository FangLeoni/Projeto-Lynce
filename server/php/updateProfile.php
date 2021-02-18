<?php
    session_start();

    $tipo = $_SESSION["tipo"];
    $mainCode = $_SESSION["codigo"];

    $nome = $_POST["name"];
    $email = $_POST["email"];
    $estado = $_POST["state"];
    $cidade = $_POST["city"];
    $telefone = $_POST["phone"];
    // $mainEmail = $_SESSION["email"];

    include_once '../classes/clientes.php';
    include_once '../classes/tecnicos.php';
        
    if($tipo == "cliente"){
        $clienteClass = new Clients();
        $clienteClass->setClientId($mainCode);
        $clienteClass->setClientName($nome);
        $clienteClass->setClientEmail($email);
        $clienteClass->setClientState($estado);
        $clienteClass->setClientCity($cidade);
        $clienteClass->setClientPhone($telefone);

        $res = $clienteClass->updateClientProfileData();
    } else {
        $endereco = $_POST["address"];
        $numComp = $_POST["numComp"];

        $tecnicoClass = new Technicians();
        $tecnicoClass->setTechId($mainCode);
        $tecnicoClass->setTechName($nome);
        $tecnicoClass->setTechEmail($email);
        $tecnicoClass->setTechState($estado);
        $tecnicoClass->setTechCity($cidade);
        $tecnicoClass->setTechPhone($telefone);
        $tecnicoClass->setTechAddress($endereco);
        $tecnicoClass->setTechCompNumber($numComp);

        $res = $tecnicoClass->updateTechProfileData();
    }

    if($res) {
        $_SESSION["email"]= $email;
        echo header("HTTP/1.0 200 Atualizado");
    }else {
        die(header("HTTP/1.0 401 Erro ao guardar imagem na base de dados"));
    }
    
?>