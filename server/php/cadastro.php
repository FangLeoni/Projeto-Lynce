<?php
    // include 'conexao.php';
    include_once '../classes/clientes.php';
    include_once '../classes/tecnicos.php';

    $cond1 = isset($_POST['nome']) /*&& isset($_POST['usuario']) */ && isset($_POST['senha']);
    $cond2 = isset($_POST['estado']) && isset($_POST['cidade']) && isset($_POST['tel']) && isset($_POST['tipo_conta']);

    if($_POST['estado'] == 'null') {
        return die(header("HTTP/1.0 422 Estado não selecionado!"));
    }
    
    if( $cond1 && $cond2 && isset($_POST['email'])) {

        if($_POST['tipo_conta'] == "cliente") {

            $clienteClass = new Clients();
            $clienteClass->setClientId();
            $clienteClass->setClientName($_POST['nome']);
            $clienteClass->setClientEmail ($_POST['email']);
            $clienteClass->setClientPassword ($_POST['senha']);
            $clienteClass->setClientPhone ($_POST['tel']);
            $clienteClass->setClientState ($_POST['estado']);
            $clienteClass->setClientCity ($_POST['cidade']);
            
            $res = $clienteClass->createClient();

            if($res != true) {
                return $res;
            }

        } else {

            if(!isset($_POST['endereco'])) {
                return die(header("HTTP/1.0 422 Endereço não definido"));
            } else {
                $endereco_usuario = $_POST['endereco'];
            }
            if(isset($_POST['num_complementar'])) {
                $num_complementar_usuario = $_POST['num_complementar'];
            } else {
                $num_complementar_usuario = null;
            }

            $tecnicoClass = new Technicians();
            $tecnicoClass->setTechId();
            $tecnicoClass->setTechName($_POST['nome']);
            $tecnicoClass->setTechEmail($_POST['email']);
            $tecnicoClass->setTechPassword($_POST['senha']);
            $tecnicoClass->setTechPhone($_POST['tel']);
            $tecnicoClass->setTechState($_POST['estado']);
            $tecnicoClass->setTechCity($_POST['cidade']);
            $tecnicoClass->setTechAddress($_POST['endereco']);
            $tecnicoClass->setTechCompNumber($_POST['num_complementar']);

            $res = $tecnicoClass->createTech();

            if($res != true) {
                return $res;
            }
        }
    }

?>