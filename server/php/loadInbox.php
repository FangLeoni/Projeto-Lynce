<?php 
    session_start();
    include_once '../classes/conversas.php';

    $tipo = $_SESSION["tipo"];
    $codigo = $_SESSION["codigo"];

    $mensagens = new Messages();
    $mensagens->setMainUserCode($codigo);
    $mensagens->setUserType($tipo);

    $infos = $mensagens->getConv();

    ?>
    
    <div class="topCont">
            <a href="./home.php" class="voltar"><--</a>

            <div class="photoCont" onclick="loadProfile()">
                <img src="/server/profilePics/<?php echo $_SESSION['codigo']?>/<?php echo $_SESSION['profPic'] ?>" alt="perfil">
            </div>
        </div>
            <form class="searchBar">
                <input type="text" name="search" autocomplete="off">
            </form>
            
            <div class="inbox">
                <?php

                    if($infos) {
                        foreach($infos as $info){
                                
                            ?>
                            
                                <div 
                                    class="userConversation" 
                                    onclick="chat('<?php echo $info['cd_conversa']; ?>','<?php echo $tipo == 'cliente' ? $info['cd_tecnico'] : $info['cd_cliente']; ?>'); subscribe('<?php echo $info['cd_conversa']; ?>');"
                                >
                                    <img src="/server/profilePics/<?php echo $tipo == 'cliente' ? $info['cd_tecnico'] : $info['cd_cliente']; ?>/<?php echo $info['md_picture']; ?>" alt="user">
                                    <div>
                                        <h4><?php echo $tipo == 'cliente' ? $info['nm_tecnico'] : $info['nm_cliente']; ?></h4>
                                        <h4><?php echo $info['nm_cidade']; ?></h4>
                                    </div>
                                    <ul id="menu">
                                        <li class="menu-item" onclick="otherProfile('<?php echo $tipo == 'cliente' ? $info['cd_tecnico'] : $info['cd_cliente']; ?>')">Perfil</li>
                                        <li class="menu-item" onclick="checkDeleteConv('<?php echo $info['cd_conversa']; ?>')">Excluir Conversa</li>
                                    </ul>
                                </div>
                                
                            <?php
                        }
                    }
                    
                ?>
            </div>
    <?php

?>

    
    
  


