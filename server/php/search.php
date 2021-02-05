<?php 
    session_start();
    include_once '../classes/conversas.php';
    
    $tipo = $_SESSION['tipo'];
    $codigo = $_SESSION["codigo"];

    if(isset($_GET["pesquisa"]) && trim($_GET["pesquisa"]) != "" ) {
        $otherUsu = $_GET["pesquisa"];

        $mensagens = new Messages();
        $mensagens->setUserType($tipo);
        $mensagens->setMainUserCode($codigo);
        $mensagens->setOtherUserCode($otherUsu);

        $infos = $mensagens->getConvByEmail();

        if($infos != false) {
            
            foreach($infos as $info){
                
                $mensagens->setConvCode($info['cd_conversa']);
                ?>
                    
                    <div class="userConversation" onclick="chat(<?php echo $mensagens->convId; ?>,<?php echo $tipo == 'cliente' ? $info['cd_tecnico'] : $info['cd_usuario']; ?>); subscribe(<?php echo $mensagens->convId; ?>)">
                    <img src="/server/profilePics/<?php echo $info['md_picture']; ?>" alt="user">
                    <div>
                        <h4><?php echo $tipo == 'cliente' ? $info['nm_tecnico'] : $info['nm_usuario']; ?></h4>
                        <h4><?php echo $info['nm_cidade']; ?></h4>
                    </div>
                </div>
                <?php
            }
            // print_r($infos);
            
        } else {
            echo "<p class='noResults'>Sem resultados</p>";
        }
        

    }
?>