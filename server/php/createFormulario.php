<?php
    session_start();
    
    include_once '../classes/formulario.php';
    
    // $marca = $_POST["marca"];
    // $modelo = $_POST["modelo"];
    // $tipoProb = $_POST["tipoProb"];

    $marca = "Samsung";
    $modelo = "SM-A526BZKJZTO";
    $tipoProb = "software";

    if(isset($marca) && isset($modelo) && isset($tipoProb)) {
        $formulario = new Formulario();
        
        $formulario->setNmMarca($marca);
        $formulario->setNmModelo($modelo);
        $formulario->setNmTipo($tipoProb);
        $modelo = $formulario->getAllModelos();
        $formulario->setFk($modelo["cd_modelo"]);
        $defeitos = $formulario->getAllPossiveisDefeitos();
        $perguntas = [];


        foreach($defeitos as $defeito){
          $formulario->setFk($defeito["cd_defeito"]);
          array_push($perguntas, $formulario->getAllPerguntas());
        }
        
        $objeto = array("software" => array());

        foreach($defeitos as $key => $defeito){
          $temp = array(
            "problema" => $defeito["nm_defeito"],
            "descricao" => $defeito["ds_descricao"],
            "solucao" => $defeito["ds_possivel_solucao"],
            "pontuacao" => 0,
            "opcoes" => array()
          );

          array_push( $objeto["software"], $temp );

          foreach($perguntas as $pergunta){
            foreach($pergunta as $perg) {
              if($defeito["cd_defeito"] === $perg["fk_possivel_defeito"]) {
                $temp2 = array(
                  "pergunta" => $perg["ds_pergunta"],
                  "resposta" => intval($perg["ic_resposta"]),
                  "pontos" => intval($perg["qt_pontos"])
                );
                
                array_push( $objeto["software"][$key]["opcoes"], $temp2 );
              }
            }
          }
          
        }
        setcookie("", "Luxury Car", time()+2*24*60*60);
        return json_encode($objeto);
    } 

?>