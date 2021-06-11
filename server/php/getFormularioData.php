
<?php
    session_start();
    
    include_once '../classes/formulario.php';
    
    $formulario = new Formulario();
    
    if(isset($_POST["marcaSelecionada"])) {
      $marcaSelecionada = $_POST["marcaSelecionada"];
      $formulario->setNmMarca($marcaSelecionada);
      $modelos = $formulario->getAllModelosMarcaEspecifica();

      echo json_encode($modelos);
    } else {
      $marcas = $formulario->getAllMarcas();

      echo json_encode($marcas);
    }
    
?>