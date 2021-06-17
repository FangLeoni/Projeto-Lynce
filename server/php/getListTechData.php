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

    if($infos != false) {
      ?>
        <div class="tecnicosParceiros">
          <?php
            foreach($infos as $info){
              if($info["ic_premium"] == 1) {
              ?>
              <div class="parceiro">
                <h1><?php echo $info["nm_tecnico"] ?> <span>●</span> Parceiro</h1>
                <div class="generalDataCont">
                  <div class="imgPerfil">
                    <img src="/server/profilePics/<?php echo $info["cd_tecnico"] ?>/<?php echo $info["md_picture"] ?>" alt="">
                  </div>
                  <div class="dataCont">
                    <p><?php echo $info["nm_tecnico"] ?></p>
                    <p><?php echo $info["ds_endereco"] ?>, <?php echo $info["ds_numero_complementar"] ?> | <?php echo $info["sg_estado"] ?></p>
                    <p><?php echo $info["ds_telefone"] ?></p>
                    <p><?php echo $info["ds_email"] ?></p>
                    <a href="/frontEnd/src/pages/chat.php?addTech=<?php echo $info['ds_email'] ?>">
                      <p>Chamar Assistência</p>
                      <img src="/frontEnd/assets/icons/message-circle.png" alt="">
                    </a>  
                    <div class="star-widget">
                      <?php
                        $qtVotos = $info["qt_votos"];
                        $qtPontuacao = $info["qt_pontuacao"];
                        $mediaGeral = $qtPontuacao /$qtVotos;

                        if(round($mediaGeral) == 5) {
                          ?>
                            <input type="radio" name="rate" id="rate-5" checked>
                            <label for="rate-5" class="fas fa-star"></label>
                            <input type="radio" name="rate" id="rate-4">
                            <label for="rate-4" class="fas fa-star"></label>
                            <input type="radio" name="rate" id="rate-3">
                            <label for="rate-3" class="fas fa-star"></label>
                            <input type="radio" name="rate" id="rate-2">
                            <label for="rate-2" class="fas fa-star"></label>
                            <input type="radio" name="rate" id="rate-1">
                            <label for="rate-1" class="fas fa-star"></label>
                          <?php
                        } elseif(round($mediaGeral) == 4) {
                          ?>
                            <input type="radio" name="rate" id="rate-5">
                            <label for="rate-5" class="fas fa-star"></label>
                            <input type="radio" name="rate" id="rate-4" checked>
                            <label for="rate-4" class="fas fa-star"></label>
                            <input type="radio" name="rate" id="rate-3">
                            <label for="rate-3" class="fas fa-star"></label>
                            <input type="radio" name="rate" id="rate-2">
                            <label for="rate-2" class="fas fa-star"></label>
                            <input type="radio" name="rate" id="rate-1">
                            <label for="rate-1" class="fas fa-star"></label>
                          <?php
                        } elseif(round($mediaGeral) == 3) {
                          ?>
                            <input type="radio" name="rate" id="rate-5">
                            <label for="rate-5" class="fas fa-star"></label>
                            <input type="radio" name="rate" id="rate-4">
                            <label for="rate-4" class="fas fa-star"></label>
                            <input type="radio" name="rate" id="rate-3" checked>
                            <label for="rate-3" class="fas fa-star"></label>
                            <input type="radio" name="rate" id="rate-2">
                            <label for="rate-2" class="fas fa-star"></label>
                            <input type="radio" name="rate" id="rate-1">
                            <label for="rate-1" class="fas fa-star"></label>
                          <?php
                        } 
                        elseif(round($mediaGeral) == 2) {
                          ?>
                            <input type="radio" name="rate" id="rate-5">
                            <label for="rate-5" class="fas fa-star"></label>
                            <input type="radio" name="rate" id="rate-4">
                            <label for="rate-4" class="fas fa-star"></label>
                            <input type="radio" name="rate" id="rate-3">
                            <label for="rate-3" class="fas fa-star"></label>
                            <input type="radio" name="rate" id="rate-2" checked>
                            <label for="rate-2" class="fas fa-star"></label>
                            <input type="radio" name="rate" id="rate-1">
                            <label for="rate-1" class="fas fa-star"></label>
                          <?php
                        } else {
                          ?>
                            <input type="radio" name="rate" id="rate-5">
                            <label for="rate-5" class="fas fa-star"></label>
                            <input type="radio" name="rate" id="rate-4">
                            <label for="rate-4" class="fas fa-star"></label>
                            <input type="radio" name="rate" id="rate-3">
                            <label for="rate-3" class="fas fa-star"></label>
                            <input type="radio" name="rate" id="rate-2">
                            <label for="rate-2" class="fas fa-star"></label>
                            <input type="radio" name="rate" id="rate-1" checked>
                            <label for="rate-1" class="fas fa-star"></label>
                          <?php
                        }
                      ?>
                    </div>
                  </div>
                </div>
                <p class="description">
                <?php echo $info["ds_descricao_loja"] ?>
                </p>
              </div>
              <?php
              }
            }
          ?> 
        </div>

        <div class="maisPerto tecnico">
            <p>Mais perto de você</p>
            <ul>
                <?php
                  foreach($infos as $info) {
                    if($info["ic_licenciado"] != 1 && $info["ic_premium"] != 1) {
                      ?>
                      <li><?php echo $info["nm_tecnico"] ?>
                      <br><?php echo $info["ds_email"] ?>
                          <a href="/frontEnd/src/pages/chat.php">
                            <img src="/frontEnd/assets/icons/message-circle.png" alt="">
                          </a>
                      </li>
                      <?php
                    }
                  }
                ?>
            </ul>
        </div>

        <div class="tecnico licenciados">
            <p>Licenciados</p>
            <ul>
                <?php
                  foreach($infos as $info) {
                    if($info["ic_licenciado"] == 1 && $info["ic_premium"] != 1) {
                      ?>
                      <li><?php echo $info["nm_tecnico"] ?>
                      <br><?php echo $info["ds_email"] ?>
                          <a href="/frontEnd/src/pages/chat.php">
                            <img src="/frontEnd/assets/icons/message-circle.png" alt="">
                          </a>
                      </li>
                      <?php
                    }
                  }
                ?>
            </ul>
        </div>
      <?php               
    }
    
  } else {
   
    if($_SESSION["tipo"] == "cliente") 
    {
      $clienteClass = new Clients();
      $clienteClass->setClientId($codigo);
      $data = $clienteClass->getClientDataByCode();
    } else {
      $tecnicoClass = new Technicians();
      $tecnicoClass->setTechId($codigo);
      $data = $tecnicoClass->getTechDataByCode();
    }

    $objeto =array(
      "cidade" => $data["nm_cidade"],
      "estado" => $data["sg_estado"]
    );

    echo json_encode($objeto);
    
  }
    
?>
