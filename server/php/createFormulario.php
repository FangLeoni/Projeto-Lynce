<?php
    session_start();
    
    include_once '../classes/formulario.php';
    
    $marca = $_POST["marca"];
    $modelo = $_POST["modelo"];
    $tipoProb = $_POST["tipoProb"];

    // $marca = "Samsung";
    
    // $modelo = "SM-A526BZKJZTO";
    // $tipoProb = "software";

    // echo $marca;
    // echo $tipoProb;
    // echo $modelo;

    if(isset($marca) && isset($modelo) && isset($tipoProb)) {
        $formulario = new Formulario();
        
        $formulario->setNmMarca($marca);
        $formulario->setNmModelo($modelo);
        $formulario->setNmTipo($tipoProb);
        $modelo = $formulario->getModelo();
        $formulario->setFk($modelo["cd_modelo"]);
        
        $defeitos = $formulario->getAllPossiveisDefeitos();


        $perguntas = [];


        foreach($defeitos as $defeito){
          $formulario->setFk($defeito["cd_defeito"]);
          array_push($perguntas, $formulario->getAllPerguntas());
        }
        
        $objeto = array(
          $tipoProb => array(),
          "marca" => $marca,
          "modelo" => $modelo["nm_modelo"],
          "defeito" => $tipoProb
        );
        // $objeto = array($tipoProb => array());

        foreach($defeitos as $key => $defeito){
          $temp = array(
            "problema" => $defeito["nm_defeito"],
            "descricao" => $defeito["ds_descricao"],
            "solucao" => $defeito["ds_possivel_solucao"],
            "pontuacao" => 0,
            "opcoes" => array()
          );

          array_push( $objeto[$tipoProb], $temp );

          foreach($perguntas as $pergunta){
            foreach($pergunta as $perg) {
              if($defeito["cd_defeito"] === $perg["fk_possivel_defeito"]) {
                $temp2 = array(
                  "pergunta" => $perg["ds_pergunta"],
                  "resposta" => intval($perg["ic_resposta"]),
                  "pontos" => intval($perg["qt_pontos"])
                );
                
                array_push( $objeto[$tipoProb][$key]["opcoes"], $temp2 );
              }
            }
          }
          
        }
        
        echo json_encode($objeto);
        
    } 

?>