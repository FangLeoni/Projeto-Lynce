<?php
  session_start();
  
  include_once '../classes/clientes.php';
  include_once '../classes/tecnicos.php';
  /*
    $_SESSION['logado'] = true;
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['codigo'] = $res["cd_cliente"];
    $_SESSION['profPic'] = $res["md_Picture"];
    $_SESSION['tipo'] = "cliente";
  */

  $codigo = $_SESSION['codigo'];
    
  if(isset($_POST["estado"]) && isset($_POST["cidade"])) {
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];

    $tecnicoClass = new Technicians();
    $tecnicoClass->setTechCity($cidade);
    $tecnicoClass->setTechState($estado);
    $infos = $tecnicoClass->getMultiTechData();

    $objeto = array();


    foreach($infos as $key => $info) {
      array_push($objeto, array(
        "nome" => $info["nm_tecnico"],
        "endereco" => $info["ds_endereco"],
        "numComp" => $info["ds_numero_complementar"]
      ));
    }

    echo json_encode($objeto);

    
  }
    
?>