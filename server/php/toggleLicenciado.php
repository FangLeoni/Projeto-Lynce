<?php

  session_start();
  include_once '../classes/tecnicos.php';

  $code = $_SESSION['codigo'];

  $tecnicoClass = new Technicians();
  $tecnicoClass->setTechId($code);
  
  $res = $tecnicoClass->toggleLicenciado();
  
  echo $res;
?>