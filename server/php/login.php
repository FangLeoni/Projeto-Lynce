<?php
    session_start();
    // include 'conexao.php';
    include_once '../classes/clientes.php';
    include_once '../classes/tecnicos.php';

    $_SESSION['logado']=false;


    if(isset($_POST['email']) && isset($_POST['senha'])) {

        if($_POST['tipo'] == "cliente") {
            $clienteClass = new Clients();
            $clienteClass->setClientEmail($_POST['email']);
            $clienteClass->setClientPassword($_POST['senha']);

            $res = $clienteClass->verifyClient();

            if($res == true) {
                $res = $clienteClass->getClientDataByEmail();
                
                $_SESSION['logado'] = true;
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['codigo'] = $res["cd_cliente"];
                $_SESSION['profPic'] = $res["md_Picture"];
                $_SESSION['tipo'] = "cliente";

                $imagePath = "../profilePics/" . $_SESSION['codigo'] . "/";
                if (!is_dir($imagePath)) {
                    mkdir($imagePath, 0777, true);
                    $source = '../profilePics/' . $_SESSION['profPic'];
                    $destination = $imagePath . $_SESSION['profPic'];
                    copy( $source, $destination );
                }
                
            } else {
                return $res;
            }
            
        } else {
            $tecnicoClass = new Technicians();
            $tecnicoClass->setTechEmail($_POST['email']);
            $tecnicoClass->setTechPassword($_POST['senha'], 0);
            
            $res = $tecnicoClass->verifyTech();
            
            if($res == true) {
                $res = $tecnicoClass->getTechDataByEmail();
                
                $_SESSION['logado'] = true;
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['codigo'] = $res["cd_tecnico"];
                $_SESSION['profPic'] = $res["md_picture"];
                $_SESSION['tipo'] = "tecnico";

                $imagePath = "../profilePics/" . $_SESSION['codigo'] . "/";
                if (!is_dir($imagePath)) {
                    mkdir($imagePath, 0777, true);
                    $source = '../profilePics/' . $_SESSION['profPic'];
                    $destination = $imagePath . $_SESSION['profPic'];
                    copy( $source, $destination );
                }
            } else {
                return $res;
            }
        }
    }
?>