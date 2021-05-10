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

        if($infos) {
            
            foreach($infos as $info){
                $imagePath = "../profilePics/" . ($tipo == 'cliente' ? $info['cd_tecnico'] : $info['cd_cliente'])  . "/";
                if (!is_dir($imagePath)) {
                    mkdir($imagePath, 0777, true);
                    $source = '../profilePics/' . $info['md_picture'];
                    $destination = $imagePath . $info['md_picture'];
                    copy( $source, $destination );
                }
                
                $mensagens->setConvCode($info['cd_conversa']);
                ?>
                    
                    <div class="userConversation" onclick="chat('<?php echo $mensagens->convId; ?>','<?php echo $tipo == 'cliente' ? $info['cd_tecnico'] : $info['cd_cliente']; ?>'); subscribe('<?php echo $mensagens->convId; ?>')">
                        <img src="/server/profilePics/<?php echo $tipo == 'cliente' ? $info['cd_tecnico'] : $info['cd_cliente']; ?>/<?php echo $info['md_picture']; ?>" alt="user">
                        <div>
                            <h4><?php echo $tipo == 'cliente' ? $info['nm_tecnico'] : $info['nm_cliente']; ?></h4>
                            <h4><?php echo $info['nm_cidade']; ?></h4>
                        </div>
                    </div>
                    <ul id="menu">
                        <li class="menu-item" onclick="otherProfile('<?php echo $tipo == 'cliente' ? $info['cd_tecnico'] : $info['cd_cliente']; ?>')">Perfil</li>
                        <?php if($info['cd_conversa']){
                            ?>
                            <li class="menu-item" onclick="checkDeleteConv(<?php echo $info['cd_conversa']; ?>)">Excluir Conversa</li>
                            <?php
                        } ?>
                    </ul>
                <?php
            }
            
        } else {
            echo "<p class='noResults'>Sem resultados</p>";
        }
    }
?>